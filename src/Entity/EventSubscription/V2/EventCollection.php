<?php
declare(strict_types=1);

namespace SignNow\Api\Entity\EventSubscription\V2;

use JMS\Serializer\Annotation as Serializer;
use SignNow\Api\Entity\V2\Collection;

/**
 * Class EventCollection
 *
 * @package SignNow\Api\Entity\EventSubscription\V2
 */
final class EventCollection extends Collection
{
    /**
     * @var Event[]
     * @Serializer\Type("array<SignNow\Api\Entity\EventSubscription\V2\Event>")
     */
    protected $data = [];
}
