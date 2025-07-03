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

namespace SignNow\Api\DocumentGroup\Request\Data\Recipient;

readonly class Reminder
{
    public function __construct(
        private int $remindAfter = 0,
        private int $remindBefore = 0,
        private int $remindRepeat = 0,
    ) {
    }

    public function getRemindAfter(): int
    {
        return $this->remindAfter;
    }

    public function getRemindBefore(): int
    {
        return $this->remindBefore;
    }

    public function getRemindRepeat(): int
    {
        return $this->remindRepeat;
    }

    public function toArray(): array
    {
        return [
           'remind_after' => $this->getRemindAfter(),
           'remind_before' => $this->getRemindBefore(),
           'remind_repeat' => $this->getRemindRepeat(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['remind_after'] ?? 0,
            $data['remind_before'] ?? 0,
            $data['remind_repeat'] ?? 0,
        );
    }
}
