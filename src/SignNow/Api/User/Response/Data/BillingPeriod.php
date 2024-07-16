<?php

declare(strict_types=1);

namespace SignNow\Api\User\Response\Data;

readonly class BillingPeriod
{
    public function __construct(
        private string $startDate,
        private string $endDate,
        private int $startTimestamp,
        private int $endTimestamp,
    ) {
    }

    public function getStartDate(): string
    {
        return $this->startDate;
    }

    public function getEndDate(): string
    {
        return $this->endDate;
    }

    public function getStartTimestamp(): int
    {
        return $this->startTimestamp;
    }

    public function getEndTimestamp(): int
    {
        return $this->endTimestamp;
    }

    public function toArray(): array
    {
        return [
           'start_date' => $this->getStartDate(),
           'end_date' => $this->getEndDate(),
           'start_timestamp' => $this->getStartTimestamp(),
           'end_timestamp' => $this->getEndTimestamp(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['start_date'],
            $data['end_date'],
            $data['start_timestamp'],
            $data['end_timestamp'],
        );
    }
}
