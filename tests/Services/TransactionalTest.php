<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Prelude\Client;
use Prelude\Core\Util;
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

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiToken: 'My API Token', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testSend(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism doesn\'t support callbacks yet');
        }

        $result = $this->client->transactional->send(
            templateID: 'template_01hynf45qvevj844m9az2x2f3c',
            to: '+30123456789'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TransactionalSendResponse::class, $result);
    }

    #[Test]
    public function testSendWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism doesn\'t support callbacks yet');
        }

        $result = $this->client->transactional->send(
            templateID: 'template_01hynf45qvevj844m9az2x2f3c',
            to: '+30123456789',
            callbackURL: 'callback_url',
            correlationID: 'correlation_id',
            document: [
                'filename' => 'invoice.pdf', 'url' => 'https://example.com/invoice.pdf',
            ],
            expiresAt: 'expires_at',
            from: 'from',
            locale: 'el-GR',
            preferredChannel: 'whatsapp',
            variables: ['foo' => 'bar'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TransactionalSendResponse::class, $result);
    }
}
