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

namespace SignNow\Api\Document\Request\Data;

readonly class Signature
{
    public function __construct(
        private int $x,
        private int $y,
        private int $width,
        private int $height,
        private int $pageNumber,
        private string $data,
        private string $subtype = '',
        private string $signatureRequestId = '',
        private string $fieldId = '',
        private string $signingReason = '',
        private bool $ownerAsRecipient = false,
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

    public function getPageNumber(): int
    {
        return $this->pageNumber;
    }

    public function getSubtype(): string
    {
        return $this->subtype;
    }

    public function getSignatureRequestId(): string
    {
        return $this->signatureRequestId;
    }

    public function getFieldId(): string
    {
        return $this->fieldId;
    }

    public function getSigningReason(): string
    {
        return $this->signingReason;
    }

    public function isOwnerAsRecipient(): bool
    {
        return $this->ownerAsRecipient;
    }

    public function getData(): string
    {
        return $this->data;
    }

    public function toArray(): array
    {
        return [
           'x' => $this->getX(),
           'y' => $this->getY(),
           'width' => $this->getWidth(),
           'height' => $this->getHeight(),
           'page_number' => $this->getPageNumber(),
           'subtype' => $this->getSubtype(),
           'signature_request_id' => $this->getSignatureRequestId(),
           'field_id' => $this->getFieldId(),
           'signing_reason' => $this->getSigningReason(),
           'owner_as_recipient' => $this->isOwnerAsRecipient(),
           'data' => $this->getData(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['x'],
            $data['y'],
            $data['width'],
            $data['height'],
            $data['page_number'],
            $data['data'],
            $data['subtype'] ?? '',
            $data['signature_request_id'] ?? '',
            $data['field_id'] ?? '',
            $data['signing_reason'] ?? '',
            $data['owner_as_recipient'] ?? false,
        );
    }
}
