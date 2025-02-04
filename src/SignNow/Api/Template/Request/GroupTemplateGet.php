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

namespace SignNow\Api\Template\Request;

use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'getDocumentGroupTemplate',
    url: '/documentgroup/template/{template_id}',
    method: 'get',
    auth: 'bearer',
    namespace: 'template',
    entity: 'groupTemplate',
    type: 'application/json',
)]
final class GroupTemplateGet implements RequestInterface
{
    private array $uriParams = [];


    public function withTemplateId(string $templateId): self
    {
        $this->uriParams['template_id'] = $templateId;

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
