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

namespace SignNow\Api\DocumentGroupInvite\Request\Data\EmailGroup;

readonly class EmailGroup
{
    public function __construct(
        private string $id,
        private string $name,
        private EmailCollection $emails = new EmailCollection(),
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmails(): EmailCollection
    {
        return $this->emails;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'name' => $this->getName(),
           'emails' => !is_null($this->getEmails()) ? $this->getEmails()->toArray() : null,
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['name'],
            new EmailCollection($data['emails']),
        );
    }
}
