<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\Embedded\GroupInvite;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class InviteRequest
 *
 * @package SignNow\Api\Entity\Embedded\GroupInvite
 */
class InviteRequest
{
    /**
     * @var int
     * @Serializer\Type("integer")
     */
    private $order;

    /**
     * @var Signer[]
     * @Serializer\Type("array<SignNow\Api\Entity\Embedded\GroupInvite\Signer>")
     */
    private $signers;

    /**
     * @return int
     */
    public function getOrder(): int
    {
        return $this->order;
    }

    /**
     * @param int $order
     *
     * @return InviteRequest
     */
    public function setOrder(int $order): InviteRequest
    {
        $this->order = $order;

        return $this;
    }

    /**
     * @return Signer[]
     */
    public function getSigners(): array
    {
        return $this->signers;
    }

    /**
     * @param Signer[] $signers
     *
     * @return InviteRequest
     */
    public function setSigners(array $signers): InviteRequest
    {
        $this->signers = $signers;

        return $this;
    }
}
