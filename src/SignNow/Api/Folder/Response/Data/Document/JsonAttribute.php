<?php

declare(strict_types=1);

namespace SignNow\Api\Folder\Response\Data\Document;

readonly class JsonAttribute
{
    public function __construct(
        private int $pageNumber,
        private int $x,
        private int $y,
        private int $width,
        private int $height,
        private bool $required,
        private ?string $label = null,
        private ?string $name = null,
        private ?string $color = null,
        private ?bool $bold = null,
        private ?bool $italic = null,
        private ?bool $underline = null,
        private ?string $align = null,
        private ?string $valign = null,
        private ?string $font = null,
        private ?int $size = null,
        private ?int $fontSize = null,
        private ?string $arrangement = null,
        private ?int $maxLines = null,
        private ?int $maxChars = null,
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

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function isBold(): ?bool
    {
        return $this->bold;
    }

    public function isItalic(): ?bool
    {
        return $this->italic;
    }

    public function isUnderline(): ?bool
    {
        return $this->underline;
    }

    public function getAlign(): ?string
    {
        return $this->align;
    }

    public function getValign(): ?string
    {
        return $this->valign;
    }

    public function getFont(): ?string
    {
        return $this->font;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function getFontSize(): ?int
    {
        return $this->fontSize;
    }

    public function getArrangement(): ?string
    {
        return $this->arrangement;
    }

    public function getMaxLines(): ?int
    {
        return $this->maxLines;
    }

    public function getMaxChars(): ?int
    {
        return $this->maxChars;
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
           'label' => $this->getLabel(),
           'name' => $this->getName(),
           'color' => $this->getColor(),
           'bold' => $this->isBold(),
           'italic' => $this->isItalic(),
           'underline' => $this->isUnderline(),
           'align' => $this->getAlign(),
           'valign' => $this->getValign(),
           'font' => $this->getFont(),
           'size' => $this->getSize(),
           'font_size' => $this->getFontSize(),
           'arrangement' => $this->getArrangement(),
           'max_lines' => $this->getMaxLines(),
           'max_chars' => $this->getMaxChars(),
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
            $data['label'] ?? null,
            $data['name'] ?? null,
            $data['color'] ?? null,
            $data['bold'] ?? null,
            $data['italic'] ?? null,
            $data['underline'] ?? null,
            $data['align'] ?? null,
            $data['valign'] ?? null,
            $data['font'] ?? null,
            $data['size'] ?? null,
            $data['font_size'] ?? null,
            $data['arrangement'] ?? null,
            $data['max_lines'] ?? null,
            $data['max_chars'] ?? null,
        );
    }
}
