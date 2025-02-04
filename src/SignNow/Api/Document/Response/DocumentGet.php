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

namespace SignNow\Api\Document\Response;

use SignNow\Api\Document\Response\Data\PageCollection;
use SignNow\Api\Document\Response\Data\EntityLabelCollection;
use SignNow\Api\Document\Response\Data\RoutingDetail\RoutingDetailCollection;
use SignNow\Api\Document\Response\Data\Thumbnail;
use SignNow\Api\Document\Response\Data\SignatureCollection;
use SignNow\Api\Document\Response\Data\TagCollection;
use SignNow\Api\Document\Response\Data\FieldCollection;
use SignNow\Api\Document\Response\Data\RoleCollection;
use SignNow\Api\Document\Response\Data\ViewerRoleCollection;
use SignNow\Api\Document\Response\Data\FieldInvite\FieldInviteCollection;
use SignNow\Api\Document\Response\Data\ViewerFieldInvite\ViewerFieldInviteCollection;
use SignNow\Api\Document\Response\Data\SigningSessionSettings;
use SignNow\Api\Document\Response\Data\EnumerationOptionCollection;
use SignNow\Api\Document\Response\Data\PaymentCollection;
use SignNow\Api\Document\Response\Data\IntegrationCollection;
use SignNow\Api\Document\Response\Data\IntegrationObjectCollection;
use SignNow\Api\Document\Response\Data\ExportedTo\ExportedToCollection;
use SignNow\Api\Document\Response\Data\Radiobutton\RadiobuttonCollection;
use SignNow\Api\Document\Response\Data\SealCollection;
use SignNow\Api\Document\Response\Data\CheckCollection;
use SignNow\Api\Document\Response\Data\TextCollection;
use SignNow\Api\Document\Response\Data\Line\LineCollection;
use SignNow\Api\Document\Response\Data\AttachmentCollection;
use SignNow\Api\Document\Response\Data\HyperlinkCollection;
use SignNow\Api\Document\Response\Data\Request\RequestCollection;
use SignNow\Api\Document\Response\Data\InsertCollection;
use SignNow\Api\Document\Response\Data\FieldsDataCollection;
use SignNow\Api\Document\Response\Data\FieldValidatorCollection;
use SignNow\Api\Document\Response\Data\OriginatorOrganizationSettingsCollection;
use SignNow\Api\Document\Response\Data\DocumentGroupInfo;
use SignNow\Api\Document\Response\Data\DocumentGroupTemplateInfoCollection;
use SignNow\Api\Document\Response\Data\Settings;
use SignNow\Api\Document\Response\Data\ShareInfo;

