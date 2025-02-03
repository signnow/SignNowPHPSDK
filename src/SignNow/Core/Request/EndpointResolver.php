<?php

/*
 * This file is a part of signNow SDK API client.
 *
 * (с) Copyright © 2011-present airSlate Inc. (https://www.signnow.com)
 *
 * For more details on copyright, see LICENSE.md file
 * that was distributed with this source code.
 */

declare(strict_types=1);

namespace SignNow\Core\Request;

use Error;
use ReflectionClass;
use SignNow\Exception\SignNowApiException;

class EndpointResolver
{
    /**
     * @throws SignNowApiException
     */
    public function resolve(RequestInterface $request): Endpoint
    {
        $reflector = new ReflectionClass($request);
        $attributes = $reflector->getAttributes();

        if (!isset($attributes[0])) {
            throw new SignNowApiException(
                sprintf('Class %s does not have required for Request attribute Endpoint.', get_class($request))
            );
        }

        $attribute = $attributes[0];
        try {
            return $attribute->newInstance();
        } catch (Error $error) {
            throw new SignNowApiException(
                sprintf(
                    'Class %s is not configured properly with attribute: %s',
                    get_class($request),
                    $error->getMessage()
                )
            );
        }
    }
}
