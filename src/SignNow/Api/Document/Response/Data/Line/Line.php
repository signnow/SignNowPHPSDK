<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data\Line;

readonly class Line
{
    public function __construct(
        private string $id,
        private string $pageNumber,
        private string $subtype,
        private string $x,
        private string $y,
        private string $width,
        private string $height,
        private string $lineWidth,
        private ControlPointCollection $controlPoints,
        private string $created,
        private bool $allowEditing,
        private ?string $userId = null,
        private string $email = '',
        private ?string $fillColor = null,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getUserId(): ?string
    {
        return $this->userId;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPageNumber(): string
    {
        return $this->pageNumber;
    }

    public function getSubtype(): string
    {
        return $this->subtype;
    }

    public function getX(): string
    {
        return $this->x;
    }

    public function getY(): string
    {
        return $this->y;
    }

    public function getWidth(): string
    {
        return $this->width;
    }

    public function getHeight(): string
    {
        return $this->height;
    }

    public function getFillColor(): ?string
    {
        return $this->fillColor;
    }

    public function getLineWidth(): string
    {
        return $this->lineWidth;
    }

    public function getControlPoints(): ControlPointCollection
    {
        return $this->controlPoints;
    }

    public function getCreated(): string
    {
        return $this->created;
    }

    public function isAllowEditing(): bool
    {
        return $this->allowEditing;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'user_id' => $this->getUserId(),
           'email' => $this->getEmail(),
           'page_number' => $this->getPageNumber(),
           'subtype' => $this->getSubtype(),
           'x' => $this->getX(),
           'y' => $this->getY(),
           'width' => $this->getWidth(),
           'height' => $this->getHeight(),
           'fill_color' => $this->getFillColor(),
           'line_width' => $this->getLineWidth(),
           'control_points' => $this->getControlPoints()->toArray(),
           'created' => $this->getCreated(),
           'allow_editing' => $this->isAllowEditing(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['page_number'],
            $data['subtype'],
            $data['x'],
            $data['y'],
            $data['width'],
            $data['height'],
            $data['line_width'],
            new ControlPointCollection($data['control_points']),
            $data['created'],
            $data['allow_editing'],
            $data['user_id'] ?? null,
            $data['email'] ?? '',
            $data['fill_color'] ?? null,
        );
    }
}
