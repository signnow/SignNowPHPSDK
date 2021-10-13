<?php
declare(strict_types=1);

namespace SignNow\Api\Service\OAuth\AuthMethod;

/**
 * Class AuthMethod
 *
 * @package SignNow\Api\Service\OAuth\AuthMethod
 */
class AuthMethod
{
    public const PASSWORD = 'password';
    public const EMAIL = 'email';
    public const MFA = 'mfa';
    public const SOCIAL = 'social';
    public const BIOMETRIC = 'biometric';
    public const NONE = 'none';
    public const OTHER = 'other';
}
