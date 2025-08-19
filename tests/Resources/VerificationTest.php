<?php

namespace Tests\Resources;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Prelude\Client;
use Prelude\Verification\VerificationCheckParams\Target as Target1;
use Prelude\Verification\VerificationCreateParams\Metadata;
use Prelude\Verification\VerificationCreateParams\Options;
use Prelude\Verification\VerificationCreateParams\Options\AppRealm;
use Prelude\Verification\VerificationCreateParams\Signals;
use Prelude\Verification\VerificationCreateParams\Target;
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

        $result = $this->client->verification->create(
            target: Target::with(type: 'phone_number', value: '+30123456789')
        );

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped("Prism doesn't support callbacks yet");
        }

        $result = $this->client->verification->create(
            target: Target::with(type: 'phone_number', value: '+30123456789'),
            dispatchID: '123e4567-e89b-12d3-a456-426614174000',
            metadata: (new Metadata)->withCorrelationID('correlation_id'),
            options: (new Options)
                ->withAppRealm(AppRealm::with(platform: 'android', value: 'value'))
                ->withCallbackURL('callback_url')
                ->withCodeSize(5)
                ->withCustomCode('123456')
                ->withLocale('el-GR')
                ->withMethod('auto')
                ->withPreferredChannel('sms')
                ->withSenderID('sender_id')
                ->withTemplateID('prelude:psd2')
                ->withVariables(['foo' => 'bar']),
            signals: (new Signals)
                ->withAppVersion('1.2.34')
                ->withDeviceID('8F0B8FDD-C2CB-4387-B20A-56E9B2E5A0D2')
                ->withDeviceModel('iPhone17,2')
                ->withDevicePlatform('ios')
                ->withIP('192.0.2.1')
                ->withIsTrustedUser(false)
                ->withOsVersion('18.0.1')
                ->withUserAgent(
                    'Mozilla/5.0 (iPhone; CPU iPhone OS 14_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.0.3 Mobile/15E148 Safari/604.1',
                ),
        );

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testCheck(): void
    {
        $result = $this->client->verification->check(
            code: '12345',
            target: Target1::with(type: 'phone_number', value: '+30123456789'),
        );

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testCheckWithOptionalParams(): void
    {
        $result = $this->client->verification->check(
            code: '12345',
            target: Target1::with(type: 'phone_number', value: '+30123456789'),
        );

        $this->assertTrue(true); // @phpstan-ignore-line
    }
}
