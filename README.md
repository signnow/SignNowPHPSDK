# signNow API PHP SDK
## v3.2.2

[![PHP Version](https://img.shields.io/badge/supported->=8.2-blue?logo=php)](https://php.net/)

### Requirements
- PHP 8.2 or higher
- composer
- cURL extension

### Installation
Get SDK code via composer
```bash
composer require signnow/api-php-sdk:v3
```
or via git
```bash
git clone git@github.com:signnow/SignNowPHPSDK.git
```
Install dependencies
```bash
make install
```

### Configuration
Copy `.env.example` to `.env` and fill your credentials in the required values
```bash
cp .env.example .env
```

### Run tests
To run tests you need to have a valid `.env.test` file with credentials for testing.
If you don't have it, you can create it by copying the `.env.test.dist` file and renaming it to `.env.test`.
However, the file will be created automatically if you just run test execution with the following commands:
```bash
## Run mock server locally
make mock-up
## Run all the tests
make tests
## Run a single test by specified argument
make test T=Document/DocumentTest.php
```
Mock server will be available at `http://0.0.0.0:8086`.

### Usage
To start using the SDK, you need to create a new instance of the SDK API client and authenticate it using the credentials from the `.env` file.
```php

require_once __DIR__ . '/vendor/autoload.php';

use SignNow\ApiClient;
use SignNow\Api\Document\Request\DocumentGet;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk;

$sdk = new Sdk();

try {
    // Method authenticate() will use the credentials from the .env file
    // and create a new bearer token for further requests
    $apiClient = $sdk->build()
        ->authenticate()
        ->getApiClient();
    // Now, you are ready to use the API client to send requests

    // if you want to keep the token, you can use the following code
    $bearerToken = $sdk->actualBearerToken();
    // or
    $bearerToken = $apiClient->getBearerToken();
} catch (SignNowApiException $e) {
    echo $e->getMessage();
}
```
If you have already received a bearer token and wish to reuse it, then the following API client initialization scheme will be useful:
```php

require_once __DIR__ . '/vendor/autoload.php';

use SignNow\ApiClient;
use SignNow\Api\Document\Request\DocumentGet;
use SignNow\Core\Token\BearerToken;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk;

$sdk = new Sdk();

try {
    $token = 'YOUR_TOKEN_HERE';
    $apiClient = $sdk->build()
        ->withBearerToken(new BearerToken($token, '', 0))
        ->getApiClient();
    // Now, you are ready to use the API client to send requests
} catch (SignNowApiException $e) {
    echo $e->getMessage();
}
```
Example of sending a request to get a document by id:
```php

require_once __DIR__ . '/vendor/autoload.php';

use SignNow\ApiClient;
use SignNow\Api\Document\Request\DocumentGet;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk;

$sdk = new Sdk();

try {
    // Instantiate the API client
    $apiClient = $sdk->build()
        ->authenticate()
        ->getApiClient();

    // Prepare a request to get a document by id
    $documentId = 'e896ec9311a74a8a8ee9faff7049446fe452e461';
    $request = new DocumentGet();
    $request->withDocumentId($documentId);

    // Send the request and get the response
    $response = $apiClient->send($request);
} catch (SignNowApiException $e) {
    echo $e->getMessage();
}
```

### Examples
You can find more examples of API usage in the [`examples`](./examples) directory.
