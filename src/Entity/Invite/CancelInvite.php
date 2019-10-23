<?php
declare(strict_types = 1);

namespace SignNow\Api\Entity\Invite;

use SignNow\Rest\Entity\Entity;
use SignNow\Rest\EntityManager\Annotation\HttpEntity;
use SignNow\Rest\EntityManager\Annotation\ResponseType;

/**
 * Class CancelInvite
 *
 * @HttpEntity("document/{documentId}/fieldinvitecancel", idProperty="")
 * @ResponseType("SignNow\Api\Entity\Invite\Response")
 *
 * @package SignNow\Api\Entity\Invite
 */
class CancelInvite extends Entity
{
    
}
