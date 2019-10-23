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
            'request_timeout' => 30,
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
        return array_merge(['Content-Type' => 'application/json'], $this->customHeaders);
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
}
