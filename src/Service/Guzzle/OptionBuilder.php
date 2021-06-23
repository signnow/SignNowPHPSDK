<?php
declare(strict_types = 1);

namespace SignNow\Api\Service\Guzzle;

use GuzzleHttp\Handler\CurlMultiHandler;
use GuzzleHttp\HandlerStack;
use SignNow\Api\Service\OAuth\TokenInterface;

/**
 * Class OptionBuilder
 *
 * @package SignNow\Api\Service\Guzzle
 */
class OptionBuilder
{
    private const USER_AGENT = 'SignNow PHP API Client';
    private const VERSION = 'v2.0.0';
    private const CONTENT_TYPE = 'application/json';
    private const RUNTIME_AGENT = 'php';
    
    /**
     * @var string
     */
    private $uri;
    
    /**
     * @var array
     */
    private $customHeaders = [];
    
    /**
     * @var array
     */
    private $customMiddlewares = [];
    
    /**
     * @var TokenInterface
     */
    private $authToken;
    
    /**
     * @param array $headers
     *
     * @return OptionBuilder
     */
    public function setHeaders(array $headers): self
    {
        $this->customHeaders = $headers;
        
        return $this;
    }
    
    /**
     * @param array $middlewares
     *
     * @return OptionBuilder
     */
    public function setMiddlewares(array $middlewares): self
    {
        $this->customMiddlewares = $middlewares;
        
        return $this;
    }
    
    /**
     * @param TokenInterface $token
     *
     * @return OptionBuilder
     */
    public function useAuthorization(TokenInterface $token): self
    {
        $this->authToken = $token;
        
        return $this;
    }
    
    /**
     * @param string $uri
     *
     * @return $this
     */
    public function setUri(string $uri): self
    {
        $this->uri = $uri;
        
        return $this;
    }
    
    /**
     * @return array
     */
    public function getOptions(): array
    {
        $stack = HandlerStack::create();
        $stack->setHandler(new CurlMultiHandler());
        
        $middlewares = $this->prepareMiddlewares();
        foreach ($middlewares as $middleware) {
            $stack->push($middleware);
        }
        
        $options = [
            'headers'         => $this->prepareHeaders(),
            'connect_timeout' => 30,
            'timeout'         => 30,
            'handler'         => $stack,
        ];
        
        if (!empty($this->uri)) {
            $options['base_uri'] = $this->uri;
        }
    
        return $options;
    }
    
    /**
     * @return array
     */
    private function prepareHeaders(): array
    {
        $userAgentHeaderInfo = $this->getUserAgentInfo();
        $defaultHeaders = [
            'Content-Type' => self::CONTENT_TYPE,
            'User-Agent' => sprintf(
                "%s/%s (%s %s; %s; %s) %s/%s",
                $userAgentHeaderInfo['clientName'],
                $userAgentHeaderInfo['clientVersion'],
                $userAgentHeaderInfo['osType'],
                $userAgentHeaderInfo['osRelease'],
                $userAgentHeaderInfo['platform'],
                $userAgentHeaderInfo['architecture'],
                $userAgentHeaderInfo['runtime'],
                $userAgentHeaderInfo['version']
            )
        ];
    
        return array_merge($defaultHeaders, $this->customHeaders);
    }
    
    /**
     * @return array
     */
    private function prepareMiddlewares(): array
    {
        $middlewares = array_merge($this->getDefaultMiddlewares(), $this->customMiddlewares);
        
        if ($this->authToken) {
            array_unshift($middlewares, new AuthorizationMiddleware($this->authToken));
        }
        
        return $middlewares;
    }
    
    /**
     * @return array
     */
    private function getDefaultMiddlewares(): array
    {
        return [
            new ResponseCheckerMiddleware(),
        ];
    }
    
    /**
     * @return array
     */
    private function getUserAgentInfo(): array
    {
        $systemName = php_uname('s');
        
        return [
            'clientName' => self::USER_AGENT,
            'clientVersion' => self::VERSION,
            'osType' => $systemName,
            'osRelease' => php_uname('r'),
            'platform' => $this->getUserAgentPlatform($systemName),
            'architecture' => php_uname('m'),
            'runtime' => self::RUNTIME_AGENT,
            'version' => sprintf('%d.%d.%d', PHP_MAJOR_VERSION, PHP_MINOR_VERSION, PHP_RELEASE_VERSION)
        ];
    }
    
    /**
     * @param string $systemName
     *
     * @return string
     */
    private function getUserAgentPlatform(string $systemName): string
    {
        switch (strtolower($systemName)) {
            case 'windows':
                return 'win32';
            case 'darwin':
                return 'mac';
            case 'linux':
            case 'freebsd':
                return 'unix';
            default:
                return 'unknown';
        }
    }
}
