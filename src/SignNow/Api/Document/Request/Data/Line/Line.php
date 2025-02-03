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

namespace SignNow\Api\Document\Request\Data\Line;

readonly class Line
{
    public function __construct(
        private int $x,
        private int $y,
        private int $width,
        private int $height,
        private string $subtype,
        private int $pageNumber,
        private string $fillColor,
        private int $lineWidth,
        private ControlPointCollection $controlPoints = new ControlPointCollection(),
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

    public function getSubtype(): string
    {
        return $this->subtype;
    }

    public function getPageNumber(): int
    {
        return $this->pageNumber;
    }

    public function getFillColor(): string
    {
        return $this->fillColor;
    }

    public function getLineWidth(): int
    {
        return $this->lineWidth;
    }

    public function getControlPoints(): ControlPointCollection
    {
        return $this->controlPoints;
    }

    public function toArray(): array
    {
        return [
           'x' => $this->getX(),
           'y' => $this->getY(),
           'width' => $this->getWidth(),
           'height' => $this->getHeight(),
           'subtype' => $this->getSubtype(),
           'page_number' => $this->getPageNumber(),
           'fill_color' => $this->getFillColor(),
           'line_width' => $this->getLineWidth(),
           'control_points' => $this->getControlPoints()->toArray(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['x'],
            $data['y'],
            $data['width'],
            $data['height'],
            $data['subtype'],
            $data['page_number'],
            $data['fill_color'],
            $data['line_width'],
            new ControlPointCollection($data['control_points']),
        );
    }
}
