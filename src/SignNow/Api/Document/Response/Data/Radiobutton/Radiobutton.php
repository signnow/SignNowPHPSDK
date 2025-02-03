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

readonly class Radiobutton
{
    public function __construct(
        private string $id,
        private string $userId,
        private string $name,
        private string $serverCreatedTimestamp,
        private string $x,
        private string $y,
        private string $size,
        private string $lineHeight,
        private string $pageNumber,
        private bool $isPrinted,
        private string $font,
        private string $originalFontSize,
        private RadioCollection $radio,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getServerCreatedTimestamp(): string
    {
        return $this->serverCreatedTimestamp;
    }

    public function getX(): string
    {
        return $this->x;
    }

    public function getY(): string
    {
        return $this->y;
    }

    public function getSize(): string
    {
        return $this->size;
    }

    public function getLineHeight(): string
    {
        return $this->lineHeight;
    }

    public function getPageNumber(): string
    {
        return $this->pageNumber;
    }

    public function isPrinted(): bool
    {
        return $this->isPrinted;
    }

    public function getFont(): string
    {
        return $this->font;
    }

    public function getOriginalFontSize(): string
    {
        return $this->originalFontSize;
    }

    public function getRadio(): RadioCollection
    {
        return $this->radio;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'user_id' => $this->getUserId(),
           'name' => $this->getName(),
           'server_created_timestamp' => $this->getServerCreatedTimestamp(),
           'x' => $this->getX(),
           'y' => $this->getY(),
           'size' => $this->getSize(),
           'line_height' => $this->getLineHeight(),
           'page_number' => $this->getPageNumber(),
           'is_printed' => $this->IsPrinted(),
           'font' => $this->getFont(),
           'original_font_size' => $this->getOriginalFontSize(),
           'radio' => $this->getRadio()->toArray(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['user_id'],
            $data['name'],
            $data['server_created_timestamp'],
            $data['x'],
            $data['y'],
            $data['size'],
            $data['line_height'],
            $data['page_number'],
            $data['is_printed'],
            $data['font'],
            $data['original_font_size'],
            new RadioCollection($data['radio']),
        );
    }
}
