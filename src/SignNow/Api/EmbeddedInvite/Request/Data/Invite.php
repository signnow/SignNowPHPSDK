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

namespace SignNow\Api\EmbeddedInvite\Request\Data;

readonly class Invite
{
    public function __construct(
        private string $email,
        private string $roleId,
        private int $order,
        private string $authMethod,
        private string $language = '',
        private string $firstName = '',
        private string $lastName = '',
        private string $prefillSignatureName = '',
        private string $requiredPresetSignatureName = '',
        private int $forceNewSignature = 0,
        private string $redirectUri = '',
        private string $declineRedirectUri = '',
        private string $redirectTarget = '',
        private ?Authentication $authentication = null,
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

    public function getOrder(): int
    {
        return $this->order;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function getAuthMethod(): string
    {
        return $this->authMethod;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
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

    public function getAuthentication(): ?Authentication
    {
        return $this->authentication;
    }

    public function toArray(): array
    {
        return [
           'email' => $this->getEmail(),
           'role_id' => $this->getRoleId(),
           'order' => $this->getOrder(),
           'language' => $this->getLanguage(),
           'auth_method' => $this->getAuthMethod(),
           'first_name' => $this->getFirstName(),
           'last_name' => $this->getLastName(),
           'prefill_signature_name' => $this->getPrefillSignatureName(),
           'required_preset_signature_name' => $this->getRequiredPresetSignatureName(),
           'force_new_signature' => $this->getForceNewSignature(),
           'redirect_uri' => $this->getRedirectUri(),
           'decline_redirect_uri' => $this->getDeclineRedirectUri(),
           'redirect_target' => $this->getRedirectTarget(),
           'authentication' => !is_null($this->getAuthentication()) ? $this->getAuthentication()->toArray() : null,
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['email'],
            $data['role_id'],
            $data['order'],
            $data['auth_method'],
            $data['language'] ?? '',
            $data['first_name'] ?? '',
            $data['last_name'] ?? '',
            $data['prefill_signature_name'] ?? '',
            $data['required_preset_signature_name'] ?? '',
            $data['force_new_signature'] ?? 0,
            $data['redirect_uri'] ?? '',
            $data['decline_redirect_uri'] ?? '',
            $data['redirect_target'] ?? '',
            isset($data['authentication']) ? Authentication::fromArray($data['authentication']) : null,
        );
    }
}
