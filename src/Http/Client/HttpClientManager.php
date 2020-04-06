<?php

namespace MilesChou\Psr\Http\Client;

use MilesChou\Psr\Http\Message\HttpFactoryInterface;
use MilesChou\Psr\Http\Message\Traits\RequestFactoryDetector;
use MilesChou\Psr\Http\Message\Traits\ResponseFactoryDetector;
use MilesChou\Psr\Http\Message\Traits\ServerRequestFactoryDetector;
use MilesChou\Psr\Http\Message\Traits\StreamFactoryDetector;
use MilesChou\Psr\Http\Message\Traits\UploadedFileFactoryDetector;
use MilesChou\Psr\Http\Message\Traits\UriFactoryDetector;
use OutOfRangeException;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class HttpClientManager implements HttpClientInterface
{
    use ClientAwareTrait;
    use RequestFactoryDetector;
    use ResponseFactoryDetector;
    use ServerRequestFactoryDetector;
    use StreamFactoryDetector;
    use UploadedFileFactoryDetector;
    use UriFactoryDetector;

    /**
     * @var array<ClientInterface>
     */
    private $drivers = [];

    /**
     * @param ClientInterface $httpClient
     */
    public function __construct(ClientInterface $httpClient)
    {
        $this->setDefault($httpClient);
    }

    /**
     * Register a HTTP client
     *
     * @param string $name
     * @param ClientInterface $client
     */
    public function add(string $name, ClientInterface $client): void
    {
        $this->drivers[$name] = $client;
    }

    /**
     * @param string $name
     * @return ClientInterface
     */
    public function driver(?string $name = null): ClientInterface
    {
        if (null === $name) {
            return $this->httpClient;
        }

        if ($this->has($name)) {
            return $this->drivers[$name];
        }

        throw new OutOfRangeException("Client driver '{$name}' is not found");
    }

    /**
     * @param string $name
     * @return bool
     */
    public function has(string $name): bool
    {
        return isset($this->drivers[$name]);
    }

    /**
     * Proxy to httpClient driver
     *
     * @param RequestInterface $request
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     */
    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        return $this->httpClient->sendRequest($request);
    }

    /**
     * Alias to setHttpClient()
     *
     * @param ClientInterface $httpClient
     * @return $this
     */
    public function setDefault(ClientInterface $httpClient): self
    {
        $this->setHttpClient($httpClient);

        return $this;
    }

    /**
     * @param HttpFactoryInterface $httpFactory
     * @return $this
     */
    public function setHttpFactory(HttpFactoryInterface $httpFactory): self
    {
        $this->setRequestFactory($httpFactory);
        $this->setResponseFactory($httpFactory);
        $this->setServerRequestFactory($httpFactory);
        $this->setStreamFactory($httpFactory);
        $this->setUploadedFileFactory($httpFactory);
        $this->setUriFactory($httpFactory);

        return $this;
    }
}
