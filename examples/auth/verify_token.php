<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

use SignNow\Api\Auth\Request\TokenGet;
use SignNow\Api\Auth\Response\TokenGet as TokenGetResponse;
use SignNow\Exception\Output\ErrorOutput;
use SignNow\Sdk;

try {
    $sdk = new Sdk();
    $apiClient = $sdk->build()
        ->authenticate()
        ->getApiClient();

    $request = new TokenGet();

    /** @var TokenGetResponse $response */
    $response = $apiClient->send($request);
    echo "Bearer token: {$response->getAccessToken()}\n";
    echo "Token scope: {$response->getScope()}\n";
    echo "Token expires in: {$response->getExpiresIn()}\n";
} catch (Throwable $e) {
    (new ErrorOutput())->displayException($e);
}
