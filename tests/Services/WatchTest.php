<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Prelude\Client;
use Prelude\Watch\WatchPredictResponse;
use Prelude\Watch\WatchSendEventsResponse;
use Prelude\Watch\WatchSendFeedbacksResponse;

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
            target: ['type' => 'phone_number', 'value' => '+30123456789']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(WatchPredictResponse::class, $result);
    }

    #[Test]
    public function testPredictWithOptionalParams(): void
    {
        $result = $this->client->watch->predict(
            target: ['type' => 'phone_number', 'value' => '+30123456789'],
            dispatchID: '123e4567-e89b-12d3-a456-426614174000',
            metadata: ['correlationID' => 'correlation_id'],
            signals: [
                'appVersion' => '1.2.34',
                'deviceID' => '8F0B8FDD-C2CB-4387-B20A-56E9B2E5A0D2',
                'deviceModel' => 'iPhone17,2',
                'devicePlatform' => 'ios',
                'ip' => '203.0.113.123',
                'isTrustedUser' => false,
                'ja4Fingerprint' => 't13d1516h2_8daaf6152771_e5627efa2ab1',
                'osVersion' => '18.0.1',
                'userAgent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.0.3 Mobile/15E148 Safari/604.1',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(WatchPredictResponse::class, $result);
    }

    #[Test]
    public function testSendEvents(): void
    {
        $result = $this->client->watch->sendEvents(
            events: [
                [
                    'confidence' => 'maximum',
                    'label' => 'onboarding.start',
                    'target' => ['type' => 'phone_number', 'value' => '+30123456789'],
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(WatchSendEventsResponse::class, $result);
    }

    #[Test]
    public function testSendEventsWithOptionalParams(): void
    {
        $result = $this->client->watch->sendEvents(
            events: [
                [
                    'confidence' => 'maximum',
                    'label' => 'onboarding.start',
                    'target' => ['type' => 'phone_number', 'value' => '+30123456789'],
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(WatchSendEventsResponse::class, $result);
    }

    #[Test]
    public function testSendFeedbacks(): void
    {
        $result = $this->client->watch->sendFeedbacks(
            feedbacks: [
                [
                    'target' => ['type' => 'phone_number', 'value' => '+30123456789'],
                    'type' => 'verification.started',
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(WatchSendFeedbacksResponse::class, $result);
    }

    #[Test]
    public function testSendFeedbacksWithOptionalParams(): void
    {
        $result = $this->client->watch->sendFeedbacks(
            feedbacks: [
                [
                    'target' => ['type' => 'phone_number', 'value' => '+30123456789'],
                    'type' => 'verification.started',
                    'metadata' => ['correlationID' => 'correlation_id'],
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(WatchSendFeedbacksResponse::class, $result);
    }
}
