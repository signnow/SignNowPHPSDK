<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Request\Data;

readonly class Field
{
    public function __construct(
        private int $x,
        private int $y,
        private int $width,
        private int $height,
        private string $type,
        private int $pageNumber,
        private bool $required,
        private string $role,
        private bool $customDefinedOption = false,
        private string $name = '',
        private string $tooltip = '',
        private string $formula = '',
        private bool $conditional = false,
        private bool $stretchToGrid = false,
        private bool $active = true,
        private bool $bold = false,
        private bool $italic = false,
        private bool $underline = false,
        private string $subtype = '',
        private string $align = '',
        private string $calculationPrecision = '',
        private string $color = '',
        private string $label = '',
        private string $validatorId = '',
    ) {
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getPageNumber(): int
    {
        return $this->pageNumber;
    }

    public function isRequired(): bool
    {
        return $this->required;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function isCustomDefinedOption(): bool
    {
        return $this->customDefinedOption;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getTooltip(): string
    {
        return $this->tooltip;
    }

    public function getFormula(): string
    {
        return $this->formula;
    }

    public function isConditional(): bool
    {
        return $this->conditional;
    }

    public function isStretchToGrid(): bool
    {
        return $this->stretchToGrid;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function isBold(): bool
    {
        return $this->bold;
    }

    public function isItalic(): bool
    {
        return $this->italic;
    }

    public function isUnderline(): bool
    {
        return $this->underline;
    }

    public function getSubtype(): string
    {
        return $this->subtype;
    }

    public function getAlign(): string
    {
        return $this->align;
    }

    public function getCalculationPrecision(): string
    {
        return $this->calculationPrecision;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getValidatorId(): string
    {
        return $this->validatorId;
    }

    public function toArray(): array
    {
        return [
           'x' => $this->getX(),
           'y' => $this->getY(),
           'width' => $this->getWidth(),
           'height' => $this->getHeight(),
           'type' => $this->getType(),
           'page_number' => $this->getPageNumber(),
           'required' => $this->isRequired(),
           'role' => $this->getRole(),
           'custom_defined_option' => $this->isCustomDefinedOption(),
           'name' => $this->getName(),
           'tooltip' => $this->getTooltip(),
           'formula' => $this->getFormula(),
           'conditional' => $this->isConditional(),
           'stretch_to_grid' => $this->isStretchToGrid(),
           'active' => $this->isActive(),
           'bold' => $this->isBold(),
           'italic' => $this->isItalic(),
           'underline' => $this->isUnderline(),
           'subtype' => $this->getSubtype(),
           'align' => $this->getAlign(),
           'calculation_precision' => $this->getCalculationPrecision(),
           'color' => $this->getColor(),
           'label' => $this->getLabel(),
           'validator_id' => $this->getValidatorId(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['x'],
            $data['y'],
            $data['width'],
            $data['height'],
            $data['type'],
            $data['page_number'],
            $data['required'],
            $data['role'],
            $data['custom_defined_option'] ?? false,
            $data['name'] ?? '',
            $data['tooltip'] ?? '',
            $data['formula'] ?? '',
            $data['conditional'] ?? false,
            $data['stretch_to_grid'] ?? false,
            $data['active'] ?? true,
            $data['bold'] ?? false,
            $data['italic'] ?? false,
            $data['underline'] ?? false,
            $data['subtype'] ?? '',
            $data['align'] ?? '',
            $data['calculation_precision'] ?? '',
            $data['color'] ?? '',
            $data['label'] ?? '',
            $data['validator_id'] ?? '',
        );
    }
}
