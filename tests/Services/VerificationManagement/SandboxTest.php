<?php

namespace Tests\Services\VerificationManagement;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Prelude\Client;
use Prelude\Core\Util;
use Prelude\VerificationManagement\Sandbox\SandboxAddPhoneNumberResponse;
use Prelude\VerificationManagement\Sandbox\SandboxDeletePhoneNumberResponse;
use Prelude\VerificationManagement\Sandbox\SandboxListPhoneNumbersResponse;

/**
 * @internal
 */
#[CoversNothing]
final class SandboxTest extends TestCase
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
    public function testAddPhoneNumber(): void
    {
        $result = $this->client->verificationManagement->sandbox->addPhoneNumber(
            attemptCode: '123456',
            phoneNumber: '+30123456789'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SandboxAddPhoneNumberResponse::class, $result);
    }

    #[Test]
    public function testAddPhoneNumberWithOptionalParams(): void
    {
        $result = $this->client->verificationManagement->sandbox->addPhoneNumber(
            attemptCode: '123456',
            phoneNumber: '+30123456789'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SandboxAddPhoneNumberResponse::class, $result);
    }

    #[Test]
    public function testDeletePhoneNumber(): void
    {
        $result = $this->client->verificationManagement->sandbox->deletePhoneNumber(
            '+12065550100'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SandboxDeletePhoneNumberResponse::class, $result);
    }

    #[Test]
    public function testListPhoneNumbers(): void
    {
        $result = $this->client->verificationManagement->sandbox->listPhoneNumbers(
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SandboxListPhoneNumbersResponse::class, $result);
    }
}
