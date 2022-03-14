<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\Document;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class DocumentGroupInfo
 *
 * @package SignNow\Api\Entity\Document
 */
class DocumentGroupInfo
{
    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $documentGroupId;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $documentGroupName;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $inviteId;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $inviteStatus;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $signAsMerged = false;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    private $docCountInGroup = 0;

    /**
     * @return string|null
     */
    public function getDocumentGroupId(): ?string
    {
        return $this->documentGroupId;
    }

    /**
     * @param string|null $documentGroupId
     *
     * @return DocumentGroupInfo
     */
    public function setDocumentGroupId(?string $documentGroupId): DocumentGroupInfo
    {
        $this->documentGroupId = $documentGroupId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDocumentGroupName(): ?string
    {
        return $this->documentGroupName;
    }

    /**
     * @param string|null $documentGroupName
     *
     * @return DocumentGroupInfo
     */
    public function setDocumentGroupName(?string $documentGroupName): DocumentGroupInfo
    {
        $this->documentGroupName = $documentGroupName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getInviteId(): ?string
    {
        return $this->inviteId;
    }

    /**
     * @param string|null $inviteId
     *
     * @return DocumentGroupInfo
     */
    public function setInviteId(?string $inviteId): DocumentGroupInfo
    {
        $this->inviteId = $inviteId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getInviteStatus(): ?string
    {
        return $this->inviteStatus;
    }

    /**
     * @param string|null $inviteStatus
     *
     * @return DocumentGroupInfo
     */
    public function setInviteStatus(?string $inviteStatus): DocumentGroupInfo
    {
        $this->inviteStatus = $inviteStatus;

        return $this;
    }

    /**
     * @return bool
     */
    public function isSignAsMerged(): bool
    {
        return $this->signAsMerged;
    }

    /**
     * @param bool $signAsMerged
     *
     * @return DocumentGroupInfo
     */
    public function setSignAsMerged(bool $signAsMerged): DocumentGroupInfo
    {
        $this->signAsMerged = $signAsMerged;

        return $this;
    }

    /**
     * @return int
     */
    public function getDocCountInGroup(): int
    {
        return $this->docCountInGroup;
    }

    /**
     * @param int $docCountInGroup
     *
     * @return DocumentGroupInfo
     */
    public function setDocCountInGroup(int $docCountInGroup): DocumentGroupInfo
    {
        $this->docCountInGroup = $docCountInGroup;

        return $this;
    }
}
