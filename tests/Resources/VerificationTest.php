<?php

namespace Tests\Resources;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Prelude\Client;
use Prelude\Models\VerificationCheckParams;
use Prelude\Models\VerificationCheckParams\Target as Target1;
use Prelude\Models\VerificationCreateParams;
use Prelude\Models\VerificationCreateParams\Metadata;
use Prelude\Models\VerificationCreateParams\Options;
use Prelude\Models\VerificationCreateParams\Options\AppRealm;
use Prelude\Models\VerificationCreateParams\Signals;
use Prelude\Models\VerificationCreateParams\Target;

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
        $result = $this
            ->client
            ->verification
            ->create(
                VerificationCreateParams::new(
                    target: Target::new(type: 'phone_number', value: '+30123456789')
                )
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        $result = $this
            ->client
            ->verification
            ->create(
                VerificationCreateParams::new(
                    target: Target::new(type: 'phone_number', value: '+30123456789'),
                    dispatchID: '123e4567-e89b-12d3-a456-426614174000',
                    metadata: (new Metadata)->setCorrelationID('correlation_id'),
                    options: (new Options)
                        ->setAppRealm(AppRealm::new(platform: 'android', value: 'value'))
                        ->setCallbackURL('callback_url')
                        ->setCodeSize(5)
                        ->setCustomCode('123456')
                        ->setLocale('el-GR')
                        ->setMethod('auto')
                        ->setPreferredChannel('sms')
                        ->setSenderID('sender_id')
                        ->setTemplateID('prelude:psd2')
                        ->setVariables(['foo' => 'bar']),
                    signals: (new Signals)
                        ->setAppVersion('1.2.34')
                        ->setDeviceID('8F0B8FDD-C2CB-4387-B20A-56E9B2E5A0D2')
                        ->setDeviceModel('iPhone17,2')
                        ->setDevicePlatform('ios')
                        ->setIP('192.0.2.1')
                        ->setIsTrustedUser(false)
                        ->setOsVersion('18.0.1')
                        ->setUserAgent(
                            'Mozilla/5.0 (iPhone; CPU iPhone OS 14_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.0.3 Mobile/15E148 Safari/604.1',
                        ),
                )
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testCheck(): void
    {
        $result = $this
            ->client
            ->verification
            ->check(
                VerificationCheckParams::new(
                    code: '12345',
                    target: Target1::new(type: 'phone_number', value: '+30123456789'),
                )
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testCheckWithOptionalParams(): void
    {
        $result = $this
            ->client
            ->verification
            ->check(
                VerificationCheckParams::new(
                    code: '12345',
                    target: Target1::new(type: 'phone_number', value: '+30123456789'),
                )
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore-line
    }
}
