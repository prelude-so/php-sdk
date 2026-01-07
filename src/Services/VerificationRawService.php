<?php

declare(strict_types=1);

namespace Prelude\Services;

use Prelude\Client;
use Prelude\Core\Contracts\BaseResponse;
use Prelude\Core\Exceptions\APIException;
use Prelude\RequestOptions;
use Prelude\ServiceContracts\VerificationRawContract;
use Prelude\Verification\VerificationCheckParams;
use Prelude\Verification\VerificationCheckResponse;
use Prelude\Verification\VerificationCreateParams;
use Prelude\Verification\VerificationCreateParams\Metadata;
use Prelude\Verification\VerificationCreateParams\Options;
use Prelude\Verification\VerificationCreateParams\Signals;
use Prelude\Verification\VerificationCreateParams\Target;
use Prelude\Verification\VerificationNewResponse;

/**
 * @phpstan-import-type TargetShape from \Prelude\Verification\VerificationCreateParams\Target
 * @phpstan-import-type MetadataShape from \Prelude\Verification\VerificationCreateParams\Metadata
 * @phpstan-import-type OptionsShape from \Prelude\Verification\VerificationCreateParams\Options
 * @phpstan-import-type SignalsShape from \Prelude\Verification\VerificationCreateParams\Signals
 * @phpstan-import-type TargetShape from \Prelude\Verification\VerificationCheckParams\Target as TargetShape1
 * @phpstan-import-type RequestOpts from \Prelude\RequestOptions
 */
final class VerificationRawService implements VerificationRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new verification for a specific phone number. If another non-expired verification exists (the request is performed within the verification window), this endpoint will perform a retry instead.
     *
     * @param array{
     *   target: Target|TargetShape,
     *   dispatchID?: string,
     *   metadata?: Metadata|MetadataShape,
     *   options?: Options|OptionsShape,
     *   signals?: Signals|SignalsShape,
     * }|VerificationCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VerificationNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|VerificationCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VerificationCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'v2/verification',
            body: (object) $parsed,
            options: $options,
            convert: VerificationNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Check the validity of a verification code.
     *
     * @param array{
     *   code: string,
     *   target: VerificationCheckParams\Target|TargetShape1,
     * }|VerificationCheckParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VerificationCheckResponse>
     *
     * @throws APIException
     */
    public function check(
        array|VerificationCheckParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VerificationCheckParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'v2/verification/check',
            body: (object) $parsed,
            options: $options,
            convert: VerificationCheckResponse::class,
        );
    }
}
