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

namespace SignNow\Api\DocumentGroup\Response;

use SignNow\Api\DocumentGroup\Response\Data\Data\Reminder;
use SignNow\Api\DocumentGroup\Response\Data\Document\DocumentItemCollection;
use SignNow\Api\DocumentGroup\Response\Data\OriginatorOrganizationSettingsCollection;

readonly class DocumentGroupGet
{
    public function __construct(
        private string $id,
        private string $groupName,
        private DocumentItemCollection $documents,
        private OriginatorOrganizationSettingsCollection $originatorOrganizationSettings,
        private ?string $inviteId = null,
        private ?int $generalExpirationDays = null,
        private ?Reminder $generalReminder = null,
        private ?string $orderType = null,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getGroupName(): string
    {
        return $this->groupName;
    }

    public function getInviteId(): ?string
    {
        return $this->inviteId;
    }

    public function getDocuments(): DocumentItemCollection
    {
        return $this->documents;
    }

    public function getOriginatorOrganizationSettings(): OriginatorOrganizationSettingsCollection
    {
        return $this->originatorOrganizationSettings;
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
}
