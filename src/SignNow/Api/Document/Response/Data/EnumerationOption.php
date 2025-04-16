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

namespace SignNow\Api\Document\Response\Data;

readonly class EnumerationOption
{
    public function __construct(
        private string $id,
        private string $enumerationId,
        private string $data,
        private string $created,
        private string $updated,
        private string|JsonAttribute $jsonAttributes,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getEnumerationId(): string
    {
        return $this->enumerationId;
    }

    public function getData(): string
    {
        return $this->data;
    }

    public function getCreated(): string
    {
        return $this->created;
    }

    public function getUpdated(): string
    {
        return $this->updated;
    }

    public function getJsonAttributes(): string|JsonAttribute
    {
        return $this->jsonAttributes;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'enumeration_id' => $this->getEnumerationId(),
           'data' => $this->getData(),
           'created' => $this->getCreated(),
           'updated' => $this->getUpdated(),
           'json_attributes' => $this->getJsonAttributes()->toArray(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['enumeration_id'],
            $data['data'],
            $data['created'],
            $data['updated'],
            is_array($data['json_attributes'])
                ? JsonAttribute::fromArray($data['json_attributes'])
                : (string)$data['json_attributes'],
        );
    }
}
