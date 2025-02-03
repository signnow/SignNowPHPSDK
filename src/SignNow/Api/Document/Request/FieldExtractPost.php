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

namespace SignNow\Api\Document\Request;

use SignNow\Api\Document\Request\Data\Tag\TagCollection;
use Symfony\Component\Serializer\Annotation\SerializedName;
use SplFileInfo;
use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'uploadDocumentWithTagsExtract',
    url: '/document/fieldextract',
    method: 'post',
    auth: 'bearer',
    namespace: 'document',
    entity: 'fieldExtract',
    type: 'multipart/form-data',
)]
final class FieldExtractPost implements RequestInterface
{
    public function __construct(
        private SplFileInfo $file,
        #[SerializedName('Tags')]
        private TagCollection $tags = new TagCollection(),
        private string $parseType = 'default',
        private ?string $password = null,
        private int $clientTimestamp = 0,
    ) {
    }

    public function getFile(): SplFileInfo
    {
        return $this->file;
    }

    public function getTags(): TagCollection
    {
        return $this->tags;
    }

    public function getParseType(): string
    {
        return $this->parseType;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function getClientTimestamp(): int
    {
        return $this->clientTimestamp;
    }


    public function uriParams(): array
    {
        return [];
    }

    public function toArray(): array
    {
        return [
           'file' => $this->getFile(),
           'Tags' => $this->getTags()->toJson(),
           'parse_type' => $this->getParseType(),
           'password' => $this->getPassword(),
           'client_timestamp' => $this->getClientTimestamp(),
        ];
    }
}
