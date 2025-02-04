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

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class RadiobuttonCollection extends TypedCollection
{
    public function add(Radiobutton $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof Radiobutton) {
            throw new InvalidArgumentException('Only Radiobutton are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return Radiobutton::class;
    }
}
