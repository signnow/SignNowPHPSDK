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

namespace SignNow\Sdk\Tests\Folder;

use SignNow\Api\Folder\Request\FolderDocumentsGet;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class FolderDocumentsTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testGetFolderDocuments();
    }

    /**
     * @throws SignNowApiException
     */
    public function testGetFolderDocuments(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('get_folder_documents', 'get');
        $faker = $this->faker();

        $request = new FolderDocumentsGet();
        $request->withFolderId($faker->folderId());
        $response = $client->send($request);

        $this->assertTrue(is_object($response));
        $this->assertTrue(is_string($response->getId()));
        $this->assertTrue($expectation->getId() === $response->getId());
        $this->assertTrue(is_string($response->getCreated()));
        $this->assertTrue($expectation->getCreated() === $response->getCreated());
        $this->assertTrue(is_string($response->getName()));
        $this->assertTrue($expectation->getName() === $response->getName());
        $this->assertTrue(is_string($response->getUserId()));
        $this->assertTrue($expectation->getUserId() === $response->getUserId());
        $this->assertTrue(is_bool($response->isSystemFolder()));
        $this->assertTrue($expectation->isSystemFolder() === $response->isSystemFolder());
        $this->assertTrue(is_bool($response->isShared()));
        $this->assertTrue($expectation->isShared() === $response->isShared());
        $this->assertTrue(is_array($response->getFolders()->toArray()));
        $this->assertTrue($expectation->getFolders() === $response->getFolders()->toArray());
        $this->assertTrue(is_int($response->getTotalDocuments()));
        $this->assertTrue($expectation->getTotalDocuments() === $response->getTotalDocuments());
        $this->assertTrue(is_array($response->getDocuments()->toArray()));
        $this->assertTrue($expectation->getDocuments() === $response->getDocuments()->toArray());
    }
}
