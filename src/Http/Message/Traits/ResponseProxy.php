<?php

namespace MilesChou\Psr\Http\Message\Traits;

use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

trait ResponseProxy
{
    /**
     * @var ResponseInterface
     */
    protected $response;

    public function getProtocolVersion(): string
    {
        return $this->response->getProtocolVersion();
    }

    public function withProtocolVersion($version): MessageInterface
    {
        $clone = clone $this;
        $clone->response = $this->response->withProtocolVersion($version);

        return $clone;
    }

    public function getHeaders(): array
    {
        return $this->response->getHeaders();
    }

    public function hasHeader(string $name): bool
    {
        return $this->response->hasHeader($name);
    }

    public function getHeader(string $name): array
    {
        return $this->response->getHeader($name);
    }

    public function getHeaderLine(string $name): string
    {
        return $this->response->getHeaderLine($name);
    }

    public function withHeader(string $name, $value): MessageInterface
    {
        $clone = clone $this;
        $clone->response = $this->response->withHeader($name, $value);

        return $clone;
    }

    public function withAddedHeader(string $name, $value): MessageInterface
    {
        $clone = clone $this;
        $clone->response = $this->response->withAddedHeader($name, $value);

        return $clone;
    }

    public function withoutHeader(string $name): MessageInterface
    {
        $clone = clone $this;
        $clone->response = $this->response->withoutHeader($name);

        return $clone;
    }

    public function getBody(): StreamInterface
    {
        return $this->response->getBody();
    }

    public function withBody(StreamInterface $body): MessageInterface
    {
        $clone = clone $this;
        $clone->response = $this->response->withBody($body);

        return $clone;
    }

    public function getStatusCode(): int
    {
        return $this->response->getStatusCode();
    }

    public function withStatus(int $code, string $reasonPhrase = ''): ResponseInterface
    {
        $clone = clone $this;
        $clone->response = $this->response->withStatus($code, $reasonPhrase);

        return $clone;
    }

    public function getReasonPhrase(): string
    {
        return $this->response->getReasonPhrase();
    }
}
