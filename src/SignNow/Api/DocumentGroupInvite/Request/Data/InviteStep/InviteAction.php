<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentGroupInvite\Request\Data\InviteStep;

readonly class InviteAction
{
    public function __construct(
        private string $email,
        private string $roleName,
        private string $action,
        private string $documentId,
        private ?EmailGroup $emailGroup = null,
        private string $requiredPresetSignatureName = '',
        private string $allowReassign = '',
        private string $declineBySignature = '',
        private ?Authentication $authentication = null,
        private ?PaymentRequest $paymentRequest = null,
        private string $redirectUri = '',
        private string $declineRedirectUri = '',
        private string $redirectTarget = '',
        private string $language = '',
    ) {
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getEmailGroup(): ?EmailGroup
    {
        return $this->emailGroup;
    }

    public function getRoleName(): string
    {
        return $this->roleName;
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function getDocumentId(): string
    {
        return $this->documentId;
    }

    public function getRequiredPresetSignatureName(): string
    {
        return $this->requiredPresetSignatureName;
    }

    public function getAllowReassign(): string
    {
        return $this->allowReassign;
    }

    public function getDeclineBySignature(): string
    {
        return $this->declineBySignature;
    }

    public function getAuthentication(): ?Authentication
    {
        return $this->authentication;
    }

    public function getPaymentRequest(): ?PaymentRequest
    {
        return $this->paymentRequest;
    }

    public function getRedirectUri(): string
    {
        return $this->redirectUri;
    }

    public function getDeclineRedirectUri(): string
    {
        return $this->declineRedirectUri;
    }

    public function getRedirectTarget(): string
    {
        return $this->redirectTarget;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function toArray(): array
    {
        return [
           'email' => $this->getEmail(),
           'email_group' => $this->getEmailGroup(),
           'role_name' => $this->getRoleName(),
           'action' => $this->getAction(),
           'document_id' => $this->getDocumentId(),
           'required_preset_signature_name' => $this->getRequiredPresetSignatureName(),
           'allow_reassign' => $this->getAllowReassign(),
           'decline_by_signature' => $this->getDeclineBySignature(),
           'authentication' => $this->getAuthentication(),
           'payment_request' => $this->getPaymentRequest(),
           'redirect_uri' => $this->getRedirectUri(),
           'decline_redirect_uri' => $this->getDeclineRedirectUri(),
           'redirect_target' => $this->getRedirectTarget(),
           'language' => $this->getLanguage(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['email'],
            $data['role_name'],
            $data['action'],
            $data['document_id'],
            isset($data['email_group']) ? EmailGroup::fromArray($data['email_group']) : null,
            $data['required_preset_signature_name'] ?? '',
            $data['allow_reassign'] ?? '',
            $data['decline_by_signature'] ?? '',
            isset($data['authentication']) ? Authentication::fromArray($data['authentication']) : null,
            isset($data['payment_request']) ? PaymentRequest::fromArray($data['payment_request']) : null,
            $data['redirect_uri'] ?? '',
            $data['decline_redirect_uri'] ?? '',
            $data['redirect_target'] ?? '',
            $data['language'] ?? '',
        );
    }
}
