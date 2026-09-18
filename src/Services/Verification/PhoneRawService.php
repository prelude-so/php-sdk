<?php

declare(strict_types=1);

namespace Prelude\Services\Verification;

use Prelude\Client;
use Prelude\ServiceContracts\Verification\PhoneRawContract;

final class PhoneRawService implements PhoneRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
