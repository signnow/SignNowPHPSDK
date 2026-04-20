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

class SignNowExampleData
{
    private readonly array $config;

    public function __construct()
    {
        $configPath = __DIR__ . '/signnow-example-config.php';
        if (!file_exists($configPath)) {
            throw new RuntimeException(
                'Failed to load examples/signnow-example-config.php. '
                . 'Copy signnow-example-config.php.example to signnow-example-config.php and fill in your values.'
            );
        }
        $this->config = require $configPath;
    }

    public function getBearerToken(): string
    {
        return $this->get('bearer_token');
    }

    public function getPathToDocument(): string
    {
        return $this->resolvePath($this->get('path_to_document', 'examples/_data/blank.pdf'));
    }

    public function getPathToDocumentWithTags(): string
    {
        return $this->resolvePath($this->get('path_to_document_with_tags', 'examples/_data/demo_tags.pdf'));
    }

    public function getFirstRecipientRole(): string
    {
        return $this->get('first_recipient_role');
    }

    public function getSecondRecipientRole(): string
    {
        return $this->get('second_recipient_role');
    }

    public function getSignAction(): string
    {
        return $this->get('sign_action', 'sign');
    }

    public function getViewAction(): string
    {
        return $this->get('view_action', 'view');
    }

    public function getSenderEmail(): string
    {
        return $this->get('sender_email');
    }

    public function getUserId(): string
    {
        return $this->get('user_id');
    }

    public function getAuthUsername(): string
    {
        return $this->get('auth_username');
    }

    public function getAuthPassword(): string
    {
        return $this->get('auth_password');
    }

    public function getDocumentId(): string
    {
        return $this->get('document_id');
    }

    public function getDocumentPrefillTextFieldSignerRole(): string
    {
        return $this->get('document_prefill_text_field_signer_role');
    }

    public function getBulkInviteTemplateId(): string
    {
        return $this->get('bulk_invite_template_id');
    }

    public function getBulkInviteFolderId(): string
    {
        return $this->get('bulk_invite_folder_id');
    }

    public function getBulkInviteCsvFilePath(): string
    {
        return $this->resolvePath($this->get('bulk_invite_csv_file_path', 'examples/_data/bulk_invite.csv'));
    }

    public function getDocumentGroupInviteSignerRole(): string
    {
        return $this->get('document_group_invite_signer_role');
    }

    public function getDocumentGroupInviteSignerEmail(): string
    {
        return $this->get('document_group_invite_signer_email');
    }

    public function getDocumentGroupTemplateTemplateGroupId(): string
    {
        return $this->get('document_group_template_template_group_id');
    }

    public function getDocumentGroupTemplateFolderId(): string
    {
        return $this->get('document_group_template_folder_id');
    }

    public function getDownloadDocumentGroupDocumentGroupId(): string
    {
        return $this->get('download_document_group_document_group_id');
    }

    public function getDocumentGroupRecipientsDocumentGroupId(): string
    {
        return $this->get('document_group_recipients_document_group_id');
    }

    public function getDocumentGroupTemplateRecipientsTemplateId(): string
    {
        return $this->get('document_group_template_recipients_template_id');
    }

    public function getEmbeddedGroupInviteSigner1Email(): string
    {
        return $this->get('embedded_group_invite_signer_1_email');
    }

    public function getEmbeddedGroupInviteSigner2Email(): string
    {
        return $this->get('embedded_group_invite_signer_2_email');
    }

    public function getEmbeddedInviteSignerEmail(): string
    {
        return $this->get('embedded_invite_signer_email');
    }

    public function getFieldInviteSignerEmail(): string
    {
        return $this->get('field_invite_signer_email');
    }

    public function getFieldInviteSignerRole(): string
    {
        return $this->get('field_invite_signer_role');
    }

    public function getFreeFormInviteSignerEmail(): string
    {
        return $this->get('free_form_invite_signer_email');
    }

    public function getCloneTemplateTemplateId(): string
    {
        return $this->get('clone_template_template_id');
    }

    public function getWebhookUserId(): string
    {
        return $this->get('webhook_user_id');
    }

    public function getWebhookCallbackUrl(): string
    {
        return $this->get('webhook_callback_url');
    }

    private function get(string $key, string $default = ''): string
    {
        return $this->config[$key] ?? $default;
    }

    private function resolvePath(string $path): string
    {
        if ($path === '' || str_starts_with($path, '/')) {
            return $path;
        }

        return dirname(__DIR__) . '/' . $path;
    }
}
