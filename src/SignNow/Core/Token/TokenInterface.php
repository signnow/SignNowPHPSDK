<?php

declare(strict_types=1);

namespace SignNow\Core\Token;

interface TokenInterface
{
    public function type(): string;
    public function token(): string;
}
