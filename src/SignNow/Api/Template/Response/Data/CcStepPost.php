<?php

declare(strict_types=1);

namespace SignNow\Api\Template\Response\Data;

readonly class CcStepPost
{
    public function __construct(
        private string $email,
        private string $name,
        private int $step,
    ) {
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getStep(): int
    {
        return $this->step;
    }

    public function toArray(): array
    {
        return [
           'email' => $this->getEmail(),
           'name' => $this->getName(),
           'step' => $this->getStep(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['email'],
            $data['name'],
            $data['step'],
        );
    }
}
