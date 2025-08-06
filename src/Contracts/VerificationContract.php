<?php

declare(strict_types=1);

namespace Prelude\Contracts;

use Prelude\Parameters\VerificationCheckParams;
use Prelude\Parameters\VerificationCheckParams\Target as Target1;
use Prelude\Parameters\VerificationCreateParams;
use Prelude\Parameters\VerificationCreateParams\Metadata;
use Prelude\Parameters\VerificationCreateParams\Options;
use Prelude\Parameters\VerificationCreateParams\Signals;
use Prelude\Parameters\VerificationCreateParams\Target;
use Prelude\RequestOptions;
use Prelude\Responses\VerificationCheckResponse;
use Prelude\Responses\VerificationNewResponse;

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
