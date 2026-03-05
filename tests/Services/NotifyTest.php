<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Prelude\Client;
use Prelude\Core\Util;
use Prelude\Notify\NotifyGetSubscriptionConfigResponse;
use Prelude\Notify\NotifyGetSubscriptionPhoneNumberResponse;
use Prelude\Notify\NotifyListSubscriptionConfigsResponse;
use Prelude\Notify\NotifyListSubscriptionPhoneNumberEventsResponse;
use Prelude\Notify\NotifyListSubscriptionPhoneNumbersResponse;
use Prelude\Notify\NotifySendBatchResponse;
use Prelude\Notify\NotifySendResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class NotifyTest extends TestCase
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
    public function testGetSubscriptionConfig(): void
    {
        $result = $this->client->notify->getSubscriptionConfig('config_id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            NotifyGetSubscriptionConfigResponse::class,
            $result
        );
    }

    #[Test]
    public function testGetSubscriptionPhoneNumber(): void
    {
        $result = $this->client->notify->getSubscriptionPhoneNumber(
            'phone_number',
            configID: 'config_id'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            NotifyGetSubscriptionPhoneNumberResponse::class,
            $result
        );
    }

    #[Test]
    public function testGetSubscriptionPhoneNumberWithOptionalParams(): void
    {
        $result = $this->client->notify->getSubscriptionPhoneNumber(
            'phone_number',
            configID: 'config_id'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            NotifyGetSubscriptionPhoneNumberResponse::class,
            $result
        );
    }

    #[Test]
    public function testListSubscriptionConfigs(): void
    {
        $result = $this->client->notify->listSubscriptionConfigs();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            NotifyListSubscriptionConfigsResponse::class,
            $result
        );
    }

    #[Test]
    public function testListSubscriptionPhoneNumberEvents(): void
    {
        $result = $this->client->notify->listSubscriptionPhoneNumberEvents(
            'phone_number',
            configID: 'config_id'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            NotifyListSubscriptionPhoneNumberEventsResponse::class,
            $result
        );
    }

    #[Test]
    public function testListSubscriptionPhoneNumberEventsWithOptionalParams(): void
    {
        $result = $this->client->notify->listSubscriptionPhoneNumberEvents(
            'phone_number',
            configID: 'config_id',
            cursor: 'cursor',
            limit: 1
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            NotifyListSubscriptionPhoneNumberEventsResponse::class,
            $result
        );
    }

    #[Test]
    public function testListSubscriptionPhoneNumbers(): void
    {
        $result = $this->client->notify->listSubscriptionPhoneNumbers('config_id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            NotifyListSubscriptionPhoneNumbersResponse::class,
            $result
        );
    }

    #[Test]
    public function testSend(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server doesn\'t support callbacks yet');
        }

        $result = $this->client->notify->send(
            templateID: 'template_01k8ap1btqf5r9fq2c8ax5fhc9',
            to: '+33612345678'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(NotifySendResponse::class, $result);
    }

    #[Test]
    public function testSendWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server doesn\'t support callbacks yet');
        }

        $result = $this->client->notify->send(
            templateID: 'template_01k8ap1btqf5r9fq2c8ax5fhc9',
            to: '+33612345678',
            callbackURL: 'https://your-app.com/webhooks/notify',
            correlationID: 'order-12345',
            document: [
                'filename' => 'invoice.pdf', 'url' => 'https://example.com/invoice.pdf',
            ],
            expiresAt: new \DateTimeImmutable('2025-12-25T18:00:00Z'),
            from: 'from',
            locale: 'el-GR',
            preferredChannel: 'whatsapp',
            scheduleAt: new \DateTimeImmutable('2025-12-25T10:00:00Z'),
            variables: ['order_id' => '12345', 'amount' => '$49.99'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(NotifySendResponse::class, $result);
    }

    #[Test]
    public function testSendBatch(): void
    {
        $result = $this->client->notify->sendBatch(
            templateID: 'template_01k8ap1btqf5r9fq2c8ax5fhc9',
            to: ['+33612345678', '+15551234567'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(NotifySendBatchResponse::class, $result);
    }

    #[Test]
    public function testSendBatchWithOptionalParams(): void
    {
        $result = $this->client->notify->sendBatch(
            templateID: 'template_01k8ap1btqf5r9fq2c8ax5fhc9',
            to: ['+33612345678', '+15551234567'],
            callbackURL: 'https://your-app.com/webhooks/notify',
            correlationID: 'campaign-12345',
            document: [
                'filename' => 'invoice.pdf', 'url' => 'https://example.com/invoice.pdf',
            ],
            expiresAt: new \DateTimeImmutable('2025-12-25T18:00:00Z'),
            from: 'from',
            locale: 'el-GR',
            preferredChannel: 'whatsapp',
            scheduleAt: new \DateTimeImmutable('2025-12-25T10:00:00Z'),
            variables: ['order_id' => '12345', 'amount' => '$49.99'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(NotifySendBatchResponse::class, $result);
    }
}
