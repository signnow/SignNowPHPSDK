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

namespace SignNow\Api\Document\Request\Data\Tag;

use Symfony\Component\Serializer\Annotation\SerializedName;

readonly class Radio
{
    public function __construct(
        private int $pageNumber,
        private int $x,
        private int $y,
        private int $width,
        private int $height,
        private string $checked = '',
        private string $value = '',
        #[SerializedName('x-offset')]
        private int $xOffset = 0,
        #[SerializedName('y-offset')]
        private int $yOffset = 0,
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

    public function getChecked(): string
    {
        return $this->checked;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getXOffset(): int
    {
        return $this->xOffset;
    }

    public function getYOffset(): int
    {
        return $this->yOffset;
    }

    public function toArray(): array
    {
        return [
           'page_number' => $this->getPageNumber(),
           'x' => $this->getX(),
           'y' => $this->getY(),
           'width' => $this->getWidth(),
           'height' => $this->getHeight(),
           'checked' => $this->getChecked(),
           'value' => $this->getValue(),
           'x-offset' => $this->getXOffset(),
           'y-offset' => $this->getYOffset(),
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
            $data['checked'] ?? '',
            $data['value'] ?? '',
            $data['x-offset'] ?? 0,
            $data['y-offset'] ?? 0,
        );
    }
}
