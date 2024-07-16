<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data;

readonly class Signature
{
    public function __construct(
        private string $id,
        private string $userId,
        private string $signatureRequestId,
        private string $email,
        private string $pageNumber,
        private string $width,
        private string $height,
        private string $x,
        private string $y,
        private string $subtype,
        private bool $allowEditing,
        private int $created,
        private bool $ownerAsRecipient = false,
        private string $data = '',
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

    public function getSignatureRequestId(): string
    {
        return $this->signatureRequestId;
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

    public function getSubtype(): string
    {
        return $this->subtype;
    }

    public function isAllowEditing(): bool
    {
        return $this->allowEditing;
    }

    public function isOwnerAsRecipient(): bool
    {
        return $this->ownerAsRecipient;
    }

    public function getCreated(): int
    {
        return $this->created;
    }

    public function getData(): string
    {
        return $this->data;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'user_id' => $this->getUserId(),
           'signature_request_id' => $this->getSignatureRequestId(),
           'email' => $this->getEmail(),
           'page_number' => $this->getPageNumber(),
           'width' => $this->getWidth(),
           'height' => $this->getHeight(),
           'x' => $this->getX(),
           'y' => $this->getY(),
           'subtype' => $this->getSubtype(),
           'allow_editing' => $this->isAllowEditing(),
           'owner_as_recipient' => $this->isOwnerAsRecipient(),
           'created' => $this->getCreated(),
           'data' => $this->getData(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['user_id'],
            $data['signature_request_id'],
            $data['email'],
            $data['page_number'],
            $data['width'],
            $data['height'],
            $data['x'],
            $data['y'],
            $data['subtype'],
            $data['allow_editing'],
            $data['created'],
            $data['owner_as_recipient'] ?? false,
            $data['data'] ?? '',
        );
    }
}
