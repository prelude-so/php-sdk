<?php

declare(strict_types=1);

namespace Prelude\Core\ServiceContracts;

use Prelude\RequestOptions;
use Prelude\Verification\VerificationCheckParams\Target as Target1;
use Prelude\Verification\VerificationCheckResponse;
use Prelude\Verification\VerificationCreateParams\Metadata;
use Prelude\Verification\VerificationCreateParams\Options;
use Prelude\Verification\VerificationCreateParams\Signals;
use Prelude\Verification\VerificationCreateParams\Target;
use Prelude\Verification\VerificationNewResponse;

use const Prelude\Core\OMIT as omit;

interface VerificationContract
{
    /**
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
    ): VerificationNewResponse;

    /**
     * @param string $code the OTP code to validate
     * @param Target1 $target The verification target. Either a phone number or an email address. To use the email verification feature contact us to discuss your use case.
     */
    public function check(
        $code,
        $target,
        ?RequestOptions $requestOptions = null
    ): VerificationCheckResponse;
}
