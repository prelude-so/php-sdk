<?php

namespace Tests\Resources;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Prelude\Client;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class TransactionalTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiToken: 'My API Token', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testSend(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped("Prism doesn't support callbacks yet");
        }

        $result = $this->client->transactional->send(
            templateID: 'template_01jd1xq0cffycayqtdkdbv4d61',
            to: '+30123456789'
        );

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testSendWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped("Prism doesn't support callbacks yet");
        }

        $result = $this->client->transactional->send(
            templateID: 'template_01jd1xq0cffycayqtdkdbv4d61',
            to: '+30123456789',
            callbackURL: 'callback_url',
            correlationID: 'correlation_id',
            expiresAt: 'expires_at',
            from: 'from',
            locale: 'el-GR',
            variables: ['foo' => 'bar'],
        );

        $this->assertTrue(true); // @phpstan-ignore-line
    }
}
