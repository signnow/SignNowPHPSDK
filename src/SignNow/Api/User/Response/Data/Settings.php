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

namespace SignNow\Api\User\Response\Data;

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
        private bool $redirectToRegistrationWhenFieldsSaved,
        private bool $commonExperiments,
        private bool $hideDeclineToSignOptionInSigningSession,
        private bool $hideUpgradeSubscriptionButton,
        private bool $doNoConsentRedirectUrl,
        private bool $lockSigningDateByDefault,
        private bool $allowDownloadCertificate,
        private bool $haveMergedDocumentGroupOption,
        private bool $enableEuDateFormat,
        private bool $guideSignersOnlyThroughRequiredFields,
        private bool $allowDocumentCopyingToOtherAccounts,
        private bool $emailCustomSubject,
        private bool $emailCustomMessage,
        private bool $inviteExpirationDays,
        private bool $enableMfa,
        private bool $enableDocumentDownloadLinkForInviteCompletionMails,
        private bool $allowBigAttachmentFile,
        private bool $allowBigCountOfAttachmentFieldsPerDocument = false,
        private bool $enableHyperlinkField = false,
        private bool $disableDownloadActionInEditor = false,
        private bool $signatureStampPosition = false,
        private bool $enablePki = false,
        private bool $enableDocumentComments = false,
        private bool $ccCompletionEmailContainOnlyDownloadingDocumentLink = false,
        private bool $saveSignerSignatureAndInitials = false,
        private bool $autoApplySignaturesAndInitialsToDocumentFields = false,
        private bool $blockOrganizationSelfleaveByMember = false,
        private bool $receiveSignerEmailAfterSentFieldInviteToYourself = false,
        private bool $dateFormat = false,
        private bool $completedDocumentNameFormula = false,
        private bool $agreementToTestNewFunctionalityInOrganization = false,
        private bool $agreeToBeBetaTester = false,
        private bool $defaultFieldInviteRemindBefore = false,
        private bool $defaultFieldInviteRemindAfter = false,
        private bool $defaultFieldInviteRemindRepeat = false,
        private bool $defaultFieldInviteExpirationTime = false,
        private bool $emailLogoPosition = false,
        private bool $emailBtnBkgdColor = false,
        private bool $emailBtnTextColor = false,
        private bool $allowEditDocumentAfterSigning = false,
        private bool $allowEmbeddedExtendedTokenExpiration = false,
        private bool $everySignatureAndInitialsFieldRequiresUserAuthentication = false,
        private bool $enableRenderPagesInEditorAsImages = false,
        private bool $enableTeamAdminMoveDocs = false,
        private bool $disableEmailRecipients = false,
        private bool $allowTeamAdminRenameDocs = false,
        private bool $emailFooterEnabled = false,
        private bool $parseOnlySignatureFields = false,
        private bool $flattenBeforeAspose = false,
        private bool $runExperiments = false,
        private bool $disableFormSearch = false,
        private bool $allowTeamAdminCreateCsvReportForSharedTemplate = false,
        private bool $enableTeamGenericEmail = false,
        private bool $useTeamGenericData = false,
        private bool $signingReason = false,
        private bool $allowQes = false,
        private bool $enableQes = false,
        private bool $advancedSigningFlow = false,
        private bool $documentPrefillDisableFieldsExistingValidation = false,
        private bool $disableProblemInviteEmailNotifications = false,
        private bool $defaultWorkspaceAssigned = false,
        private bool $workspaceOrganization = false,
        private bool $defaultWorkspace = false,
        private bool $workspaceSubscriptionAdmin = false,
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

    public function isRedirectToRegistrationWhenFieldsSaved(): bool
    {
        return $this->redirectToRegistrationWhenFieldsSaved;
    }

    public function isCommonExperiments(): bool
    {
        return $this->commonExperiments;
    }

    public function isHideDeclineToSignOptionInSigningSession(): bool
    {
        return $this->hideDeclineToSignOptionInSigningSession;
    }

    public function isHideUpgradeSubscriptionButton(): bool
    {
        return $this->hideUpgradeSubscriptionButton;
    }

    public function isDoNoConsentRedirectUrl(): bool
    {
        return $this->doNoConsentRedirectUrl;
    }

    public function isLockSigningDateByDefault(): bool
    {
        return $this->lockSigningDateByDefault;
    }

    public function isAllowDownloadCertificate(): bool
    {
        return $this->allowDownloadCertificate;
    }

    public function isHaveMergedDocumentGroupOption(): bool
    {
        return $this->haveMergedDocumentGroupOption;
    }

    public function isEnableEuDateFormat(): bool
    {
        return $this->enableEuDateFormat;
    }

    public function isGuideSignersOnlyThroughRequiredFields(): bool
    {
        return $this->guideSignersOnlyThroughRequiredFields;
    }

    public function isAllowDocumentCopyingToOtherAccounts(): bool
    {
        return $this->allowDocumentCopyingToOtherAccounts;
    }

    public function isEmailCustomSubject(): bool
    {
        return $this->emailCustomSubject;
    }

    public function isEmailCustomMessage(): bool
    {
        return $this->emailCustomMessage;
    }

    public function isInviteExpirationDays(): bool
    {
        return $this->inviteExpirationDays;
    }

    public function isEnableMfa(): bool
    {
        return $this->enableMfa;
    }

    public function isEnableDocumentDownloadLinkForInviteCompletionMails(): bool
    {
        return $this->enableDocumentDownloadLinkForInviteCompletionMails;
    }

    public function isAllowBigAttachmentFile(): bool
    {
        return $this->allowBigAttachmentFile;
    }

    public function isAllowBigCountOfAttachmentFieldsPerDocument(): bool
    {
        return $this->allowBigCountOfAttachmentFieldsPerDocument;
    }

    public function isEnableHyperlinkField(): bool
    {
        return $this->enableHyperlinkField;
    }

    public function isDisableDownloadActionInEditor(): bool
    {
        return $this->disableDownloadActionInEditor;
    }

    public function isSignatureStampPosition(): bool
    {
        return $this->signatureStampPosition;
    }

    public function isEnablePki(): bool
    {
        return $this->enablePki;
    }

    public function isEnableDocumentComments(): bool
    {
        return $this->enableDocumentComments;
    }

    public function isCcCompletionEmailContainOnlyDownloadingDocumentLink(): bool
    {
        return $this->ccCompletionEmailContainOnlyDownloadingDocumentLink;
    }

    public function isSaveSignerSignatureAndInitials(): bool
    {
        return $this->saveSignerSignatureAndInitials;
    }

    public function isAutoApplySignaturesAndInitialsToDocumentFields(): bool
    {
        return $this->autoApplySignaturesAndInitialsToDocumentFields;
    }

    public function isBlockOrganizationSelfleaveByMember(): bool
    {
        return $this->blockOrganizationSelfleaveByMember;
    }

    public function isReceiveSignerEmailAfterSentFieldInviteToYourself(): bool
    {
        return $this->receiveSignerEmailAfterSentFieldInviteToYourself;
    }

    public function isDateFormat(): bool
    {
        return $this->dateFormat;
    }

    public function isCompletedDocumentNameFormula(): bool
    {
        return $this->completedDocumentNameFormula;
    }

    public function isAgreementToTestNewFunctionalityInOrganization(): bool
    {
        return $this->agreementToTestNewFunctionalityInOrganization;
    }

    public function isAgreeToBeBetaTester(): bool
    {
        return $this->agreeToBeBetaTester;
    }

    public function isDefaultFieldInviteRemindBefore(): bool
    {
        return $this->defaultFieldInviteRemindBefore;
    }

    public function isDefaultFieldInviteRemindAfter(): bool
    {
        return $this->defaultFieldInviteRemindAfter;
    }

    public function isDefaultFieldInviteRemindRepeat(): bool
    {
        return $this->defaultFieldInviteRemindRepeat;
    }

    public function isDefaultFieldInviteExpirationTime(): bool
    {
        return $this->defaultFieldInviteExpirationTime;
    }

    public function isEmailLogoPosition(): bool
    {
        return $this->emailLogoPosition;
    }

    public function isEmailBtnBkgdColor(): bool
    {
        return $this->emailBtnBkgdColor;
    }

    public function isEmailBtnTextColor(): bool
    {
        return $this->emailBtnTextColor;
    }

    public function isAllowEditDocumentAfterSigning(): bool
    {
        return $this->allowEditDocumentAfterSigning;
    }

    public function isAllowEmbeddedExtendedTokenExpiration(): bool
    {
        return $this->allowEmbeddedExtendedTokenExpiration;
    }

    public function isEverySignatureAndInitialsFieldRequiresUserAuthentication(): bool
    {
        return $this->everySignatureAndInitialsFieldRequiresUserAuthentication;
    }

    public function isEnableRenderPagesInEditorAsImages(): bool
    {
        return $this->enableRenderPagesInEditorAsImages;
    }

    public function isEnableTeamAdminMoveDocs(): bool
    {
        return $this->enableTeamAdminMoveDocs;
    }

    public function isDisableEmailRecipients(): bool
    {
        return $this->disableEmailRecipients;
    }

    public function isAllowTeamAdminRenameDocs(): bool
    {
        return $this->allowTeamAdminRenameDocs;
    }

    public function isEmailFooterEnabled(): bool
    {
        return $this->emailFooterEnabled;
    }

    public function isParseOnlySignatureFields(): bool
    {
        return $this->parseOnlySignatureFields;
    }

    public function isFlattenBeforeAspose(): bool
    {
        return $this->flattenBeforeAspose;
    }

    public function isRunExperiments(): bool
    {
        return $this->runExperiments;
    }

    public function isDisableFormSearch(): bool
    {
        return $this->disableFormSearch;
    }

    public function isAllowTeamAdminCreateCsvReportForSharedTemplate(): bool
    {
        return $this->allowTeamAdminCreateCsvReportForSharedTemplate;
    }

    public function isEnableTeamGenericEmail(): bool
    {
        return $this->enableTeamGenericEmail;
    }

    public function isUseTeamGenericData(): bool
    {
        return $this->useTeamGenericData;
    }

    public function isSigningReason(): bool
    {
        return $this->signingReason;
    }

    public function isAllowQes(): bool
    {
        return $this->allowQes;
    }

    public function isEnableQes(): bool
    {
        return $this->enableQes;
    }

    public function isAdvancedSigningFlow(): bool
    {
        return $this->advancedSigningFlow;
    }

    public function isDocumentPrefillDisableFieldsExistingValidation(): bool
    {
        return $this->documentPrefillDisableFieldsExistingValidation;
    }

    public function isDisableProblemInviteEmailNotifications(): bool
    {
        return $this->disableProblemInviteEmailNotifications;
    }

    public function isDefaultWorkspaceAssigned(): bool
    {
        return $this->defaultWorkspaceAssigned;
    }

    public function isWorkspaceOrganization(): bool
    {
        return $this->workspaceOrganization;
    }

    public function isDefaultWorkspace(): bool
    {
        return $this->defaultWorkspace;
    }

    public function isWorkspaceSubscriptionAdmin(): bool
    {
        return $this->workspaceSubscriptionAdmin;
    }
}
