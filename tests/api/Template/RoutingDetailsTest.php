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

namespace SignNow\Sdk\Tests\Template;

use SignNow\Api\Template\Request\RoutingDetailsPost;
use SignNow\Api\Template\Request\RoutingDetailsPut;
use SignNow\Api\Template\Request\RoutingDetailsGet;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class RoutingDetailsTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testPostRoutingDetails();
        $this->testPutRoutingDetails();
        $this->testGetRoutingDetails();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPostRoutingDetails(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('create_routing_details', 'post');
        $faker = $this->faker();

        $request = new RoutingDetailsPost();
        $request->withDocumentId($faker->documentId());
        $response = $client->send($request);

        assert(is_object($response));
        assert(is_array($response->getRoutingDetails()));
        assert($expectation->getRoutingDetails() === $response->getRoutingDetails()->toArray());
        assert(is_array($response->getCc()));
        assert($expectation->getCc() === $response->getCc()->toArray());
        assert(is_array($response->getCcStep()));
        assert($expectation->getCcStep() === $response->getCcStep()->toArray());
        assert(is_array($response->getViewers()));
        assert($expectation->getViewers() === $response->getViewers()->toArray());
        assert(is_array($response->getApprovers()));
        assert($expectation->getApprovers() === $response->getApprovers()->toArray());
        assert(is_array($response->getInviteLinkInstructions()));
        assert($expectation->getInviteLinkInstructions() === $response->getInviteLinkInstructions()->toArray());
    }

    /**
     * @throws SignNowApiException
     */
    public function testPutRoutingDetails(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('update_routing_details', 'put');
        $faker = $this->faker();

        $request = new RoutingDetailsPut(
            $faker->templateRoutingDetailsTemplateData(),
            $faker->templateRoutingDetailsTemplateDataObject(),
            $faker->templateRoutingDetailsCc(),
            $faker->templateRoutingDetailsCcStep(),
            $faker->templateRoutingDetailsViewers(),
            $faker->templateRoutingDetailsApprovers(),
            $faker->templateRoutingDetailsInviteLinkInstructions()
        );
        $request->withDocumentId($faker->documentId());
        $response = $client->send($request);

        assert(is_object($response));
        assert(is_string($response->getId()));
        assert($expectation->getId() === $response->getId());
        assert(is_string($response->getDocumentId()));
        assert($expectation->getDocumentId() === $response->getDocumentId());
        assert(is_object($response->getData()));
        assert($expectation->getData() === $response->getData()->toArray());
        assert(is_array($response->getCc()));
        assert($expectation->getCc() === $response->getCc()->toArray());
        assert(is_array($response->getCcStep()));
        assert($expectation->getCcStep() === $response->getCcStep()->toArray());
        assert(is_array($response->getViewers()));
        assert($expectation->getViewers() === $response->getViewers()->toArray());
        assert(is_array($response->getApprovers()));
        assert($expectation->getApprovers() === $response->getApprovers()->toArray());
        assert(is_array($response->getInviteLinkInstructions()));
        assert($expectation->getInviteLinkInstructions() === $response->getInviteLinkInstructions()->toArray());
    }

    /**
     * @throws SignNowApiException
     */
    public function testGetRoutingDetails(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('get_routing_details', 'get');
        $faker = $this->faker();

        $request = new RoutingDetailsGet();
        $request->withDocumentId($faker->documentId());
        $response = $client->send($request);

        assert(is_object($response));
        assert(is_array($response->getRoutingDetails()));
        assert($expectation->getRoutingDetails() === $response->getRoutingDetails()->toArray());
        assert(is_array($response->getCc()));
        assert($expectation->getCc() === $response->getCc()->toArray());
        assert(is_array($response->getCcStep()));
        assert($expectation->getCcStep() === $response->getCcStep()->toArray());
        assert(is_array($response->getViewers()));
        assert($expectation->getViewers() === $response->getViewers()->toArray());
        assert(is_array($response->getApprovers()));
        assert($expectation->getApprovers() === $response->getApprovers()->toArray());
        assert(is_array($response->getInviteLinkInstructions()));
        assert($expectation->getInviteLinkInstructions() === $response->getInviteLinkInstructions()->toArray());
    }
}
