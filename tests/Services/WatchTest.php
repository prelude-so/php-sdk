<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Prelude\Client;
use Prelude\Watch\WatchPredictParams\Target;
use Prelude\Watch\WatchSendEventsParams\Event;
use Prelude\Watch\WatchSendEventsParams\Event\Target as Target1;
use Prelude\Watch\WatchSendFeedbacksParams\Feedback;
use Prelude\Watch\WatchSendFeedbacksParams\Feedback\Metadata;
use Prelude\Watch\WatchSendFeedbacksParams\Feedback\Signals;
use Prelude\Watch\WatchSendFeedbacksParams\Feedback\Target as Target2;

/**
 * @internal
 */
#[CoversNothing]
final class WatchTest extends TestCase
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
    public function testPredict(): void
    {
        $result = $this->client->watch->predict(
            target: Target::with(type: 'phone_number', value: '+30123456789')
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testPredictWithOptionalParams(): void
    {
        $result = $this->client->watch->predict(
            target: Target::with(type: 'phone_number', value: '+30123456789')
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSendEvents(): void
    {
        $result = $this->client->watch->sendEvents(
            [
                Event::with(
                    confidence: 'maximum',
                    label: 'onboarding.start',
                    target: Target1::with(type: 'phone_number', value: '+30123456789'),
                ),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSendEventsWithOptionalParams(): void
    {
        $result = $this->client->watch->sendEvents(
            [
                Event::with(
                    confidence: 'maximum',
                    label: 'onboarding.start',
                    target: Target1::with(type: 'phone_number', value: '+30123456789'),
                ),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSendFeedbacks(): void
    {
        $result = $this->client->watch->sendFeedbacks(
            [
                Feedback::with(
                    target: Target2::with(type: 'phone_number', value: '+30123456789'),
                    type: 'verification.started',
                ),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSendFeedbacksWithOptionalParams(): void
    {
        $result = $this->client->watch->sendFeedbacks(
            [
                Feedback::with(
                    target: Target2::with(type: 'phone_number', value: '+30123456789'),
                    type: 'verification.started',
                )
                    ->withDispatchID('123e4567-e89b-12d3-a456-426614174000')
                    ->withMetadata((new Metadata)->withCorrelationID('correlation_id'))
                    ->withSignals(
                        (new Signals)
                            ->withAppVersion('1.2.34')
                            ->withDeviceID('8F0B8FDD-C2CB-4387-B20A-56E9B2E5A0D2')
                            ->withDeviceModel('iPhone17,2')
                            ->withDevicePlatform('ios')
                            ->withIP('192.0.2.1')
                            ->withIsTrustedUser(false)
                            ->withJa4Fingerprint('t13d1516h2_8daaf6152771_e5627efa2ab1')
                            ->withOsVersion('18.0.1')
                            ->withUserAgent(
                                'Mozilla/5.0 (iPhone; CPU iPhone OS 14_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.0.3 Mobile/15E148 Safari/604.1',
                            ),
                    ),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
