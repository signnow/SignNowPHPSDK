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

namespace SignNow\Core\Serializer;

use ArrayObject;
use SignNow\Api\Document\Response\Data\Settings as DocumentSettings;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class DocumentSettingsNormalizer implements NormalizerInterface, DenormalizerInterface
{
    public function getSupportedTypes(?string $format): array
    {
        return [
            DocumentSettings::class => true,
        ];
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return $data instanceof DocumentSettings;
    }

    public function supportsDenormalization(
        mixed $data,
        string $type,
        ?string $format = null,
        array $context = []
    ): bool {
        return $type === DocumentSettings::class;
    }

    public function normalize(
        mixed $object,
        ?string $format = null,
        array $context = [],
    ): ArrayObject|array|string|int|float|bool|null {
        return $object->toArray();
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        return $this->asDocumentSettings($data, $type);
    }

    private function asDocumentSettings(mixed $data, string $type): DocumentSettings
    {
        return new $type($data);
    }
}
