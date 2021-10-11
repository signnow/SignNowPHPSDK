<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Examples\BaseExample;
use SignNow\Api\Service\Guzzle\OptionBuilder;
use SignNow\Api\Service\OAuth\BasicToken;
use SignNow\Api\Service\OAuth\BearerToken;
use SignNow\Api\Service\Factory\TokenFactory;
use SignNow\Rest\EntityManagerFactory;
use SignNow\Rest\Http\Request;

require_once __DIR__ . '/../vendor/autoload.php';
$config = require_once __DIR__ . '/config/config.php';
AnnotationRegistry::registerLoader('class_exists');

$parameters = ["authtype:", "token:", "script:", "host:"];
$arguments = getopt('', $parameters);

foreach ($parameters as $parameter) {
    $key = trim($parameter, ':');
    if (!isset($arguments[$key])) {
        $arguments[$key] = $config['parameters'][$key] ?? null;
    }
}

if (!isset($arguments['authtype'], $arguments['token'], $arguments['script'], $arguments['host'])) {
    die("Please set all required parameters : authtype, token, script, host" . PHP_EOL);
}

if (!isset($config['map'][$arguments['script']])) {
    die("Undefined script: " . $arguments['script'] . PHP_EOL);
}

if (!in_array($arguments['authtype'], [BasicToken::TYPE, BearerToken::TYPE], true)) {
    die("Undefined auth type: " . $arguments['script'] . PHP_EOL);
}

$token = (new TokenFactory())->createToken($arguments['authtype'], $arguments['token']);

$options = (new OptionBuilder())
    ->setUri($arguments['host'])
    ->useAuthorization($token)
    ->getOptions();

$entityManager = (new EntityManagerFactory())->createEntityManager($options);
$entityManager->setUpdateHttpMethod(Request::METHOD_PUT);

try {
    /** @var BaseExample $example */
    $example = new $config['map'][$arguments['script']]($entityManager, $config['parameters']);
    print_r($example->execute());
} catch (Throwable $exception) {
    print "Error during script execute: " . $exception->getMessage() . PHP_EOL;
}

