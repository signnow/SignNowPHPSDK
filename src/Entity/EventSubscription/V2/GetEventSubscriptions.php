<?php
declare(strict_types=1);

namespace SignNow\Api\Entity\EventSubscription\V2;

use SignNow\Rest\Entity\Entity;
use SignNow\Rest\EntityManager\Annotation\HttpEntity;
use SignNow\Rest\EntityManager\Annotation\ResponseType;

/**
 * Class GetEventSubscriptions
 *
 * @HttpEntity("api/v2/events", idProperty="")
 * @ResponseType("SignNow\Api\Entity\EventSubscription\V2\EventCollection")
 *
 * @package SignNow\Api\Entity\EventSubscription\V2
 */
class GetEventSubscriptions extends Entity
{
    
}
