<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Prelude\Client;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class VerificationTest extends TestCase
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
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped("Prism doesn't support callbacks yet");
        }

        $result = $this->client->verification->create([
            'target' => ['type' => 'phone_number', 'value' => '+30123456789'],
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped("Prism doesn't support callbacks yet");
        }

        $result = $this->client->verification->create([
            'target' => ['type' => 'phone_number', 'value' => '+30123456789'],
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCheck(): void
    {
        $result = $this->client->verification->check([
            'code' => '12345',
            'target' => ['type' => 'phone_number', 'value' => '+30123456789'],
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCheckWithOptionalParams(): void
    {
        $result = $this->client->verification->check([
            'code' => '12345',
            'target' => ['type' => 'phone_number', 'value' => '+30123456789'],
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
