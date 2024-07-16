<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Request\Data\Radiobutton;

readonly class Radiobutton
{
    public function __construct(
        private int $pageNumber,
        private int $x,
        private int $y,
        private int $lineHeight,
        private int $status,
        private int $isPrinted,
        private int $size,
        private string $subtype,
        private string $name,
        private string $font,
        private RadioCollection $radio,
        private string $fieldId = '',
    ) {
    }

    public function getPageNumber(): int
    {
        return $this->pageNumber;
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function getLineHeight(): int
    {
        return $this->lineHeight;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function getIsPrinted(): int
    {
        return $this->isPrinted;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function getSubtype(): string
    {
        return $this->subtype;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getFieldId(): string
    {
        return $this->fieldId;
    }

    public function getFont(): string
    {
        return $this->font;
    }

    public function getRadio(): RadioCollection
    {
        return $this->radio;
    }

    public function toArray(): array
    {
        return [
           'page_number' => $this->getPageNumber(),
           'x' => $this->getX(),
           'y' => $this->getY(),
           'line_height' => $this->getLineHeight(),
           'status' => $this->getStatus(),
           'is_printed' => $this->getIsPrinted(),
           'size' => $this->getSize(),
           'subtype' => $this->getSubtype(),
           'name' => $this->getName(),
           'field_id' => $this->getFieldId(),
           'font' => $this->getFont(),
           'radio' => $this->getRadio()->toArray(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['page_number'],
            $data['x'],
            $data['y'],
            $data['line_height'],
            $data['status'],
            $data['is_printed'],
            $data['size'],
            $data['subtype'],
            $data['name'],
            $data['font'],
            new RadioCollection($data['radio']),
            $data['field_id'] ?? '',
        );
    }
}
