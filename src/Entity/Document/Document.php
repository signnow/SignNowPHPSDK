<?php
declare(strict_types = 1);

namespace SignNow\Api\Entity\Document;

use JMS\Serializer\Annotation as Serializer;
use SignNow\Api\Entity\Role;
use SignNow\Rest\Entity\Entity;
use SignNow\Rest\EntityManager\Annotation\HttpEntity;

/**
 * Class Document
 *
 * @HttpEntity("document/{id}", idProperty="id")
 *
 * @package SignNow\Api\Entity\Document
 */
class Document extends Entity
{
    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    protected $id;

    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    protected $parentId;

    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    protected $userId;

    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    protected $originDocumentId;

    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    protected $originUserId;

    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    protected $pageCount;

    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    protected $created;

    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    protected $updated;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $documentName;
    
    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    protected $originalFilename;

    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    protected $owner;

    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    protected $versionTime;
    
    /**
     * @var array|null
     * @Serializer\Type("array")
     */
    protected $texts;

    /**
     * @var array|null
     * @Serializer\Type("array")
     */
    protected $checks;

    /**
     * @var array|null
     * @Serializer\Type("array")
     */
    protected $fields;

    /**
     * @var array|null
     * @Serializer\Type("array")
     */
    protected $signatures;

    /**
     * @var array
     * @Serializer\Type("array")
     */
    protected $hyperlinks = [];

    /**
     * @var Thumbnail
     * @Serializer\Type("SignNow\Api\Entity\Document\Thumbnail")
     */
    protected $thumbnail;
    
    /**
     * @var Role[]
     * @Serializer\Type("array<SignNow\Api\Entity\Role>")
     */
    protected $roles;

    /**
     * @var Role[]
     * @Serializer\Type("array<SignNow\Api\Entity\Role>")
     */
    protected $viewerRoles;

    /**
     * @var bool
     * @Serializer\Type("bool")
     */
    protected $template = false;

    /**
     * @var bool
     */
    protected $fieldsMissed = false;

    /**
     * @var array|null
     * @Serializer\Type("array")
     */
    protected $radiobuttons;

    /**
     * @var array|null
     * @Serializer\Type("array")
     */
    protected $attachments;

    /**
     * @var array|null
     * @Serializer\Type("array")
     */
    protected $enumerationOptions;
    
    /**
     * @var RoutingDetail[]
     * @Serializer\Type("array<SignNow\Api\Entity\Document\RoutingDetail>")
     */
    protected $routingDetails;

    /**
     * @var null|DocumentGroupInfo
     * @Serializer\Type("SignNow\Api\Entity\Document\DocumentGroupInfo")
     */
    protected $documentGroupInfo;

    /**
     * @var DocumentGroupTemplateInfo[]
     * @Serializer\Type("array<SignNow\Api\Entity\Document\DocumentGroupTemplateInfo>")
     */
    protected $documentGroupTemplateInfo = [];

    /**
     * @var Integration[]
     * @Serializer\Type("array<SignNow\Api\Entity\Document\Integration>")
     */
    protected $integrations = [];

    /**
     * @var Settings
     * @Serializer\Type("SignNow\Api\Entity\Document\Settings")
     */
    protected $settings;

    /**
     * @var SigningSessionSettings
     * @Serializer\Type("SignNow\Api\Entity\Document\SigningSessionSettings")
     */
    protected $signingSessionSettings;

    /**
     * @var OriginatorOrganizationSetting[]
     * @Serializer\Type("array<SignNow\Api\Entity\Document\OriginatorOrganizationSetting>")
     */
    protected $originatorOrganizationSettings = [];

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $originatorLogo;

    /**
     * @var Tag[]
     * @Serializer\Type("array<SignNow\Api\Entity\Document\Tag>")
     */
    protected $tags = [];

    /**
     * @var ExportedTo[]
     * @Serializer\Type("array<SignNow\Api\Entity\Document\ExportedTo>")
     */
    protected $exportedTo = [];

    /**
     * @var array
     * @Serializer\Type("array")
     */
    protected $fieldInvites = [];

    /**
     * @var ViewerFieldInvite[]
     * @Serializer\Type("array<SignNow\Api\Entity\Document\ViewerFieldInvite>") 
     */
    protected $viewerFieldInvites = [];

    /**
     * @var array
     * @Serializer\Type("array")
     */
    protected $fieldValidators = [];

    /**
     * @var Payment[]
     * @Serializer\Type("array<SignNow\Api\Entity\Document\Payment>")
     */
    protected $payments = [];

