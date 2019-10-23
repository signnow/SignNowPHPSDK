<?php
declare(strict_types = 1);

namespace SignNow\Api\Service\OAuth;

/**
 * Class AbstractToken
 *
 * @package SignNow\Api\Service\OAuth
 */
abstract class AbstractToken implements TokenInterface
{
    public const TYPE = '';
    
    /**
     * @var string
     */
    private $token;
    
    /**
     * AbstractToken constructor.
     *
     * @param string $token
     */
    public function __construct(string  $token)
    {
        $this->token = $token;
    }
    
    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return  $this->token;
    }
    
    /**
     * @return string
     */
    public function getTokenType(): string
    {
        return static::TYPE;
    }
}
