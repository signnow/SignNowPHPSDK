<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\Document;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Settings
 *
 * @package SignNow\Api\Entity\Document
 */
class Settings
{
    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $noDocumentAttachment = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $copyExport = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $noDocumentFileAttachments = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $noUserSignatureReturn = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $mobilewebOption = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $requireDrawnSignatures = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $orgAllowedTeamAdmins = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $cloudAutoExport = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $digitallySignDownloadedDocs = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $inviteCompletionRedirectUrl = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $inviteDeclineRedirectUrl = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $addSignatureStamp = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $pendingInviteDocumentViewNotification = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $signingLinkDocumentDownload = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $requiredPresetSignatureName = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $cloudExportWithHistory = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $emailedDocsIncludeHistory = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $requireEmailSubject = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $documentCompletionRetentionDays = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $enableHyperlinkProtection = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $enableAdvancedThreatProtection = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $requireLoginForSigning = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $logoutOnSigning = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $auditTrailCompletionRetentionDays = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $frontEndSessionLength = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $emailAdminOnBannedLogin = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $addSignatureStampWithName = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $cfrTitle21Part11 = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $unsuccessfulLogoutAttemptsAllowed = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $requireAuthenticationForInvites = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $electronicConsentRequired = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $electronicConsentText = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $documentGuide = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $watermarkDownloadedDocument = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $restrictDownload = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $disableEmailNotifications = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $uploadLimit = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $documentSchemaExtended = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $inviteUpdateNotificationsForAllInvitesAtInviteCreate = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $enableFullStoryTracker = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $documentAttachmentOnlyForSigner = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $ssoOnlyLogin = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $blockExportOptionsWhenCreditCardValidationIsUsed = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $onlyAdministratorIsAbleToInviteToTheTeam = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $blockLoginViaSocialNetworks = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $redirectToRegistrationWhenFieldsSaved = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $commonExperiments = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $hideDeclineToSignOptionInSigningSession = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $hideUpgradeSubscriptionButton = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $allowDownloadCertificate = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $guideSignersOnlyThroughRequiredFields = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $allowDocumentCopyingToOtherAccounts = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $emailCustomSubject = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $emailCustomMessage = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $enableMfa = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $allowBigAttachmentFile = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $allowBigCountOfAttachmentFieldsPerDocument = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $disableDownloadActionInEditor = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $signatureStampPosition = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $enablePki = false;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $enableDocumentComments = false;

    /**
     * @return bool
     */
    public function isNoDocumentAttachment(): bool
    {
        return $this->noDocumentAttachment;
    }

