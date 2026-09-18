<?php

namespace Tests\Services\Intel;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Prelude\Client;
use Prelude\Core\Util;
use Prelude\Intel\KYC\KYCMatchResponse;

/**
 * @internal
 */
#[CoversNothing]
final class KYCTest extends TestCase
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
    public function testMatch(): void
    {
        $result = $this->client->intel->kyc->match('+12065550100');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(KYCMatchResponse::class, $result);
    }
}
