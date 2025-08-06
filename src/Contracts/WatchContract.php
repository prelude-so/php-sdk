<?php

declare(strict_types=1);

namespace Prelude\Contracts;

use Prelude\Parameters\WatchPredictParams;
use Prelude\Parameters\WatchPredictParams\Metadata;
use Prelude\Parameters\WatchPredictParams\Signals;
use Prelude\Parameters\WatchPredictParams\Target;
use Prelude\Parameters\WatchSendEventsParams;
use Prelude\Parameters\WatchSendEventsParams\Event;
use Prelude\Parameters\WatchSendFeedbacksParams;
use Prelude\Parameters\WatchSendFeedbacksParams\Feedback;
use Prelude\RequestOptions;
use Prelude\Responses\WatchPredictResponse;
use Prelude\Responses\WatchSendEventsResponse;
use Prelude\Responses\WatchSendFeedbacksResponse;

interface WatchContract
{
    /**
     * @param array{
     *   target: Target, dispatchID?: string, metadata?: Metadata, signals?: Signals
     * }|WatchPredictParams $params
     */
    public function predict(
        array|WatchPredictParams $params,
        ?RequestOptions $requestOptions = null
    ): WatchPredictResponse;

    /**
     * @param array{events: list<Event>}|WatchSendEventsParams $params
     */
    public function sendEvents(
        array|WatchSendEventsParams $params,
        ?RequestOptions $requestOptions = null,
    ): WatchSendEventsResponse;

    /**
     * @param array{feedbacks: list<Feedback>}|WatchSendFeedbacksParams $params
     */
    public function sendFeedbacks(
        array|WatchSendFeedbacksParams $params,
        ?RequestOptions $requestOptions = null,
    ): WatchSendFeedbacksResponse;
}
