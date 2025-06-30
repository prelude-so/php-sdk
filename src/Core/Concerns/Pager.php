<?php

declare(strict_types=1);

namespace Prelude\Core\Concerns;

use Psr\Http\Message\ResponseInterface;
use Prelude\Core\BaseClient;
use Prelude\Core\Pagination\PageRequestOptions;

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
