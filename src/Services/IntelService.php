<?php

declare(strict_types=1);

namespace Prelude\Services;

use Prelude\Client;
use Prelude\ServiceContracts\IntelContract;
use Prelude\Services\Intel\KYCService;

final class IntelService implements IntelContract
{
    /**
     * @api
     */
    public IntelRawService $raw;

    /**
     * @api
     */
    public KYCService $kyc;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new IntelRawService($client);
        $this->kyc = new KYCService($client);
    }
}
