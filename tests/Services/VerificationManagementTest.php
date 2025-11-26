<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Prelude\Client;
use Prelude\VerificationManagement\VerificationManagementDeletePhoneNumberResponse;
use Prelude\VerificationManagement\VerificationManagementListPhoneNumbersResponse;
use Prelude\VerificationManagement\VerificationManagementListSenderIDsResponse;
use Prelude\VerificationManagement\VerificationManagementSetPhoneNumberResponse;
use Prelude\VerificationManagement\VerificationManagementSubmitSenderIDResponse;

/**
 * @internal
 */
#[CoversNothing]
final class VerificationManagementTest extends TestCase
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
    public function testDeletePhoneNumber(): void
    {
        $result = $this->client->verificationManagement->deletePhoneNumber(
            'allow',
            ['phone_number' => '+30123456789']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            VerificationManagementDeletePhoneNumberResponse::class,
            $result
        );
    }

    #[Test]
    public function testDeletePhoneNumberWithOptionalParams(): void
    {
        $result = $this->client->verificationManagement->deletePhoneNumber(
            'allow',
            ['phone_number' => '+30123456789']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            VerificationManagementDeletePhoneNumberResponse::class,
            $result
        );
    }

    #[Test]
    public function testListPhoneNumbers(): void
    {
        $result = $this->client->verificationManagement->listPhoneNumbers('allow');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            VerificationManagementListPhoneNumbersResponse::class,
            $result
        );
    }

    #[Test]
    public function testListSenderIDs(): void
    {
        $result = $this->client->verificationManagement->listSenderIDs();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            VerificationManagementListSenderIDsResponse::class,
            $result
        );
    }

    #[Test]
    public function testSetPhoneNumber(): void
    {
        $result = $this->client->verificationManagement->setPhoneNumber(
            'allow',
            ['phone_number' => '+30123456789']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            VerificationManagementSetPhoneNumberResponse::class,
            $result
        );
    }

    #[Test]
    public function testSetPhoneNumberWithOptionalParams(): void
    {
        $result = $this->client->verificationManagement->setPhoneNumber(
            'allow',
            ['phone_number' => '+30123456789']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            VerificationManagementSetPhoneNumberResponse::class,
            $result
        );
    }

    #[Test]
    public function testSubmitSenderID(): void
    {
        $result = $this->client->verificationManagement->submitSenderID([
            'sender_id' => 'Prelude',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            VerificationManagementSubmitSenderIDResponse::class,
            $result
        );
    }

    #[Test]
    public function testSubmitSenderIDWithOptionalParams(): void
    {
        $result = $this->client->verificationManagement->submitSenderID([
            'sender_id' => 'Prelude',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            VerificationManagementSubmitSenderIDResponse::class,
            $result
        );
    }
}