readonly class DocumentGet
{
    public function __construct(
        private string $id,
        private string $userId,
        private string $documentName,
        private string $pageCount,
        private int $created,
        private int $updated,
        private string $originalFilename,
        private string $owner,
        private string $ownerName,
        private bool $template,
        private string $parentId,
        private string $originatorLogo,
        private PageCollection $pages,
        private int $versionTime,
        private RoutingDetailCollection $routingDetails,
        private Thumbnail $thumbnail,
        private SignatureCollection $signatures,
        private TagCollection $tags,
        private FieldCollection $fields,
        private RoleCollection $roles,
        private ViewerRoleCollection $viewerRoles,
        private SigningSessionSettings $signingSessionSettings,
        private OriginatorOrganizationSettingsCollection $originatorOrganizationSettings,
        private DocumentGroupInfo $documentGroupInfo,
        private Settings $settings,
        private ShareInfo $shareInfo,
        private ?string $originUserId = null,
        private ?string $originDocumentId = null,
        private string $recentlyUsed = '',
        private string $defaultFolder = '',
        private EntityLabelCollection $entityLabels = new EntityLabelCollection(),
        private FieldInviteCollection $fieldInvites = new FieldInviteCollection(),
        private ViewerFieldInviteCollection $viewerFieldInvites = new ViewerFieldInviteCollection(),
        private EnumerationOptionCollection $enumerationOptions = new EnumerationOptionCollection(),
        private PaymentCollection $payments = new PaymentCollection(),
        private IntegrationCollection $integrations = new IntegrationCollection(),
        private IntegrationObjectCollection $integrationObjects = new IntegrationObjectCollection(),
        private ExportedToCollection $exportedTo = new ExportedToCollection(),
        private RadiobuttonCollection $radiobuttons = new RadiobuttonCollection(),
        private SealCollection $seals = new SealCollection(),
        private CheckCollection $checks = new CheckCollection(),
        private TextCollection $texts = new TextCollection(),
        private LineCollection $lines = new LineCollection(),
        private AttachmentCollection $attachments = new AttachmentCollection(),
        private HyperlinkCollection $hyperlinks = new HyperlinkCollection(),
        private RequestCollection $requests = new RequestCollection(),
        private InsertCollection $inserts = new InsertCollection(),
        private FieldsDataCollection $fieldsData = new FieldsDataCollection(),
        private FieldValidatorCollection $fieldValidators = new FieldValidatorCollection(),
        private DocumentGroupTemplateInfoCollection $documentGroupTemplateInfo = new
        DocumentGroupTemplateInfoCollection(),
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

    public function getDocumentName(): string
    {
        return $this->documentName;
    }

    public function getPageCount(): string
    {
        return $this->pageCount;
    }

    public function getCreated(): int
    {
        return $this->created;
    }

    public function getUpdated(): int
    {
        return $this->updated;
    }

    public function getOriginalFilename(): string
    {
        return $this->originalFilename;
    }

    public function getOriginUserId(): ?string
    {
        return $this->originUserId;
    }

    public function getOriginDocumentId(): ?string
    {
        return $this->originDocumentId;
    }

    public function getOwner(): string
    {
        return $this->owner;
    }

    public function getOwnerName(): string
    {
        return $this->ownerName;
    }

    public function isTemplate(): bool
    {
        return $this->template;
    }

    public function getParentId(): string
    {
        return $this->parentId;
    }

    public function getRecentlyUsed(): string
    {
        return $this->recentlyUsed;
    }

    public function getOriginatorLogo(): string
    {
        return $this->originatorLogo;
    }

    public function getPages(): PageCollection
    {
        return $this->pages;
    }

    public function getDefaultFolder(): string
    {
        return $this->defaultFolder;
    }

    public function getEntityLabels(): EntityLabelCollection
    {
        return $this->entityLabels;
    }

    public function getVersionTime(): int
    {
        return $this->versionTime;
    }

    public function getRoutingDetails(): RoutingDetailCollection
    {
        return $this->routingDetails;
    }

    public function getThumbnail(): Thumbnail
    {
        return $this->thumbnail;
    }

    public function getSignatures(): SignatureCollection
    {
        return $this->signatures;
    }

    public function getTags(): TagCollection
    {
        return $this->tags;
    }

    public function getFields(): FieldCollection
    {
        return $this->fields;
    }

    public function getRoles(): RoleCollection
    {
        return $this->roles;
    }

    public function getViewerRoles(): ViewerRoleCollection
    {
        return $this->viewerRoles;
    }

    public function getFieldInvites(): FieldInviteCollection
    {
        return $this->fieldInvites;
    }

    public function getViewerFieldInvites(): ViewerFieldInviteCollection
    {
        return $this->viewerFieldInvites;
    }

    public function getSigningSessionSettings(): SigningSessionSettings
    {
        return $this->signingSessionSettings;
    }

    public function getEnumerationOptions(): EnumerationOptionCollection
    {
        return $this->enumerationOptions;
    }

    public function getPayments(): PaymentCollection
    {
        return $this->payments;
    }

    public function getIntegrations(): IntegrationCollection
    {
        return $this->integrations;
    }

    public function getIntegrationObjects(): IntegrationObjectCollection
    {
        return $this->integrationObjects;
    }

    public function getExportedTo(): ExportedToCollection
    {
        return $this->exportedTo;
    }

    public function getRadiobuttons(): RadiobuttonCollection
    {
        return $this->radiobuttons;
    }

    public function getSeals(): SealCollection
    {
        return $this->seals;
    }

    public function getChecks(): CheckCollection
    {
        return $this->checks;
    }

    public function getTexts(): TextCollection
    {
        return $this->texts;
    }

    public function getLines(): LineCollection
    {
        return $this->lines;
    }

    public function getAttachments(): AttachmentCollection
    {
        return $this->attachments;
    }

    public function getHyperlinks(): HyperlinkCollection
    {
        return $this->hyperlinks;
    }

    public function getRequests(): RequestCollection
    {
        return $this->requests;
    }

    public function getInserts(): InsertCollection
    {
        return $this->inserts;
    }

    public function getFieldsData(): FieldsDataCollection
    {
        return $this->fieldsData;
    }

    public function getFieldValidators(): FieldValidatorCollection
    {
        return $this->fieldValidators;
    }

    public function getOriginatorOrganizationSettings(): OriginatorOrganizationSettingsCollection
    {
        return $this->originatorOrganizationSettings;
    }

    public function getDocumentGroupInfo(): DocumentGroupInfo
    {
        return $this->documentGroupInfo;
    }

    public function getDocumentGroupTemplateInfo(): DocumentGroupTemplateInfoCollection
    {
        return $this->documentGroupTemplateInfo;
    }

    public function getSettings(): Settings
    {
        return $this->settings;
    }

    public function getShareInfo(): ShareInfo
    {
        return $this->shareInfo;
    }
}
