<?php

declare(strict_types=1);

namespace Prelude\Contracts;

use Prelude\Models\VerificationCheckParams;
use Prelude\Models\VerificationCheckParams\Target as Target1;
use Prelude\Models\VerificationCreateParams;
use Prelude\Models\VerificationCreateParams\Metadata;
use Prelude\Models\VerificationCreateParams\Options;
use Prelude\Models\VerificationCreateParams\Signals;
use Prelude\Models\VerificationCreateParams\Target;
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
