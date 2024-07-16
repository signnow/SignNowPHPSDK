<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Request\Data;

readonly class Hyperlink
{
    public function __construct(
        private int $x,
        private int $y,
        private int $size,
        private int $width,
        private int $height,
        private int $pageNumber,
        private string $font,
        private int $lineHeight,
        private string $fieldId = '',
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

    public function getLineHeight(): int
    {
        return $this->lineHeight;
    }

    public function getFieldId(): string
    {
        return $this->fieldId;
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
           'line_height' => $this->getLineHeight(),
           'field_id' => $this->getFieldId(),
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
            $data['line_height'],
            $data['field_id'] ?? '',
        );
    }
}
