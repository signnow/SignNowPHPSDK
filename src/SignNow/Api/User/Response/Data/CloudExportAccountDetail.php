<?php

declare(strict_types=1);

namespace SignNow\Api\User\Response\Data;

readonly class CloudExportAccountDetail
{
    public function __construct(
        private ?string $username = null,
        private ?string $shortFilesServicename = null,
        private ?string $longFilesServicename = null,
    ) {
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function getShortFilesServicename(): ?string
    {
        return $this->shortFilesServicename;
    }

    public function getLongFilesServicename(): ?string
    {
        return $this->longFilesServicename;
    }

    public function toArray(): array
    {
        return [
           'username' => $this->getUsername(),
           'short_files_servicename' => $this->getShortFilesServicename(),
           'long_files_servicename' => $this->getLongFilesServicename(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['username'] ?? null,
            $data['short_files_servicename'] ?? null,
            $data['long_files_servicename'] ?? null,
        );
    }
}
