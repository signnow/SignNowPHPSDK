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

namespace SignNow\Api\User\Response\Data\Team;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class AdminCollection extends TypedCollection
{
    public function add(Admin $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof Admin) {
            throw new InvalidArgumentException('Only Admin are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return Admin::class;
    }
}
