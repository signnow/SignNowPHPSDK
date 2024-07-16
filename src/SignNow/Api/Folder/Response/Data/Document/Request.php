<?php

declare(strict_types=1);

namespace SignNow\Api\Folder\Response\Data\Document;

readonly class Request
{
    public function __construct(
        private EmailSentstatusCollection $emailSentStatuses,
    ) {
    }

    public function getEmailSentStatuses(): EmailSentstatusCollection
    {
        return $this->emailSentStatuses;
    }

    public function toArray(): array
    {
        return [
           'email_sent_statuses' => $this->getEmailSentStatuses()->toArray(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            new EmailSentstatusCollection($data['email_sent_statuses']),
        );
    }
}
