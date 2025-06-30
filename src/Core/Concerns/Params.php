<?php

declare(strict_types=1);

namespace Prelude\Core\Concerns;

use Prelude\Core\Serde;
use Prelude\Core\Serde\DumpState;
use Prelude\RequestOptions;

trait Params
{
    /**
     * @param self|array<string, mixed>|null           $params
     * @param RequestOptions|array<string, mixed>|null $options
     *
     * @return array{array<string, mixed>, array{
     *     timeout: float,
     *     maxRetries: int,
     *     initialRetryDelay: float,
     *     maxRetryDelay: float,
     *     extraHeaders: list<string>,
     *     extraQueryParams: list<string>,
     *     extraBodyParams: list<string>,
     * }}
     */
    public static function parseRequest(self|array|null $params, RequestOptions|array|null $options): array
    {
        $state = new DumpState();
        $dumped = Serde::dump(self::class, value: $params, state: $state);
        $opts = RequestOptions::parse($options); // @phpstan-ignore-line

        if (!$state->canRetry) {
            $opts->maxRetries = 0;
        }

        $opt = $opts->__serialize();
        if (empty($opt['extraHeaders'])) {
            unset($opt['extraHeaders']);
        }
        if (empty($opt['extraQueryParams'])) {
            unset($opt['extraQueryParams']);
        }
        if (empty($opt['extraBodyParams'])) {
            unset($opt['extraBodyParams']);
        }

        return [$dumped, $opt]; // @phpstan-ignore-line
    }
}
