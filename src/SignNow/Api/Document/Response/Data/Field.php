<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data;

readonly class Field
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
        private ?string $fieldRequestCanceled = null,
        private ?string $elementId = null,
        private ?string $fieldId = null,
        private ?string $templateFieldId = null,
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

    public function getFieldRequestCanceled(): ?string
    {
        return $this->fieldRequestCanceled;
    }

    public function getElementId(): ?string
    {
        return $this->elementId;
    }

    public function getFieldId(): ?string
    {
        return $this->fieldId;
    }

    public function getTemplateFieldId(): ?string
    {
        return $this->templateFieldId;
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
           'field_request_canceled' => $this->getFieldRequestCanceled(),
           'element_id' => $this->getElementId(),
           'field_id' => $this->getFieldId(),
           'template_field_id' => $this->getTemplateFieldId(),
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
            $data['field_request_canceled'] ?? null,
            $data['element_id'] ?? null,
            $data['field_id'] ?? null,
            $data['template_field_id'] ?? null,
        );
    }
}
