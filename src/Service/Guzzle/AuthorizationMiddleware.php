<?php
declare(strict_types = 1);

namespace SignNow\Api\Service\Guzzle;

use Closure;
use Exception;
use Psr\Http\Message\RequestInterface;
use SignNow\Api\Service\OAuth\TokenInterface;

/**
 * Class AuthorizationMiddleware
 *
 * @package SignNow\Api\Service\Guzzle
 */
class AuthorizationMiddleware
{
    /** @string Name of the authorization header injected into the request */
    public const HEADER_AUTHORIZATION = 'Authorization';

    /**
     * @var TokenInterface
     */
    protected $token;

    /**
     * BearerMiddleware constructor.
     *
     * @param TokenInterface $token
     */
    public function __construct(TokenInterface $token)
    {
        $this->token = $token;
    }

    /**
     * @param callable $handler
     *
     * @return Closure
     */
    public function __invoke(callable $handler): Closure
    {
        return function (RequestInterface $request, array $options) use ($handler) {
            if (!$this->isAuthorized($request)) {
                $request = $this->getAuthorizedRequest($request);
            }

            return $handler($request, $options);
        };
    }

    /**
     * @param RequestInterface $request
     *
     * @return bool
     */
    public function isAuthorized(RequestInterface $request): bool
    {
        return $request->hasHeader(self::HEADER_AUTHORIZATION);
    }

    /**
     * @param RequestInterface $request
     *
     * @return RequestInterface
     * @throws Exception
     */
    protected function getAuthorizedRequest(RequestInterface $request): RequestInterface
    {
        /** @var RequestInterface $request */
        $request = $request->withHeader(
            self::HEADER_AUTHORIZATION,
            $this->token->getTokenType() . ' ' . $this->token->getAccessToken()
        );

        return $request;
    }
}
