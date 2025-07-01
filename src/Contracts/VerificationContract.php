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
     *
     *       target?: array{type?: string, value?: string},
     *       dispatchID?: string,
     *       metadata?: array{correlationID?: string},
     *       options?: array{
     *
     *           appRealm?: array{platform?: string, value?: string},
     *           callbackURL?: string,
     *           codeSize?: int,
     *           customCode?: string,
     *           locale?: string,
     *           method?: string,
     *           preferredChannel?: string,
     *           senderID?: string,
     *           templateID?: string,
     *           variables?: array<string, string>,
     *
     * },
     *       signals?: array{
     *
     *           appVersion?: string,
     *           deviceID?: string,
     *           deviceModel?: string,
     *           devicePlatform?: string,
     *           ip?: string,
     *           isTrustedUser?: bool,
     *           osVersion?: string,
     *           userAgent?: string,
     *
     * },
     *
     * } $params
     * @param RequestOptions|array{
     *
     *       timeout?: float|null,
     *       maxRetries?: int|null,
     *       initialRetryDelay?: float|null,
     *       maxRetryDelay?: float|null,
     *       extraHeaders?: list<string>|null,
     *       extraQueryParams?: list<string>|null,
     *       extraBodyParams?: list<string>|null,
     *
     * }|null $requestOptions
     */
    public function create(
        array $params,
        mixed $requestOptions = []
    ): NewResponse;

    /**
     * @param array{
     *
     * code?: string, target?: array{type?: string, value?: string}
     *
     * } $params
     * @param RequestOptions|array{
     *
     *       timeout?: float|null,
     *       maxRetries?: int|null,
     *       initialRetryDelay?: float|null,
     *       maxRetryDelay?: float|null,
     *       extraHeaders?: list<string>|null,
     *       extraQueryParams?: list<string>|null,
     *       extraBodyParams?: list<string>|null,
     *
     * }|null $requestOptions
     */
    public function check(
        array $params,
        mixed $requestOptions = []
    ): CheckResponse;
}
