<?php
declare(strict_types=1);

namespace SignNow\Api\Action\Data\Document;

/**
 * Class FieldType
 *
 * @package SignNow\Api\Action\Data\Document
 */
class TextTagFieldType
{
    public const ATTACHMENT  = 'attachment';
    public const CHECKBOX    = 'checkbox';
    public const ENUMERATION = 'enumeration';
    public const INITIALS    = 'initials';
    public const RADIOBUTTON = 'radiobutton';
    public const SIGNATURE   = 'signature';
    public const TEXT        = 'text';
}
