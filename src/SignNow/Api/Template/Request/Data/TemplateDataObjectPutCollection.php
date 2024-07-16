<?php

declare(strict_types=1);

namespace SignNow\Api\Template\Request\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class TemplateDataObjectPutCollection extends TypedCollection
{
    public function add(TemplateDataObjectPut $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof TemplateDataObjectPut) {
            throw new InvalidArgumentException('Only TemplateDataObjectPut are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return TemplateDataObjectPut::class;
    }
}
