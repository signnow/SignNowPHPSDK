<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\User;

use SignNow\Rest\Entity\Entity;
use SignNow\Rest\EntityManager\Annotation\HttpEntity;
use SignNow\Rest\EntityManager\Annotation\ResponseType;

/**
 * Class Initial
 *
 * @HttpEntity("user/initial", idProperty="")
 * @ResponseType("SignNow\Api\Entity\User\ImageResponse")
 *
 * @package SignNow\Api\Entity\User
 */
class Initial extends Entity
{
    /**
     * @var string
     */
    protected $data;

    /**
     * Initial constructor.
     *
     * @param string $data user initials image as base64 encoded string
     */
    public function __construct(string $data = '')
    {
        $this->data = $data;
    }
}
