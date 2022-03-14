<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\Embedded\Invite;

use SignNow\Rest\Entity\Entity;
use SignNow\Rest\EntityManager\Annotation\HttpEntity;

/**
 * Class DeleteEmbeddedInvites
 *
 * @HttpEntity("v2/documents/{documentUniqueId}/embedded-invites", idProperty="")
 *
 * @package SignNow\Api\Entity\Embedded\Invite
 */
class DeleteEmbeddedInvites extends Entity
{
}
