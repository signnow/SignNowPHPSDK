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

namespace SignNow\Api\DocumentGroupInvite\Request\Data;

readonly class CompletionEmail
{
    public function __construct(
        private string $email = '',
        private int $disableDocumentAttachment = 0,
        private string $subject = '',
        private string $message = '',
    ) {
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getDisableDocumentAttachment(): int
    {
        return $this->disableDocumentAttachment;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function toArray(): array
    {
        return [
           'email' => $this->getEmail(),
           'disable_document_attachment' => $this->getDisableDocumentAttachment(),
           'subject' => $this->getSubject(),
           'message' => $this->getMessage(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['email'] ?? '',
            $data['disable_document_attachment'] ?? 0,
            $data['subject'] ?? '',
            $data['message'] ?? '',
        );
    }
}
