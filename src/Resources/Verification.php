<?php

declare(strict_types=1);

namespace Prelude\Resources;

use Prelude\Client;
use Prelude\Contracts\VerificationContract;
use Prelude\Core\Serde;
use Prelude\Models\CheckResponse;
use Prelude\Models\NewResponse;
use Prelude\Parameters\Verification\CheckParams;
use Prelude\Parameters\Verification\CheckParams\Target as Target1;
use Prelude\Parameters\Verification\CreateParams;
use Prelude\Parameters\Verification\CreateParams\Metadata;
use Prelude\Parameters\Verification\CreateParams\Options;
use Prelude\Parameters\Verification\CreateParams\Signals;
use Prelude\Parameters\Verification\CreateParams\Target;
use Prelude\RequestOptions;

final class Verification implements VerificationContract
{
    public function __construct(private Client $client) {}

    /**
     * @param array{
     *   target?: Target,
     *   dispatchID?: string,
     *   metadata?: Metadata,
     *   options?: Options,
     *   signals?: Signals,
     * } $params
     */
    public function create(
        array $params,
        ?RequestOptions $requestOptions = null
    ): NewResponse {
        [$parsed, $options] = CreateParams::parseRequest($params, $requestOptions);
        $resp = $this->client->request(
            method: 'post',
            path: 'v2/verification',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Serde::coerce(NewResponse::class, value: $resp);
    }

    /**
     * @param array{code?: string, target?: Target1} $params
     */
    public function check(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CheckResponse {
        [$parsed, $options] = CheckParams::parseRequest($params, $requestOptions);
        $resp = $this->client->request(
            method: 'post',
            path: 'v2/verification/check',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Serde::coerce(CheckResponse::class, value: $resp);
    }
}
