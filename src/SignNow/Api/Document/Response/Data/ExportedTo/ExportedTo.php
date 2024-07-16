<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data\ExportedTo;

readonly class ExportedTo
{
    public function __construct(
        private string $exportDomain,
        private bool $isExported,
        private ExportedUserIdCollection $exportedUserIds,
        private StorageCollection $storages = new StorageCollection(),
    ) {
    }

    public function getExportDomain(): string
    {
        return $this->exportDomain;
    }

    public function isExported(): bool
    {
        return $this->isExported;
    }

    public function getExportedUserIds(): ExportedUserIdCollection
    {
        return $this->exportedUserIds;
    }

    public function getStorages(): StorageCollection
    {
        return $this->storages;
    }

    public function toArray(): array
    {
        return [
           'export_domain' => $this->getExportDomain(),
           'is_exported' => $this->IsExported(),
           'exported_user_ids' => $this->getExportedUserIds()->toArray(),
           'storages' => $this->getStorages()->toArray(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['export_domain'],
            $data['is_exported'],
            new ExportedUserIdCollection($data['exported_user_ids']),
            new StorageCollection($data['storages']),
        );
    }
}
