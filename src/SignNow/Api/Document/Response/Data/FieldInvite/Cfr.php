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

namespace SignNow\Api\Document\Response\Data\FieldInvite;

readonly class Cfr
{
    public function __construct(
        private int $cfrTitle21Part11,
        private ?string $frontEndSessionLength = null,
        private ?string $requireAuthenticationForInvites = null,
        private ?string $autoApplySignaturesAndInitialsToDocumentFields = null,
        private ?string $everySignatureAndInitialsFieldRequiresUserAuthentication = null,
        private ?string $emailedDocsIncludeHistory = null,
        private ?string $cloudExportWithHistory = null,
        private ?string $requireLoginForSigning = null,
        private ?string $logoutOnSigning = null,
        private ?string $addSignatureStampWithName = null,
    ) {
    }

    public function getCfrTitle21Part11(): int
    {
        return $this->cfrTitle21Part11;
    }

    public function getFrontEndSessionLength(): ?string
    {
        return $this->frontEndSessionLength;
    }

    public function getRequireAuthenticationForInvites(): ?string
    {
        return $this->requireAuthenticationForInvites;
    }

    public function getAutoApplySignaturesAndInitialsToDocumentFields(): ?string
    {
        return $this->autoApplySignaturesAndInitialsToDocumentFields;
    }

    public function getEverySignatureAndInitialsFieldRequiresUserAuthentication(): ?string
    {
        return $this->everySignatureAndInitialsFieldRequiresUserAuthentication;
    }

    public function getEmailedDocsIncludeHistory(): ?string
    {
        return $this->emailedDocsIncludeHistory;
    }

    public function getCloudExportWithHistory(): ?string
    {
        return $this->cloudExportWithHistory;
    }

    public function getRequireLoginForSigning(): ?string
    {
        return $this->requireLoginForSigning;
    }

    public function getLogoutOnSigning(): ?string
    {
        return $this->logoutOnSigning;
    }

    public function getAddSignatureStampWithName(): ?string
    {
        return $this->addSignatureStampWithName;
    }

    public function toArray(): array
    {
        return [
           'cfr_title_21_part_11' => $this->getCfrTitle21Part11(),
           'front_end_session_length' => $this->getFrontEndSessionLength(),
           'require_authentication_for_invites' => $this->getRequireAuthenticationForInvites(),
           'auto_apply_signatures_and_initials_to_document_fields' =>
               $this->getAutoApplySignaturesAndInitialsToDocumentFields(),
           'every_signature_and_initials_field_requires_user_authentication' =>
               $this->getEverySignatureAndInitialsFieldRequiresUserAuthentication(),
           'emailed_docs_include_history' => $this->getEmailedDocsIncludeHistory(),
           'cloud_export_with_history' => $this->getCloudExportWithHistory(),
           'require_login_for_signing' => $this->getRequireLoginForSigning(),
           'logout_on_signing' => $this->getLogoutOnSigning(),
           'add_signature_stamp_with_name' => $this->getAddSignatureStampWithName(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['cfr_title_21_part_11'],
            $data['front_end_session_length'] ?? null,
            $data['require_authentication_for_invites'] ?? null,
            $data['auto_apply_signatures_and_initials_to_document_fields'] ?? null,
            $data['every_signature_and_initials_field_requires_user_authentication'] ?? null,
            $data['emailed_docs_include_history'] ?? null,
            $data['cloud_export_with_history'] ?? null,
            $data['require_login_for_signing'] ?? null,
            $data['logout_on_signing'] ?? null,
            $data['add_signature_stamp_with_name'] ?? null,
        );
    }
}
