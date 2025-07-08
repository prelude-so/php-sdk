<?php

namespace Prelude\Tests\Resources;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Prelude\Client;
use Prelude\Models\LookupResponse;

/**
 * @internal
 */
#[CoversNothing]
final class LookupTest extends TestCase
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
    public function testLookup(): void
    {
        $result = $this->client->lookup->lookup('+12065550100', []);

        $this->assertInstanceOf(LookupResponse::class, $result);
    }
}
