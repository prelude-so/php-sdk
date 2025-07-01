<?php

declare(strict_types=1);

namespace Prelude\Core\Concerns;

use Prelude\Core\BaseClient;
use Prelude\Core\Pagination\PageRequestOptions;
use Psr\Http\Message\ResponseInterface;

/**
 * @internal
 */
interface Pager
{
    public function __construct(
        BaseClient $client,
        PageRequestOptions $options,
        ResponseInterface $response,
        mixed $body,
    );
}
