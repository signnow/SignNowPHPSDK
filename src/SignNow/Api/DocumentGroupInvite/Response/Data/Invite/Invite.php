<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentGroupInvite\Response\Data\Invite;

readonly class Invite
{
    public function __construct(
        private string $id,
        private string $status,
        private StepCollection $steps,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getSteps(): StepCollection
    {
        return $this->steps;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'status' => $this->getStatus(),
           'steps' => $this->getSteps()->toArray(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['status'],
            new StepCollection($data['steps']),
        );
    }
}
