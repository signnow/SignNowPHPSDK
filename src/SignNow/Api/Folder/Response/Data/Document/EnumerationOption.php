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

namespace SignNow\Api\Folder\Response\Data\Document;

readonly class EnumerationOption
{
    public function __construct(
        private string $id,
        private ?string $pageNumber,
        private ?string $width,
        private ?string $height,
        private int $created,
        private ?string $enumerationId = null,
        private ?string $userId = null,
        private ?string $data = null,
        private ?string $email = null,
        private ?string $x = null,
        private ?string $y = null,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getEnumerationId(): ?string
    {
        return $this->enumerationId;
    }

    public function getUserId(): ?string
    {
        return $this->userId;
    }

    public function getData(): ?string
    {
        return $this->data;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getPageNumber(): ?string
    {
        return $this->pageNumber;
    }

    public function getWidth(): ?string
    {
        return $this->width;
    }

    public function getHeight(): ?string
    {
        return $this->height;
    }

    public function getX(): ?string
    {
        return $this->x;
    }

    public function getY(): ?string
    {
        return $this->y;
    }

    public function getCreated(): int
    {
        return $this->created;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'enumeration_id' => $this->getEnumerationId(),
           'user_id' => $this->getUserId(),
           'data' => $this->getData(),
           'email' => $this->getEmail(),
           'page_number' => $this->getPageNumber(),
           'width' => $this->getWidth(),
           'height' => $this->getHeight(),
           'x' => $this->getX(),
           'y' => $this->getY(),
           'created' => $this->getCreated(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['page_number'],
            $data['width'],
            $data['height'],
            $data['created'],
            $data['enumeration_id'] ?? null,
            $data['user_id'] ?? null,
            $data['data'] ?? null,
            $data['email'] ?? null,
            $data['x'] ?? null,
            $data['y'] ?? null,
        );
    }
}
