<?php

declare(strict_types=1);

namespace SignNow\Sdk\Tests\User;

use SignNow\Api\User\Request\EmailVerifyPut;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class EmailVerifyTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testPutEmailVerify();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPutEmailVerify(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('user_email_verify', 'put');
        $faker = $this->faker();

        $request = new EmailVerifyPut(
            $faker->email(),
            $faker->verificationToken()
        );
        $response = $client->send($request);

        assert(is_object($response));
        assert(is_string($response->getEmail()));
        assert($expectation->getEmail() === $response->getEmail());
    }
}
