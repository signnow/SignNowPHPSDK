<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data\ViewerFieldInvite;

readonly class ViewerFieldInvite
{
    public function __construct(
        private string $id,
        private string $status,
        private string $created,
        private string $updated,
        private string $email,
        private string $redirectTarget,
        private EmailGroup $emailGroup,
        private EmailstatusCollection $emailStatuses,
        private ?string $signerUserId = null,
        private ?string $role = null,
        private ?string $roleId = null,
        private ?string $closeRedirectUri = null,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getSignerUserId(): ?string
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

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getRoleId(): ?string
    {
        return $this->roleId;
    }

    public function getCloseRedirectUri(): ?string
    {
        return $this->closeRedirectUri;
    }

    public function getRedirectTarget(): string
    {
        return $this->redirectTarget;
    }

    public function getEmailGroup(): EmailGroup
    {
        return $this->emailGroup;
    }

    public function getEmailStatuses(): EmailstatusCollection
    {
        return $this->emailStatuses;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'signer_user_id' => $this->getSignerUserId(),
           'status' => $this->getStatus(),
           'created' => $this->getCreated(),
           'updated' => $this->getUpdated(),
           'role' => $this->getRole(),
           'email' => $this->getEmail(),
           'role_id' => $this->getRoleId(),
           'close_redirect_uri' => $this->getCloseRedirectUri(),
           'redirect_target' => $this->getRedirectTarget(),
           'email_group' => $this->getEmailGroup(),
           'email_statuses' => $this->getEmailStatuses()->toArray(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['status'],
            $data['created'],
            $data['updated'],
            $data['email'],
            $data['redirect_target'],
            EmailGroup::fromArray($data['email_group']),
            new EmailstatusCollection($data['email_statuses']),
            $data['signer_user_id'] ?? null,
            $data['role'] ?? null,
            $data['role_id'] ?? null,
            $data['close_redirect_uri'] ?? null,
        );
    }
}
