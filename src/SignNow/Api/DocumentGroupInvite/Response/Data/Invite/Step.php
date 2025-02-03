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

namespace SignNow\Api\DocumentGroupInvite\Response\Data\Invite;

readonly class Step
{
    public function __construct(
        private string $id,
        private string $status,
        private int $order,
        private ActionCollection $actions,
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

    public function getOrder(): int
    {
        return $this->order;
    }

    public function getActions(): ActionCollection
    {
        return $this->actions;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'status' => $this->getStatus(),
           'order' => $this->getOrder(),
           'actions' => $this->getActions()->toArray(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['status'],
            $data['order'],
            new ActionCollection($data['actions']),
        );
    }
}
