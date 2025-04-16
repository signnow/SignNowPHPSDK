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
        private ?string $color = null,
        private bool $bold = false,
        private bool $italic = false,
        private bool $underline = false,
        private ?string $align = null,
        private ?string $valign = null,
        private ?string $font = null,
        private ?int $fontSize = null,
        private ?int $size = null,
        private ?string $arrangement = null,
        private int $maxLines = 0,
        private int $maxChars = 0,
        private string $validatorId = '',
        private string $prefilledText = '',
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

    public function getColor(): ?string
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

    public function getFontSize(): ?int
    {
        return $this->fontSize;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function getArrangement(): ?string
    {
        return $this->arrangement;
    }

    public function getPrefilledText(): ?string
    {
        return $this->prefilledText;
    }

    public function getMaxChars(): ?int
    {
        return $this->maxChars;
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
           'color' => $this->getColor(),
           'bold' => $this->isBold(),
           'italic' => $this->isItalic(),
           'underline' => $this->isUnderline(),
           'align' => $this->getAlign(),
           'valign' => $this->getValign(),
           'font' => $this->getFont(),
           'font_size' => $this->getFontSize(),
           'size' => $this->getSize(),
           'arrangement' => $this->getArrangement(),
           'max_lines' => $this->getMaxLines(),
           'max_chars' => $this->getMaxChars(),
           'validator_id' => $this->getValidatorId(),
           'prefilled_text' => $this->getPrefilledText(),
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
            $data['color'] ?? null,
            $data['bold'] ?? false,
            $data['italic'] ?? false,
            $data['underline'] ?? false,
            $data['align'] ?? null,
            $data['valign'] ?? null,
            $data['font'] ?? null,
            $data['font_size'] ?? null,
            $data['size'] ?? null,
            $data['arrangement'] ?? null,
            $data['max_lines'] ?? 0,
            $data['max_chars'] ?? 0,
            $data['validator_id'] ?? '',
            $data['prefilled_text'] ?? '',
        );
    }
}
