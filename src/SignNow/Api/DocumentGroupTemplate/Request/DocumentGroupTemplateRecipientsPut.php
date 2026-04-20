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

use SignNow\Api\DocumentGroup\Request\Data\Recipient\RecipientCollection;
use SignNow\Api\DocumentGroup\Request\Data\Recipient\Reminder;
use SignNow\Api\DocumentGroup\Request\Data\CcCollection;
use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'updateDocumentGroupTemplateRecipients',
    url: '/v2/document-group-templates/{template_group_id}/recipients',
    method: 'put',
    auth: 'bearer',
    namespace: 'documentGroupTemplate',
    entity: 'documentGroupTemplateRecipients',
    type: 'application/json',
)]
final class DocumentGroupTemplateRecipientsPut implements RequestInterface
{
    private array $uriParams = [];

    public function __construct(
        private RecipientCollection $recipients,
        private CcCollection $cc,
        private ?int $generalExpirationDays = null,
        private ?Reminder $generalReminder = null,
        private ?string $orderType = null,
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

    public function getGeneralExpirationDays(): ?int
    {
        return $this->generalExpirationDays;
    }

    public function getGeneralReminder(): ?Reminder
    {
        return $this->generalReminder;
    }

    public function getOrderType(): ?string
    {
        return $this->orderType;
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
           'recipients' => $this->getRecipients()->toArray(),
           'cc' => $this->getCc()->toArray(),
           'general_expiration_days' => $this->getGeneralExpirationDays(),
           'general_reminder' => $this->getGeneralReminder()?->toArray(),
           'order_type' => $this->getOrderType(),
        ];
    }
}
