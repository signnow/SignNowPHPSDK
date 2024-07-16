<?php

declare(strict_types=1);

namespace SignNow\Api\Folder\Request;

use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'getFolder',
    url: '/folder',
    method: 'get',
    auth: 'bearer',
    namespace: 'folder',
    entity: 'folder',
    type: 'application/json',
)]
final class FolderGet implements RequestInterface
{
    public function uriParams(): array
    {
        return [];
    }

    public function toArray(): array
    {
        return [
        ];
    }
}
