<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data;

readonly class FieldValidator
{
    public function __construct(
        private string $id,
        private string $name,
        private string $regexExpression,
        private string $description,
        private string $scope,
        private string $errorMessage = '',
        private ?DisplayJsonAttribute $displayJsonAttributes = null,
        private string $formulaCalculation = '',
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getRegexExpression(): string
    {
        return $this->regexExpression;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getScope(): string
    {
        return $this->scope;
    }

    public function getErrorMessage(): string
    {
        return $this->errorMessage;
    }

    public function getDisplayJsonAttributes(): ?DisplayJsonAttribute
    {
        return $this->displayJsonAttributes;
    }

    public function getFormulaCalculation(): string
    {
        return $this->formulaCalculation;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'name' => $this->getName(),
           'regex_expression' => $this->getRegexExpression(),
           'description' => $this->getDescription(),
           'scope' => $this->getScope(),
           'error_message' => $this->getErrorMessage(),
           'display_json_attributes' => $this->getDisplayJsonAttributes(),
           'formula_calculation' => $this->getFormulaCalculation(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['name'],
            $data['regex_expression'],
            $data['description'],
            $data['scope'],
            $data['error_message'] ?? '',
            isset($data['display_json_attributes']) ? DisplayJsonAttribute::fromArray($data['display_json_attributes']) : null,
            $data['formula_calculation'] ?? '',
        );
    }
}
