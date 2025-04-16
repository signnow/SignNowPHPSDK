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
use ReflectionClass;
use ReflectionException;
use SignNow\Core\Collection\FloatCollection;
use SignNow\Core\Collection\StringCollection;
use SignNow\Core\Collection\TypedCollection;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class TypedCollectionNormalizer implements NormalizerInterface, DenormalizerInterface
{
    private const UNION_TYPE_DELIMITER = '|';
    private const NULLABLE_PREFIX = '?';

    public function getSupportedTypes(?string $format): array
    {
        return [
            TypedCollection::class => true,
            StringCollection::class => true,
            FloatCollection::class => true,
        ];
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return $data instanceof TypedCollection;
    }

    public function normalize(
        mixed $object,
        ?string $format = null,
        array $context = []
    ): ArrayObject|array|string|int|float|bool|null {
        $collection = [];

        foreach ($object as $item) {
            $collection[] = $item->toArray();
        }

        return $collection;
    }

    /**
     * @throws ReflectionException
     */
    public function supportsDenormalization(
        mixed $data,
        string $type,
        ?string $format = null,
        array $context = []
    ): bool {
        return $this->isSignNowApiCollection($type);
    }

    /**
     * @throws ReflectionException
     */
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        return $this->asCollection($data, $type);
    }

    /**
     * @throws ReflectionException
     */
    private function asCollection(mixed $data, string $type): TypedCollection
    {
        $collection = new $type();
        $itemType = $collection->getItemType();

        if ($this->isScalarType($itemType)) {
            foreach ($data as $itemData) {
                $collection->add($this->asValue($itemType, $itemData));
            }

            return $collection;
        }

        $reflectionItemClass = new ReflectionClass($itemType);

        foreach ($data as $itemData) {
            if (!$reflectionItemClass->hasMethod('__construct')) {
                $collection->add($this->asValue($itemType, $itemData));
                continue;
            }

            $constructor = $reflectionItemClass->getMethod('__construct');
            $constructorArguments = $constructor->getParameters();
            $args = [];

            foreach ($constructorArguments as $argument) {
                $argName = $this->toSnakeCase($argument->getName());
                $argType = $argument->getType();
                $argValue = $itemData[$argName] ?? null;

                if ($argType === null) {
                    // argument is missing type hint
                    $args[] = $argValue;
                } elseif (is_array($itemData) && array_key_exists($argName, $itemData)) {
                    // convert argument to the specified type
                    $args[] = $this->toType((string)$argType, $argValue);
                } else {
                    // argument is missing in the input data so use default value
                    $args[] = $argument->isDefaultValueAvailable() ? $argument->getDefaultValue() : null;
                }
            }

            $itemObject = $reflectionItemClass->newInstanceArgs($args);
            $collection->add($itemObject);
        }

        return $collection;
    }

    private function asValue(string $type, mixed $value): mixed
    {
        if (method_exists($type, 'fromArray')) {
            return $type::fromArray($value);
        }

        return $value;
    }

    /**
     * @throws ReflectionException
     */
    private function toType(string $type, mixed $value): mixed
    {
        if ($this->isUnionType($type)) {
            $type = $this->parseUnionType($type, $value);
        }
        if ($this->isNullable($type)) {
            $type = $this->removeNullable($type);
        }
        if ($this->isSignNowApiCollection($type)) {
            return $this->asCollection($value, $type);
        }

        return $this->asValue($type, $value);
    }

    private function isSignNowApiCollection(string $type): bool
    {
        return str_starts_with($type, 'SignNow\\Api') && str_ends_with($type, 'Collection');
    }

    private function toSnakeCase(string $name): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $name));
    }

    private function isScalarType(string $type): bool
    {
        return in_array($type, ['string', 'int', 'float', 'double', 'bool'], true);
    }

    private function isUnionType(string $type): bool
    {
        return str_contains($type, self::UNION_TYPE_DELIMITER);
    }

    private function parseUnionType(string $type, mixed $value): string
    {
        $types = explode(self::UNION_TYPE_DELIMITER, $type);

        foreach ($types as $itemType) {
            if ($this->isScalarType($itemType) && is_scalar($value)) {
                return $itemType;
            }
            if ($value instanceof $itemType) {
                return $itemType;
            }
        }

        return $type;
    }

    private function isNullable(string $type): bool
    {
        return str_starts_with($type, self::NULLABLE_PREFIX);
    }

    private function removeNullable(string $type): string
    {
        return str_replace(self::NULLABLE_PREFIX, '', $type);
    }
}
