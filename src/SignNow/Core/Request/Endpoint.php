<?php

declare(strict_types=1);

namespace SignNow\Core\Request;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
readonly class Endpoint
{
    public function __construct(
        public string $name,
        public string $url,
        public string $method,
        public string $auth,
        public string $namespace,
        public string $entity,
        public string $type,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getAuthType(): string
    {
        return ucfirst($this->auth);
    }

    public function getNamespace(): string
    {
        return $this->namespace;
    }

    public function getEntity(): string
    {
        return $this->entity;
    }

    public function getContentType(): string
    {
        return $this->type;
    }
}
