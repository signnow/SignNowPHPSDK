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

namespace SignNow\Sdk\Tests\User;

use SignNow\Api\User\Request\UserGet;
use SignNow\Api\User\Request\UserPost;
use SignNow\Api\User\Request\UserPut;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class UserTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testGetUser();
        $this->testPostUser();
        $this->testPutUser();
    }

    /**
     * @throws SignNowApiException
     */
    public function testGetUser(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('get_user_info', 'get');
        $request = new UserGet();
        $response = $client->send($request);

        $this->assertTrue(is_object($response));
        $this->assertTrue(is_string($response->getId()));
        $this->assertTrue($expectation->getId() === $response->getId());
        $this->assertTrue(is_string($response->getFirstName()));
        $this->assertTrue($expectation->getFirstName() === $response->getFirstName());
        $this->assertTrue(is_string($response->getLastName()));
        $this->assertTrue($expectation->getLastName() === $response->getLastName());
        $this->assertTrue(is_string($response->getActive()));
        $this->assertTrue($expectation->getActive() === $response->getActive());
        $this->assertTrue(is_string($response->getVerified()));
        $this->assertTrue($expectation->getVerified() === $response->getVerified());
        $this->assertTrue(is_int($response->getType()));
        $this->assertTrue($expectation->getType() === $response->getType());
        $this->assertTrue(is_int($response->getPro()));
        $this->assertTrue($expectation->getPro() === $response->getPro());
        $this->assertTrue(is_string($response->getCreated()));
        $this->assertTrue($expectation->getCreated() === $response->getCreated());
        $this->assertTrue(is_array($response->getEmails()->toArray()));
        $this->assertTrue($expectation->getEmails() === $response->getEmails()->toArray());
        $this->assertTrue(is_string($response->getPrimaryEmail()));
        $this->assertTrue($expectation->getPrimaryEmail() === $response->getPrimaryEmail());
        $this->assertTrue(is_array($response->getSubscriptions()->toArray()));
        $this->assertTrue($expectation->getSubscriptions() === $response->getSubscriptions()->toArray());
        $this->assertTrue(is_int($response->getCredits()));
        $this->assertTrue($expectation->getCredits() === $response->getCredits());
        $this->assertTrue(is_bool($response->hasAtticusAccess()));
        $this->assertTrue($expectation->HasAtticusAccess() === $response->HasAtticusAccess());
        $this->assertTrue(is_bool($response->isLoggedIn()));
        $this->assertTrue($expectation->IsLoggedIn() === $response->IsLoggedIn());
        $this->assertTrue(is_object($response->getBillingPeriod()));
        $this->assertTrue($expectation->getBillingPeriod() === $response->getBillingPeriod()->toArray());
        $this->assertTrue(is_object($response->getPremiumAccess()));
        $this->assertTrue($expectation->getPremiumAccess() === $response->getPremiumAccess()->toArray());
        $this->assertTrue(is_array($response->getCompanies()->toArray()));
        $this->assertTrue($expectation->getCompanies() === $response->getCompanies()->toArray());
        $this->assertTrue(is_int($response->getDocumentCount()));
        $this->assertTrue($expectation->getDocumentCount() === $response->getDocumentCount());
        $this->assertTrue(is_int($response->getMonthlyDocumentCount()));
        $this->assertTrue($expectation->getMonthlyDocumentCount() === $response->getMonthlyDocumentCount());
        $this->assertTrue(is_int($response->getLifetimeDocumentCount()));
        $this->assertTrue($expectation->getLifetimeDocumentCount() === $response->getLifetimeDocumentCount());
        $this->assertTrue(is_array($response->getTeams()->toArray()));
        $this->assertTrue($expectation->getTeams() === $response->getTeams()->toArray());
        $this->assertTrue(is_bool($response->hasGoogleApps()));
        $this->assertTrue($expectation->hasGoogleApps() === $response->hasGoogleApps());
        $this->assertTrue(is_bool($response->hasFacebookApps()));
        $this->assertTrue($expectation->hasFacebookApps() === $response->hasFacebookApps());
        $this->assertTrue(is_bool($response->hasMicrosoftApps()));
        $this->assertTrue($expectation->hasMicrosoftApps() === $response->hasMicrosoftApps());
        $this->assertTrue(is_object($response->getStatus()));
        $this->assertTrue($expectation->getStatus() === $response->getStatus()->toArray());
        $this->assertTrue(is_object($response->getSettings()));
        $this->assertTrue($expectation->getSettings() === $response->getSettings()->toArray());
        $this->assertTrue(is_array($response->getOrganizationSettings()->toArray()));
        $this->assertTrue($expectation->getOrganizationSettings() === $response->getOrganizationSettings()->toArray());
        $this->assertTrue(is_array($response->getIssueNotifications()->toArray()));
        $this->assertTrue($expectation->getIssueNotifications() === $response->getIssueNotifications()->toArray());
        $this->assertTrue(is_array($response->getMerchantAccounts()->toArray()));
        $this->assertTrue($expectation->getMerchantAccounts() === $response->getMerchantAccounts()->toArray());
    }

    /**
     * @throws SignNowApiException
     */
    public function testPostUser(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('create_user', 'post');
        $faker = $this->faker();

        $request = new UserPost(
            $faker->email(),
            $faker->password(),
            $faker->firstName(),
            $faker->lastName(),
            $faker->number()
        );
        $response = $client->send($request);

        $this->assertTrue(is_object($response));
        $this->assertTrue(is_string($response->getId()));
        $this->assertTrue($expectation->getId() === $response->getId());
        $this->assertTrue(is_int($response->getVerified()));
        $this->assertTrue($expectation->getVerified() === $response->getVerified());
        $this->assertTrue(is_string($response->getEmail()));
        $this->assertTrue($expectation->getEmail() === $response->getEmail());
    }

    /**
     * @throws SignNowApiException
     */
    public function testPutUser(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('update_user', 'put');
        $faker = $this->faker();

        $request = new UserPut(
            $faker->firstName(),
            $faker->lastName(),
            $faker->password(),
            $faker->oldPassword(),
            $faker->logoutAll()
        );
        $response = $client->send($request);

        $this->assertTrue(is_object($response));
        $this->assertTrue(is_string($response->getId()));
        $this->assertTrue($expectation->getId() === $response->getId());
        $this->assertTrue(is_string($response->getFirstName()));
        $this->assertTrue($expectation->getFirstName() === $response->getFirstName());
        $this->assertTrue(is_string($response->getLastName()));
        $this->assertTrue($expectation->getLastName() === $response->getLastName());
    }
}
