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

readonly class Settings
{
    public function __construct(
        private array $settings = [],
    ) {
    }

    public function isNoDocumentAttachment(): bool
    {
        return $this->settings['no_document_attachment'] ?? false;
    }

    public function isCopyExport(): bool
    {
        return $this->settings['copy_export'] ?? false;
    }

    public function isNoDocumentFileAttachments(): bool
    {
        return $this->settings['no_document_file_attachments'] ?? false;
    }

    public function isNoUserSignatureReturn(): bool
    {
        return $this->settings['no_user_signature_return'] ?? false;
    }

    public function isMobilewebOption(): bool
    {
        return $this->settings['mobileweb_option'] ?? false;
    }

    public function isRequireDrawnSignatures(): bool
    {
        return $this->settings['require_drawn_signatures'] ?? false;
    }

    public function isOrgAllowedTeamAdmins(): bool
    {
        return $this->settings['org_allowed_team_admins'] ?? false;
    }

    public function isCloudAutoExport(): bool
    {
        return $this->settings['cloud_auto_export'] ?? false;
    }

    public function isDigitallySignDowloadedDocs(): bool
    {
        return $this->settings['digitally_sign_dowloaded_docs'] ?? false;
    }

    public function isInviteCompletionRedirectUrl(): bool
    {
        return $this->settings['invite_completion_redirect_url'] ?? false;
    }

    public function isInviteDeclineRedirectUrl(): bool
    {
        return $this->settings['invite_decline_redirect_url'] ?? false;
    }

    public function isAddSignatureStamp(): bool
    {
        return $this->settings['add_signature_stamp'] ?? false;
    }

    public function isPendingInviteDocumentViewNotification(): bool
    {
        return $this->settings['pending_invite_document_view_notification'] ?? false;
    }

    public function isSigningLinkDocumentDownload(): bool
    {
        return $this->settings['signing_link_document_download'] ?? false;
    }

    public function isRequiredPresetSignatureName(): bool
    {
        return $this->settings['required_preset_signature_name'] ?? false;
    }

    public function isCloudExportWithHistory(): bool
    {
        return $this->settings['cloud_export_with_history'] ?? false;
    }

    public function isEmailedDocsIncludeHistory(): bool
    {
        return $this->settings['emailed_docs_include_history'] ?? false;
    }

    public function isRequireEmailSubject(): bool
    {
        return $this->settings['require_email_subject'] ?? false;
    }

    public function isDocumentCompletionRetentionDays(): bool
    {
        return $this->settings['document_completion_retention_days'] ?? false;
    }

    public function isEnableHyperlinkProtection(): bool
    {
        return $this->settings['enable_hyperlink_protection'] ?? false;
    }

    public function isEnableAdvancedThreatProtection(): bool
    {
        return $this->settings['enable_advanced_threat_protection'] ?? false;
    }

    public function isRequireLoginForSigning(): bool
    {
        return $this->settings['require_login_for_signing'] ?? false;
    }

    public function isLogoutOnSigning(): bool
    {
        return $this->settings['logout_on_signing'] ?? false;
    }

    public function isAuditTrailCompletionRetentionDays(): bool
    {
        return $this->settings['audit_trail_completion_retention_days'] ?? false;
    }

    public function isFrontEndSessionLength(): bool
    {
        return $this->settings['front_end_session_length'] ?? false;
    }

    public function isEmailAdminOnBannedLogin(): bool
    {
        return $this->settings['email_admin_on_banned_login'] ?? false;
    }

    public function isAddSignatureStampWithName(): bool
    {
        return $this->settings['add_signature_stamp_with_name'] ?? false;
    }

    public function isCfrTitle21Part11(): bool
    {
        return $this->settings['cfr_title_21_part_11'] ?? false;
    }

    public function isUnsuccessfulLogoutAttemptsAllowed(): bool
    {
        return $this->settings['unsuccessful_logout_attempts_allowed'] ?? false;
    }

    public function isRequireAuthenticationForInvites(): bool
    {
        return $this->settings['require_authentication_for_invites'] ?? false;
    }

    public function isElectronicConsentRequired(): bool
    {
        return $this->settings['electronic_consent_required'] ?? false;
    }

    public function isElectronicConsentText(): bool
    {
        return $this->settings['electronic_consent_text'] ?? false;
    }

    public function isDocumentGuide(): bool
    {
        return $this->settings['document_guide'] ?? false;
    }

    public function isWatermarkDownloadedDocument(): bool
    {
        return $this->settings['watermark_downloaded_document'] ?? false;
    }

    public function isRestrictDownload(): bool
    {
        return $this->settings['restrict_download'] ?? false;
    }

    public function isDisableEmailNotifications(): bool
    {
        return $this->settings['disable_email_notifications'] ?? false;
    }

    public function isUploadLimit(): bool
    {
        return $this->settings['upload_limit'] ?? false;
    }

    public function isDocumentSchemaExtended(): bool
    {
        return $this->settings['document_schema_extended'] ?? false;
    }

    public function isInviteUpdateNotificationsForAllInvitesAtInviteCreate(): bool
    {
        return $this->settings['invite_update_notifications_for_all_invites_at_invite_create'] ?? false;
    }

    public function isEnableFullStoryTracker(): bool
    {
        return $this->settings['enable_full_story_tracker'] ?? false;
    }

    public function isDocumentAttachmentOnlyForSigner(): bool
    {
        return $this->settings['document_attachment_only_for_signer'] ?? false;
    }

    public function isSsoOnlyLogin(): bool
    {
        return $this->settings['sso-only-login'] ?? false;
    }

    public function isBlockExportOptionsWhenCreditCardValidationIsUsed(): bool
    {
        return $this->settings['block_export_options_when_credit_card_validation_is_used'] ?? false;
    }

    public function isOnlyAdministratorIsAbleToInviteToTheTeam(): bool
    {
        return $this->settings['only_administrator_is_able_to_invite_to_the_team'] ?? false;
    }

    public function isBlockLoginViaSocialNetworks(): bool
    {
        return $this->settings['block_login_via_social_networks'] ?? false;
    }

    public function toArray(): array
    {
        return $this->settings;
    }

    public static function fromArray(array $data): self
    {
        return new self($data);
    }
}
