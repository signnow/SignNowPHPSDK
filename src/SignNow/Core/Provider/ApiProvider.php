<?php

/*
 * This file is a part of signNow SDK API client.
 *
 * (с) Copyright © 2011-present airSlate Inc. (https://www.signnow.com)
 *
 * For more details on copyright, see LICENSE.md file
 * that was distributed with this source code.
 */

declare(strict_types=1);

namespace SignNow\Core\Provider;

use GuzzleHttp\Client as HttpClient;
use RuntimeException;
use SignNow\ApiClient;
use SignNow\Core\Config\ConfigLoader;
use SignNow\Core\Config\ConfigRepository;
use SignNow\Core\Request\EndpointResolver;
use SignNow\Core\Response\FileDownloader;
use SignNow\Core\Response\ResponseToEntityMapper as ResponseMapper;
use SignNow\Core\Serializer\DocumentSettingsNormalizer;
use SignNow\Core\Serializer\TypedCollectionNormalizer;
use SignNow\Core\Serializer\UserSettingsNormalizer;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AttributeLoader;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

readonly class ApiProvider
{
    public function __construct(
        private ContainerBuilder $container,
        private ?string $configPath = null,
    ) {
    }

    public function getContainer(): ContainerBuilder
    {
        return $this->container;
    }

    public function register(): void
    {
        $this->buildConfig();
        $this->registerApiClient();
        $this->compile();
    }

    public function registerApiClient(): void
    {
        $classMetadataFactory = new ClassMetadataFactory(new AttributeLoader());
        $this->container
            ->autowire('serializer', Serializer::class)
            ->setArgument(
                '$normalizers',
                [
                    new DocumentSettingsNormalizer(),
                    new UserSettingsNormalizer(),
                    new TypedCollectionNormalizer(),
                    new ArrayDenormalizer(),
                    new ObjectNormalizer(
                        $classMetadataFactory,
                        new MetadataAwareNameConverter(
                            $classMetadataFactory,
                            new CamelCaseToSnakeCaseNameConverter()
                        )
                    ),
                ]
            )
            ->setArgument(
                '$encoders',
                [
                    new JsonEncoder(),
                ]
            )
            ->setPublic(true);

        $config = $this->getConfig();
        $this->container
            ->register('http_client', HttpClient::class)
            ->setPublic(true);
        $this->container
            ->register('resolver', EndpointResolver::class)
            ->setPublic(true);
        $this->container
            ->register('file_downloader', FileDownloader::class)
            ->addArgument($config->downloadsDirectory())
            ->setPublic(true);
        $this->container
            ->register('mapper', ResponseMapper::class)
            ->addArgument(new Reference('serializer'))
            ->addArgument(new Reference('file_downloader'))
            ->setPublic(true);

        $this->container->autowire('api_client', ApiClient::class)
            ->addArgument(new Reference('http_client'))
            ->addArgument(new Reference('resolver'))
            ->addArgument(new Reference('config'))
            ->addArgument(new Reference('mapper'))
            ->addArgument(new Reference('basic_token'))
            ->setPublic(true);
    }

    private function compile(): void
    {
        $this->container->compile();
    }

    /**
     * @throws RuntimeException
     */
    private function buildConfig(): ConfigRepository
    {
        $loader = new ConfigLoader();
        $config = new ConfigRepository($loader->load($this->configPath));
        $config->validate();

        $this->container
            ->set('config', $config);

        $this->container
            ->set('basic_token', $config->basicToken());

        return $config;
    }

    private function getConfig(): ConfigRepository
    {
        if ($this->container->has('config')) {
            return $this->container->get('config');
        }

        return $this->buildConfig();
    }
}
