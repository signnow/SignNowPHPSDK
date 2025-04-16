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

    public function isRedirectToRegistrationWhenFieldsSaved(): bool
    {
        return $this->settings['redirect_to_registration_when_fields_saved'] ?? false;
    }

    public function isCommonExperiments(): bool
    {
        return $this->settings['common_experiments'] ?? false;
    }

    public function isHideDeclineToSignOptionInSigningSession(): bool
    {
        return $this->settings['hide_decline_to_sign_option_in_signing_session'] ?? false;
    }

    public function isHideUpgradeSubscriptionButton(): bool
    {
        return $this->settings['hide_upgrade_subscription_button'] ?? false;
    }

    public function isDoNoConsentRedirectUrl(): bool
    {
        return $this->settings['do_no_consent_redirect_url'] ?? false;
    }

    public function isLockSigningDateByDefault(): bool
    {
        return $this->settings['lock_signing_date_by_default'] ?? false;
    }

    public function isAllowDownloadCertificate(): bool
    {
        return $this->settings['allow_download_certificate'] ?? false;
    }

    public function isHaveMergedDocumentGroupOption(): bool
    {
        return $this->settings['have_merged_document_group_option'] ?? false;
    }

    public function isEnableEuDateFormat(): bool
    {
        return $this->settings['enable_eu_date_format'] ?? false;
    }

    public function isGuideSignersOnlyThroughRequiredFields(): bool
    {
        return $this->settings['guide_signers_only_through_required_fields'] ?? false;
    }

    public function isAllowDocumentCopyingToOtherAccounts(): bool
    {
        return $this->settings['allow_document_copying_to_other_accounts'] ?? false;
    }

    public function isEmailCustomSubject(): bool
    {
        return $this->settings['email_custom_subject'] ?? false;
    }

    public function isEmailCustomMessage(): bool
    {
        return $this->settings['email_custom_message'] ?? false;
    }

    public function isInviteExpirationDays(): bool
    {
        return $this->settings['invite_expiration_days'] ?? false;
    }

    public function isEnableMfa(): bool
    {
        return $this->settings['enable_mfa'] ?? false;
    }

    public function isEnableDocumentDownloadLinkForInviteCompletionMails(): bool
    {
        return $this->settings['enable_document_download_link_for_invite_completion_mails'] ?? false;
    }

    public function isAllowBigAttachmentFile(): bool
    {
        return $this->settings['allow_big_attachment_file'] ?? false;
    }

    public function isAllowBigCountOfAttachmentFieldsPerDocument(): bool
    {
        return $this->settings['allow_big_count_of_attachment_fields_per_document'] ?? false;
    }

    public function isEnableHyperlinkField(): bool
    {
        return $this->settings['enable_hyperlink_field'] ?? false;
    }

    public function isDisableDownloadActionInEditor(): bool
    {
        return $this->settings['disable_download_action_in_editor'] ?? false;
    }

    public function isSignatureStampPosition(): bool
    {
        return $this->settings['signature_stamp_position'] ?? false;
    }

    public function isEnablePki(): bool
    {
        return $this->settings['enable_pki'] ?? false;
    }

    public function isEnableDocumentComments(): bool
    {
        return $this->settings['enable_document_comments'] ?? false;
    }

    public function isCcCompletionEmailContainOnlyDownloadingDocumentLink(): bool
    {
        return $this->settings['cc_completion_email_contain_only_downloading_document_link'] ?? false;
    }

    public function isSaveSignerSignatureAndInitials(): bool
    {
        return $this->settings['save_signer_signature_and_initials'] ?? false;
    }

    public function isAutoApplySignaturesAndInitialsToDocumentFields(): bool
    {
        return $this->settings['auto_apply_signatures_and_initials_to_document_fields'] ?? false;
    }

    public function isBlockOrganizationSelfleaveByMember(): bool
    {
        return $this->settings['block_organization_selfleave_by_member'] ?? false;
    }

    public function isReceiveSignerEmailAfterSentFieldInviteToYourself(): bool
    {
        return $this->settings['receive_signer_email_after_sent_field_invite_to_yourself'] ?? false;
    }

    public function isDateFormat(): bool
    {
        return $this->settings['date_format'] ?? false;
    }

    public function isCompletedDocumentNameFormula(): bool
    {
        return $this->settings['completed_document_name_formula'] ?? false;
    }

    public function isAgreementToTestNewFunctionalityInOrganization(): bool
    {
        return $this->settings['agreement_to_test_new_functionality_in_organization'] ?? false;
    }

    public function isAgreeToBeBetaTester(): bool
    {
        return $this->settings['agree_to_be_beta_tester'] ?? false;
    }

    public function isDefaultFieldInviteRemindBefore(): bool
    {
        return $this->settings['default_field_invite_remind_before'] ?? false;
    }

    public function isDefaultFieldInviteRemindAfter(): bool
    {
        return $this->settings['default_field_invite_remind_after'] ?? false;
    }

    public function isDefaultFieldInviteRemindRepeat(): bool
    {
        return $this->settings['default_field_invite_remind_repeat'] ?? false;
    }

    public function isDefaultFieldInviteExpirationTime(): bool
    {
        return $this->settings['default_field_invite_expiration_time'] ?? false;
    }

    public function isEmailLogoPosition(): bool
    {
        return $this->settings['email_logo_position'] ?? false;
    }

    public function isEmailBtnBkgdColor(): bool
    {
        return $this->settings['email_btn_bkgd_color'] ?? false;
    }

    public function isEmailBtnTextColor(): bool
    {
        return $this->settings['email_btn_text_color'] ?? false;
    }

    public function isAllowEditDocumentAfterSigning(): bool
    {
        return $this->settings['allow_edit_document_after_signing'] ?? false;
    }

    public function isAllowEmbeddedExtendedTokenExpiration(): bool
    {
        return $this->settings['allow_embedded_extended_token_expiration'] ?? false;
    }

    public function isEverySignatureAndInitialsFieldRequiresUserAuthentication(): bool
    {
        return $this->settings['every_signature_and_initials_field_requires_user_authentication'] ?? false;
    }

    public function isEnableRenderPagesInEditorAsImages(): bool
    {
        return $this->settings['enable_render_pages_in_editor_as_images'] ?? false;
    }

    public function isEnableTeamAdminMoveDocs(): bool
    {
        return $this->settings['enable_team_admin_move_docs'] ?? false;
    }

    public function isDisableEmailRecipients(): bool
    {
        return $this->settings['disable_email_recipients'] ?? false;
    }

    public function isAllowTeamAdminRenameDocs(): bool
    {
        return $this->settings['allow_team_admin_rename_docs'] ?? false;
    }

    public function isEmailFooterEnabled(): bool
    {
        return $this->settings['email_footer_enabled'] ?? false;
    }

    public function isParseOnlySignatureFields(): bool
    {
        return $this->settings['parse_only_signature_fields'] ?? false;
    }

    public function isFlattenBeforeAspose(): bool
    {
        return $this->settings['flatten_before_aspose'] ?? false;
    }

    public function isRunExperiments(): bool
    {
        return $this->settings['run_experiments'] ?? false;
    }

    public function isDisableFormSearch(): bool
    {
        return $this->settings['disable_form_search'] ?? false;
    }

    public function isAllowTeamAdminCreateCsvReportForSharedTemplate(): bool
    {
        return $this->settings['allow_team_admin_create_csv_report_for_shared_template'] ?? false;
    }

    public function isEnableTeamGenericEmail(): bool
    {
        return $this->settings['enable_team_generic_email'] ?? false;
    }

    public function isUseTeamGenericData(): bool
    {
        return $this->settings['use_team_generic_data'] ?? false;
    }

    public function isSigningReason(): bool
    {
        return $this->settings['signing_reason'] ?? false;
    }

    public function isAllowQes(): bool
    {
        return $this->settings['allow_qes'] ?? false;
    }

    public function isEnableQes(): bool
    {
        return $this->settings['enable_qes'] ?? false;
    }

    public function isAdvancedSigningFlow(): bool
    {
        return $this->settings['advanced_signing_flow'] ?? false;
    }

    public function isDocumentPrefillDisableFieldsExistingValidation(): bool
    {
        return $this->settings['document_prefill_disable_fields_existing_validation'] ?? false;
    }

    public function isDisableProblemInviteEmailNotifications(): bool
    {
        return $this->settings['disable_problem_invite_email_notifications'] ?? false;
    }

    public function isDefaultWorkspaceAssigned(): bool
    {
        return $this->settings['default_workspace_assigned'] ?? false;
    }

    public function isWorkspaceOrganization(): bool
    {
        return $this->settings['workspace_organization'] ?? false;
    }

    public function isDefaultWorkspace(): bool
    {
        return $this->settings['default_workspace'] ?? false;
    }

    public function isWorkspaceSubscriptionAdmin(): bool
    {
        return $this->settings['workspace_subscription_admin'] ?? false;
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