    /**
     * @var Request[]
     * @Serializer\Type("array<SignNow\Api\Entity\Document\Request>")
     */
    protected $requests = [];

    /**
     * @var Pages
     * @Serializer\Type("SignNow\Api\Entity\Document\Pages")
     */
    protected $pages;

    /**
     * @var array
     * @Serializer\Type("array")
     */
    protected $lines = [];

    /**
     * @deprecated
     * @var array
     * @Serializer\Type("array")
     */
    protected $inserts = [];

    /**
     * @deprecated
     * @var array
     * @Serializer\Type("array")
     */
    protected $seals = [];

    /**
     * @deprecated
     * @var array
     * @Serializer\Type("array")
     */
    protected $notaryInvites = [];
    
    /**
     * @return null|string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param null|string $id
     *
     * @return $this
     */
    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getParentId(): ?string
    {
        return $this->parentId;
    }

    /**
     * @param string|null $parentId
     *
     * @return $this
     */
    public function setParentId(?string $parentId): self
    {
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUserId(): ?string
    {
        return $this->userId;
    }

    /**
     * @param string|null $userId
     *
     * @return Document
     */
    public function setUserId(?string $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getOwner(): ?string
    {
        return $this->owner;
    }

    /**
     * @param string|null $owner
     *
     * @return Document
     */
    public function setOwner(?string $owner): Document
    {
        $this->owner = $owner;

        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getPageCount(): ?string
    {
        return $this->pageCount;
    }

    /**
     * @param string|null $pageCount
     *
     * @return $this
     */
    public function setPageCount(?string $pageCount): self
    {
        $this->pageCount = $pageCount;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getOriginDocumentId(): ?string
    {
        return $this->originDocumentId;
    }

    /**
     * @param string|null $originDocumentId
     *
     * @return Document
     */
    public function setOriginDocumentId(?string $originDocumentId): Document
    {
        $this->originDocumentId = $originDocumentId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getOriginUserId(): ?string
    {
        return $this->originUserId;
    }

    /**
     * @param string|null $originUserId
     *
     * @return Document
     */
    public function setOriginUserId(?string $originUserId): Document
    {
        $this->originUserId = $originUserId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCreated(): ?string
    {
        return $this->created;
    }

    /**
     * @param string|null $created
     *
     * @return Document
     */
    public function setCreated(?string $created): Document
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUpdated(): ?string
    {
        return $this->updated;
    }

    /**
     * @param string|null $updated
     *
     * @return Document
     */
    public function setUpdated(?string $updated): Document
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * @return string
     */
    public function getDocumentName(): string
    {
        return $this->documentName;
    }

    /**
     * @param string $documentName
     *
     * @return Document
     */
    public function setDocumentName(string $documentName): Document
    {
        $this->documentName = $documentName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getOriginalFilename(): ?string
    {
        return $this->originalFilename;
    }

    /**
     * @param string|null $originalFilename
     *
     * @return Document
     */
    public function setOriginalFilename(?string $originalFilename): Document
    {
        $this->originalFilename = $originalFilename;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getVersionTime(): ?string
    {
        return $this->versionTime;
    }

    /**
     * @param string|null $versionTime
     *
     * @return Document
     */
    public function setVersionTime(?string $versionTime): Document
    {
        $this->versionTime = $versionTime;

        return $this;
    }

    /**
     * @return Thumbnail
     */
    public function getThumbnail(): Thumbnail
    {
        return $this->thumbnail;
    }

    /**
     * @param Thumbnail $thumbnail
     *
     * @return Document
     */
    public function setThumbnail(Thumbnail $thumbnail): Document
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getTexts(): ?array
    {
        return $this->texts;
    }

    /**
     * @param array|null $texts
     *
     * @return $this
     */
    public function setTexts(?array $texts): self
    {
        $this->texts = $texts;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getChecks(): ?array
    {
        return $this->checks;
    }

    /**
     * @param array|null $checks
     *
     * @return $this
     */
    public function setChecks(?array $checks): self
    {
        $this->checks = $checks;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getFields(): ?array
    {
        return $this->fields;
    }

    /**
     * @param array|null $fields
     *
     * @return $this
     */
    public function setFields(?array $fields): self
    {
        $this->fields = $fields;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getSignatures(): ?array
    {
        return $this->signatures;
    }

    /**
     * @param array|null $signatures
     *
     * @return Document
     */
    public function setSignatures(?array $signatures): self
    {
        $this->signatures = $signatures;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getRoutingDetails(): ?array
    {
        return $this->routingDetails;
    }

    /**
     * @param array|null $routingDetails
     *
     * @return Document
     */
    public function setRoutingDetails(?array $routingDetails): self
    {
        $this->routingDetails = $routingDetails;

        return $this;
    }

    /**
     * @return Role[]
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @param Role[] $roles
     *
     * @return Document
     */
    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @return Role[]
     */
    public function getViewerRoles(): array
    {
        return $this->viewerRoles;
    }

    /**
     * @param Role[] $viewerRoles
     *
     * @return Document
     */
    public function setViewerRoles(array $viewerRoles): Document
    {
        $this->viewerRoles = $viewerRoles;

        return $this;
    }

    /**
     * @return bool
     */
    public function template(): bool
    {
        return $this->template;
    }

    /**
     * @param bool $template
     *
     * @return Document
     */
    public function setTemplate(bool $template): Document
    {
        $this->template = $template;

        return $this;
    }

    /**
     * @return bool
     */
    public function isFieldsMissed(): bool
    {
        return $this->fieldsMissed;
    }

    /**
     * @param bool $fieldsMissed
     *
     * @return Document
     */
    public function setFieldsMissed(bool $fieldsMissed): Document
    {
        $this->fieldsMissed = $fieldsMissed;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getRadiobuttons(): ?array
    {
        return $this->radiobuttons;
    }

    /**
     * @param array|null $radiobuttons
     *
     * @return Document
     */
    public function setRadiobuttons(?array $radiobuttons): Document
    {
        $this->radiobuttons = $radiobuttons;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getAttachments(): ?array
    {
        return $this->attachments;
    }

    /**
     * @param array|null $attachments
     *
     * @return Document
     */
    public function setAttachments(?array $attachments): Document
    {
        $this->attachments = $attachments;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getEnumerationOptions(): ?array
    {
        return $this->enumerationOptions;
    }

    /**
     * @param array|null $enumerationOptions
     *
     * @return Document
     */
    public function setEnumerationOptions(?array $enumerationOptions): Document
    {
        $this->enumerationOptions = $enumerationOptions;

        return $this;
    }

    /**
     * @return array
     */
    public function getHyperlinks(): array
    {
        return $this->hyperlinks;
    }

    /**
     * @param array $hyperlinks
     *
     * @return Document
     */
    public function setHyperlinks(array $hyperlinks): Document
    {
        $this->hyperlinks = $hyperlinks;

        return $this;
    }
    
    /**
     * @return null|DocumentGroupInfo
     */
    public function getDocumentGroupInfo(): ?DocumentGroupInfo
    {
        return $this->documentGroupInfo;
    }

    /**
     * @param null|DocumentGroupInfo $documentGroupInfo
     *
     * @return Document
     */
    public function setDocumentGroupInfo(?DocumentGroupInfo $documentGroupInfo): Document
    {
        $this->documentGroupInfo = $documentGroupInfo;

        return $this;
    }

    /**
     * @return DocumentGroupTemplateInfo[]
     */
    public function getDocumentGroupTemplateInfo(): array
    {
        return $this->documentGroupTemplateInfo;
    }

    /**
     * @param DocumentGroupTemplateInfo[] $documentGroupTemplateInfo
     *
     * @return Document
     */
    public function setDocumentGroupTemplateInfo(array $documentGroupTemplateInfo): Document
    {
        $this->documentGroupTemplateInfo = $documentGroupTemplateInfo;

        return $this;
    }

    /**
     * @return Integration[]
     */
    public function getIntegrations(): array
    {
        return $this->integrations;
    }

    /**
     * @param Integration[] $integrations
     *
     * @return Document
     */
    public function setIntegrations(array $integrations): Document
    {
        $this->integrations = $integrations;

        return $this;
    }

    /**
     * @return Settings
     */
    public function getSettings(): Settings
    {
        return $this->settings;
    }

    /**
     * @param Settings $settings
     *
     * @return Document
     */
    public function setSettings(Settings $settings): Document
    {
        $this->settings = $settings;

        return $this;
    }

    /**
     * @return SigningSessionSettings
     */
    public function getSigningSessionSettings(): SigningSessionSettings
    {
        return $this->signingSessionSettings;
    }

    /**
     * @param SigningSessionSettings $signingSessionSettings
     *
     * @return Document
     */
    public function setSigningSessionSettings(SigningSessionSettings $signingSessionSettings): Document
    {
        $this->signingSessionSettings = $signingSessionSettings;

        return $this;
    }

    /**
     * @return OriginatorOrganizationSetting[]
     */
    public function getOriginatorOrganizationSettings(): array
    {
        return $this->originatorOrganizationSettings;
    }

    /**
     * @param OriginatorOrganizationSetting[] $originatorOrganizationSettings
     *
     * @return Document
     */
    public function setOriginatorOrganizationSettings(array $originatorOrganizationSettings): Document
    {
        $this->originatorOrganizationSettings = $originatorOrganizationSettings;

        return $this;
    }

    /**
     * @return Tag[]
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @param Tag[] $tags
     *
     * @return Document
     */
    public function setTags(array $tags): Document
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * @return ExportedTo[]
     */
    public function getExportedTo(): array
    {
        return $this->exportedTo;
    }

    /**
     * @param ExportedTo[] $exportedTo
     *
     * @return Document
     */
    public function setExportedTo(array $exportedTo): Document
    {
        $this->exportedTo = $exportedTo;

        return $this;
    }

    /**
     * @return array
     */
    public function getFieldInvites(): array
    {
        return $this->fieldInvites;
    }

    /**
     * @param array $fieldInvites
     *
     * @return Document
     */
    public function setFieldInvites(array $fieldInvites): Document
    {
        $this->fieldInvites = $fieldInvites;

        return $this;
    }

    /**
     * @return ViewerFieldInvite[]
     */
    public function getViewerFieldInvites(): array
    {
        return $this->viewerFieldInvites;
    }

    /**
     * @param ViewerFieldInvite[] $viewerFieldInvites
     *
     * @return Document
     */
    public function setViewerFieldInvites(array $viewerFieldInvites): Document
    {
        $this->viewerFieldInvites = $viewerFieldInvites;

        return $this;
    }

    /**
     * @return array
     */
    public function getFieldValidators(): array
    {
        return $this->fieldValidators;
    }

    /**
     * @param array $fieldValidators
     *
     * @return Document
     */
    public function setFieldValidators(array $fieldValidators): Document
    {
        $this->fieldValidators = $fieldValidators;

        return $this;
    }

    /**
     * @return Payment[]
     */
    public function getPayments(): array
    {
        return $this->payments;
    }

    /**
     * @param Payment[] $payments
     *
     * @return Document
     */
    public function setPayments(array $payments): Document
    {
        $this->payments = $payments;

        return $this;
    }

    /**
     * @return Request[]
     */
    public function getRequests(): array
    {
        return $this->requests;
    }

    /**
     * @param Request[] $requests
     *
     * @return Document
     */
    public function setRequests(array $requests): Document
    {
        $this->requests = $requests;

        return $this;
    }

    /**
     * @return string
     */
    public function getOriginatorLogo(): string
    {
        return $this->originatorLogo;
    }

    /**
     * @param string $originatorLogo
     *
     * @return Document
     */
    public function setOriginatorLogo(string $originatorLogo): Document
    {
        $this->originatorLogo = $originatorLogo;

        return $this;
    }

    /**
     * @return Pages
     */
    public function getPages(): Pages
    {
        return $this->pages;
    }

    /**
     * @param Pages $pages
     *
     * @return Document
     */
    public function setPages(Pages $pages): Document
    {
        $this->pages = $pages;

        return $this;
    }

    /**
     * @return array
     */
    public function getLines(): array
    {
        return $this->lines;
    }

    /**
     * @param array $lines
     *
     * @return Document
     */
    public function setLines(array $lines): Document
    {
        $this->lines = $lines;

        return $this;
    }

    /**
     * @deprecated
     *
     * @return array
     */
    public function getInserts(): array
    {
        return $this->inserts;
    }

    /**
     * @deprecated
     *
     * @param array $inserts
     *
     * @return Document
     */
    public function setInserts(array $inserts): Document
    {
        $this->inserts = $inserts;

        return $this;
    }

    /**
     * @deprecated
     *
     * @return array
     */
    public function getSeals(): array
    {
        return $this->seals;
    }

    /**
     * @deprecated
     *
     * @param array $seals
     *
     * @return Document
     */
    public function setSeals(array $seals): Document
    {
        $this->seals = $seals;

        return $this;
    }

    /**
     * @deprecated
     *
     * @return array
     */
    public function getNotaryInvites(): array
    {
        return $this->notaryInvites;
    }

    /**
     * @deprecated
     *
     * @param array $notaryInvites
     *
     * @return Document
     */
    public function setNotaryInvites(array $notaryInvites): Document
    {
        $this->notaryInvites = $notaryInvites;

        return $this;
    }
}
