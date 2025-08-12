<?php

declare(strict_types=1);

namespace Prelude\Contracts;

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

interface VerificationContract
{
    /**
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
    ): VerificationNewResponse;

    /**
     * @param array{code: string, target: Target1}|VerificationCheckParams $params
     */
    public function check(
        array|VerificationCheckParams $params,
        ?RequestOptions $requestOptions = null,
    ): VerificationCheckResponse;
}
