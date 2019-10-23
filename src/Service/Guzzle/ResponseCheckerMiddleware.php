<?php
declare(strict_types = 1);

namespace SignNow\Api\Service\Guzzle;

use Closure;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use SignNow\Api\Exception\ApiClientException;

/**
 * Class ResponseCheckerMiddleware
 *
 * @package SignNow\Api\Service\Guzzle
 */
class ResponseCheckerMiddleware
{
    /**
     * @param callable $handler
     *
     * @return Closure
     */
    public function __invoke(callable $handler): Closure
    {
        return function (RequestInterface $request, array $options) use ($handler) {
            /** @var PromiseInterface $promise */
            $promise = $handler($request, $options);

            return $promise
                ->then(
                    function (ResponseInterface $response) use ($request) {
                        $this->validate($response, $request);

                        return $response;
                    }
                );
        };
    }

    /**
     * @param ResponseInterface $response
     * @param RequestInterface  $request
     *
     * @throws ApiClientException
     */
    private function validate(ResponseInterface $response, RequestInterface $request): void
    {
        $body = $this->getBody($response);

        if ($this->hasErrors($body)) {
            $defaultMessage = sprintf(
                "Client error: %s %s ",
                $request->getMethod(),
                $request->getUri()->withFragment('')
            );

            throw new ApiClientException($this->getErrorMessage($body, $defaultMessage));
        }
    }

    /**
     * @param ResponseInterface $response
     *
     * @return array
     */
    private function getBody(ResponseInterface $response): array
    {
        $body = json_decode($response->getBody()->getContents(), true);
        $response->getBody()->rewind();

        return json_last_error() === JSON_ERROR_NONE ? $body : [];
    }

    /**
     * @param array $body
     *
     * @return bool
     */
    private function hasErrors(array $body): bool
    {
        return isset($body['errors']) && count($body['errors']) > 0;
    }

    /**
     * @param array  $body
     * @param string $defaultMessage
     *
     * @return string
     */
    private function getErrorMessage(array $body, string $defaultMessage): string
    {
        $messages = [$defaultMessage];
        $errors = isset($body['errors']) ? $body['errors'] : [];

        foreach ($errors as $error) {
            $errorMessage = ucfirst($this->getKeyValue($error, 'message'));
            $errorCode = $this->getKeyValue($error, 'code');

            if (!is_null($errorCode)) {
                $errorMessage = '[' . $errorCode . '] ' . $errorMessage;
            }
            $messages[] = $errorMessage;
        }
        return implode("\n", array_unique(array_filter($messages)));
    }

    /**
     * @param array  $array
     * @param string $key
     *
     * @return string|null
     */
    private function getKeyValue(array $array, string $key): ?string
    {
        return isset($array[$key]) ? (string) $array[$key] : null;
    }
}
