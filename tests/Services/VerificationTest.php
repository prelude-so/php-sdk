<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Prelude\Client;
use Prelude\Verification\VerificationCheckResponse;
use Prelude\Verification\VerificationNewResponse;
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
            $this->markTestSkipped('Prism doesn\'t support callbacks yet');
        }

        $result = $this->client->verification->create([
            'target' => ['type' => 'phone_number', 'value' => '+30123456789'],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VerificationNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism doesn\'t support callbacks yet');
        }

        $result = $this->client->verification->create([
            'target' => ['type' => 'phone_number', 'value' => '+30123456789'],
            'dispatch_id' => '123e4567-e89b-12d3-a456-426614174000',
            'metadata' => ['correlation_id' => 'correlation_id'],
            'options' => [
                'app_realm' => ['platform' => 'android', 'value' => 'value'],
                'callback_url' => 'callback_url',
                'code_size' => 5,
                'custom_code' => '123456',
                'integration' => 'auth0',
                'locale' => 'el-GR',
                'method' => 'auto',
                'preferred_channel' => 'sms',
                'sender_id' => 'sender_id',
                'template_id' => 'prelude:psd2',
                'variables' => ['foo' => 'bar'],
            ],
            'signals' => [
                'app_version' => '1.2.34',
                'device_id' => '8F0B8FDD-C2CB-4387-B20A-56E9B2E5A0D2',
                'device_model' => 'iPhone17,2',
                'device_platform' => 'ios',
                'ip' => '192.0.2.1',
                'is_trusted_user' => false,
                'ja4_fingerprint' => 't13d1516h2_8daaf6152771_e5627efa2ab1',
                'os_version' => '18.0.1',
                'user_agent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.0.3 Mobile/15E148 Safari/604.1',
            ],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VerificationNewResponse::class, $result);
    }

    #[Test]
    public function testCheck(): void
    {
        $result = $this->client->verification->check([
            'code' => '12345',
            'target' => ['type' => 'phone_number', 'value' => '+30123456789'],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VerificationCheckResponse::class, $result);
    }

    #[Test]
    public function testCheckWithOptionalParams(): void
    {
        $result = $this->client->verification->check([
            'code' => '12345',
            'target' => ['type' => 'phone_number', 'value' => '+30123456789'],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VerificationCheckResponse::class, $result);
    }
}
