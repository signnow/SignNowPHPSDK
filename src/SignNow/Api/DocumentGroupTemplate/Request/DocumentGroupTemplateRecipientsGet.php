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
    name: 'getDocumentGroupTemplateRecipients',
    url: '/v2/document-group-templates/{template_group_id}/recipients',
    method: 'get',
    auth: 'bearer',
    namespace: 'documentGroupTemplate',
    entity: 'documentGroupTemplateRecipients',
    type: 'application/json',
)]
final class DocumentGroupTemplateRecipientsGet implements RequestInterface
{
    private array $uriParams = [];


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
        ];
    }
}
