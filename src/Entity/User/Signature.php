<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\User;

use SignNow\Rest\Entity\Entity;
use SignNow\Rest\EntityManager\Annotation\HttpEntity;
use SignNow\Rest\EntityManager\Annotation\ResponseType;

/**
 * Class Signature
 *
 * @HttpEntity("user/signature", idProperty="")
 * @ResponseType("SignNow\Api\Entity\User\ImageResponse")
 *
 * @package SignNow\Api\Entity\User
 */
class Signature extends Entity
{
    /**
     * @var string
     */
    protected $data;

    /**
     * Signature constructor.
     *
     * @param string $data user signature image as base64 encoded string
     */
    public function __construct(string $data = '')
    {
        $this->data = $data;
    }
}
