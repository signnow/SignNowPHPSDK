<?php

declare(strict_types=1);

namespace SignNow\Core\Collection;

use ArrayAccess;
use Closure;
use Iterator;
use JsonException;
use ReturnTypeWillChange;

abstract class TypedCollection implements Iterator, ArrayAccess
{
    protected array $items = [];

    private int $position;

    abstract public function validateType(mixed $value): void;
    abstract public function getItemType(): string;

    public function __construct(array $items = [])
    {
        foreach ($items as $item) {
            $this->validateType($item);
        }

        $this->items = $items;
        $this->position = 0;
    }

    public function count(): int
    {
        return count($this->items);
    }

    public function isEmpty(): bool
    {
        return $this->count() === 0;
    }

    #[ReturnTypeWillChange]
    public function first(): mixed
    {
        return $this->items[0] ?? null;
    }

    #[ReturnTypeWillChange]
    public function last(): mixed
    {
        if ($this->count() > 0) {
            return $this->items[$this->count() - 1];
        }

        return null;
    }

    #[ReturnTypeWillChange]
    public function current(): mixed
    {
        return $this->items[$this->position];
    }

    public function key(): mixed
    {
        return $this->position;
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function valid(): bool
    {
        return isset($this->items[$this->position]);
    }

    public function offsetExists($offset): bool
    {
        return isset($this->items[$offset]);
    }

    #[ReturnTypeWillChange]
    public function offsetGet($offset): mixed
    {
        return $this->items[$offset];
    }

    public function offsetSet($offset, $value): void
    {
        $this->validateType($value);

        if (is_null($offset)) {
            $this->items[] = $value;
        } else {
            $this->items[$offset] = $value;
        }
    }

    public function offsetUnset($offset): void
    {
        unset($this->items[$offset]);
    }

    public function contains(mixed $item): bool
    {
        return in_array($item, $this->items, true);
    }

    public function indexOf(mixed $item): int|string|false
    {
        return array_search($item, $this->items, true);
    }

    public function get(string|int $key): mixed
    {
        return $this->items[$key] ?? null;
    }

    public function set(string|int $key, mixed $value): void
    {
        $this->items[$key] = $value;
    }

    public function hasIntKeys(): bool
    {
        foreach ($this->items as $key => $value) {
            if (is_int($key)) {
                return true;
            }
        }

        return false;
    }

    public function toArray(bool $withSnakeCaseKeys = true): array
    {
        if (!$withSnakeCaseKeys) {
            return $this->items;
        }

        if ($this->hasIntKeys()) {
            return array_map(
                function ($item) {
                    if (is_scalar($item)) {
                        return $item;
                    }

                    if (is_object($item)) {
                        $properties = $this->toArrayRecursive($item);
                    } else {
                        $properties = $item;
                    }

                    return $this->removeEmptyRecursive(
                        array_combine(
                            array_map(
                                static fn($key) => strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $key)),
                                array_keys($properties)
                            ),
                            $properties
                        )
                    );
                },
                $this->items
            );
        }

        $keys = array_keys($this->items);

        return $this->removeEmptyRecursive(
            array_combine(
                array_map(
                    static fn($key) => strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $key)),
                    $keys
                ),
                $this->items
            )
        );
    }

    public function toJson(): string
    {
        try {
            $json = json_encode($this->toArray(), JSON_THROW_ON_ERROR);
        } catch (JsonException) {
            $json = '[]';
        }

        return $json;
    }

    public function exists(Closure $fn): bool
    {
        foreach ($this->items as $key => $item) {
            if ($fn($key, $item)) {
                return true;
            }
        }

        return false;
    }

    public function map(Closure $fn): self
    {
        return new static(array_map($fn, $this->items));
    }

    public function reduce(Closure $fn, $initial = null): mixed
    {
        return array_reduce($this->items, $fn, $initial);
    }

    public function filter(Closure $fn): self
    {
        return new static(array_filter($this->items, $fn, ARRAY_FILTER_USE_BOTH));
    }

    public function findFirst(Closure $fn): mixed
    {
        foreach ($this->items as $key => $item) {
            if ($fn($key, $item)) {
                return $item;
            }
        }

        return null;
    }

    public function merge(self $collection): self
    {
        return new static(array_merge($this->toArray(), $collection->toArray()));
    }

    public function slice(int $offset, int|null $length = null): array
    {
        return array_slice($this->items, $offset, $length, true);
    }

    public function clear(): void
    {
        $this->items = [];
    }

    protected function append(mixed $item): void
    {
        $this->items[] = $item;
    }

    private function removeEmptyRecursive(array|object $data): array|object
    {
        foreach ($data as $key => &$value) {
            if (is_array($value) || is_object($value)) {
                $value = $this->removeEmptyRecursive($value);
            }
            if ($value === null || $value === '') {
                if (is_array($data)) {
                    unset($data[$key]);
                }
                if (is_object($data)) {
                    unset($data->$key);
                }
            }
        }

        return $data;
    }

    private function toArrayRecursive($data): array
    {
        if (is_array($data)) {
            $array = $data;
        }

        if (is_object($data)) {
            $array = method_exists($data, 'toArray') ? $data->toArray() : get_object_vars($data);
        }

        foreach ($array as $key => $value) {
            if (is_array($value) || is_object($value)) {
                $array[$key] = $this->toArrayRecursive($value);
            }
        }

        return $array;
    }
}
