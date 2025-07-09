<?php

declare(strict_types=1);

namespace Prelude\Contracts;

use Prelude\Models\CheckResponse;
use Prelude\Models\NewResponse;
use Prelude\RequestOptions;

interface VerificationContract
{
    /**
     * @param array{
     *   target?: array{type?: string, value?: string},
     *   dispatchID?: string,
     *   metadata?: array{correlationID?: string},
     *   options?: array{
     *     appRealm?: array{platform?: string, value?: string},
     *     callbackURL?: string,
     *     codeSize?: int,
     *     customCode?: string,
     *     locale?: string,
     *     method?: string,
     *     preferredChannel?: string,
     *     senderID?: string,
     *     templateID?: string,
     *     variables?: array<string, string>,
     *   },
     *   signals?: array{
     *     appVersion?: string,
     *     deviceID?: string,
     *     deviceModel?: string,
     *     devicePlatform?: string,
     *     ip?: string,
     *     isTrustedUser?: bool,
     *     osVersion?: string,
     *     userAgent?: string,
     *   },
     * } $params
     */
    public function create(
        array $params,
        ?RequestOptions $requestOptions = null
    ): NewResponse;

    /**
     * @param array{
     *   code?: string, target?: array{type?: string, value?: string}
     * } $params
     */
    public function check(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CheckResponse;
}
