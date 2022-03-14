<?php

declare(strict_types=1);

namespace SignNow\Api\Action\Data\EmbeddedDocumentGroupInvite;

/**
 * Class AuthenticationMethod
 *
 * @package SignNow\Api\Action\Data\EmbeddedDocumentGroupInvite
 */
class AuthenticationMethod
{
    public const AUTH_METHOD_PASSWORD = 'password';
    public const AUTH_METHOD_EMAIL = 'email';
    public const AUTH_METHOD_MFA = 'mfa';
    public const AUTH_METHOD_SOCIAL = 'social';
    public const AUTH_METHOD_BIOMETRIC = 'biometric';
    public const AUTH_METHOD_OTHER = 'other';
    public const AUTH_METHOD_NONE = 'none';
}
