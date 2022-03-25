<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\Auth;

use JMS\Serializer\Annotation as Serializer;
use SignNow\Rest\Entity\Entity;

/**
 * Class TokenRequest
 *
 * @package SignNow\Api\Entity\Auth
 */
abstract class TokenRequest extends Entity
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $grantType;

    /**
     * @return string
     */
    public function getGrantType(): string
    {
        return $this->grantType;
    }
}
