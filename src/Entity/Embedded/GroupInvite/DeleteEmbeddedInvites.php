<?php
declare(strict_types=1);

namespace SignNow\Api\Entity\Embedded\GroupInvite;

use SignNow\Rest\Entity\Entity;
use SignNow\Rest\EntityManager\Annotation\HttpEntity;

/**
 * Class DeleteEmbeddedInvites
 *
 * @HttpEntity("v2/document-groups/{documentGroupUniqueId}/embedded-invites", idProperty="")
 *
 * @package SignNow\Api\Entity\Embedded\GroupInvite
 */
class DeleteEmbeddedInvites extends Entity
{

}
