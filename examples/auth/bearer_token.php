<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

use SignNow\Api\Auth\Request\TokenPost;
use SignNow\Api\Auth\Response\TokenPost as TokenPostResponse;
use SignNow\Core\Token\BearerToken;
use SignNow\Exception\Output\ErrorOutput;
use SignNow\Sdk;

/**
 * This example describes how to obtain a bearer token using the password grant type.
 *
 * The bearer token is used to authenticate requests to the SignNow API.
 *
 * @link https://docs.signnow.com/docs/signnow/oauth2/operations/create-a-oauth-2-token
 */
try {
    $sdk = new Sdk();
    $apiClient = $sdk->build()->getApiClient();

    // source data
    $username = 'YOUR_USERNAME';
    $password = 'YOUR_PASSWORD';

    $request = new TokenPost(
        username: $username,
        password: $password,
        grantType: 'password'
    );

    /** @var TokenPostResponse $response */
    $response = $apiClient->send($request);
    echo "Bearer token: {$response->getAccessToken()}\n";
    echo "Refresh token: {$response->getRefreshToken()}\n";
    echo "Token scope: {$response->getScope()}\n";
    echo "Token expires at: {$response->getExpiresIn()}\n";

    // Set the bearer token to the API client for further requests
    $apiClient->setBearerToken(
        new BearerToken(
            $response->getAccessToken(),
            $response->getRefreshToken(),
            $response->getExpiresIn()
        )
    );
} catch (Throwable $e) {
    (new ErrorOutput())->displayException($e);
}
