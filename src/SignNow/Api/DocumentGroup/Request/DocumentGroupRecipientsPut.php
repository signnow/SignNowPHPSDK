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

namespace SignNow\Api\DocumentGroup\Request;

use SignNow\Api\DocumentGroup\Request\Data\Recipient\RecipientCollection;
use SignNow\Api\DocumentGroup\Request\Data\CcCollection;
use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'updateDocumentGroupRecipients',
    url: '/v2/document-groups/{document_group_id}/recipients',
    method: 'put',
    auth: 'bearer',
    namespace: 'documentGroup',
    entity: 'documentGroupRecipients',
    type: 'application/json',
)]
final class DocumentGroupRecipientsPut implements RequestInterface
{
    private array $uriParams = [];

    public function __construct(
        private RecipientCollection $recipients,
        private CcCollection $cc,
    ) {
    }

    public function getRecipients(): RecipientCollection
    {
        return $this->recipients;
    }

    public function getCc(): CcCollection
    {
        return $this->cc;
    }

    public function withDocumentGroupId(string $documentGroupId): self
    {
        $this->uriParams['document_group_id'] = $documentGroupId;

        return $this;
    }

    public function uriParams(): array
    {
        return $this->uriParams;
    }

    public function toArray(): array
    {
        return [
           'recipients' => $this->getRecipients()->toArray(),
           'cc' => $this->getCc()->toArray(),
        ];
    }
}
