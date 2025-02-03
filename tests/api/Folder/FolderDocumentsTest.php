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

        assert(is_object($response));
        assert(is_string($response->getId()));
        assert($expectation->getId() === $response->getId());
        assert(is_string($response->getCreated()));
        assert($expectation->getCreated() === $response->getCreated());
        assert(is_string($response->getName()));
        assert($expectation->getName() === $response->getName());
        assert(is_string($response->getUserId()));
        assert($expectation->getUserId() === $response->getUserId());
        assert(is_string($response->getParentId()));
        assert($expectation->getParentId() === $response->getParentId());
        assert(is_bool($response->isSystemFolder()));
        assert($expectation->isSystemFolder() === $response->isSystemFolder());
        assert(is_bool($response->isShared()));
        assert($expectation->isShared() === $response->isShared());
        assert(is_array($response->getFolders()));
        assert($expectation->getFolders() === $response->getFolders()->toArray());
        assert(is_int($response->getTotalDocuments()));
        assert($expectation->getTotalDocuments() === $response->getTotalDocuments());
        assert(is_array($response->getDocuments()));
        assert($expectation->getDocuments() === $response->getDocuments()->toArray());
    }
}
