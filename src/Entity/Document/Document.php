<?php
declare(strict_types = 1);

namespace SignNow\Api\Entity\Document;

use JMS\Serializer\Annotation as Serializer;
use SignNow\Api\Entity\Role;
use SignNow\Rest\Entity\Entity;
use SignNow\Rest\EntityManager\Annotation\HttpEntity;

/**
 * Class Document
 *
 * @HttpEntity("document/{id}", idProperty="id")
 *
 * @package SignNow\Api\Entity\Document
 */
class Document extends Entity
{
    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    protected $id;

    /**
     * @var array|null
     * @Serializer\Type("array")
     */
    protected $texts;

    /**
     * @var array|null
     * @Serializer\Type("array")
     */
    protected $checks;

    /**
     * @var array|null
     * @Serializer\Type("array")
     */
    protected $fields;

    /**
     * @var array|null
     * @Serializer\Type("array")
     */
    protected $signatures;

    /**
     * @var Role[]
     * @Serializer\Type("array<SignNow\Api\Entity\Role>")
     */
    protected $roles;

    /**
     * @var bool
     * @Serializer\Type("bool")
     */
    protected $template = false;

    /**
     * @var bool
     */
    protected $fieldsMissed = false;

    /**
     * @var array|null
     * @Serializer\Type("array")
     */
    protected $radiobuttons;

    /**
     * @var array|null
     * @Serializer\Type("array")
     */
    protected $attachments;

    /**
     * @var array|null
     * @Serializer\Type("array")
     */
    protected $enumerationOptions;
    
    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $documentName;

    /**
     * @return null|string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param null|string $id
     *
     * @return $this
     */
    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getTexts(): ?array
    {
        return $this->texts;
    }

    /**
     * @param array|null $texts
     *
     * @return $this
     */
    public function setTexts(?array $texts): self
    {
        $this->texts = $texts;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getChecks(): ?array
    {
        return $this->checks;
    }

    /**
     * @param array|null $checks
     *
     * @return $this
     */
    public function setChecks(?array $checks): self
    {
        $this->checks = $checks;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getFields(): ?array
    {
        return $this->fields;
    }

    /**
     * @param array|null $fields
     *
     * @return $this
     */
    public function setFields(?array $fields): self
    {
        $this->fields = $fields;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getSignatures(): ?array
    {
        return $this->signatures;
    }

    /**
     * @param array|null $signatures
     *
     * @return Document
     */
    public function setSignatures(?array $signatures): self
    {
        $this->signatures = $signatures;

        return $this;
    }

    /**
     * @return Role[]
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @param Role[] $roles
     *
     * @return Document
     */
    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @return bool
     */
    public function template(): bool
    {
        return $this->template;
    }

    /**
     * @param bool $template
     *
     * @return Document
     */
    public function setTemplate(bool $template): Document
    {
        $this->template = $template;

        return $this;
    }

    /**
     * @return bool
     */
    public function isFieldsMissed(): bool
    {
        return $this->fieldsMissed;
    }

    /**
     * @param bool $fieldsMissed
     *
     * @return Document
     */
    public function setFieldsMissed(bool $fieldsMissed): Document
    {
        $this->fieldsMissed = $fieldsMissed;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getRadiobuttons(): ?array
    {
        return $this->radiobuttons;
    }

    /**
     * @param array|null $radiobuttons
     *
     * @return Document
     */
    public function setRadiobuttons(?array $radiobuttons): Document
    {
        $this->radiobuttons = $radiobuttons;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getAttachments(): ?array
    {
        return $this->attachments;
    }

    /**
     * @param array|null $attachments
     *
     * @return Document
     */
    public function setAttachments(?array $attachments): Document
    {
        $this->attachments = $attachments;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getEnumerationOptions(): ?array
    {
        return $this->enumerationOptions;
    }

    /**
     * @param array|null $enumerationOptions
     *
     * @return Document
     */
    public function setEnumerationOptions(?array $enumerationOptions): Document
    {
        $this->enumerationOptions = $enumerationOptions;

        return $this;
    }
    
    /**
     * @return string
     */
    public function getDocumentName(): string
    {
        return $this->documentName;
    }
    
    /**
     * @param string $documentName
     *
     * @return Document
     */
    public function setDocumentName(string $documentName): Document
    {
        $this->documentName = $documentName;
    
        return $this;
    }
}
