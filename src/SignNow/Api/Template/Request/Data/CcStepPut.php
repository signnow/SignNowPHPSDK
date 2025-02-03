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

namespace SignNow\Api\Template\Request\Data;

readonly class CcStepPut
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
