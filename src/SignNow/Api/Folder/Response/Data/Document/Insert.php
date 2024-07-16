<?php

declare(strict_types=1);

namespace SignNow\Api\Folder\Response\Data\Document;

readonly class Insert
{
    public function __construct(
        private string $id,
        private string $userId,
        private string $email,
        private string $pageNumber,
        private string $width,
        private string $height,
        private string $x,
        private string $y,
        private int $created,
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

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPageNumber(): string
    {
        return $this->pageNumber;
    }

    public function getWidth(): string
    {
        return $this->width;
    }

    public function getHeight(): string
    {
        return $this->height;
    }

    public function getX(): string
    {
        return $this->x;
    }

    public function getY(): string
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
           'user_id' => $this->getUserId(),
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
            $data['user_id'],
            $data['email'],
            $data['page_number'],
            $data['width'],
            $data['height'],
            $data['x'],
            $data['y'],
            $data['created'],
        );
    }
}
