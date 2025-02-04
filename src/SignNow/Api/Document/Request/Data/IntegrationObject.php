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

namespace SignNow\Api\Document\Request\Data;

readonly class IntegrationObject
{
    public function __construct(
        private int $x,
        private int $y,
        private int $size,
        private int $width,
        private int $height,
        private int $pageNumber,
        private string $font,
        private string $data,
        private int $status,
        private string $color,
        private int $created,
        private bool $active,
        private int $lineHeight,
        private bool $bold = false,
        private bool $italic = false,
        private bool $underline = false,
        private string $fieldId = '',
        private ?string $apiIntegrationId = null,
    ) {
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function getPageNumber(): int
    {
        return $this->pageNumber;
    }

    public function getFont(): string
    {
        return $this->font;
    }

    public function getData(): string
    {
        return $this->data;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function isBold(): bool
    {
        return $this->bold;
    }

    public function isItalic(): bool
    {
        return $this->italic;
    }

    public function isUnderline(): bool
    {
        return $this->underline;
    }

    public function getCreated(): int
    {
        return $this->created;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function getLineHeight(): int
    {
        return $this->lineHeight;
    }

    public function getFieldId(): string
    {
        return $this->fieldId;
    }

    public function getApiIntegrationId(): ?string
    {
        return $this->apiIntegrationId;
    }

    public function toArray(): array
    {
        return [
           'x' => $this->getX(),
           'y' => $this->getY(),
           'size' => $this->getSize(),
           'width' => $this->getWidth(),
           'height' => $this->getHeight(),
           'page_number' => $this->getPageNumber(),
           'font' => $this->getFont(),
           'data' => $this->getData(),
           'status' => $this->getStatus(),
           'color' => $this->getColor(),
           'bold' => $this->isBold(),
           'italic' => $this->isItalic(),
           'underline' => $this->isUnderline(),
           'created' => $this->getCreated(),
           'active' => $this->isActive(),
           'line_height' => $this->getLineHeight(),
           'field_id' => $this->getFieldId(),
           'api_integration_id' => $this->getApiIntegrationId(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['x'],
            $data['y'],
            $data['size'],
            $data['width'],
            $data['height'],
            $data['page_number'],
            $data['font'],
            $data['data'],
            $data['status'],
            $data['color'],
            $data['created'],
            $data['active'],
            $data['line_height'],
            $data['bold'] ?? false,
            $data['italic'] ?? false,
            $data['underline'] ?? false,
            $data['field_id'] ?? '',
            $data['api_integration_id'] ?? null,
        );
    }
}
