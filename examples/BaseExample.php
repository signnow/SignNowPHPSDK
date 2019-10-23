<?php
declare(strict_types = 1);

namespace Examples;

use SignNow\Rest\EntityManager;

/**
 * Class BaseExample
 *
 * @package Examples
 */
abstract class BaseExample
{
    /**
     * @var EntityManager
     */
    protected $entityManager;
    
    /**
     * @var array
     */
    protected $arguments;
    
    /**
     * @var array
     */
    protected $requiredParameters = [];
    
    /**
     * @var array
     */
    protected $additionalParameters = [];
    
    /**
     * BaseExample constructor.
     *
     * @param EntityManager $entityManager
     * @param array         $config
     */
    public function __construct(EntityManager $entityManager, array $config = [])
    {
        $parameters = array_merge($this->additionalParameters, $this->requiredParameters);
        $this->getArguments($parameters, $config);
        $this->entityManager = $entityManager;
        $this->validateRequiredParams($this->requiredParameters);
    }
    
    /**
     * @param array $parameters
     * @param array $config
     */
    private function getArguments(array $parameters = [], array $config = []): void
    {
        $this->arguments = getopt('', $parameters);
        foreach ($parameters as $parameter) {
            $key = trim($parameter, ':');
            if (!isset($this->arguments[$key])) {
                $this->arguments[$key] = $config[$key] ?? null;
            }
        }
    }
    
    /**
     * @param $params
     * @return void
     */
    private function validateRequiredParams(array $params): void
    {
        foreach ($params as $paramKey) {
            $key = trim($paramKey, ':');
            if (!isset($this->arguments[$key])) {
                throw new \RuntimeException("Parameter [$key] required");
            }
        }
    }
    
    /**
     * @return mixed
     */
    abstract public function execute();
}
