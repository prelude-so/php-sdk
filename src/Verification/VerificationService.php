<?php

declare(strict_types=1);

namespace Prelude\Verification;

use Prelude\Client;
use Prelude\Contracts\VerificationContract;
use Prelude\Core\Conversion;
use Prelude\RequestOptions;
use Prelude\Responses\Verification\VerificationCheckResponse;
use Prelude\Responses\Verification\VerificationNewResponse;
use Prelude\Verification\VerificationCheckParams\Target as Target1;
use Prelude\Verification\VerificationCreateParams\Metadata;
use Prelude\Verification\VerificationCreateParams\Options;
use Prelude\Verification\VerificationCreateParams\Signals;
use Prelude\Verification\VerificationCreateParams\Target;

final class VerificationService implements VerificationContract
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
     * }|VerificationCreateParams $params
     */
    public function create(
        array|VerificationCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): VerificationNewResponse {
        [$parsed, $options] = VerificationCreateParams::parseRequest(
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
     * @param array{code: string, target: Target1}|VerificationCheckParams $params
     */
    public function check(
        array|VerificationCheckParams $params,
        ?RequestOptions $requestOptions = null,
    ): VerificationCheckResponse {
        [$parsed, $options] = VerificationCheckParams::parseRequest(
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