    /**
     * @param bool $noDocumentAttachment
     *
     * @return Settings
     */
    public function setNoDocumentAttachment(bool $noDocumentAttachment): Settings
    {
        $this->noDocumentAttachment = $noDocumentAttachment;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCopyExport(): bool
    {
        return $this->copyExport;
    }

    /**
     * @param bool $copyExport
     *
     * @return Settings
     */
    public function setCopyExport(bool $copyExport): Settings
    {
        $this->copyExport = $copyExport;

        return $this;
    }

    /**
     * @return bool
     */
    public function isNoDocumentFileAttachments(): bool
    {
        return $this->noDocumentFileAttachments;
    }

    /**
     * @param bool $noDocumentFileAttachments
     *
     * @return Settings
     */
    public function setNoDocumentFileAttachments(bool $noDocumentFileAttachments): Settings
    {
        $this->noDocumentFileAttachments = $noDocumentFileAttachments;

        return $this;
    }

    /**
     * @return bool
     */
    public function isNoUserSignatureReturn(): bool
    {
        return $this->noUserSignatureReturn;
    }

    /**
     * @param bool $noUserSignatureReturn
     *
     * @return Settings
     */
    public function setNoUserSignatureReturn(bool $noUserSignatureReturn): Settings
    {
        $this->noUserSignatureReturn = $noUserSignatureReturn;

        return $this;
    }

    /**
     * @return bool
     */
    public function isMobilewebOption(): bool
    {
        return $this->mobilewebOption;
    }

    /**
     * @param bool $mobilewebOption
     *
     * @return Settings
     */
    public function setMobilewebOption(bool $mobilewebOption): Settings
    {
        $this->mobilewebOption = $mobilewebOption;

        return $this;
    }

    /**
     * @return bool
     */
    public function isRequireDrawnSignatures(): bool
    {
        return $this->requireDrawnSignatures;
    }

    /**
     * @param bool $requireDrawnSignatures
     *
     * @return Settings
     */
    public function setRequireDrawnSignatures(bool $requireDrawnSignatures): Settings
    {
        $this->requireDrawnSignatures = $requireDrawnSignatures;

        return $this;
    }

    /**
     * @return bool
     */
    public function isOrgAllowedTeamAdmins(): bool
    {
        return $this->orgAllowedTeamAdmins;
    }

    /**
     * @param bool $orgAllowedTeamAdmins
     *
     * @return Settings
     */
    public function setOrgAllowedTeamAdmins(bool $orgAllowedTeamAdmins): Settings
    {
        $this->orgAllowedTeamAdmins = $orgAllowedTeamAdmins;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCloudAutoExport(): bool
    {
        return $this->cloudAutoExport;
    }

    /**
     * @param bool $cloudAutoExport
     *
     * @return Settings
     */
    public function setCloudAutoExport(bool $cloudAutoExport): Settings
    {
        $this->cloudAutoExport = $cloudAutoExport;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDigitallySignDownloadedDocs(): bool
    {
        return $this->digitallySignDownloadedDocs;
    }

    /**
     * @param bool $digitallySignDownloadedDocs
     *
     * @return Settings
     */
    public function setDigitallySignDownloadedDocs(bool $digitallySignDownloadedDocs): Settings
    {
        $this->digitallySignDownloadedDocs = $digitallySignDownloadedDocs;

        return $this;
    }

    /**
     * @return bool
     */
    public function isInviteCompletionRedirectUrl(): bool
    {
        return $this->inviteCompletionRedirectUrl;
    }

    /**
     * @param bool $inviteCompletionRedirectUrl
     *
     * @return Settings
     */
    public function setInviteCompletionRedirectUrl(bool $inviteCompletionRedirectUrl): Settings
    {
        $this->inviteCompletionRedirectUrl = $inviteCompletionRedirectUrl;

        return $this;
    }

    /**
     * @return bool
     */
    public function isInviteDeclineRedirectUrl(): bool
    {
        return $this->inviteDeclineRedirectUrl;
    }

    /**
     * @param bool $inviteDeclineRedirectUrl
     *
     * @return Settings
     */
    public function setInviteDeclineRedirectUrl(bool $inviteDeclineRedirectUrl): Settings
    {
        $this->inviteDeclineRedirectUrl = $inviteDeclineRedirectUrl;

        return $this;
    }

    /**
     * @return bool
     */
    public function isAddSignatureStamp(): bool
    {
        return $this->addSignatureStamp;
    }

    /**
     * @param bool $addSignatureStamp
     *
     * @return Settings
     */
    public function setAddSignatureStamp(bool $addSignatureStamp): Settings
    {
        $this->addSignatureStamp = $addSignatureStamp;

        return $this;
    }

    /**
     * @return bool
     */
    public function isPendingInviteDocumentViewNotification(): bool
    {
        return $this->pendingInviteDocumentViewNotification;
    }

    /**
     * @param bool $pendingInviteDocumentViewNotification
     *
     * @return Settings
     */
    public function setPendingInviteDocumentViewNotification(bool $pendingInviteDocumentViewNotification): Settings
    {
        $this->pendingInviteDocumentViewNotification = $pendingInviteDocumentViewNotification;

        return $this;
    }

    /**
     * @return bool
     */
    public function isSigningLinkDocumentDownload(): bool
    {
        return $this->signingLinkDocumentDownload;
    }

    /**
     * @param bool $signingLinkDocumentDownload
     *
     * @return Settings
     */
    public function setSigningLinkDocumentDownload(bool $signingLinkDocumentDownload): Settings
    {
        $this->signingLinkDocumentDownload = $signingLinkDocumentDownload;

        return $this;
    }

    /**
     * @return bool
     */
    public function isRequiredPresetSignatureName(): bool
    {
        return $this->requiredPresetSignatureName;
    }

    /**
     * @param bool $requiredPresetSignatureName
     *
     * @return Settings
     */
    public function setRequiredPresetSignatureName(bool $requiredPresetSignatureName): Settings
    {
        $this->requiredPresetSignatureName = $requiredPresetSignatureName;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCloudExportWithHistory(): bool
    {
        return $this->cloudExportWithHistory;
    }

    /**
     * @param bool $cloudExportWithHistory
     *
     * @return Settings
     */
    public function setCloudExportWithHistory(bool $cloudExportWithHistory): Settings
    {
        $this->cloudExportWithHistory = $cloudExportWithHistory;

        return $this;
    }

    /**
     * @return bool
     */
    public function isEmailedDocsIncludeHistory(): bool
    {
        return $this->emailedDocsIncludeHistory;
    }

    /**
     * @param bool $emailedDocsIncludeHistory
     *
     * @return Settings
     */
    public function setEmailedDocsIncludeHistory(bool $emailedDocsIncludeHistory): Settings
    {
        $this->emailedDocsIncludeHistory = $emailedDocsIncludeHistory;

        return $this;
    }

    /**
     * @return bool
     */
    public function isRequireEmailSubject(): bool
    {
        return $this->requireEmailSubject;
    }

    /**
     * @param bool $requireEmailSubject
     *
     * @return Settings
     */
    public function setRequireEmailSubject(bool $requireEmailSubject): Settings
    {
        $this->requireEmailSubject = $requireEmailSubject;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDocumentCompletionRetentionDays(): bool
    {
        return $this->documentCompletionRetentionDays;
    }

    /**
     * @param bool $documentCompletionRetentionDays
     *
     * @return Settings
     */
    public function setDocumentCompletionRetentionDays(bool $documentCompletionRetentionDays): Settings
    {
        $this->documentCompletionRetentionDays = $documentCompletionRetentionDays;

        return $this;
    }

    /**
     * @return bool
     */
    public function isEnableHyperlinkProtection(): bool
    {
        return $this->enableHyperlinkProtection;
    }

    /**
     * @param bool $enableHyperlinkProtection
     *
     * @return Settings
     */
    public function setEnableHyperlinkProtection(bool $enableHyperlinkProtection): Settings
    {
        $this->enableHyperlinkProtection = $enableHyperlinkProtection;

        return $this;
    }

    /**
     * @return bool
     */
    public function isEnableAdvancedThreatProtection(): bool
    {
        return $this->enableAdvancedThreatProtection;
    }

    /**
     * @param bool $enableAdvancedThreatProtection
     *
     * @return Settings
     */
    public function setEnableAdvancedThreatProtection(bool $enableAdvancedThreatProtection): Settings
    {
        $this->enableAdvancedThreatProtection = $enableAdvancedThreatProtection;

        return $this;
    }

    /**
     * @return bool
     */
    public function isRequireLoginForSigning(): bool
    {
        return $this->requireLoginForSigning;
    }

    /**
     * @param bool $requireLoginForSigning
     *
     * @return Settings
     */
    public function setRequireLoginForSigning(bool $requireLoginForSigning): Settings
    {
        $this->requireLoginForSigning = $requireLoginForSigning;

        return $this;
    }

    /**
     * @return bool
     */
    public function isLogoutOnSigning(): bool
    {
        return $this->logoutOnSigning;
    }

    /**
     * @param bool $logoutOnSigning
     *
     * @return Settings
     */
    public function setLogoutOnSigning(bool $logoutOnSigning): Settings
    {
        $this->logoutOnSigning = $logoutOnSigning;

        return $this;
    }

    /**
     * @return bool
     */
    public function isAuditTrailCompletionRetentionDays(): bool
    {
        return $this->auditTrailCompletionRetentionDays;
    }

    /**
     * @param bool $auditTrailCompletionRetentionDays
     *
     * @return Settings
     */
    public function setAuditTrailCompletionRetentionDays(bool $auditTrailCompletionRetentionDays): Settings
    {
        $this->auditTrailCompletionRetentionDays = $auditTrailCompletionRetentionDays;

        return $this;
    }

    /**
     * @return bool
     */
    public function isFrontEndSessionLength(): bool
    {
        return $this->frontEndSessionLength;
    }

    /**
     * @param bool $frontEndSessionLength
     *
     * @return Settings
     */
    public function setFrontEndSessionLength(bool $frontEndSessionLength): Settings
    {
        $this->frontEndSessionLength = $frontEndSessionLength;

        return $this;
    }

    /**
     * @return bool
     */
    public function isEmailAdminOnBannedLogin(): bool
    {
        return $this->emailAdminOnBannedLogin;
    }

    /**
     * @param bool $emailAdminOnBannedLogin
     *
     * @return Settings
     */
    public function setEmailAdminOnBannedLogin(bool $emailAdminOnBannedLogin): Settings
    {
        $this->emailAdminOnBannedLogin = $emailAdminOnBannedLogin;

        return $this;
    }

    /**
     * @return bool
     */
    public function isAddSignatureStampWithName(): bool
    {
        return $this->addSignatureStampWithName;
    }

    /**
     * @param bool $addSignatureStampWithName
     *
     * @return Settings
     */
    public function setAddSignatureStampWithName(bool $addSignatureStampWithName): Settings
    {
        $this->addSignatureStampWithName = $addSignatureStampWithName;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCfrTitle21Part11(): bool
    {
        return $this->cfrTitle21Part11;
    }

    /**
     * @param bool $cfrTitle21Part11
     *
     * @return Settings
     */
    public function setCfrTitle21Part11(bool $cfrTitle21Part11): Settings
    {
        $this->cfrTitle21Part11 = $cfrTitle21Part11;

        return $this;
    }

    /**
     * @return bool
     */
    public function isUnsuccessfulLogoutAttemptsAllowed(): bool
    {
        return $this->unsuccessfulLogoutAttemptsAllowed;
    }

    /**
     * @param bool $unsuccessfulLogoutAttemptsAllowed
     *
     * @return Settings
     */
    public function setUnsuccessfulLogoutAttemptsAllowed(bool $unsuccessfulLogoutAttemptsAllowed): Settings
    {
        $this->unsuccessfulLogoutAttemptsAllowed = $unsuccessfulLogoutAttemptsAllowed;

        return $this;
    }

    /**
     * @return bool
     */
    public function isRequireAuthenticationForInvites(): bool
    {
        return $this->requireAuthenticationForInvites;
    }

    /**
     * @param bool $requireAuthenticationForInvites
     *
     * @return Settings
     */
    public function setRequireAuthenticationForInvites(bool $requireAuthenticationForInvites): Settings
    {
        $this->requireAuthenticationForInvites = $requireAuthenticationForInvites;

        return $this;
    }

    /**
     * @return bool
     */
    public function isElectronicConsentRequired(): bool
    {
        return $this->electronicConsentRequired;
    }

    /**
     * @param bool $electronicConsentRequired
     *
     * @return Settings
     */
    public function setElectronicConsentRequired(bool $electronicConsentRequired): Settings
    {
        $this->electronicConsentRequired = $electronicConsentRequired;

        return $this;
    }

    /**
     * @return bool
     */
    public function isElectronicConsentText(): bool
    {
        return $this->electronicConsentText;
    }

    /**
     * @param bool $electronicConsentText
     *
     * @return Settings
     */
    public function setElectronicConsentText(bool $electronicConsentText): Settings
    {
        $this->electronicConsentText = $electronicConsentText;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDocumentGuide(): bool
    {
        return $this->documentGuide;
    }

    /**
     * @param bool $documentGuide
     *
     * @return Settings
     */
    public function setDocumentGuide(bool $documentGuide): Settings
    {
        $this->documentGuide = $documentGuide;

        return $this;
    }

    /**
     * @return bool
     */
    public function isWatermarkDownloadedDocument(): bool
    {
        return $this->watermarkDownloadedDocument;
    }

    /**
     * @param bool $watermarkDownloadedDocument
     *
     * @return Settings
     */
    public function setWatermarkDownloadedDocument(
        bool $watermarkDownloadedDocument
    ): Settings {
        $this->watermarkDownloadedDocument = $watermarkDownloadedDocument;

        return $this;
    }

    /**
     * @return bool
     */
    public function isRestrictDownload(): bool
    {
        return $this->restrictDownload;
    }

    /**
     * @param bool $restrictDownload
     *
     * @return Settings
     */
    public function setRestrictDownload(bool $restrictDownload): Settings
    {
        $this->restrictDownload = $restrictDownload;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDisableEmailNotifications(): bool
    {
        return $this->disableEmailNotifications;
    }

    /**
     * @param bool $disableEmailNotifications
     *
     * @return Settings
     */
    public function setDisableEmailNotifications(bool $disableEmailNotifications): Settings
    {
        $this->disableEmailNotifications = $disableEmailNotifications;

        return $this;
    }

    /**
     * @return bool
     */
    public function isUploadLimit(): bool
    {
        return $this->uploadLimit;
    }

    /**
     * @param bool $uploadLimit
     *
     * @return Settings
     */
    public function setUploadLimit(bool $uploadLimit): Settings
    {
        $this->uploadLimit = $uploadLimit;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDocumentSchemaExtended(): bool
    {
        return $this->documentSchemaExtended;
    }

    /**
     * @param bool $documentSchemaExtended
     *
     * @return Settings
     */
    public function setDocumentSchemaExtended(bool $documentSchemaExtended): Settings
    {
        $this->documentSchemaExtended = $documentSchemaExtended;

        return $this;
    }

    /**
     * @return bool
     */
    public function isInviteUpdateNotificationsForAllInvitesAtInviteCreate(): bool
    {
        return $this->inviteUpdateNotificationsForAllInvitesAtInviteCreate;
    }

    /**
     * @param bool $invite
     *
     * @return Settings
     */
    public function setInviteUpdateNotificationsForAllInvitesAtInviteCreate(
        bool $invite
    ): Settings {
        $this->inviteUpdateNotificationsForAllInvitesAtInviteCreate = $invite;

        return $this;
    }

    /**
     * @return bool
     */
    public function isEnableFullStoryTracker(): bool
    {
        return $this->enableFullStoryTracker;
    }

    /**
     * @param bool $enableFullStoryTracker
     *
     * @return Settings
     */
    public function setEnableFullStoryTracker(bool $enableFullStoryTracker): Settings
    {
        $this->enableFullStoryTracker = $enableFullStoryTracker;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDocumentAttachmentOnlyForSigner(): bool
    {
        return $this->documentAttachmentOnlyForSigner;
    }

    /**
     * @param bool $documentAttachmentOnlyForSigner
     *
     * @return Settings
     */
    public function setDocumentAttachmentOnlyForSigner(bool $documentAttachmentOnlyForSigner): Settings
    {
        $this->documentAttachmentOnlyForSigner = $documentAttachmentOnlyForSigner;

        return $this;
    }

    /**
     * @return bool
     */
    public function isSsoOnlyLogin(): bool
    {
        return $this->ssoOnlyLogin;
    }

    /**
     * @param bool $ssoOnlyLogin
     *
     * @return Settings
     */
    public function setSsoOnlyLogin(bool $ssoOnlyLogin): Settings
    {
        $this->ssoOnlyLogin = $ssoOnlyLogin;

        return $this;
    }

    /**
     * @return bool
     */
    public function isBlockExportOptionsWhenCreditCardValidationIsUsed(): bool
    {
        return $this->blockExportOptionsWhenCreditCardValidationIsUsed;
    }

    /**
     * @param bool $value
     *
     * @return Settings
     */
    public function setBlockExportOptionsWhenCreditCardValidationIsUsed(
        bool $value
    ): Settings {
        $this->blockExportOptionsWhenCreditCardValidationIsUsed = $value;

        return $this;
    }

    /**
     * @return bool
     */
    public function isOnlyAdministratorIsAbleToInviteToTheTeam(): bool
    {
        return $this->onlyAdministratorIsAbleToInviteToTheTeam;
    }

    /**
     * @param bool $value
     *
     * @return Settings
     */
    public function setOnlyAdministratorIsAbleToInviteToTheTeam(
        bool $value
    ): Settings {
        $this->onlyAdministratorIsAbleToInviteToTheTeam = $value;

        return $this;
    }

    /**
     * @return bool
     */
    public function isBlockLoginViaSocialNetworks(): bool
    {
        return $this->blockLoginViaSocialNetworks;
    }

    /**
     * @param bool $blockLoginViaSocialNetworks
     *
     * @return Settings
     */
    public function setBlockLoginViaSocialNetworks(bool $blockLoginViaSocialNetworks): Settings
    {
        $this->blockLoginViaSocialNetworks = $blockLoginViaSocialNetworks;

        return $this;
    }

    /**
     * @return bool
     */
    public function isRedirectToRegistrationWhenFieldsSaved(): bool
    {
        return $this->redirectToRegistrationWhenFieldsSaved;
    }

    /**
     * @param bool $redirectToRegistrationWhenFieldsSaved
     *
     * @return Settings
     */
    public function setRedirectToRegistrationWhenFieldsSaved(bool $redirectToRegistrationWhenFieldsSaved): Settings
    {
        $this->redirectToRegistrationWhenFieldsSaved = $redirectToRegistrationWhenFieldsSaved;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCommonExperiments(): bool
    {
        return $this->commonExperiments;
    }

    /**
     * @param bool $commonExperiments
     *
     * @return Settings
     */
    public function setCommonExperiments(bool $commonExperiments): Settings
    {
        $this->commonExperiments = $commonExperiments;

        return $this;
    }

    /**
     * @return bool
     */
    public function isHideDeclineToSignOptionInSigningSession(): bool
    {
        return $this->hideDeclineToSignOptionInSigningSession;
    }

    /**
     * @param bool $hideDeclineToSignOptionInSigningSession
     *
     * @return Settings
     */
    public function setHideDeclineToSignOptionInSigningSession(bool $hideDeclineToSignOptionInSigningSession): Settings
    {
        $this->hideDeclineToSignOptionInSigningSession = $hideDeclineToSignOptionInSigningSession;

        return $this;
    }

    /**
     * @return bool
     */
    public function isHideUpgradeSubscriptionButton(): bool
    {
        return $this->hideUpgradeSubscriptionButton;
    }

    /**
     * @param bool $hideUpgradeSubscriptionButton
     *
     * @return Settings
     */
    public function setHideUpgradeSubscriptionButton(bool $hideUpgradeSubscriptionButton): Settings
    {
        $this->hideUpgradeSubscriptionButton = $hideUpgradeSubscriptionButton;

        return $this;
    }

    /**
     * @return bool
     */
    public function isAllowDownloadCertificate(): bool
    {
        return $this->allowDownloadCertificate;
    }

    /**
     * @param bool $allowDownloadCertificate
     *
     * @return Settings
     */
    public function setAllowDownloadCertificate(bool $allowDownloadCertificate): Settings
    {
        $this->allowDownloadCertificate = $allowDownloadCertificate;

        return $this;
    }

    /**
     * @return bool
     */
    public function isGuideSignersOnlyThroughRequiredFields(): bool
    {
        return $this->guideSignersOnlyThroughRequiredFields;
    }

    /**
     * @param bool $guideSignersOnlyThroughRequiredFields
     *
     * @return Settings
     */
    public function setGuideSignersOnlyThroughRequiredFields(bool $guideSignersOnlyThroughRequiredFields): Settings
    {
        $this->guideSignersOnlyThroughRequiredFields = $guideSignersOnlyThroughRequiredFields;

        return $this;
    }

    /**
     * @return bool
     */
    public function isAllowDocumentCopyingToOtherAccounts(): bool
    {
        return $this->allowDocumentCopyingToOtherAccounts;
    }

    /**
     * @param bool $allowDocumentCopyingToOtherAccounts
     *
     * @return Settings
     */
    public function setAllowDocumentCopyingToOtherAccounts(bool $allowDocumentCopyingToOtherAccounts): Settings
    {
        $this->allowDocumentCopyingToOtherAccounts = $allowDocumentCopyingToOtherAccounts;

        return $this;
    }

    /**
     * @return bool
     */
    public function isEmailCustomSubject(): bool
    {
        return $this->emailCustomSubject;
    }

    /**
     * @param bool $emailCustomSubject
     *
     * @return Settings
     */
    public function setEmailCustomSubject(bool $emailCustomSubject): Settings
    {
        $this->emailCustomSubject = $emailCustomSubject;

        return $this;
    }

    /**
     * @return bool
     */
    public function isEmailCustomMessage(): bool
    {
        return $this->emailCustomMessage;
    }

    /**
     * @param bool $emailCustomMessage
     *
     * @return Settings
     */
    public function setEmailCustomMessage(bool $emailCustomMessage): Settings
    {
        $this->emailCustomMessage = $emailCustomMessage;

        return $this;
    }

    /**
     * @return bool
     */
    public function isEnableMfa(): bool
    {
        return $this->enableMfa;
    }

    /**
     * @param bool $enableMfa
     *
     * @return Settings
     */
    public function setEnableMfa(bool $enableMfa): Settings
    {
        $this->enableMfa = $enableMfa;

        return $this;
    }

    /**
     * @return bool
     */
    public function isAllowBigAttachmentFile(): bool
    {
        return $this->allowBigAttachmentFile;
    }

    /**
     * @param bool $allowBigAttachmentFile
     *
     * @return Settings
     */
    public function setAllowBigAttachmentFile(bool $allowBigAttachmentFile): Settings
    {
        $this->allowBigAttachmentFile = $allowBigAttachmentFile;

        return $this;
    }

    /**
     * @return bool
     */
    public function isAllowBigCountOfAttachmentFieldsPerDocument(): bool
    {
        return $this->allowBigCountOfAttachmentFieldsPerDocument;
    }

    /**
     * @param bool $value
     *
     * @return Settings
     */
    public function setAllowBigCountOfAttachmentFieldsPerDocument(
        bool $value
    ): Settings {
        $this->allowBigCountOfAttachmentFieldsPerDocument = $value;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDisableDownloadActionInEditor(): bool
    {
        return $this->disableDownloadActionInEditor;
    }

    /**
     * @param bool $disableDownloadActionInEditor
     *
     * @return Settings
     */
    public function setDisableDownloadActionInEditor(bool $disableDownloadActionInEditor): Settings
    {
        $this->disableDownloadActionInEditor = $disableDownloadActionInEditor;

        return $this;
    }

    /**
     * @return bool
     */
    public function isSignatureStampPosition(): bool
    {
        return $this->signatureStampPosition;
    }

    /**
     * @param bool $signatureStampPosition
     *
     * @return Settings
     */
    public function setSignatureStampPosition(bool $signatureStampPosition): Settings
    {
        $this->signatureStampPosition = $signatureStampPosition;

        return $this;
    }

    /**
     * @return bool
     */
    public function isEnablePki(): bool
    {
        return $this->enablePki;
    }

    /**
     * @param bool $enablePki
     *
     * @return Settings
     */
    public function setEnablePki(bool $enablePki): Settings
    {
        $this->enablePki = $enablePki;

        return $this;
    }

    /**
     * @return bool
     */
    public function isEnableDocumentComments(): bool
    {
        return $this->enableDocumentComments;
    }

    /**
     * @param bool $enableDocumentComments
     *
     * @return Settings
     */
    public function setEnableDocumentComments(bool $enableDocumentComments): Settings
    {
        $this->enableDocumentComments = $enableDocumentComments;

        return $this;
    }
}
