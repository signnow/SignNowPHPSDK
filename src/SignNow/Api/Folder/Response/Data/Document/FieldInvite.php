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

namespace SignNow\Api\Folder\Response\Data\Document;

readonly class FieldInvite
{
    public function __construct(
        private string $id,
        private string $signerUserId,
        private string $status,
        private string $created,
        private string $updated,
        private string $email,
        private string $role,
        private string $roleId,
        private EmailSentstatusCollection $emailSentStatuses,
        private string $isDocumentLocked,
        private string $passwordProtected,
        private string $passwordType,
        private string $passwordMethod,
        private string $reassign,
        private string $idVerificationRequired,
        private string $idVerified,
        private EmailGroup $emailGroup,
        private ?string $reminder = null,
        private ?string $expirationTime = null,
        private ?string $electronicConsentId = null,
        private ?string $prefillSignatureName = null,
        private ?string $forceNewSignature = null,
        private ?string $electronicConsentRequired = null,
        private ?string $declineBySignature = null,
        private ?string $signingInstructions = null,
        private ?string $paymentRequest = null,
        private ?string $isDraftExists = null,
        private ?string $isFullDeclined = null,
        private ?string $isEmbedded = null,
        private ?string $deliveryType = null,
        private ?string $signerPhoneInvite = null,
        private ?string $signatureType = null,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getSignerUserId(): string
    {
        return $this->signerUserId;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getCreated(): string
    {
        return $this->created;
    }

    public function getUpdated(): string
    {
        return $this->updated;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function getRoleId(): string
    {
        return $this->roleId;
    }

    public function getEmailSentStatuses(): EmailSentstatusCollection
    {
        return $this->emailSentStatuses;
    }

    public function getIsDocumentLocked(): string
    {
        return $this->isDocumentLocked;
    }

    public function getPasswordProtected(): string
    {
        return $this->passwordProtected;
    }

    public function getPasswordType(): string
    {
        return $this->passwordType;
    }

    public function getPasswordMethod(): string
    {
        return $this->passwordMethod;
    }

    public function getReassign(): string
    {
        return $this->reassign;
    }

    public function getIdVerificationRequired(): string
    {
        return $this->idVerificationRequired;
    }

    public function getIdVerified(): string
    {
        return $this->idVerified;
    }

    public function getReminder(): ?string
    {
        return $this->reminder;
    }

    public function getExpirationTime(): ?string
    {
        return $this->expirationTime;
    }

    public function getElectronicConsentId(): ?string
    {
        return $this->electronicConsentId;
    }

    public function getPrefillSignatureName(): ?string
    {
        return $this->prefillSignatureName;
    }

    public function getForceNewSignature(): ?string
    {
        return $this->forceNewSignature;
    }

    public function getElectronicConsentRequired(): ?string
    {
        return $this->electronicConsentRequired;
    }

    public function getDeclineBySignature(): ?string
    {
        return $this->declineBySignature;
    }

    public function getSigningInstructions(): ?string
    {
        return $this->signingInstructions;
    }

    public function getPaymentRequest(): ?string
    {
        return $this->paymentRequest;
    }

    public function getIsDraftExists(): ?string
    {
        return $this->isDraftExists;
    }

    public function getIsFullDeclined(): ?string
    {
        return $this->isFullDeclined;
    }

    public function getIsEmbedded(): ?string
    {
        return $this->isEmbedded;
    }

    public function getDeliveryType(): ?string
    {
        return $this->deliveryType;
    }

    public function getSignerPhoneInvite(): ?string
    {
        return $this->signerPhoneInvite;
    }

    public function getSignatureType(): ?string
    {
        return $this->signatureType;
    }

    public function getEmailGroup(): EmailGroup
    {
        return $this->emailGroup;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'signer_user_id' => $this->getSignerUserId(),
           'status' => $this->getStatus(),
           'created' => $this->getCreated(),
           'updated' => $this->getUpdated(),
           'email' => $this->getEmail(),
           'role' => $this->getRole(),
           'role_id' => $this->getRoleId(),
           'email_sent_statuses' => $this->getEmailSentStatuses()->toArray(),
           'is_document_locked' => $this->getIsDocumentLocked(),
           'password_protected' => $this->getPasswordProtected(),
           'password_type' => $this->getPasswordType(),
           'password_method' => $this->getPasswordMethod(),
           'reassign' => $this->getReassign(),
           'id_verification_required' => $this->getIdVerificationRequired(),
           'id_verified' => $this->getIdVerified(),
           'reminder' => $this->getReminder(),
           'expiration_time' => $this->getExpirationTime(),
           'electronic_consent_id' => $this->getElectronicConsentId(),
           'prefill_signature_name' => $this->getPrefillSignatureName(),
           'force_new_signature' => $this->getForceNewSignature(),
           'electronic_consent_required' => $this->getElectronicConsentRequired(),
           'decline_by_signature' => $this->getDeclineBySignature(),
           'signing_instructions' => $this->getSigningInstructions(),
           'payment_request' => $this->getPaymentRequest(),
           'is_draft_exists' => $this->getIsDraftExists(),
           'is_full_declined' => $this->getIsFullDeclined(),
           'is_embedded' => $this->getIsEmbedded(),
           'delivery_type' => $this->getDeliveryType(),
           'signer_phone_invite' => $this->getSignerPhoneInvite(),
           'signature_type' => $this->getSignatureType(),
           'email_group' => $this->getEmailGroup()->toArray(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['signer_user_id'],
            $data['status'],
            $data['created'],
            $data['updated'],
            $data['email'],
            $data['role'],
            $data['role_id'],
            new EmailSentstatusCollection($data['email_sent_statuses']),
            $data['is_document_locked'],
            $data['password_protected'],
            $data['password_type'],
            $data['password_method'],
            $data['reassign'],
            $data['id_verification_required'],
            $data['id_verified'],
            EmailGroup::fromArray($data['email_group']),
            $data['reminder'] ?? null,
            $data['expiration_time'] ?? null,
            $data['electronic_consent_id'] ?? null,
            $data['prefill_signature_name'] ?? null,
            $data['force_new_signature'] ?? null,
            $data['electronic_consent_required'] ?? null,
            $data['decline_by_signature'] ?? null,
            $data['signing_instructions'] ?? null,
            $data['payment_request'] ?? null,
            $data['is_draft_exists'] ?? null,
            $data['is_full_declined'] ?? null,
            $data['is_embedded'] ?? null,
            $data['delivery_type'] ?? null,
            $data['signer_phone_invite'] ?? null,
            $data['signature_type'] ?? null,
        );
    }
}
