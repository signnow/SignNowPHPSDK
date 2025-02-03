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

namespace SignNow\Api\Document\Response\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class TagCollection extends TypedCollection
{
    public function add(Tag $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof Tag) {
            throw new InvalidArgumentException('Only Tag are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return Tag::class;
    }
}
