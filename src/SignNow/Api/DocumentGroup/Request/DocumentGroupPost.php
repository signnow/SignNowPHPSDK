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

use SignNow\Api\DocumentGroup\Request\Data\DocumentIdCollection;
use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'createDocumentGroup',
    url: '/documentgroup',
    method: 'post',
    auth: 'bearer',
    namespace: 'documentGroup',
    entity: 'documentGroup',
    type: 'application/json',
)]
final class DocumentGroupPost implements RequestInterface
{
    public function __construct(
        private DocumentIdCollection $documentIds,
        private string $groupName,
    ) {
    }

    public function getDocumentIds(): DocumentIdCollection
    {
        return $this->documentIds;
    }

    public function getGroupName(): string
    {
        return $this->groupName;
    }


    public function uriParams(): array
    {
        return [];
    }

    public function toArray(): array
    {
        return [
           'document_ids' => $this->getDocumentIds()->toArray(),
           'group_name' => $this->getGroupName(),
        ];
    }
}
