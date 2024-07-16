<?php

declare(strict_types=1);

namespace SignNow\Api\Folder\Request;

use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'getFolderDocuments',
    url: '/folder/{folder_id}',
    method: 'get',
    auth: 'bearer',
    namespace: 'folder',
    entity: 'folderDocuments',
    type: 'application/json',
)]
final class FolderDocumentsGet implements RequestInterface
{
    private array $uriParams = [];


    public function withFolderId(string $folderId): self
    {
        $this->uriParams['folder_id'] = $folderId;

        return $this;
    }

    public function uriParams(): array
    {
        return $this->uriParams;
    }

    public function toArray(): array
    {
        return [
        ];
    }
}
