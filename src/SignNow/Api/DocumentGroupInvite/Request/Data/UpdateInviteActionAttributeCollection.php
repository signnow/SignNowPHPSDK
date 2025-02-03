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

namespace SignNow\Api\DocumentGroupInvite\Request\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class UpdateInviteActionAttributeCollection extends TypedCollection
{
    public function add(UpdateInviteActionAttribute $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof UpdateInviteActionAttribute) {
            throw new InvalidArgumentException('Only UpdateInviteActionAttribute are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return UpdateInviteActionAttribute::class;
    }
}
