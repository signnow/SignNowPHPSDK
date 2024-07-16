<?php

declare(strict_types=1);

namespace SignNow\Api\User\Response\Data;

readonly class Status
{
    public function __construct(
        private bool $badCopyToken = false,
        private bool $hasCopyToken = false,
        private bool $hasCloudExportToken = false,
        private bool $badCloudExportToken = false,
        private bool $hasSalesforceToken = false,
    ) {
    }

    public function isBadCopyToken(): bool
    {
        return $this->badCopyToken;
    }

    public function hasCopyToken(): bool
    {
        return $this->hasCopyToken;
    }

    public function hasCloudExportToken(): bool
    {
        return $this->hasCloudExportToken;
    }

    public function isBadCloudExportToken(): bool
    {
        return $this->badCloudExportToken;
    }

    public function hasSalesforceToken(): bool
    {
        return $this->hasSalesforceToken;
    }

    public function toArray(): array
    {
        return [
           'bad_copy_token' => $this->isBadCopyToken(),
           'has_copy_token' => $this->HasCopyToken(),
           'has_cloud_export_token' => $this->HasCloudExportToken(),
           'bad_cloud_export_token' => $this->isBadCloudExportToken(),
           'has_salesforce_token' => $this->HasSalesforceToken(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['bad_copy_token'] ?? false,
            $data['has_copy_token'] ?? false,
            $data['has_cloud_export_token'] ?? false,
            $data['bad_cloud_export_token'] ?? false,
            $data['has_salesforce_token'] ?? false,
        );
    }
}
