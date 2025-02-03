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

readonly class FieldInvite
{
    public function __construct(
        private string $id,
        private string $signerUserId,
        private string $status,
        private string $passwordProtected,
        private string $created,
        private string $updated,
        private EmailGroup $emailGroup,
        private string $email,
        private EmailstatusCollection $emailStatuses,
        private string $role,
        private string $roleId,
        private string $reminder,
        private string $expirationTime,
        private string $redirectTarget,
        private bool $isFullDeclined,
        private bool $isEmbedded,
        private string $isDocumentLocked,
        private DeclinedCollection $declined,
        private string $deliveryType,
        private string $idVerificationRequired,
        private string $idVerified,
        private EmbeddedSignerCollection $embeddedSigner,
        private ?string $language,
        private ?string $signerPhoneInvite = null,
        private string $passwordType = '',
        private string $passwordMethod = '',
        private string $reassign = '0',
        private ?string $pfrmerchantAccountName = null,
        private ?string $redirectUri = null,
        private ?string $declineRedirectUri = null,
        private ?string $closeRedirectUri = null,
        private string $isDraftExists = '0',
        private ?string $requiredPresetSignatureName = null,
        private ?string $declineBySignature = null,
        private ?int $electronicConsentRequired = null,
        private ?string $paymentRequest = null,
        private ?string $pfrid = null,
        private ?string $pfrtype = null,
        private ?string $pfrmerchantId = null,
        private ?string $pfrstatus = null,
        private ?string $pframount = null,
        private ?string $pfrpaymentTransactionId = null,
        private ?string $pfrcreated = null,
        private ?string $pfrmerchantType = null,
        private ?string $pfrcurrencyName = null,
        private ?string $pfrjsonAttributes = null,
        private ?string $electronicConsentId = null,
        private string $stripeAchBankAccountVerified = '0',
        private string $stripeAchBankAccountPresent = '0',
        private ?string $prefillSignatureName = null,
        private int $forceNewSignature = 0,
        private ?string $signingInstructions = null,
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

    public function getSignerPhoneInvite(): ?string
    {
        return $this->signerPhoneInvite;
    }

    public function getStatus(): string
    {
        return $this->status;
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

    public function getPfrmerchantAccountName(): ?string
    {
        return $this->pfrmerchantAccountName;
    }

    public function getCreated(): string
    {
        return $this->created;
    }

    public function getUpdated(): string
    {
        return $this->updated;
    }

    public function getEmailGroup(): EmailGroup
    {
        return $this->emailGroup;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getEmailStatuses(): EmailstatusCollection
    {
        return $this->emailStatuses;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function getRoleId(): string
    {
        return $this->roleId;
    }

    public function getReminder(): string
    {
        return $this->reminder;
    }

    public function getExpirationTime(): string
    {
        return $this->expirationTime;
    }

    public function getRedirectUri(): ?string
    {
        return $this->redirectUri;
    }

    public function getDeclineRedirectUri(): ?string
    {
        return $this->declineRedirectUri;
    }

    public function getCloseRedirectUri(): ?string
    {
        return $this->closeRedirectUri;
    }

    public function getRedirectTarget(): string
    {
        return $this->redirectTarget;
    }

    public function getIsDraftExists(): string
    {
        return $this->isDraftExists;
    }

    public function isFullDeclined(): bool
    {
        return $this->isFullDeclined;
    }

    public function isEmbedded(): bool
    {
        return $this->isEmbedded;
    }

    public function getIsDocumentLocked(): string
    {
        return $this->isDocumentLocked;
    }

    public function getDeclined(): DeclinedCollection
    {
        return $this->declined;
    }

    public function getRequiredPresetSignatureName(): ?string
    {
        return $this->requiredPresetSignatureName;
    }

    public function getDeclineBySignature(): ?string
    {
        return $this->declineBySignature;
    }

    public function getElectronicConsentRequired(): ?int
    {
        return $this->electronicConsentRequired;
    }

    public function getPaymentRequest(): ?string
    {
        return $this->paymentRequest;
    }

    public function getDeliveryType(): string
    {
        return $this->deliveryType;
    }

    public function getPfrid(): ?string
    {
        return $this->pfrid;
    }

    public function getPfrtype(): ?string
    {
        return $this->pfrtype;
    }

    public function getPfrmerchantId(): ?string
    {
        return $this->pfrmerchantId;
    }

    public function getPfrstatus(): ?string
    {
        return $this->pfrstatus;
    }

    public function getPframount(): ?string
    {
        return $this->pframount;
    }

    public function getPfrpaymentTransactionId(): ?string
    {
        return $this->pfrpaymentTransactionId;
    }

    public function getPfrcreated(): ?string
    {
        return $this->pfrcreated;
    }

    public function getPfrmerchantType(): ?string
    {
        return $this->pfrmerchantType;
    }

    public function getPfrcurrencyName(): ?string
    {
        return $this->pfrcurrencyName;
    }

    public function getPfrjsonAttributes(): ?string
    {
        return $this->pfrjsonAttributes;
    }

    public function getIdVerificationRequired(): string
    {
        return $this->idVerificationRequired;
    }

    public function getIdVerified(): string
    {
        return $this->idVerified;
    }

    public function getElectronicConsentId(): ?string
    {
        return $this->electronicConsentId;
    }

    public function getStripeAchBankAccountVerified(): string
    {
        return $this->stripeAchBankAccountVerified;
    }

    public function getStripeAchBankAccountPresent(): string
    {
        return $this->stripeAchBankAccountPresent;
    }

    public function getEmbeddedSigner(): EmbeddedSignerCollection
    {
        return $this->embeddedSigner;
    }

    public function getPrefillSignatureName(): ?string
    {
        return $this->prefillSignatureName;
    }

    public function getForceNewSignature(): int
    {
        return $this->forceNewSignature;
    }

    public function getSigningInstructions(): ?string
    {
        return $this->signingInstructions;
    }

    public function getSignatureType(): ?string
    {
        return $this->signatureType;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'signer_user_id' => $this->getSignerUserId(),
           'signer_phone_invite' => $this->getSignerPhoneInvite(),
           'status' => $this->getStatus(),
           'password_protected' => $this->getPasswordProtected(),
           'password_type' => $this->getPasswordType(),
           'password_method' => $this->getPasswordMethod(),
           'reassign' => $this->getReassign(),
           'pfrmerchant_account_name' => $this->getPfrmerchantAccountName(),
           'created' => $this->getCreated(),
           'updated' => $this->getUpdated(),
           'email_group' => $this->getEmailGroup(),
           'email' => $this->getEmail(),
           'email_statuses' => $this->getEmailStatuses()->toArray(),
           'role' => $this->getRole(),
           'role_id' => $this->getRoleId(),
           'reminder' => $this->getReminder(),
           'expiration_time' => $this->getExpirationTime(),
           'redirect_uri' => $this->getRedirectUri(),
           'decline_redirect_uri' => $this->getDeclineRedirectUri(),
           'close_redirect_uri' => $this->getCloseRedirectUri(),
           'redirect_target' => $this->getRedirectTarget(),
           'is_draft_exists' => $this->getIsDraftExists(),
           'is_full_declined' => $this->IsFullDeclined(),
           'is_embedded' => $this->IsEmbedded(),
           'is_document_locked' => $this->getIsDocumentLocked(),
           'declined' => $this->getDeclined()->toArray(),
           'required_preset_signature_name' => $this->getRequiredPresetSignatureName(),
           'decline_by_signature' => $this->getDeclineBySignature(),
           'electronic_consent_required' => $this->getElectronicConsentRequired(),
           'payment_request' => $this->getPaymentRequest(),
           'delivery_type' => $this->getDeliveryType(),
           'pfrid' => $this->getPfrid(),
           'pfrtype' => $this->getPfrtype(),
           'pfrmerchant_id' => $this->getPfrmerchantId(),
           'pfrstatus' => $this->getPfrstatus(),
           'pframount' => $this->getPframount(),
           'pfrpayment_transaction_id' => $this->getPfrpaymentTransactionId(),
           'pfrcreated' => $this->getPfrcreated(),
           'pfrmerchant_type' => $this->getPfrmerchantType(),
           'pfrcurrency_name' => $this->getPfrcurrencyName(),
           'pfrjson_attributes' => $this->getPfrjsonAttributes(),
           'id_verification_required' => $this->getIdVerificationRequired(),
           'id_verified' => $this->getIdVerified(),
           'electronic_consent_id' => $this->getElectronicConsentId(),
           'stripe_ach_bank_account_verified' => $this->getStripeAchBankAccountVerified(),
           'stripe_ach_bank_account_present' => $this->getStripeAchBankAccountPresent(),
           'embedded_signer' => $this->getEmbeddedSigner()->toArray(),
           'prefill_signature_name' => $this->getPrefillSignatureName(),
           'force_new_signature' => $this->getForceNewSignature(),
           'signing_instructions' => $this->getSigningInstructions(),
           'signature_type' => $this->getSignatureType(),
           'language' => $this->getLanguage(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['signer_user_id'],
            $data['status'],
            $data['password_protected'],
            $data['created'],
            $data['updated'],
            EmailGroup::fromArray($data['email_group']),
            $data['email'],
            new EmailstatusCollection($data['email_statuses']),
            $data['role'],
            $data['role_id'],
            $data['reminder'],
            $data['expiration_time'],
            $data['redirect_target'],
            $data['is_full_declined'],
            $data['is_embedded'],
            $data['is_document_locked'],
            new DeclinedCollection($data['declined']),
            $data['delivery_type'],
            $data['id_verification_required'],
            $data['id_verified'],
            new EmbeddedSignerCollection($data['embedded_signer']),
            $data['language'],
            $data['signer_phone_invite'] ?? null,
            $data['password_type'] ?? '',
            $data['password_method'] ?? '',
            $data['reassign'] ?? '0',
            $data['pfrmerchant_account_name'] ?? null,
            $data['redirect_uri'] ?? null,
            $data['decline_redirect_uri'] ?? null,
            $data['close_redirect_uri'] ?? null,
            $data['is_draft_exists'] ?? '0',
            $data['required_preset_signature_name'] ?? null,
            $data['decline_by_signature'] ?? null,
            $data['electronic_consent_required'] ?? null,
            $data['payment_request'] ?? null,
            $data['pfrid'] ?? null,
            $data['pfrtype'] ?? null,
            $data['pfrmerchant_id'] ?? null,
            $data['pfrstatus'] ?? null,
            $data['pframount'] ?? null,
            $data['pfrpayment_transaction_id'] ?? null,
            $data['pfrcreated'] ?? null,
            $data['pfrmerchant_type'] ?? null,
            $data['pfrcurrency_name'] ?? null,
            $data['pfrjson_attributes'] ?? null,
            $data['electronic_consent_id'] ?? null,
            $data['stripe_ach_bank_account_verified'] ?? '0',
            $data['stripe_ach_bank_account_present'] ?? '0',
            $data['prefill_signature_name'] ?? null,
            $data['force_new_signature'] ?? 0,
            $data['signing_instructions'] ?? null,
            $data['signature_type'] ?? null,
        );
    }
}
