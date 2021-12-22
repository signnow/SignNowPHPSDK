<?php
declare(strict_types=1);

namespace SignNow\Api\Entity\Document;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class ViewerFieldInvite
 *
 * @package SignNow\Api\Entity\Document
 */
class ViewerFieldInvite
{
    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $id;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $signerUserId;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $status;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $created;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $updated;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $role;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $email;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $roleId;

    /**
     * @return null|string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return ViewerFieldInvite
     */
    public function setId(string $id): ViewerFieldInvite
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getSignerUserId(): ?string
    {
        return $this->signerUserId;
    }

    /**
     * @param string $signerUserId
     *
     * @return ViewerFieldInvite
     */
    public function setSignerUserId(string $signerUserId): ViewerFieldInvite
    {
        $this->signerUserId = $signerUserId;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string $status
     *
     * @return ViewerFieldInvite
     */
    public function setStatus(string $status): ViewerFieldInvite
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getCreated(): ?string
    {
        return $this->created;
    }

    /**
     * @param string $created
     *
     * @return ViewerFieldInvite
     */
    public function setCreated(string $created): ViewerFieldInvite
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getUpdated(): ?string
    {
        return $this->updated;
    }

    /**
     * @param string $updated
     *
     * @return ViewerFieldInvite
     */
    public function setUpdated(string $updated): ViewerFieldInvite
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getRole(): ?string
    {
        return $this->role;
    }

    /**
     * @param string $role
     *
     * @return ViewerFieldInvite
     */
    public function setRole(string $role): ViewerFieldInvite
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return ViewerFieldInvite
     */
    public function setEmail(string $email): ViewerFieldInvite
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getRoleId(): ?string
    {
        return $this->roleId;
    }

    /**
     * @param string $roleId
     *
     * @return ViewerFieldInvite
     */
    public function setRoleId(string $roleId): ViewerFieldInvite
    {
        $this->roleId = $roleId;

        return $this;
    }
}
