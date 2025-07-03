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

readonly class Text
{
    public function __construct(
        private string $id,
        private string $font,
        private string $size,
        private string $data,
        private string $pageNumber,
        private string $x,
        private string $y,
        private string $subtype,
        private string $created,
        private string $align,
        private bool $isWidthFixed,
        private bool $allowEditing,
        private ?string $userId = null,
        private string $email = '',
        private string $width = '',
        private string $height = '',
        private float $lineHeight = 0,
        private ?string $color = null,
        private bool $italic = false,
        private bool $underline = false,
        private bool $bold = false,
        private ?string $originalFontSize = null,
        private ?string $prefillContentType = null,
        private ?bool $ownerAsRecipient = null,
        private ?string $integrationObjectId = null,
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

    public function getEmail(): string
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

    public function getPageNumber(): string
    {
        return $this->pageNumber;
    }

    public function getX(): string
    {
        return $this->x;
    }

    public function getY(): string
    {
        return $this->y;
    }

    public function getWidth(): string
    {
        return $this->width;
    }

    public function getHeight(): string
    {
        return $this->height;
    }

    public function getLineHeight(): float
    {
        return $this->lineHeight;
    }

    public function getSubtype(): string
    {
        return $this->subtype;
    }

    public function getCreated(): string
    {
        return $this->created;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function isItalic(): bool
    {
        return $this->italic;
    }

    public function isUnderline(): bool
    {
        return $this->underline;
    }

    public function isBold(): bool
    {
        return $this->bold;
    }

    public function getAlign(): string
    {
        return $this->align;
    }

    public function getOriginalFontSize(): ?string
    {
        return $this->originalFontSize;
    }

    public function getPrefillContentType(): ?string
    {
        return $this->prefillContentType;
    }

    public function isWidthFixed(): bool
    {
        return $this->isWidthFixed;
    }

    public function isAllowEditing(): bool
    {
        return $this->allowEditing;
    }

    public function isOwnerAsRecipient(): ?bool
    {
        return $this->ownerAsRecipient;
    }

    public function getIntegrationObjectId(): ?string
    {
        return $this->integrationObjectId;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'user_id' => $this->getUserId(),
           'email' => $this->getEmail(),
           'font' => $this->getFont(),
           'size' => $this->getSize(),
           'data' => $this->getData(),
           'page_number' => $this->getPageNumber(),
           'x' => $this->getX(),
           'y' => $this->getY(),
           'width' => $this->getWidth(),
           'height' => $this->getHeight(),
           'line_height' => $this->getLineHeight(),
           'subtype' => $this->getSubtype(),
           'created' => $this->getCreated(),
           'color' => $this->getColor(),
           'italic' => $this->isItalic(),
           'underline' => $this->isUnderline(),
           'bold' => $this->isBold(),
           'align' => $this->getAlign(),
           'original_font_size' => $this->getOriginalFontSize(),
           'prefill_content_type' => $this->getPrefillContentType(),
           'is_width_fixed' => $this->IsWidthFixed(),
           'allow_editing' => $this->isAllowEditing(),
           'owner_as_recipient' => $this->isOwnerAsRecipient(),
           'integration_object_id' => $this->getIntegrationObjectId(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['font'],
            $data['size'],
            $data['data'],
            $data['page_number'],
            $data['x'],
            $data['y'],
            $data['subtype'],
            $data['created'],
            $data['align'],
            $data['is_width_fixed'],
            $data['allow_editing'],
            $data['user_id'] ?? null,
            $data['email'] ?? '',
            $data['width'] ?? '',
            $data['height'] ?? '',
            $data['line_height'] ?? 0,
            $data['color'] ?? null,
            $data['italic'] ?? false,
            $data['underline'] ?? false,
            $data['bold'] ?? false,
            $data['original_font_size'] ?? null,
            $data['prefill_content_type'] ?? null,
            $data['owner_as_recipient'] ?? null,
            $data['integration_object_id'] ?? null,
        );
    }
}
