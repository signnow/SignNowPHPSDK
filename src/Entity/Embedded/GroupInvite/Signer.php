<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\Embedded\GroupInvite;

use JMS\Serializer\Annotation as Serializer;
use SignNow\Api\Action\Data\EmbeddedDocumentGroupInvite\AuthenticationMethod;

/**
 * Class Signer
 *
 * @package SignNow\Api\Entity\Embedded\GroupInvite
 */
class Signer
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $email;

    /**
     * @var string
     * @Serializer\Type("string")
     * @see AuthenticationMethod
     */
    private $authMethod;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $redirectUri;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $firstName;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $lastName;

    /**
     * @var Document[]
     * @Serializer\Type("array<SignNow\Api\Entity\Embedded\GroupInvite\Document>")
     */
    private $documents;

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return Signer
     */
    public function setEmail(string $email): Signer
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getAuthMethod(): string
    {
        return $this->authMethod;
    }

    /**
     * @param string $authMethod
     *
     * @return Signer
     */
    public function setAuthMethod(string $authMethod): Signer
    {
        $this->authMethod = $authMethod;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRedirectUri(): ?string
    {
        return $this->redirectUri;
    }

    /**
     * @param string|null $redirectUri
     *
     * @return Signer
     */
    public function setRedirectUri(?string $redirectUri): Signer
    {
        $this->redirectUri = $redirectUri;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string|null $firstName
     *
     * @return Signer
     */
    public function setFirstName(?string $firstName): Signer
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string|null $lastName
     *
     * @return Signer
     */
    public function setLastName(?string $lastName): Signer
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return Document[]
     */
    public function getDocuments(): array
    {
        return $this->documents;
    }

    /**
     * @param Document[] $documents
     *
     * @return Signer
     */
    public function setDocuments(array $documents): Signer
    {
        $this->documents = $documents;

        return $this;
    }
}
