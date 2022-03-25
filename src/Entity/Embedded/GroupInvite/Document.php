<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\Embedded\GroupInvite;

use JMS\Serializer\Annotation as Serializer;
use SignNow\Api\Action\Data\EmbeddedDocumentGroupInvite\Action;

/**
 * Class Document
 *
 * @package SignNow\Api\Entity\Embedded\GroupInvite
 */
class Document
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $role;

    /**
     * @var string
     * @Serializer\Type("string")
     * @see Action
     */
    private $action;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return Document
     */
    public function setId(string $id): Document
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string $role
     *
     * @return Document
     */
    public function setRole(string $role): Document
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @param string $action
     *
     * @return Document
     */
    public function setAction(string $action): Document
    {
        $this->action = $action;

        return $this;
    }
}
