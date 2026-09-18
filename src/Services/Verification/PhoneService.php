<?php

declare(strict_types=1);

namespace Prelude\Services\Verification;

use Prelude\Client;
use Prelude\ServiceContracts\Verification\PhoneContract;
use Prelude\Services\Verification\Phone\HistoryService;

final class PhoneService implements PhoneContract
{
    /**
     * @api
     */
    public PhoneRawService $raw;

    /**
     * @api
     */
    public HistoryService $history;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PhoneRawService($client);
        $this->history = new HistoryService($client);
    }
}
