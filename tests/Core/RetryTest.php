<?php

namespace Tests\Core;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Http\Discovery\Psr17FactoryDiscovery;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Prelude\Core\BaseClient;
use Prelude\Core\Exceptions\RateLimitException;
use Prelude\RequestOptions;

/**
 * @internal
 *
 * @coversNothing
 */
#[CoversNothing]
class RetryTest extends TestCase
{
    #[Test]
    public function testDoesNotRetryWhenShouldRetryHeaderIsFalse(): void
    {
        [$client, $mock] = $this->buildClient([
            new Response(429, ['X-Should-Retry' => 'false', 'Retry-After' => '737'], '{}'),
            new Response(200, ['Content-Type' => 'application/json'], '{}'),
        ]);

        $start = microtime(true);

        try {
            $client->request('POST', '/v2/verification');
            $this->fail('Expected a RateLimitException');
        } catch (RateLimitException) {
        }

        $this->assertCount(1, $mock);
        $this->assertLessThan(1.0, microtime(true) - $start);
    }

    #[Test]
    public function testRetriesWhenShouldRetryHeaderIsTrue(): void
    {
        [$client, $mock] = $this->buildClient([
            new Response(400, ['X-Should-Retry' => 'true'], '{}'),
            new Response(200, ['Content-Type' => 'application/json'], '{}'),
        ]);

        $client->request('GET', '/');

        $this->assertCount(0, $mock);
    }

    #[Test]
    public function testRetriesRateLimitWithoutShouldRetryHeader(): void
    {
        [$client, $mock] = $this->buildClient([
            new Response(429, [], '{}'),
            new Response(200, ['Content-Type' => 'application/json'], '{}'),
        ]);

        $client->request('GET', '/');

        $this->assertCount(0, $mock);
    }

    #[Test]
    public function testWaitsForShortRetryAfter(): void
    {
        [$client, $mock] = $this->buildClient([
            new Response(429, ['Retry-After' => '1'], '{}'),
            new Response(200, ['Content-Type' => 'application/json'], '{}'),
        ]);

        $start = microtime(true);
        $client->request('GET', '/');

        $this->assertCount(0, $mock);
        $this->assertGreaterThanOrEqual(1.0, microtime(true) - $start);
    }

    #[Test]
    public function testIgnoresLongRetryAfter(): void
    {
        [$client, $mock] = $this->buildClient([
            new Response(429, ['Retry-After' => '737'], '{}'),
            new Response(200, ['Content-Type' => 'application/json'], '{}'),
        ]);

        $start = microtime(true);
        $client->request('GET', '/');

        $this->assertCount(0, $mock);
        $this->assertLessThan(1.0, microtime(true) - $start);
    }

    /**
     * @param list<Response> $responses
     *
     * @return array{BaseClient, MockHandler}
     */
    private function buildClient(array $responses): array
    {
        $mock = new MockHandler($responses);
        $guzzle = new GuzzleClient(['handler' => HandlerStack::create($mock), 'http_errors' => false]);

        $options = RequestOptions::with(
            initialRetryDelay: 0.01,
            transporter: $guzzle,
            uriFactory: Psr17FactoryDiscovery::findUriFactory(),
            requestFactory: Psr17FactoryDiscovery::findRequestFactory(),
            streamFactory: Psr17FactoryDiscovery::findStreamFactory(),
        );

        $client = new class(headers: [], baseUrl: 'http://localhost', options: $options) extends BaseClient {};

        return [$client, $mock];
    }
}
