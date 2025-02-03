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

namespace SignNow\Api\Document\Response\Data\Radiobutton;

readonly class Radio
{
    public function __construct(
        private string $radioId,
        private string $created,
        private string $pageNumber,
        private string $x,
        private string $y,
        private string $width,
        private string $height,
        private string $checked,
        private string $value,
    ) {
    }

    public function getRadioId(): string
    {
        return $this->radioId;
    }

    public function getCreated(): string
    {
        return $this->created;
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

    public function getChecked(): string
    {
        return $this->checked;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function toArray(): array
    {
        return [
           'radio_id' => $this->getRadioId(),
           'created' => $this->getCreated(),
           'page_number' => $this->getPageNumber(),
           'x' => $this->getX(),
           'y' => $this->getY(),
           'width' => $this->getWidth(),
           'height' => $this->getHeight(),
           'checked' => $this->getChecked(),
           'value' => $this->getValue(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['radio_id'],
            $data['created'],
            $data['page_number'],
            $data['x'],
            $data['y'],
            $data['width'],
            $data['height'],
            $data['checked'],
            $data['value'],
        );
    }
}
