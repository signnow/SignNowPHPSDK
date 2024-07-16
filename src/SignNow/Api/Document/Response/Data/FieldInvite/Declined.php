<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data\FieldInvite;

readonly class Declined
{
    public function __construct(
        private string $declinedText,
    ) {
    }

    public function getDeclinedText(): string
    {
        return $this->declinedText;
    }

    public function toArray(): array
    {
        return [
           'declined_text' => $this->getDeclinedText(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['declined_text'],
        );
    }
}
