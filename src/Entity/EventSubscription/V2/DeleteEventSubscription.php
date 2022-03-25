<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\EventSubscription\V2;

use SignNow\Rest\Entity\Entity;
use SignNow\Rest\EntityManager\Annotation\HttpEntity;
use SignNow\Rest\EntityManager\Annotation\ResponseType;

/**
 * Class DeleteEventSubscription
 *
 * @HttpEntity("api/v2/events/{eventSubscriptionUniqueId}", idProperty="")
 *
 * @package SignNow\Api\Entity\EventSubscription\V2
 */
class DeleteEventSubscription extends Entity
{
}
