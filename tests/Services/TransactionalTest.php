<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Prelude\Client;
use Prelude\Transactional\TransactionalSendResponse;
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
            $this->markTestSkipped('Prism doesn\'t support callbacks yet');
        }

        $result = $this->client->transactional->send([
            'template_id' => 'template_01hynf45qvevj844m9az2x2f3c',
            'to' => '+30123456789',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TransactionalSendResponse::class, $result);
    }

    #[Test]
    public function testSendWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism doesn\'t support callbacks yet');
        }

        $result = $this->client->transactional->send([
            'template_id' => 'template_01hynf45qvevj844m9az2x2f3c',
            'to' => '+30123456789',
            'callback_url' => 'callback_url',
            'correlation_id' => 'correlation_id',
            'expires_at' => 'expires_at',
            'from' => 'from',
            'locale' => 'el-GR',
            'preferred_channel' => 'whatsapp',
            'variables' => ['foo' => 'bar'],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TransactionalSendResponse::class, $result);
    }
}
