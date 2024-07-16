<?php

declare(strict_types=1);

namespace SignNow\Api\Folder\Response\Data\Document;

readonly class Text
{
    public function __construct(
        private string $id,
        private string $userId,
        private string $pageNumber,
        private string $email,
        private string $font,
        private string $size,
        private string $data,
        private string $x,
        private string $y,
        private string $lineHeight,
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

    public function getPageNumber(): string
    {
        return $this->pageNumber;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getFont(): string
    {
        return $this->font;
    }

    public function getSize(): string
    {
        return $this->size;
    }

    public function getData(): string
    {
        return $this->data;
    }

    public function getX(): string
    {
        return $this->x;
    }

    public function getY(): string
    {
        return $this->y;
    }

    public function getLineHeight(): string
    {
        return $this->lineHeight;
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
           'page_number' => $this->getPageNumber(),
           'email' => $this->getEmail(),
           'font' => $this->getFont(),
           'size' => $this->getSize(),
           'data' => $this->getData(),
           'x' => $this->getX(),
           'y' => $this->getY(),
           'line_height' => $this->getLineHeight(),
           'created' => $this->getCreated(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['user_id'],
            $data['page_number'],
            $data['email'],
            $data['font'],
            $data['size'],
            $data['data'],
            $data['x'],
            $data['y'],
            $data['line_height'],
            $data['created'],
        );
    }
}
