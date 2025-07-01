<?php

declare(strict_types=1);

namespace Prelude\Contracts;

use Prelude\Models\PredictResponse;
use Prelude\Models\SendEventsResponse;
use Prelude\Models\SendFeedbacksResponse;
use Prelude\RequestOptions;

interface WatchContract
{
    /**
     * @param array{
     *
     *       target?: array{type?: string, value?: string},
     *       dispatchID?: string,
     *       metadata?: array{correlationID?: string},
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
    public function predict(
        array $params,
        mixed $requestOptions = []
    ): PredictResponse;

    /**
     * @param array{
     *
     *       events?: list<array{
     *
     *           confidence?: string,
     *           label?: string,
     *           target?: array{type?: string, value?: string},
     *
     * }>,
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
    public function sendEvents(
        array $params,
        mixed $requestOptions = []
    ): SendEventsResponse;

    /**
     * @param array{
     *
     *       feedbacks?: list<array{
     *
     *           target?: array{type?: string, value?: string},
     *           type?: string,
     *           dispatchID?: string,
     *           metadata?: array{correlationID?: string},
     *           signals?: array{
     *
     *               appVersion?: string,
     *               deviceID?: string,
     *               deviceModel?: string,
     *               devicePlatform?: string,
     *               ip?: string,
     *               isTrustedUser?: bool,
     *               osVersion?: string,
     *               userAgent?: string,
     *
     * },
     *
     * }>,
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
    public function sendFeedbacks(
        array $params,
        mixed $requestOptions = []
    ): SendFeedbacksResponse;
}
