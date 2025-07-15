<?php

declare(strict_types=1);

namespace Prelude\Contracts;

use Prelude\Models\CheckResponse;
use Prelude\Models\NewResponse;
use Prelude\Parameters\Verification\CheckParams;
use Prelude\Parameters\Verification\CheckParams\Target as Target1;
use Prelude\Parameters\Verification\CreateParams;
use Prelude\Parameters\Verification\CreateParams\Metadata;
use Prelude\Parameters\Verification\CreateParams\Options;
use Prelude\Parameters\Verification\CreateParams\Signals;
use Prelude\Parameters\Verification\CreateParams\Target;
use Prelude\RequestOptions;

interface VerificationContract
{
    /**
     * @param CreateParams|array{
     *   target?: Target,
     *   dispatchID?: string,
     *   metadata?: Metadata,
     *   options?: Options,
     *   signals?: Signals,
     * } $params
     */
    public function create(
        array|CreateParams $params,
        ?RequestOptions $requestOptions = null
    ): NewResponse;

    /**
     * @param array{code?: string, target?: Target1}|CheckParams $params
     */
    public function check(
        array|CheckParams $params,
        ?RequestOptions $requestOptions = null
    ): CheckResponse;
}
