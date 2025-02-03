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

namespace SignNow\Api\DocumentGroup\Response\Data\Data;

readonly class Data
{
    public function __construct(
        private RecipientCollection $recipients,
        private UnmappedDocumentCollection $unmappedDocuments,
        private AllowedUnmappedSignDocumentCollection $allowedUnmappedSignDocuments,
        private CcCollection $cc,
    ) {
    }

    public function getRecipients(): RecipientCollection
    {
        return $this->recipients;
    }

    public function getUnmappedDocuments(): UnmappedDocumentCollection
    {
        return $this->unmappedDocuments;
    }

    public function getAllowedUnmappedSignDocuments(): AllowedUnmappedSignDocumentCollection
    {
        return $this->allowedUnmappedSignDocuments;
    }

    public function getCc(): CcCollection
    {
        return $this->cc;
    }

    public function toArray(): array
    {
        return [
           'recipients' => $this->getRecipients()->toArray(),
           'unmapped_documents' => $this->getUnmappedDocuments()->toArray(),
           'allowed_unmapped_sign_documents' => $this->getAllowedUnmappedSignDocuments()->toArray(),
           'cc' => $this->getCc()->toArray(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            new RecipientCollection($data['recipients']),
            new UnmappedDocumentCollection($data['unmapped_documents']),
            new AllowedUnmappedSignDocumentCollection($data['allowed_unmapped_sign_documents']),
            new CcCollection($data['cc']),
        );
    }
}
