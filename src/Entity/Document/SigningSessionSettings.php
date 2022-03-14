<?php

declare(strict_types=1);

namespace SignNow\Api\Entity\Document;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class SigningSessionSettings
 *
 * @package SignNow\Api\Entity\Document
 */
class SigningSessionSettings
{
    /**
     * @var null|string
     * @Serializer\Type("string")
     */
    private $welcomeMessage;

    /**
     * @return null|string
     */
    public function getWelcomeMessage(): ?string
    {
        return $this->welcomeMessage;
    }

    /**
     * @param string $welcomeMessage
     *
     * @return SigningSessionSettings
     */
    public function setWelcomeMessage(string $welcomeMessage): SigningSessionSettings
    {
        $this->welcomeMessage = $welcomeMessage;

        return $this;
    }
}
