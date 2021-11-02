<?php
declare(strict_types=1);

namespace SignNow\Api\Entity\DocumentGroup\GroupInvite;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class CompletionEmail
 *
 * @package SignNow\Api\Entity\DocumentGroup\GroupInvite
 */
class CompletionEmail
{
    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    private $email;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    private $disabled = false;

    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    private $subject;

    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    private $message;

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
     * @return CompletionEmail
     */
    public function setEmail(string $email): CompletionEmail
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDisabled(): bool
    {
        return $this->disabled;
    }

    /**
     * @param bool $disabled
     *
     * @return CompletionEmail
     */
    public function setDisabled(bool $disabled): CompletionEmail
    {
        $this->disabled = $disabled;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }

    /**
     * @param string|null $subject
     *
     * @return CompletionEmail
     */
    public function setSubject(?string $subject): CompletionEmail
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string|null $message
     *
     * @return CompletionEmail
     */
    public function setMessage(?string $message): CompletionEmail
    {
        $this->message = $message;

        return $this;
    }
}
