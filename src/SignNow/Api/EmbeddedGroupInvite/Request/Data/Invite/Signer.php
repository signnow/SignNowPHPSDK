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

namespace SignNow\Api\EmbeddedGroupInvite\Request\Data\Invite;

readonly class Signer
{
    public function __construct(
        private string $email,
        private string $authMethod,
        private DocumentCollection $documents,
        private ?string $firstName = null,
        private ?string $lastName = null,
        private string $language = '',
        private string $requiredPresetSignatureName = '',
        private string $redirectUri = '',
        private string $declineRedirectUri = '',
        private string $redirectTarget = '',
    ) {
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getAuthMethod(): string
    {
        return $this->authMethod;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function getDocuments(): DocumentCollection
    {
        return $this->documents;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function getRequiredPresetSignatureName(): string
    {
        return $this->requiredPresetSignatureName;
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

    public function toArray(): array
    {
        return [
           'email' => $this->getEmail(),
           'auth_method' => $this->getAuthMethod(),
           'first_name' => $this->getFirstName(),
           'last_name' => $this->getLastName(),
           'documents' => $this->getDocuments()->toArray(),
           'language' => $this->getLanguage(),
           'required_preset_signature_name' => $this->getRequiredPresetSignatureName(),
           'redirect_uri' => $this->getRedirectUri(),
           'decline_redirect_uri' => $this->getDeclineRedirectUri(),
           'redirect_target' => $this->getRedirectTarget(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['email'],
            $data['auth_method'],
            new DocumentCollection($data['documents']),
            $data['first_name'] ?? null,
            $data['last_name'] ?? null,
            $data['language'] ?? '',
            $data['required_preset_signature_name'] ?? '',
            $data['redirect_uri'] ?? '',
            $data['decline_redirect_uri'] ?? '',
            $data['redirect_target'] ?? '',
        );
    }
}
