<?php

declare(strict_types=1);

namespace SignNow\Api\User\Response\Data;

readonly class Organization
{
    public function __construct(
        private bool $isAdmin,
        private bool $isSuperadmin,
        private bool $isWorkspace,
        private string $id = '',
        private string $name = '',
        private string $deleted = '',
        private string $created = '',
        private string $updated = '',
        private DomainCollection $domains = new DomainCollection(),
        private LogoCollection $logos = new LogoCollection(),
        private ActiveLogoCollection $activeLogo = new ActiveLogoCollection(),
        private TeamCollection $teams = new TeamCollection(),
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDeleted(): string
    {
        return $this->deleted;
    }

    public function getCreated(): string
    {
        return $this->created;
    }

    public function getUpdated(): string
    {
        return $this->updated;
    }

    public function getDomains(): DomainCollection
    {
        return $this->domains;
    }

    public function getLogos(): LogoCollection
    {
        return $this->logos;
    }

    public function getActiveLogo(): ActiveLogoCollection
    {
        return $this->activeLogo;
    }

    public function getTeams(): TeamCollection
    {
        return $this->teams;
    }

    public function isAdmin(): bool
    {
        return $this->isAdmin;
    }

    public function isSuperadmin(): bool
    {
        return $this->isSuperadmin;
    }

    public function isWorkspace(): bool
    {
        return $this->isWorkspace;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'name' => $this->getName(),
           'deleted' => $this->getDeleted(),
           'created' => $this->getCreated(),
           'updated' => $this->getUpdated(),
           'domains' => $this->getDomains()->toArray(),
           'logos' => $this->getLogos()->toArray(),
           'active_logo' => $this->getActiveLogo()->toArray(),
           'teams' => $this->getTeams()->toArray(),
           'is_admin' => $this->IsAdmin(),
           'is_superadmin' => $this->IsSuperadmin(),
           'is_workspace' => $this->IsWorkspace(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['is_admin'],
            $data['is_superadmin'],
            $data['is_workspace'],
            $data['id'] ?? '',
            $data['name'] ?? '',
            $data['deleted'] ?? '',
            $data['created'] ?? '',
            $data['updated'] ?? '',
            new DomainCollection($data['domains']),
            new LogoCollection($data['logos']),
            new ActiveLogoCollection($data['active_logo']),
            new TeamCollection($data['teams']),
        );
    }
}
