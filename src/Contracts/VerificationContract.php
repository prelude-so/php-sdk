<?php

declare(strict_types=1);

namespace Prelude\Contracts;

use Prelude\Models\CheckResponse;
use Prelude\Models\NewResponse;
use Prelude\Parameters\VerificationCheckParam;
use Prelude\Parameters\VerificationCheckParam\Target as Target1;
use Prelude\Parameters\VerificationCreateParam;
use Prelude\Parameters\VerificationCreateParam\Metadata;
use Prelude\Parameters\VerificationCreateParam\Options;
use Prelude\Parameters\VerificationCreateParam\Signals;
use Prelude\Parameters\VerificationCreateParam\Target;
use Prelude\RequestOptions;

interface VerificationContract
{
    /**
     * @param VerificationCreateParam|array{
     *   target?: Target,
     *   dispatchID?: string,
     *   metadata?: Metadata,
     *   options?: Options,
     *   signals?: Signals,
     * } $params
     */
    public function create(
        array|VerificationCreateParam $params,
        ?RequestOptions $requestOptions = null,
    ): NewResponse;

    /**
     * @param array{code?: string, target?: Target1}|VerificationCheckParam $params
     */
    public function check(
        array|VerificationCheckParam $params,
        ?RequestOptions $requestOptions = null,
    ): CheckResponse;
}
