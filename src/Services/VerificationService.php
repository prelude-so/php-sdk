<?php

declare(strict_types=1);

namespace Prelude\Services;

use Prelude\Client;
use Prelude\Contracts\VerificationContract;
use Prelude\Core\Conversion;
use Prelude\Core\Util;
use Prelude\RequestOptions;
use Prelude\Responses\Verification\VerificationCheckResponse;
use Prelude\Responses\Verification\VerificationNewResponse;
use Prelude\Verification\VerificationCheckParams;
use Prelude\Verification\VerificationCheckParams\Target as Target1;
use Prelude\Verification\VerificationCreateParams;
use Prelude\Verification\VerificationCreateParams\Metadata;
use Prelude\Verification\VerificationCreateParams\Options;
use Prelude\Verification\VerificationCreateParams\Signals;
use Prelude\Verification\VerificationCreateParams\Target;

use const Prelude\Core\OMIT as omit;

final class VerificationService implements VerificationContract
{
    public function __construct(private Client $client) {}

    /**
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
        $args = Util::array_filter_omit(
            [
                'target' => $target,
                'dispatchID' => $dispatchID,
                'metadata' => $metadata,
                'options' => $options,
                'signals' => $signals,
            ],
        );
        [$parsed, $options1] = VerificationCreateParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'v2/verification',
            body: (object) $parsed,
            options: $options1,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(VerificationNewResponse::class, value: $resp);
    }

    /**
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
        $args = ['code' => $code, 'target' => $target];
        [$parsed, $options] = VerificationCheckParams::parseRequest(
            $args,
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
