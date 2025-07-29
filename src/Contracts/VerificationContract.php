<?php

declare(strict_types=1);

namespace Prelude\Contracts;

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

interface VerificationContract
{
    /**
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
    ): VerificationNewResponse;

    /**
     * @param array{code: string, target: Target1}|VerificationCheckParam $params
     */
    public function check(
        array|VerificationCheckParam $params,
        ?RequestOptions $requestOptions = null,
    ): VerificationCheckResponse;
}
