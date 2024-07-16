<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentInvite\Request\Data;

readonly class CcStep
{
    public function __construct(
        private string $name,
        private string $email,
        private int $step,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getStep(): int
    {
        return $this->step;
    }

    public function toArray(): array
    {
        return [
           'name' => $this->getName(),
           'email' => $this->getEmail(),
           'step' => $this->getStep(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'],
            $data['email'],
            $data['step'],
        );
    }
}
