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

namespace SignNow\Api\DocumentInvite\Response\Data\Meta;

readonly class Meta
{
    public function __construct(
        private Pagination $pagination,
    ) {
    }

    public function getPagination(): Pagination
    {
        return $this->pagination;
    }

    public function toArray(): array
    {
        return [
           'pagination' => $this->getPagination()->toArray(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            Pagination::fromArray($data['pagination']),
        );
    }
}
