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

        $this->assertTrue(is_object($response));
        $this->assertTrue(is_array($response->getRoutingDetails()->toArray()));
        $this->assertTrue($expectation->getRoutingDetails() === $response->getRoutingDetails()->toArray());
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

        $this->assertTrue(is_object($response));
        $this->assertTrue(is_string($response->getId()));
        $this->assertTrue($expectation->getId() === $response->getId());
        $this->assertTrue(is_string($response->getDocumentId()));
        $this->assertTrue($expectation->getDocumentId() === $response->getDocumentId());
        $this->assertTrue(is_object($response->getData()));
        $this->assertTrue($expectation->getData() === $response->getData()->toArray());
        $this->assertTrue(is_array($response->getCc()->toArray()));
        $this->assertTrue($expectation->getCc() === $response->getCc()->toArray());
        $this->assertTrue(is_array($response->getCcStep()->toArray()));
        $this->assertTrue($expectation->getCcStep() === $response->getCcStep()->toArray());
        $this->assertTrue(is_array($response->getViewers()->toArray()));
        $this->assertTrue($expectation->getViewers() === $response->getViewers()->toArray());
        $this->assertTrue(is_array($response->getApprovers()->toArray()));
        $this->assertTrue($expectation->getApprovers() === $response->getApprovers()->toArray());
        $this->assertTrue(is_array($response->getInviteLinkInstructions()->toArray()));
        $this->assertTrue($expectation->getInviteLinkInstructions() === $response->getInviteLinkInstructions()->toArray());
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

        $this->assertTrue(is_object($response));
        $this->assertTrue(is_array($response->getRoutingDetails()->toArray()));
        $this->assertTrue($expectation->getRoutingDetails() === $response->getRoutingDetails()->toArray());
        $this->assertTrue(is_array($response->getCc()->toArray()));
        $this->assertTrue($expectation->getCc() === $response->getCc()->toArray());
        $this->assertTrue(is_array($response->getCcStep()->toArray()));
        $this->assertTrue($expectation->getCcStep() === $response->getCcStep()->toArray());
        $this->assertTrue(is_array($response->getViewers()->toArray()));
        $this->assertTrue($expectation->getViewers() === $response->getViewers()->toArray());
        $this->assertTrue(is_array($response->getApprovers()->toArray()));
        $this->assertTrue($expectation->getApprovers() === $response->getApprovers()->toArray());
        $this->assertTrue(is_object($response->getAttributes()));
        $this->assertTrue($expectation->getAttributes() === $response->getAttributes()->toArray());
    }
}
