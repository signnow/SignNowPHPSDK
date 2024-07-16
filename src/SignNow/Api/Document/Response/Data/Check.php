<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data;

readonly class Check
{
    public function __construct(
        private string $id,
        private string $pageNumber,
        private string $x,
        private string $y,
        private string $width,
        private string $height,
        private string $created,
        private bool $allowEditing,
        private bool $ownerAsRecipient,
        private ?string $userId = null,
        private string $email = '',
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getUserId(): ?string
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

    public function getCreated(): string
    {
        return $this->created;
    }

    public function isAllowEditing(): bool
    {
        return $this->allowEditing;
    }

    public function isOwnerAsRecipient(): bool
    {
        return $this->ownerAsRecipient;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'user_id' => $this->getUserId(),
           'email' => $this->getEmail(),
           'page_number' => $this->getPageNumber(),
           'x' => $this->getX(),
           'y' => $this->getY(),
           'width' => $this->getWidth(),
           'height' => $this->getHeight(),
           'created' => $this->getCreated(),
           'allow_editing' => $this->isAllowEditing(),
           'owner_as_recipient' => $this->isOwnerAsRecipient(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['page_number'],
            $data['x'],
            $data['y'],
            $data['width'],
            $data['height'],
            $data['created'],
            $data['allow_editing'],
            $data['owner_as_recipient'],
            $data['user_id'] ?? null,
            $data['email'] ?? '',
        );
    }
}
