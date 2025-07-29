<?php

declare(strict_types=1);

namespace Prelude\Resources;

use Prelude\Client;
use Prelude\Contracts\VerificationContract;
use Prelude\Core\Conversion;
use Prelude\Parameters\VerificationCheckParam;
use Prelude\Parameters\VerificationCheckParam\Target as Target1;
use Prelude\Parameters\VerificationCreateParam;
use Prelude\Parameters\VerificationCreateParam\Metadata;
use Prelude\Parameters\VerificationCreateParam\Options;
use Prelude\Parameters\VerificationCreateParam\Signals;
use Prelude\Parameters\VerificationCreateParam\Target;
use Prelude\RequestOptions;
use Prelude\Responses\VerificationCheckResponse;
use Prelude\Responses\VerificationNewResponse;

final class Verification implements VerificationContract
{
    public function __construct(private Client $client) {}

    /**
     * Create a new verification for a specific phone number. If another non-expired verification exists (the request is performed within the verification window), this endpoint will perform a retry instead.
     *
     * @param array{
     *   target: Target,
     *   dispatchID?: string,
     *   metadata?: Metadata,
     *   options?: Options,
     *   signals?: Signals,
     * }|VerificationCreateParam $params
     */
    public function create(
        array|VerificationCreateParam $params,
        ?RequestOptions $requestOptions = null,
    ): VerificationNewResponse {
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
        return Conversion::coerce(VerificationNewResponse::class, value: $resp);
    }

    /**
     * Check the validity of a verification code.
     *
     * @param array{code: string, target: Target1}|VerificationCheckParam $params
     */
    public function check(
        array|VerificationCheckParam $params,
        ?RequestOptions $requestOptions = null
    ): VerificationCheckResponse {
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
        return Conversion::coerce(VerificationCheckResponse::class, value: $resp);
    }
}
