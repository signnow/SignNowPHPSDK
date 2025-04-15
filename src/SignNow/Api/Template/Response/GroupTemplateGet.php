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

namespace SignNow\Api\Template\Response;

use SignNow\Api\Template\Response\Data\RoutingDetail\RoutingDetail;
use SignNow\Api\Template\Response\Data\Template\TemplateCollection;
use SignNow\Api\Template\Response\Data\ShareInfo;

readonly class GroupTemplateGet
{
    public function __construct(
        private string $id,
        private string $userId,
        private string $groupName,
        private string $folderId,
        private RoutingDetail $routingDetails,
        private TemplateCollection $templates,
        private int $shared,
        private string $documentGroupTemplateOwnerEmail,
        private ?string $sharedTeamId,
        private bool $ownAsMerged,
        private ?string $emailActionOnComplete,
        private int $created,
        private int $updated,
        private int $recentlyUsed,
        private bool $pinned,
        private ?ShareInfo $shareInfo = null,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }

    public function getGroupName(): string
    {
        return $this->groupName;
    }

    public function getFolderId(): string
    {
        return $this->folderId;
    }

    public function getRoutingDetails(): RoutingDetail
    {
        return $this->routingDetails;
    }

    public function getTemplates(): TemplateCollection
    {
        return $this->templates;
    }

    public function getShared(): int
    {
        return $this->shared;
    }

    public function getDocumentGroupTemplateOwnerEmail(): string
    {
        return $this->documentGroupTemplateOwnerEmail;
    }

    public function getSharedTeamId(): ?string
    {
        return $this->sharedTeamId;
    }

    public function getShareInfo(): ?ShareInfo
    {
        return $this->shareInfo;
    }

    public function isOwnAsMerged(): bool
    {
        return $this->ownAsMerged;
    }

    public function getEmailActionOnComplete(): ?string
    {
        return $this->emailActionOnComplete;
    }

    public function getCreated(): int
    {
        return $this->created;
    }

    public function getUpdated(): int
    {
        return $this->updated;
    }

    public function getRecentlyUsed(): int
    {
        return $this->recentlyUsed;
    }

    public function isPinned(): bool
    {
        return $this->pinned;
    }
}
