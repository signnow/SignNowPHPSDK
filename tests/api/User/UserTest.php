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

        assert(is_object($response));
        assert(is_string($response->getId()));
        assert($expectation->getId() === $response->getId());
        assert(is_string($response->getFirstName()));
        assert($expectation->getFirstName() === $response->getFirstName());
        assert(is_string($response->getLastName()));
        assert($expectation->getLastName() === $response->getLastName());
        assert(is_string($response->getActive()));
        assert($expectation->getActive() === $response->getActive());
        assert(is_string($response->getVerified()));
        assert($expectation->getVerified() === $response->getVerified());
        assert(is_int($response->getType()));
        assert($expectation->getType() === $response->getType());
        assert(is_int($response->getPro()));
        assert($expectation->getPro() === $response->getPro());
        assert(is_string($response->getCreated()));
        assert($expectation->getCreated() === $response->getCreated());
        assert(is_array($response->getEmails()));
        assert($expectation->getEmails() === $response->getEmails()->toArray());
        assert(is_string($response->getPrimaryEmail()));
        assert($expectation->getPrimaryEmail() === $response->getPrimaryEmail());
        assert(is_array($response->getSubscriptions()));
        assert($expectation->getSubscriptions() === $response->getSubscriptions()->toArray());
        assert(is_int($response->getCredits()));
        assert($expectation->getCredits() === $response->getCredits());
        assert(is_bool($response->hasAtticusAccess()));
        assert($expectation->HasAtticusAccess() === $response->HasAtticusAccess());
        assert(is_object($response->getCloudExportAccountDetails()));
        assert($expectation->getCloudExportAccountDetails() === $response->getCloudExportAccountDetails()->toArray());
        assert(is_bool($response->isLoggedIn()));
        assert($expectation->IsLoggedIn() === $response->IsLoggedIn());
        assert(is_object($response->getBillingPeriod()));
        assert($expectation->getBillingPeriod() === $response->getBillingPeriod()->toArray());
        assert(is_object($response->getPremiumAccess()));
        assert($expectation->getPremiumAccess() === $response->getPremiumAccess()->toArray());
        assert(is_array($response->getCompanies()));
        assert($expectation->getCompanies() === $response->getCompanies()->toArray());
        assert(is_int($response->getDocumentCount()));
        assert($expectation->getDocumentCount() === $response->getDocumentCount());
        assert(is_int($response->getMonthlyDocumentCount()));
        assert($expectation->getMonthlyDocumentCount() === $response->getMonthlyDocumentCount());
        assert(is_int($response->getLifetimeDocumentCount()));
        assert($expectation->getLifetimeDocumentCount() === $response->getLifetimeDocumentCount());
        assert(is_array($response->getTeams()));
        assert($expectation->getTeams() === $response->getTeams()->toArray());
        assert(is_bool($response->hasGoogleApps()));
        assert($expectation->hasGoogleApps() === $response->hasGoogleApps());
        assert(is_bool($response->hasFacebookApps()));
        assert($expectation->hasFacebookApps() === $response->hasFacebookApps());
        assert(is_bool($response->hasMicrosoftApps()));
        assert($expectation->hasMicrosoftApps() === $response->hasMicrosoftApps());
        assert(is_object($response->getStatus()));
        assert($expectation->getStatus() === $response->getStatus()->toArray());
        assert(is_object($response->getSettings()));
        assert($expectation->getSettings() === $response->getSettings()->toArray());
        assert(is_array($response->getOrganizationSettings()));
        assert($expectation->getOrganizationSettings() === $response->getOrganizationSettings()->toArray());
        assert(is_array($response->getIssueNotifications()));
        assert($expectation->getIssueNotifications() === $response->getIssueNotifications()->toArray());
        assert(is_array($response->getMerchantAccounts()));
        assert($expectation->getMerchantAccounts() === $response->getMerchantAccounts()->toArray());
        assert(is_object($response->getOrganization()));
        assert($expectation->getOrganization() === $response->getOrganization()->toArray());
        assert(is_string($response->getRegistrationSource()));
        assert($expectation->getRegistrationSource() === $response->getRegistrationSource());
        assert(is_string($response->getAvatarUrl()));
        assert($expectation->getAvatarUrl() === $response->getAvatarUrl());
        assert(is_string($response->getSignerPhoneInvite()));
        assert($expectation->getSignerPhoneInvite() === $response->getSignerPhoneInvite());
        assert(is_string($response->getLocale()));
        assert($expectation->getLocale() === $response->getLocale());
        assert(is_int($response->getPasswordChanged()));
        assert($expectation->getPasswordChanged() === $response->getPasswordChanged());
        assert(is_int($response->getUploadLimit()));
        assert($expectation->getUploadLimit() === $response->getUploadLimit());
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

        assert(is_object($response));
        assert(is_string($response->getId()));
        assert($expectation->getId() === $response->getId());
        assert(is_int($response->getVerified()));
        assert($expectation->getVerified() === $response->getVerified());
        assert(is_string($response->getEmail()));
        assert($expectation->getEmail() === $response->getEmail());
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

        assert(is_object($response));
        assert(is_string($response->getId()));
        assert($expectation->getId() === $response->getId());
        assert(is_string($response->getFirstName()));
        assert($expectation->getFirstName() === $response->getFirstName());
        assert(is_string($response->getLastName()));
        assert($expectation->getLastName() === $response->getLastName());
    }
}
