<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\Document;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class TextTag
 *
 * @package SignNow\Api\Entity\Document
 */
class TextTag
{
    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $tagName;

    /**
     * @var null|string
     * @Serializer\Type("string")
     * @see TextTagFieldType::class
     */
    private $type;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $role;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $label;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $required = false;

    /**
     * @var null|bool
     * @Serializer\Type("boolean")
     */
    private $lockToSignDate;

    /**
     * @var null|bool
     * @Serializer\Type("boolean")
     */
    private $customDefinedOption;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    private $height = 0;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    private $width = 0;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    private $pageNumber = 0;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $validatorId;

    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $prefilledText;

    /**
     * @var null|array
     * @Serializer\Type("array")
     */
    private $enumerationOptions;

    /**
     * @var null|array
     * @Serializer\Type("array")
     */
    private $radio;


    /**
     * @return null|string
     */
    public function getTagName(): ?string
    {
        return $this->tagName;
    }

    /**
     * @param string $tagName
     *
     * @return TextTag
     */
    public function setTagName(string $tagName): TextTag
    {
        $this->tagName = $tagName;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return TextTag
     */
    public function setType(string $type): TextTag
    {
        $this->type = $type;

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
     * @return TextTag
     */
    public function setRole(string $role): TextTag
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }

    /**
     * @param string $label
     *
     * @return TextTag
     */
    public function setLabel(string $label): TextTag
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return bool
     */
    public function isRequired(): bool
    {
        return $this->required;
    }

    /**
     * @param bool $required
     *
     * @return TextTag
     */
    public function setRequired(bool $required = true): TextTag
    {
        $this->required = $required;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getLockToSignDate(): ?bool
    {
        return $this->lockToSignDate;
    }

    /**
     * @param bool $lockToSignDate
     *
     * @return TextTag
     */
    public function setLockToSignDate(bool $lockToSignDate): TextTag
    {
        $this->lockToSignDate = $lockToSignDate;

        return $this;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     *
     * @return TextTag
     */
    public function setHeight(int $height): TextTag
    {
        $this->height = $height;

        return $this;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     *
     * @return TextTag
     */
    public function setWidth(int $width): TextTag
    {
        $this->width = $width;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getValidatorId(): ?string
    {
        return $this->validatorId;
    }

    /**
     * @param string $validatorId
     *
     * @return TextTag
     */
    public function setValidatorId(string $validatorId): TextTag
    {
        $this->validatorId = $validatorId;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getPrefilledText(): ?string
    {
        return $this->prefilledText;
    }

    /**
     * @param string $prefilledText
     *
     * @return TextTag
     */
    public function setPrefilledText(string $prefilledText): TextTag
    {
        $this->prefilledText = $prefilledText;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getCustomDefinedOption(): ?bool
    {
        return $this->customDefinedOption;
    }

    /**
     * @param bool $customDefinedOption
     *
     * @return TextTag
     */
    public function setCustomDefinedOption(bool $customDefinedOption): TextTag
    {
        $this->customDefinedOption = $customDefinedOption;

        return $this;
    }

    /**
     * @return int
     */
    public function getPageNumber(): int
    {
        return $this->pageNumber;
    }

    /**
     * @param int $pageNumber
     *
     * @return TextTag
     */
    public function setPageNumber(int $pageNumber): TextTag
    {
        $this->pageNumber = $pageNumber;

        return $this;
    }

    /**
     * @return null|array
     */
    public function getEnumerationOptions(): ?array
    {
        return $this->enumerationOptions;
    }

    /**
     * @param array $enumerationOptions
     *
     * @return TextTag
     */
    public function setEnumerationOptions(array $enumerationOptions): TextTag
    {
        $this->enumerationOptions = $enumerationOptions;

        return $this;
    }

    /**
     * @return null|array
     */
    public function getRadio(): ?array
    {
        return $this->radio;
    }

    /**
     * @param array $radio
     *
     * @return TextTag
     */
    public function setRadio(array $radio): TextTag
    {
        $this->radio = $radio;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $data = [
            'tag_name' => $this->getTagName(),
            'type' => $this->getType(),
            'role' => $this->getRole(),
            'height' => $this->getHeight(),
            'width' => $this->getWidth(),
            'required' => $this->isRequired(),
        ];

        if ($this->getLabel() !== null) {
            $data['label'] = $this->getLabel();
        }

        if ($this->getLockToSignDate() !== null) {
            $data['lock_to_sign_date'] = $this->getLockToSignDate();
        }

        if ($this->getCustomDefinedOption() !== null) {
            $data['custom_defined_option'] = $this->getCustomDefinedOption();
        }

        if ($this->getValidatorId() !== null) {
            $data['validator_id'] = $this->getValidatorId();
        }

        if ($this->getPrefilledText() !== null) {
            $data['prefilled_text'] = $this->getPrefilledText();
        }

        if ($this->getRadio() !== null) {
            $data['radio'] = $this->getRadio();
        }

        if ($this->getEnumerationOptions() !== null) {
            $data['enumeration_options'] = $this->getEnumerationOptions();
        }

        return $data;
    }
}
