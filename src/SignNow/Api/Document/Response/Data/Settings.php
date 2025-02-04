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

namespace SignNow\Api\Document\Response\Data;

use Symfony\Component\Serializer\Annotation\SerializedName;

readonly class Settings
{
    public function __construct(
        private bool $noDocumentAttachment,
        private bool $copyExport,
        private bool $noDocumentFileAttachments,
        private bool $noUserSignatureReturn,
        private bool $mobilewebOption,
        private bool $requireDrawnSignatures,
        private bool $orgAllowedTeamAdmins,
        private bool $cloudAutoExport,
        private bool $digitallySignDowloadedDocs,
        private bool $inviteCompletionRedirectUrl,
        private bool $inviteDeclineRedirectUrl,
        private bool $addSignatureStamp,
        private bool $pendingInviteDocumentViewNotification,
        private bool $signingLinkDocumentDownload,
        private bool $requiredPresetSignatureName,
        private bool $cloudExportWithHistory,
        private bool $emailedDocsIncludeHistory,
        private bool $requireEmailSubject,
        private bool $documentCompletionRetentionDays,
        private bool $enableHyperlinkProtection,
        private bool $enableAdvancedThreatProtection,
        private bool $requireLoginForSigning,
        private bool $logoutOnSigning,
        private bool $auditTrailCompletionRetentionDays,
        private bool $frontEndSessionLength,
        private bool $emailAdminOnBannedLogin,
        private bool $addSignatureStampWithName,
        #[SerializedName('cfr_title_21_part_11')]
        private bool $cfrTitle21Part11,
        private bool $unsuccessfulLogoutAttemptsAllowed,
        private bool $requireAuthenticationForInvites,
        private bool $electronicConsentRequired,
        private bool $electronicConsentText,
        private bool $documentGuide,
        private bool $watermarkDownloadedDocument,
        private bool $restrictDownload,
        private bool $disableEmailNotifications,
        private bool $uploadLimit,
        private bool $documentSchemaExtended,
        private bool $inviteUpdateNotificationsForAllInvitesAtInviteCreate,
        private bool $enableFullStoryTracker,
        private bool $documentAttachmentOnlyForSigner,
        #[SerializedName('sso-only-login')]
        private bool $ssoOnlyLogin,
        private bool $blockExportOptionsWhenCreditCardValidationIsUsed,
        private bool $onlyAdministratorIsAbleToInviteToTheTeam,
        private bool $blockLoginViaSocialNetworks,
    ) {
    }

    public function isNoDocumentAttachment(): bool
    {
        return $this->noDocumentAttachment;
    }

    public function isCopyExport(): bool
    {
        return $this->copyExport;
    }

    public function isNoDocumentFileAttachments(): bool
    {
        return $this->noDocumentFileAttachments;
    }

    public function isNoUserSignatureReturn(): bool
    {
        return $this->noUserSignatureReturn;
    }

    public function isMobilewebOption(): bool
    {
        return $this->mobilewebOption;
    }

    public function isRequireDrawnSignatures(): bool
    {
        return $this->requireDrawnSignatures;
    }

    public function isOrgAllowedTeamAdmins(): bool
    {
        return $this->orgAllowedTeamAdmins;
    }

    public function isCloudAutoExport(): bool
    {
        return $this->cloudAutoExport;
    }

    public function isDigitallySignDowloadedDocs(): bool
    {
        return $this->digitallySignDowloadedDocs;
    }

    public function isInviteCompletionRedirectUrl(): bool
    {
        return $this->inviteCompletionRedirectUrl;
    }

    public function isInviteDeclineRedirectUrl(): bool
    {
        return $this->inviteDeclineRedirectUrl;
    }

    public function isAddSignatureStamp(): bool
    {
        return $this->addSignatureStamp;
    }

    public function isPendingInviteDocumentViewNotification(): bool
    {
        return $this->pendingInviteDocumentViewNotification;
    }

    public function isSigningLinkDocumentDownload(): bool
    {
        return $this->signingLinkDocumentDownload;
    }

    public function isRequiredPresetSignatureName(): bool
    {
        return $this->requiredPresetSignatureName;
    }

    public function isCloudExportWithHistory(): bool
    {
        return $this->cloudExportWithHistory;
    }

    public function isEmailedDocsIncludeHistory(): bool
    {
        return $this->emailedDocsIncludeHistory;
    }

    public function isRequireEmailSubject(): bool
    {
        return $this->requireEmailSubject;
    }

    public function isDocumentCompletionRetentionDays(): bool
    {
        return $this->documentCompletionRetentionDays;
    }

    public function isEnableHyperlinkProtection(): bool
    {
        return $this->enableHyperlinkProtection;
    }

    public function isEnableAdvancedThreatProtection(): bool
    {
        return $this->enableAdvancedThreatProtection;
    }

    public function isRequireLoginForSigning(): bool
    {
        return $this->requireLoginForSigning;
    }

    public function isLogoutOnSigning(): bool
    {
        return $this->logoutOnSigning;
    }

    public function isAuditTrailCompletionRetentionDays(): bool
    {
        return $this->auditTrailCompletionRetentionDays;
    }

    public function isFrontEndSessionLength(): bool
    {
        return $this->frontEndSessionLength;
    }

    public function isEmailAdminOnBannedLogin(): bool
    {
        return $this->emailAdminOnBannedLogin;
    }

    public function isAddSignatureStampWithName(): bool
    {
        return $this->addSignatureStampWithName;
    }

    public function isCfrTitle21Part11(): bool
    {
        return $this->cfrTitle21Part11;
    }

    public function isUnsuccessfulLogoutAttemptsAllowed(): bool
    {
        return $this->unsuccessfulLogoutAttemptsAllowed;
    }

    public function isRequireAuthenticationForInvites(): bool
    {
        return $this->requireAuthenticationForInvites;
    }

    public function isElectronicConsentRequired(): bool
    {
        return $this->electronicConsentRequired;
    }

    public function isElectronicConsentText(): bool
    {
        return $this->electronicConsentText;
    }

    public function isDocumentGuide(): bool
    {
        return $this->documentGuide;
    }

    public function isWatermarkDownloadedDocument(): bool
    {
        return $this->watermarkDownloadedDocument;
    }

    public function isRestrictDownload(): bool
    {
        return $this->restrictDownload;
    }

    public function isDisableEmailNotifications(): bool
    {
        return $this->disableEmailNotifications;
    }

    public function isUploadLimit(): bool
    {
        return $this->uploadLimit;
    }

    public function isDocumentSchemaExtended(): bool
    {
        return $this->documentSchemaExtended;
    }

    public function isInviteUpdateNotificationsForAllInvitesAtInviteCreate(): bool
    {
        return $this->inviteUpdateNotificationsForAllInvitesAtInviteCreate;
    }

    public function isEnableFullStoryTracker(): bool
    {
        return $this->enableFullStoryTracker;
    }

    public function isDocumentAttachmentOnlyForSigner(): bool
    {
        return $this->documentAttachmentOnlyForSigner;
    }

    public function isSsoOnlyLogin(): bool
    {
        return $this->ssoOnlyLogin;
    }

    public function isBlockExportOptionsWhenCreditCardValidationIsUsed(): bool
    {
        return $this->blockExportOptionsWhenCreditCardValidationIsUsed;
    }

    public function isOnlyAdministratorIsAbleToInviteToTheTeam(): bool
    {
        return $this->onlyAdministratorIsAbleToInviteToTheTeam;
    }

    public function isBlockLoginViaSocialNetworks(): bool
    {
        return $this->blockLoginViaSocialNetworks;
    }
}
