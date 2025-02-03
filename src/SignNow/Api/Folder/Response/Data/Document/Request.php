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
