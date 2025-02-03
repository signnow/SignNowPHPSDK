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

namespace SignNow\Sdk\Tests\Core\Mock;

use Mcustiel\Phiremock\Server\Factory\Factory as PhiremockServerFactory;
use GuzzleHttp;
use Psr\Http\Client\ClientInterface;

class PhiremockFactory extends PhiremockServerFactory
{
    public function createRemoteConnection(): ClientInterface
    {
        return new GuzzleHttp\Client();
    }
}
