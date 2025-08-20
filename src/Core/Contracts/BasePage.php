<?php

declare(strict_types=1);

namespace Prelude\Core\Contracts;

use Prelude\Core\BaseClient;
use Prelude\Core\Pagination\PageRequestOptions;
use Psr\Http\Message\ResponseInterface;

/**
 * @internal
 */
interface BasePage
{
    public function __construct(
        BaseClient $client,
        PageRequestOptions $options,
        ResponseInterface $response,
        mixed $body,
    );
}
