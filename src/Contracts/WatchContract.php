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
     *   target?: array{type?: string, value?: string},
     *   dispatchID?: string,
     *   metadata?: array{correlationID?: string},
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
    public function predict(
        array $params,
        ?RequestOptions $requestOptions = null
    ): PredictResponse;

    /**
     * @param array{
     *   events?: list<array{
     *     confidence?: string,
     *     label?: string,
     *     target?: array{type?: string, value?: string},
     *   }>,
     * } $params
     */
    public function sendEvents(
        array $params,
        ?RequestOptions $requestOptions = null
    ): SendEventsResponse;

    /**
     * @param array{
     *   feedbacks?: list<array{
     *     target?: array{type?: string, value?: string},
     *     type?: string,
     *     dispatchID?: string,
     *     metadata?: array{correlationID?: string},
     *     signals?: array{
     *       appVersion?: string,
     *       deviceID?: string,
     *       deviceModel?: string,
     *       devicePlatform?: string,
     *       ip?: string,
     *       isTrustedUser?: bool,
     *       osVersion?: string,
     *       userAgent?: string,
     *     },
     *   }>,
     * } $params
     */
    public function sendFeedbacks(
        array $params,
        ?RequestOptions $requestOptions = null
    ): SendFeedbacksResponse;
}
