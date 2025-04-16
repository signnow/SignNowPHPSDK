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

readonly class IntegrationObject
{
    public function __construct(
        private string $id,
        private string $pageNumber,
        private string $font,
        private string $size,
        private string $data,
        private string $x,
        private string $y,
        private JsonAttribute $jsonAttributes,
        private float $lineHeight,
        private ?string $userId = null,
        private ?string $email = null,
        private ?string $apiIntegrationId = null,
        private string $created = '',
        private bool $allowEditing = false,
        private string $width = '',
        private string $height = '',
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getUserId(): ?string
    {
        return $this->userId;
    }

    public function getPageNumber(): string
    {
        return $this->pageNumber;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getFont(): string
    {
        return $this->font;
    }

    public function getSize(): string
    {
        return $this->size;
    }

    public function getData(): string
    {
        return $this->data;
    }

    public function getApiIntegrationId(): ?string
    {
        return $this->apiIntegrationId;
    }

    public function getX(): string
    {
        return $this->x;
    }

    public function getY(): string
    {
        return $this->y;
    }

    public function getJsonAttributes(): JsonAttribute
    {
        return $this->jsonAttributes;
    }

    public function getCreated(): string
    {
        return $this->created;
    }

    public function getLineHeight(): float
    {
        return $this->lineHeight;
    }

    public function isAllowEditing(): bool
    {
        return $this->allowEditing;
    }

    public function getWidth(): string
    {
        return $this->width;
    }

    public function getHeight(): string
    {
        return $this->height;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'user_id' => $this->getUserId(),
           'page_number' => $this->getPageNumber(),
           'email' => $this->getEmail(),
           'font' => $this->getFont(),
           'size' => $this->getSize(),
           'data' => $this->getData(),
           'api_integration_id' => $this->getApiIntegrationId(),
           'x' => $this->getX(),
           'y' => $this->getY(),
           'json_attributes' => $this->getJsonAttributes()->toArray(),
           'created' => $this->getCreated(),
           'line_height' => $this->getLineHeight(),
           'allow_editing' => $this->isAllowEditing(),
           'width' => $this->getWidth(),
           'height' => $this->getHeight(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['page_number'],
            $data['font'],
            $data['size'],
            $data['data'],
            $data['x'],
            $data['y'],
            JsonAttribute::fromArray($data['json_attributes']),
            $data['line_height'],
            $data['user_id'] ?? null,
            $data['email'] ?? null,
            $data['api_integration_id'] ?? null,
            $data['created'] ?? '',
            $data['allow_editing'] ?? false,
            $data['width'] ?? '',
            $data['height'] ?? '',
        );
    }
}
