<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data;

readonly class Hyperlink
{
    public function __construct(
        private string $id,
        private string $pageNumber,
        private string $x,
        private string $y,
        private string $font,
        private string $size,
        private string $data,
        private string $label,
        private string $lineHeight,
        private string $originalFontSize,
        private string $created,
        private bool $allowEditing,
        private ?string $userId = null,
        private string $email = '',
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

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getLineHeight(): string
    {
        return $this->lineHeight;
    }

    public function getOriginalFontSize(): string
    {
        return $this->originalFontSize;
    }

    public function getCreated(): string
    {
        return $this->created;
    }

    public function isAllowEditing(): bool
    {
        return $this->allowEditing;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'user_id' => $this->getUserId(),
           'email' => $this->getEmail(),
           'page_number' => $this->getPageNumber(),
           'x' => $this->getX(),
           'y' => $this->getY(),
           'font' => $this->getFont(),
           'size' => $this->getSize(),
           'data' => $this->getData(),
           'label' => $this->getLabel(),
           'line_height' => $this->getLineHeight(),
           'original_font_size' => $this->getOriginalFontSize(),
           'created' => $this->getCreated(),
           'allow_editing' => $this->isAllowEditing(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['page_number'],
            $data['x'],
            $data['y'],
            $data['font'],
            $data['size'],
            $data['data'],
            $data['label'],
            $data['line_height'],
            $data['original_font_size'],
            $data['created'],
            $data['allow_editing'],
            $data['user_id'] ?? null,
            $data['email'] ?? '',
        );
    }
}
