<?php

declare(strict_types=1);

namespace Prelude\Resources;

use Prelude\Client;
use Prelude\Contracts\VerificationContract;
use Prelude\Core\Serde;
use Prelude\Models\CheckResponse;
use Prelude\Models\NewResponse;
use Prelude\Parameters\VerificationCheckParam;
use Prelude\Parameters\VerificationCheckParam\Target as Target1;
use Prelude\Parameters\VerificationCreateParam;
use Prelude\Parameters\VerificationCreateParam\Metadata;
use Prelude\Parameters\VerificationCreateParam\Options;
use Prelude\Parameters\VerificationCreateParam\Signals;
use Prelude\Parameters\VerificationCreateParam\Target;
use Prelude\RequestOptions;

final class Verification implements VerificationContract
{
    public function __construct(private Client $client) {}

    /**
     * @param VerificationCreateParam|array{
     *   target?: Target,
     *   dispatchID?: string,
     *   metadata?: Metadata,
     *   options?: Options,
     *   signals?: Signals,
     * } $params
     */
    public function create(
        array|VerificationCreateParam $params,
        ?RequestOptions $requestOptions = null,
    ): NewResponse {
        [$parsed, $options] = VerificationCreateParam::parseRequest(
            $params,
            $requestOptions
        );
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
     * @param array{code?: string, target?: Target1}|VerificationCheckParam $params
     */
    public function check(
        array|VerificationCheckParam $params,
        ?RequestOptions $requestOptions = null
    ): CheckResponse {
        [$parsed, $options] = VerificationCheckParam::parseRequest(
            $params,
            $requestOptions
        );
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
