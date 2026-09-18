<?php

declare(strict_types=1);

namespace Prelude\Services;

use Prelude\Client;
use Prelude\ServiceContracts\IntelRawContract;

final class IntelRawService implements IntelRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
