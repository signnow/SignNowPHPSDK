<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentGroupInvite\Request\Data\InviteStep;

readonly class EmailGroup
{
    public function __construct(
        private string $name = '',
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function toArray(): array
    {
        return [
           'name' => $this->getName(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'] ?? '',
        );
    }
}
