<?php

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
           'pagination' => $this->getPagination(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            Pagination::fromArray($data['pagination']),
        );
    }
}
