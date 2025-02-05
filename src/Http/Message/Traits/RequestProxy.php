<?php

namespace MilesChou\Psr\Http\Message\Traits;

use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;

trait RequestProxy
{
    /**
     * @var RequestInterface
     */
    protected RequestInterface $request;

    /**
     * @inheritDoc
     *
     * @return string
     */
    public function getProtocolVersion(): string
    {
        return $this->request->getProtocolVersion();
    }

    /**
     * @inheritDoc
     *
     * @param string $version
     * @return static
     */
    public function withProtocolVersion(string $version): MessageInterface
    {
        $clone = clone $this;
        $clone->request = $this->request->withProtocolVersion($version);

        return $clone;
    }

    /**
     * @inheritDoc
     *
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->request->getHeaders();
    }

    /**
     * @inheritDoc
     *
     * @param string $name
     * @return bool
     */
    public function hasHeader(string $name): bool
    {
        return $this->request->hasHeader($name);
    }

    /**
     * @inheritDoc
     *
     * @param string $name
     * @return array
     */
    public function getHeader(string $name): array
    {
        return $this->request->getHeader($name);
    }

    /**
     * @inheritDoc
     *
     * @param string $name
     * @return string
     */
    public function getHeaderLine(string $name): string
    {
        return $this->request->getHeaderLine($name);
    }

    /**
     * @inheritDoc
     *
     * @param string $name
     * @param string|string[] $value
     * @return static
     */
    public function withHeader(string $name, $value): MessageInterface
    {
        $clone = clone $this;
        $clone->request = $this->request->withHeader($name, $value);

        return $clone;
    }

    /**
     * @inheritDoc
     *
     * @param string $name
     * @param string|string[] $value
     * @return static
     */
    public function withAddedHeader(string $name, $value): MessageInterface
    {
        $clone = clone $this;
        $clone->request = $this->request->withAddedHeader($name, $value);

        return $clone;
    }

    /**
     * @inheritDoc
     *
     * @param string $name
     * @return static
     */
    public function withoutHeader(string $name): MessageInterface
    {
        $clone = clone $this;
        $clone->request = $this->request->withoutHeader($name);

        return $clone;
    }

    /**
     * @inheritDoc
     *
     * @return StreamInterface
     */
    public function getBody(): StreamInterface
    {
        return $this->request->getBody();
    }

    /**
     * @inheritDoc
     *
     * @param StreamInterface $body
     * @return static
     */
    public function withBody(StreamInterface $body): MessageInterface
    {
        $clone = clone $this;
        $clone->request = $this->request->withBody($body);

        return $clone;
    }

    /**
     * @inheritDoc
     *
     * @return string
     */
    public function getRequestTarget(): string
    {
        return $this->request->getRequestTarget();
    }

    /**
     * @inheritDoc
     *
     * @param mixed $requestTarget
     * @return static
     */
    public function withRequestTarget(string $requestTarget): RequestInterface
    {
        $clone = clone $this;
        $clone->request = $this->request->withRequestTarget($requestTarget);

        return $clone;
    }

    /**
     * @inheritDoc
     *
     * @return string
     */
    public function getMethod(): string
    {
        return $this->request->getMethod();
    }

    /**
     * @inheritDoc
     *
     * @param string $method
     * @return static
     */
    public function withMethod(string $method): RequestInterface
    {
        $clone = clone $this;
        $clone->request = $this->request->withMethod($method);

        return $clone;
    }

    /**
     * @inheritDoc
     *
     * @return UriInterface
     */
    public function getUri(): UriInterface
    {
        return $this->request->getUri();
    }

    /**
     * @inheritDoc
     *
     * @param UriInterface $uri
     * @param bool $preserveHost
     * @return static
     */
    public function withUri(UriInterface $uri, bool $preserveHost = false): RequestInterface
    {
        $clone = clone $this;
        $clone->request = $this->request->withUri($uri, $preserveHost);

        return $clone;
    }
}
