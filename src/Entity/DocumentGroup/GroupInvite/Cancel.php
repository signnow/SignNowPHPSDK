<?php
declare(strict_types = 1);

namespace SignNow\Api\Entity\DocumentGroup\GroupInvite;

use SignNow\Rest\Entity\Entity;
use SignNow\Rest\EntityManager\Annotation\HttpEntity;
use SignNow\Rest\EntityManager\Annotation\ResponseType;

/**
 * Class Cancel
 *
 * @HttpEntity("documentgroup/{documentGroupId}/groupinvite/{groupInviteId}/cancelinvite", idProperty="")
 * @ResponseType("SignNow\Api\Entity\Status")
 *
 * @package SignNow\Api\Entity
 */
class Cancel extends Entity
{

}
