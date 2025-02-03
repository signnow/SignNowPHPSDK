<?php

/*
 * This file is a part of signNow SDK API client.
 *
 * (с) Copyright © 2011-present airSlate Inc. (https://www.signnow.com)
 *
 * For more details on copyright, see LICENSE.md file
 * that was distributed with this source code.
 */

declare(strict_types=1);

namespace SignNow\Api\Document\Request\Data\Tag;

readonly class Tag
{
    public function __construct(
        private string $type,
        private int $x,
        private int $y,
        private int $pageNumber,
        private string $role,
        private bool $required,
        private int $width,
        private int $height,
        private string $tagName = '',
        private string $name = '',
        private string $label = '',
        private string $align = '',
        private string $valign = '',
        private string $prefilledText = '',
        private string $validatorId = '',
        private string $dependency = '',
        private string $hint = '',
        private string $link = '',
        private bool $customDefinedOption = false,
        private bool $lockToSignDate = false,
        private RadioCollection $radio = new RadioCollection(),
        private EnumerationOptionCollection $enumerationOptions = new EnumerationOptionCollection(),
    ) {
    }

    public function getTagName(): string
    {
        return $this->tagName;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function getPageNumber(): int
    {
        return $this->pageNumber;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function isRequired(): bool
    {
        return $this->required;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function getAlign(): string
    {
        return $this->align;
    }

    public function getValign(): string
    {
        return $this->valign;
    }

    public function getPrefilledText(): string
    {
        return $this->prefilledText;
    }

    public function getValidatorId(): string
    {
        return $this->validatorId;
    }

    public function getDependency(): string
    {
        return $this->dependency;
    }

    public function getHint(): string
    {
        return $this->hint;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function isCustomDefinedOption(): bool
    {
        return $this->customDefinedOption;
    }

    public function isLockToSignDate(): bool
    {
        return $this->lockToSignDate;
    }

    public function getRadio(): RadioCollection
    {
        return $this->radio;
    }

    public function getEnumerationOptions(): EnumerationOptionCollection
    {
        return $this->enumerationOptions;
    }

    public function toArray(): array
    {
        return [
           'tag_name' => $this->getTagName(),
           'name' => $this->getName(),
           'label' => $this->getLabel(),
           'type' => $this->getType(),
           'x' => $this->getX(),
           'y' => $this->getY(),
           'page_number' => $this->getPageNumber(),
           'role' => $this->getRole(),
           'required' => $this->isRequired(),
           'width' => $this->getWidth(),
           'height' => $this->getHeight(),
           'align' => $this->getAlign(),
           'valign' => $this->getValign(),
           'prefilled_text' => $this->getPrefilledText(),
           'validator_id' => $this->getValidatorId(),
           'dependency' => $this->getDependency(),
           'hint' => $this->getHint(),
           'link' => $this->getLink(),
           'custom_defined_option' => $this->isCustomDefinedOption(),
           'lock_to_sign_date' => $this->isLockToSignDate(),
           'radio' => $this->getRadio()->toArray(),
           'enumeration_options' => $this->getEnumerationOptions()->toArray(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['type'],
            $data['x'],
            $data['y'],
            $data['page_number'],
            $data['role'],
            $data['required'],
            $data['width'],
            $data['height'],
            $data['tag_name'] ?? '',
            $data['name'] ?? '',
            $data['label'] ?? '',
            $data['align'] ?? '',
            $data['valign'] ?? '',
            $data['prefilled_text'] ?? '',
            $data['validator_id'] ?? '',
            $data['dependency'] ?? '',
            $data['hint'] ?? '',
            $data['link'] ?? '',
            $data['custom_defined_option'] ?? false,
            $data['lock_to_sign_date'] ?? false,
            new RadioCollection($data['radio']),
            new EnumerationOptionCollection($data['enumeration_options']),
        );
    }
}
