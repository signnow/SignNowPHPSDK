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

readonly class Attachment
{
    public function __construct(
        private string $attachmentUniqueId = '',
        private string $fieldId = '',
    ) {
    }

    public function getAttachmentUniqueId(): string
    {
        return $this->attachmentUniqueId;
    }

    public function getFieldId(): string
    {
        return $this->fieldId;
    }

    public function toArray(): array
    {
        return [
           'attachment_unique_id' => $this->getAttachmentUniqueId(),
           'field_id' => $this->getFieldId(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['attachment_unique_id'] ?? '',
            $data['field_id'] ?? '',
        );
    }
}
