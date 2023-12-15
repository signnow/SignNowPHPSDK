<?php

declare(strict_types=1);

namespace SignNow\Api\Service\EntityManager;

use SignNow\Rest\Entity\Entity;

/**
 * Interface EntityManagerInterface
 *
 * @package SignNow\Api\Service\EntityManager
 */
interface EntityManagerInterface
{
    public function get($entity, array $uriParams = [], array $queryParams = [], array $headers = []);
    public function create(Entity $entity, array $uriParams = [], array $queryParams = [], array $headers = []);
    public function update(Entity $entity, $uriParams = [], $queryParams = [], array $headers = []);
    public function delete(Entity $entity, $uriParams = [], $queryParams = [], array $headers = []);
    public function setUpdateHttpMethod(string $updateHttpMethod);
}
