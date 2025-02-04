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

namespace SignNow\Api\Template\Response;

readonly class GroupTemplateGet
{
    public function __construct(
        private string $id,
        private string $name,
        private string $filename,
        private int $pageCount,
        private int $created,
        private int $updated,
        private string $editorLink,
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

    public function getFilename(): string
    {
        return $this->filename;
    }

    public function getPageCount(): int
    {
        return $this->pageCount;
    }

    public function getCreated(): int
    {
        return $this->created;
    }

    public function getUpdated(): int
    {
        return $this->updated;
    }

    public function getEditorLink(): string
    {
        return $this->editorLink;
    }
}
