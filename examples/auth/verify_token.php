<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../SignNowExampleData.php';

use SignNow\Api\Auth\Request\TokenGet;
use SignNow\Api\Auth\Response\TokenGet as TokenGetResponse;
use SignNow\Core\Token\BearerToken;
use SignNow\Exception\Output\ErrorOutput;
use SignNow\Sdk;

try {
    // Fill in your actual data in examples/signnow-example-config.php before running
    $data = new SignNowExampleData();
    $bearerToken = $data->getBearerToken();

    $sdk = new Sdk();
    $apiClient = $sdk->build()
        ->withBearerToken(new BearerToken($bearerToken))
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
