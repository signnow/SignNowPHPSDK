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

namespace SignNow\Api\DocumentInvite\Request\Data;

readonly class To
{
    public function __construct(
        private string $email,
        private string $roleId,
        private string $role,
        private int $order,
        private string $subject,
        private string $message,
        private ?EmailGroup $emailGroup = null,
        private string $prefillSignatureName = '',
        private string $requiredPresetSignatureName = '',
        private int $forceNewSignature = 0,
        private string $reassign = '',
        private string $declineBySignature = '',
        private ?int $reminder = null,
        private ?int $expirationDays = null,
        private string $authenticationType = '',
        private string $password = '',
        private string $phone = '',
        private string $phoneInvite = '',
        private string $method = '',
        private string $authenticationSmsMessage = '',
        private string $redirectUri = '',
        private string $declineRedirectUri = '',
        private string $closeRedirectUri = '',
        private string $redirectTarget = '',
        private string $language = '',
        private ?Signature $signature = null,
    ) {
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getRoleId(): string
    {
        return $this->roleId;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function getOrder(): int
    {
        return $this->order;
    }

    public function getEmailGroup(): ?EmailGroup
    {
        return $this->emailGroup;
    }

    public function getPrefillSignatureName(): string
    {
        return $this->prefillSignatureName;
    }

    public function getRequiredPresetSignatureName(): string
    {
        return $this->requiredPresetSignatureName;
    }

    public function getForceNewSignature(): int
    {
        return $this->forceNewSignature;
    }

    public function getReassign(): string
    {
        return $this->reassign;
    }

    public function getDeclineBySignature(): string
    {
        return $this->declineBySignature;
    }

    public function getReminder(): ?int
    {
        return $this->reminder;
    }

    public function getExpirationDays(): ?int
    {
        return $this->expirationDays;
    }

    public function getAuthenticationType(): string
    {
        return $this->authenticationType;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getPhoneInvite(): string
    {
        return $this->phoneInvite;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getAuthenticationSmsMessage(): string
    {
        return $this->authenticationSmsMessage;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getRedirectUri(): string
    {
        return $this->redirectUri;
    }

    public function getDeclineRedirectUri(): string
    {
        return $this->declineRedirectUri;
    }

    public function getCloseRedirectUri(): string
    {
        return $this->closeRedirectUri;
    }

    public function getRedirectTarget(): string
    {
        return $this->redirectTarget;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function getSignature(): ?Signature
    {
        return $this->signature;
    }

    public function toArray(): array
    {
        return [
           'email' => $this->getEmail(),
           'role_id' => $this->getRoleId(),
           'role' => $this->getRole(),
           'order' => $this->getOrder(),
           'email_group' => $this->getEmailGroup(),
           'prefill_signature_name' => $this->getPrefillSignatureName(),
           'required_preset_signature_name' => $this->getRequiredPresetSignatureName(),
           'force_new_signature' => $this->getForceNewSignature(),
           'reassign' => $this->getReassign(),
           'decline_by_signature' => $this->getDeclineBySignature(),
           'reminder' => $this->getReminder(),
           'expiration_days' => $this->getExpirationDays(),
           'authentication_type' => $this->getAuthenticationType(),
           'password' => $this->getPassword(),
           'phone' => $this->getPhone(),
           'phone_invite' => $this->getPhoneInvite(),
           'method' => $this->getMethod(),
           'authentication_sms_message' => $this->getAuthenticationSmsMessage(),
           'subject' => $this->getSubject(),
           'message' => $this->getMessage(),
           'redirect_uri' => $this->getRedirectUri(),
           'decline_redirect_uri' => $this->getDeclineRedirectUri(),
           'close_redirect_uri' => $this->getCloseRedirectUri(),
           'redirect_target' => $this->getRedirectTarget(),
           'language' => $this->getLanguage(),
           'signature' => $this->getSignature(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['email'],
            $data['role_id'],
            $data['role'],
            $data['order'],
            $data['subject'],
            $data['message'],
            isset($data['email_group']) ? EmailGroup::fromArray($data['email_group']) : null,
            $data['prefill_signature_name'] ?? '',
            $data['required_preset_signature_name'] ?? '',
            $data['force_new_signature'] ?? 0,
            $data['reassign'] ?? '',
            $data['decline_by_signature'] ?? '',
            $data['reminder'] ?? null,
            $data['expiration_days'] ?? null,
            $data['authentication_type'] ?? '',
            $data['password'] ?? '',
            $data['phone'] ?? '',
            $data['phone_invite'] ?? '',
            $data['method'] ?? '',
            $data['authentication_sms_message'] ?? '',
            $data['redirect_uri'] ?? '',
            $data['decline_redirect_uri'] ?? '',
            $data['close_redirect_uri'] ?? '',
            $data['redirect_target'] ?? '',
            $data['language'] ?? '',
            isset($data['signature']) ? Signature::fromArray($data['signature']) : null,
        );
    }
}
