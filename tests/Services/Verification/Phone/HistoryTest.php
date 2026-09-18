<?php

namespace Tests\Services\Verification\Phone;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Prelude\Client;
use Prelude\Core\Util;
use Prelude\Verification\Phone\History\HistoryGetResponse;
use Prelude\Verification\Phone\History\HistoryListResponse;

/**
 * @internal
 */
#[CoversNothing]
final class HistoryTest extends TestCase
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
    public function testRetrieve(): void
    {
        $result = $this->client->verification->phone->history->retrieve(
            'vrf_01jc0t6fwwfgfsq1md24mhyztj'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HistoryGetResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        $result = $this->client->verification->phone->history->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HistoryListResponse::class, $result);
    }
}
