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

namespace SignNow\Api\DocumentGroupTemplate\Request;

use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'createDocumentGroupFromTemplate',
    url: '/v2/document-group-templates/{template_group_id}/document-group',
    method: 'post',
    auth: 'bearer',
    namespace: 'documentGroupTemplate',
    entity: 'documentGroupTemplate',
    type: 'application/json',
)]
final class DocumentGroupTemplatePost implements RequestInterface
{
    private array $uriParams = [];

    public function __construct(
        private string $groupName,
        private ?string $clientTimestamp = null,
        private ?string $folderId = null,
    ) {
    }

    public function getGroupName(): string
    {
        return $this->groupName;
    }

    public function getClientTimestamp(): ?string
    {
        return $this->clientTimestamp;
    }

    public function getFolderId(): ?string
    {
        return $this->folderId;
    }

    public function withTemplateGroupId(string $templateGroupId): self
    {
        $this->uriParams['template_group_id'] = $templateGroupId;

        return $this;
    }

    public function uriParams(): array
    {
        return $this->uriParams;
    }

    public function toArray(): array
    {
        return [
           'group_name' => $this->getGroupName(),
           'client_timestamp' => $this->getClientTimestamp(),
           'folder_id' => $this->getFolderId(),
        ];
    }
}
