<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response;

use SignNow\Api\Document\Response\Data\DocumentIdCollection;

readonly class DocumentMergePost
{
    public function __construct(
        private DocumentIdCollection $documentId = new DocumentIdCollection(),
    ) {
    }

    public function getDocumentId(): DocumentIdCollection
    {
        return $this->documentId;
    }
}
