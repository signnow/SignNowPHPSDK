<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data;

readonly class JsonAttribute
{
    public function __construct(
        private int $pageNumber,
        private int $x,
        private int $y,
        private int $width,
        private int $height,
        private bool $required,
        private string $name = '',
        private string $label = '',
        private bool $bold = false,
        private bool $underline = false,
        private int $maxLines = 0,
        private string $validatorId = '',
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

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function isRequired(): bool
    {
        return $this->required;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function isBold(): bool
    {
        return $this->bold;
    }

    public function isUnderline(): bool
    {
        return $this->underline;
    }

    public function getMaxLines(): int
    {
        return $this->maxLines;
    }

    public function getValidatorId(): string
    {
        return $this->validatorId;
    }

    public function toArray(): array
    {
        return [
           'page_number' => $this->getPageNumber(),
           'x' => $this->getX(),
           'y' => $this->getY(),
           'width' => $this->getWidth(),
           'height' => $this->getHeight(),
           'required' => $this->isRequired(),
           'name' => $this->getName(),
           'label' => $this->getLabel(),
           'bold' => $this->isBold(),
           'underline' => $this->isUnderline(),
           'max_lines' => $this->getMaxLines(),
           'validator_id' => $this->getValidatorId(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['page_number'],
            $data['x'],
            $data['y'],
            $data['width'],
            $data['height'],
            $data['required'],
            $data['name'] ?? '',
            $data['label'] ?? '',
            $data['bold'] ?? false,
            $data['underline'] ?? false,
            $data['max_lines'] ?? 0,
            $data['validator_id'] ?? '',
        );
    }
}
