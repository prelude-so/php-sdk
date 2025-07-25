<?php

namespace Tests\Resources;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Prelude\Client;
use Prelude\Parameters\WatchPredictParam;
use Prelude\Parameters\WatchPredictParam\Metadata;
use Prelude\Parameters\WatchPredictParam\Signals;
use Prelude\Parameters\WatchPredictParam\Target;
use Prelude\Parameters\WatchSendEventsParam;
use Prelude\Parameters\WatchSendEventsParam\Event;
use Prelude\Parameters\WatchSendEventsParam\Event\Target as Target1;
use Prelude\Parameters\WatchSendFeedbacksParam;
use Prelude\Parameters\WatchSendFeedbacksParam\Feedback;
use Prelude\Parameters\WatchSendFeedbacksParam\Feedback\Metadata as Metadata1;
use Prelude\Parameters\WatchSendFeedbacksParam\Feedback\Signals as Signals1;
use Prelude\Parameters\WatchSendFeedbacksParam\Feedback\Target as Target2;

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
        $result = $this
            ->client
            ->watch
            ->predict(
                WatchPredictParam::new(
                    target: Target::new(type: 'phone_number', value: '+30123456789')
                )
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testPredictWithOptionalParams(): void
    {
        $result = $this
            ->client
            ->watch
            ->predict(
                WatchPredictParam::new(
                    target: Target::new(type: 'phone_number', value: '+30123456789'),
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
                )
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testSendEvents(): void
    {
        $result = $this
            ->client
            ->watch
            ->sendEvents(
                WatchSendEventsParam::new(
                    events: [
                        Event::new(
                            confidence: 'maximum',
                            label: 'onboarding.start',
                            target: Target1::new(type: 'phone_number', value: '+30123456789'),
                        ),
                    ],
                )
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testSendEventsWithOptionalParams(): void
    {
        $result = $this
            ->client
            ->watch
            ->sendEvents(
                WatchSendEventsParam::new(
                    events: [
                        Event::new(
                            confidence: 'maximum',
                            label: 'onboarding.start',
                            target: Target1::new(type: 'phone_number', value: '+30123456789'),
                        ),
                    ],
                )
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testSendFeedbacks(): void
    {
        $result = $this
            ->client
            ->watch
            ->sendFeedbacks(
                WatchSendFeedbacksParam::new(
                    feedbacks: [
                        Feedback::new(
                            target: Target2::new(type: 'phone_number', value: '+30123456789'),
                            type: 'verification.started',
                        ),
                    ],
                )
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testSendFeedbacksWithOptionalParams(): void
    {
        $result = $this
            ->client
            ->watch
            ->sendFeedbacks(
                WatchSendFeedbacksParam::new(
                    feedbacks: [
                        Feedback::new(
                            target: Target2::new(type: 'phone_number', value: '+30123456789'),
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
                )
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore-line
    }
}
