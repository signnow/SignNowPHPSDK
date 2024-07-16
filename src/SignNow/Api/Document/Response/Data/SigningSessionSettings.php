<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data;

readonly class SigningSessionSettings
{
    public function __construct(
        private ?string $welcomeMessage,
    ) {
    }

    public function getWelcomeMessage(): ?string
    {
        return $this->welcomeMessage;
    }

    public function toArray(): array
    {
        return [
           'welcome_message' => $this->getWelcomeMessage(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['welcome_message'],
        );
    }
}
