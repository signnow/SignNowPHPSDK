<?php

declare(strict_types=1);

namespace SignNow\Core\Request;

interface RequestInterface
{
    public function uriParams(): array;
    public function toArray(): array;
}
