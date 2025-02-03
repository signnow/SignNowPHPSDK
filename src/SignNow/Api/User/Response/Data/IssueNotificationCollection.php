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

namespace SignNow\Api\User\Response\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class IssueNotificationCollection extends TypedCollection
{
    public function add(IssueNotification $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof IssueNotification) {
            throw new InvalidArgumentException('Only IssueNotification are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return IssueNotification::class;
    }
}
