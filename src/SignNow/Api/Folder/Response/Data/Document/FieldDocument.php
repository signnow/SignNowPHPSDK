<?php

declare(strict_types=1);

namespace SignNow\Api\Folder\Response\Data\Document;

readonly class FieldDocument
{
    public function __construct(
        private string $id,
        private string $type,
        private string $roleId,
        private JsonAttribute $jsonAttributes,
        private string $role,
        private string $originator,
        private ?string $fulfiller = null,
        private ?string $fieldRequestId = null,
        private ?string $elementId = null,
        private ?string $templateFieldId = null,
        private ?string $fieldId = null,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getRoleId(): string
    {
        return $this->roleId;
    }

    public function getJsonAttributes(): JsonAttribute
    {
        return $this->jsonAttributes;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function getOriginator(): string
    {
        return $this->originator;
    }

    public function getFulfiller(): ?string
    {
        return $this->fulfiller;
    }

    public function getFieldRequestId(): ?string
    {
        return $this->fieldRequestId;
    }

    public function getElementId(): ?string
    {
        return $this->elementId;
    }

    public function getTemplateFieldId(): ?string
    {
        return $this->templateFieldId;
    }

    public function getFieldId(): ?string
    {
        return $this->fieldId;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'type' => $this->getType(),
           'role_id' => $this->getRoleId(),
           'json_attributes' => $this->getJsonAttributes(),
           'role' => $this->getRole(),
           'originator' => $this->getOriginator(),
           'fulfiller' => $this->getFulfiller(),
           'field_request_id' => $this->getFieldRequestId(),
           'element_id' => $this->getElementId(),
           'template_field_id' => $this->getTemplateFieldId(),
           'field_id' => $this->getFieldId(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['type'],
            $data['role_id'],
            JsonAttribute::fromArray($data['json_attributes']),
            $data['role'],
            $data['originator'],
            $data['fulfiller'] ?? null,
            $data['field_request_id'] ?? null,
            $data['element_id'] ?? null,
            $data['template_field_id'] ?? null,
            $data['field_id'] ?? null,
        );
    }
}
