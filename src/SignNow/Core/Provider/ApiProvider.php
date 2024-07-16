<?php

declare(strict_types=1);

namespace SignNow\Core\Provider;

use GuzzleHttp\Client as HttpClient;
use RuntimeException;
use SignNow\ApiClient;
use SignNow\Core\Config\ConfigLoader;
use SignNow\Core\Config\ConfigRepository;
use SignNow\Core\Request\EndpointResolver;
use SignNow\Core\Response\ResponseToEntityMapper as ResponseMapper;
use SignNow\Core\Serializer\TypedCollectionNormalizer;
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
        private string $configPath,
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

        $this->container
            ->register('http_client', HttpClient::class)
            ->setPublic(true);
        $this->container
            ->register('resolver', EndpointResolver::class)
            ->setPublic(true);
        $this->container
            ->register('mapper', ResponseMapper::class)
            ->addArgument(new Reference('serializer'))
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
    private function buildConfig(): void
    {
        if (!file_exists($this->configPath)) {
            throw new RuntimeException(
                sprintf(
                    'Config file not found at "%s" directory.',
                    $this->configPath
                )
            );
        }

        $loader = new ConfigLoader();
        $config = new ConfigRepository($loader->load($this->configPath));

        $this->container
            ->set('config', $config);

        $this->container
            ->set('basic_token', $config->basicToken());
    }
}
