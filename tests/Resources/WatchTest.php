<?php

namespace Tests\Resources;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Prelude\Client;
use Prelude\Watch\WatchPredictParams;
use Prelude\Watch\WatchPredictParams\Metadata;
use Prelude\Watch\WatchPredictParams\Signals;
use Prelude\Watch\WatchPredictParams\Target;
use Prelude\Watch\WatchSendEventsParams;
use Prelude\Watch\WatchSendEventsParams\Event;
use Prelude\Watch\WatchSendEventsParams\Event\Target as Target1;
use Prelude\Watch\WatchSendFeedbacksParams;
use Prelude\Watch\WatchSendFeedbacksParams\Feedback;
use Prelude\Watch\WatchSendFeedbacksParams\Feedback\Metadata as Metadata1;
use Prelude\Watch\WatchSendFeedbacksParams\Feedback\Signals as Signals1;
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
        $params = WatchPredictParams::from(
            target: Target::from(type: 'phone_number', value: '+30123456789')
        );
        $result = $this->client->watch->predict($params);

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testPredictWithOptionalParams(): void
    {
        $params = WatchPredictParams::from(
            target: Target::from(type: 'phone_number', value: '+30123456789'),
            dispatchID: '123e4567-e89b-12d3-a456-426614174000',
            metadata: (new Metadata)->setCorrelationID('correlation_id'),
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
        );
        $result = $this->client->watch->predict($params);

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testSendEvents(): void
    {
        $params = WatchSendEventsParams::from(
            events: [
                Event::from(
                    confidence: 'maximum',
                    label: 'onboarding.start',
                    target: Target1::from(type: 'phone_number', value: '+30123456789'),
                ),
            ],
        );
        $result = $this->client->watch->sendEvents($params);

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testSendEventsWithOptionalParams(): void
    {
        $params = WatchSendEventsParams::from(
            events: [
                Event::from(
                    confidence: 'maximum',
                    label: 'onboarding.start',
                    target: Target1::from(type: 'phone_number', value: '+30123456789'),
                ),
            ],
        );
        $result = $this->client->watch->sendEvents($params);

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testSendFeedbacks(): void
    {
        $params = WatchSendFeedbacksParams::from(
            feedbacks: [
                Feedback::from(
                    target: Target2::from(type: 'phone_number', value: '+30123456789'),
                    type: 'verification.started',
                ),
            ],
        );
        $result = $this->client->watch->sendFeedbacks($params);

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testSendFeedbacksWithOptionalParams(): void
    {
        $params = WatchSendFeedbacksParams::from(
            feedbacks: [
                Feedback::from(
                    target: Target2::from(type: 'phone_number', value: '+30123456789'),
                    type: 'verification.started',
                )
                    ->setDispatchID('123e4567-e89b-12d3-a456-426614174000')
                    ->setMetadata((new Metadata1)->setCorrelationID('correlation_id'))
                    ->setSignals(
                        (new Signals1)
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
                    ),
            ],
        );
        $result = $this->client->watch->sendFeedbacks($params);

        $this->assertTrue(true); // @phpstan-ignore-line
    }
}
