<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentInvite\Response\Data\Meta;

readonly class Pagination
{
    public function __construct(
        private int $total,
        private int $count,
        private int $perPage,
        private int $currentPage,
        private int $totalPages,
        private LinkCollection $links,
    ) {
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function getPerPage(): int
    {
        return $this->perPage;
    }

    public function getCurrentPage(): int
    {
        return $this->currentPage;
    }

    public function getTotalPages(): int
    {
        return $this->totalPages;
    }

    public function getLinks(): LinkCollection
    {
        return $this->links;
    }

    public function toArray(): array
    {
        return [
           'total' => $this->getTotal(),
           'count' => $this->getCount(),
           'per_page' => $this->getPerPage(),
           'current_page' => $this->getCurrentPage(),
           'total_pages' => $this->getTotalPages(),
           'links' => $this->getLinks()->toArray(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['total'],
            $data['count'],
            $data['per_page'],
            $data['current_page'],
            $data['total_pages'],
            new LinkCollection($data['links']),
        );
    }
}
