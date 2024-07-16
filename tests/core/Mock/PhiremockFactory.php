<?php

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
