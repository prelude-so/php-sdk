<?php

declare(strict_types=1);

namespace Prelude\Core\Services;

use Prelude\Client;
use Prelude\Core\ServiceContracts\VerificationContract;
use Prelude\RequestOptions;
use Prelude\Verification\VerificationCheckParams;
use Prelude\Verification\VerificationCheckParams\Target as Target1;
use Prelude\Verification\VerificationCheckResponse;
use Prelude\Verification\VerificationCreateParams;
use Prelude\Verification\VerificationCreateParams\Metadata;
use Prelude\Verification\VerificationCreateParams\Options;
use Prelude\Verification\VerificationCreateParams\Signals;
use Prelude\Verification\VerificationCreateParams\Target;
use Prelude\Verification\VerificationNewResponse;

use const Prelude\Core\OMIT as omit;

final class VerificationService implements VerificationContract
{
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new verification for a specific phone number. If another non-expired verification exists (the request is performed within the verification window), this endpoint will perform a retry instead.
     *
     * @param Target $target The verification target. Either a phone number or an email address. To use the email verification feature contact us to discuss your use case.
     * @param string $dispatchID the identifier of the dispatch that came from the front-end SDK
     * @param Metadata $metadata The metadata for this verification. This object will be returned with every response or webhook sent that refers to this verification.
     * @param Options $options Verification options
     * @param Signals $signals The signals used for anti-fraud. For more details, refer to [Signals](/verify/v2/documentation/prevent-fraud#signals).
     */
    public function create(
        $target,
        $dispatchID = omit,
        $metadata = omit,
        $options = omit,
        $signals = omit,
        ?RequestOptions $requestOptions = null,
    ): VerificationNewResponse {
        [$parsed, $options1] = VerificationCreateParams::parseRequest(
            [
                'target' => $target,
                'dispatchID' => $dispatchID,
                'metadata' => $metadata,
                'options' => $options,
                'signals' => $signals,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'v2/verification',
            body: (object) $parsed,
            options: $options1,
            convert: VerificationNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Check the validity of a verification code.
     *
     * @param string $code the OTP code to validate
     * @param Target1 $target The verification target. Either a phone number or an email address. To use the email verification feature contact us to discuss your use case.
     */
    public function check(
        $code,
        $target,
        ?RequestOptions $requestOptions = null
    ): VerificationCheckResponse {
        [$parsed, $options] = VerificationCheckParams::parseRequest(
            ['code' => $code, 'target' => $target],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'v2/verification/check',
            body: (object) $parsed,
            options: $options,
            convert: VerificationCheckResponse::class,
        );
    }
}
