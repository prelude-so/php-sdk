<?php

declare(strict_types=1);

namespace Prelude\ServiceContracts;

use Prelude\Core\Exceptions\APIException;
use Prelude\RequestOptions;
use Prelude\Verification\VerificationCheckResponse;
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
interface VerificationContract
{
    /**
     * @api
     *
     * @param Target|TargetShape $target The verification target. Either a phone number or an email address. To use the email verification feature contact us to discuss your use case.
     * @param string $dispatchID the identifier of the dispatch that came from the front-end SDK
     * @param Metadata|MetadataShape $metadata The metadata for this verification. This object will be returned with every response or webhook sent that refers to this verification.
     * @param Options|OptionsShape $options Verification options
     * @param Signals|SignalsShape $signals The signals used for anti-fraud. For more details, refer to [Signals](/verify/v2/documentation/prevent-fraud#signals).
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        Target|array $target,
        ?string $dispatchID = null,
        Metadata|array|null $metadata = null,
        Options|array|null $options = null,
        Signals|array|null $signals = null,
        RequestOptions|array|null $requestOptions = null,
    ): VerificationNewResponse;

    /**
     * @api
     *
     * @param string $code the OTP code to validate
     * @param \Prelude\Verification\VerificationCheckParams\Target|TargetShape1 $target The verification target. Either a phone number or an email address. To use the email verification feature contact us to discuss your use case.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function check(
        string $code,
        \Prelude\Verification\VerificationCheckParams\Target|array $target,
        RequestOptions|array|null $requestOptions = null,
    ): VerificationCheckResponse;
}
