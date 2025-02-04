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

use SignNow\Api\Template\Request\Data\TemplateIdsToAddCollection;
use SignNow\Api\Template\Request\Data\TemplateIdsToRemoveCollection;
use SignNow\Api\Template\Request\Data\RoutingDetail\RoutingDetail;
use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'updateDocumentGroupTemplate',
    url: '/documentgroup/template/{template_id}',
    method: 'put',
    auth: 'bearer',
    namespace: 'template',
    entity: 'groupTemplate',
    type: 'application/json',
)]
final class GroupTemplatePut implements RequestInterface
{
    private array $uriParams = [];

    public function __construct(
        private RoutingDetail $routingDetails,
        private string $templateGroupName,
        private TemplateIdsToAddCollection $templateIdsToAdd = new TemplateIdsToAddCollection(),
        private TemplateIdsToRemoveCollection $templateIdsToRemove = new TemplateIdsToRemoveCollection(),
    ) {
    }

    public function getTemplateIdsToAdd(): TemplateIdsToAddCollection
    {
        return $this->templateIdsToAdd;
    }

    public function getTemplateIdsToRemove(): TemplateIdsToRemoveCollection
    {
        return $this->templateIdsToRemove;
    }

    public function getRoutingDetails(): RoutingDetail
    {
        return $this->routingDetails;
    }

    public function getTemplateGroupName(): string
    {
        return $this->templateGroupName;
    }

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
           'template_ids_to_add' => $this->getTemplateIdsToAdd()->toArray(),
           'template_ids_to_remove' => $this->getTemplateIdsToRemove()->toArray(),
           'routing_details' => $this->getRoutingDetails(),
           'template_group_name' => $this->getTemplateGroupName(),
        ];
    }
}
