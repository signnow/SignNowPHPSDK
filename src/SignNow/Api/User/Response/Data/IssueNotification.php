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

namespace SignNow\Api\User\Response\Data;

readonly class IssueNotification
{
    public function __construct(
        private string $title,
        private string $description,
    ) {
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function toArray(): array
    {
        return [
           'title' => $this->getTitle(),
           'description' => $this->getDescription(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['title'],
            $data['description'],
        );
    }
}
