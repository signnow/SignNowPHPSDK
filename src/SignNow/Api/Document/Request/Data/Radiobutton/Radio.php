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

namespace SignNow\Api\Document\Request\Data\Radiobutton;

readonly class Radio
{
    public function __construct(
        private int $x,
        private int $y,
        private int $width,
        private int $height,
        private string $value,
        private int $checked,
        private int $pageNumber,
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

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getChecked(): int
    {
        return $this->checked;
    }

    public function getPageNumber(): int
    {
        return $this->pageNumber;
    }

    public function toArray(): array
    {
        return [
           'x' => $this->getX(),
           'y' => $this->getY(),
           'width' => $this->getWidth(),
           'height' => $this->getHeight(),
           'value' => $this->getValue(),
           'checked' => $this->getChecked(),
           'page_number' => $this->getPageNumber(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['x'],
            $data['y'],
            $data['width'],
            $data['height'],
            $data['value'],
            $data['checked'],
            $data['page_number'],
        );
    }
}
