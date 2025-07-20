<?php

declare(strict_types=1);

namespace Prelude\Contracts;

use Prelude\Parameters\WatchPredictParam;
use Prelude\Parameters\WatchPredictParam\Metadata;
use Prelude\Parameters\WatchPredictParam\Signals;
use Prelude\Parameters\WatchPredictParam\Target;
use Prelude\Parameters\WatchSendEventsParam;
use Prelude\Parameters\WatchSendEventsParam\Event;
use Prelude\Parameters\WatchSendFeedbacksParam;
use Prelude\Parameters\WatchSendFeedbacksParam\Feedback;
use Prelude\RequestOptions;
use Prelude\Responses\WatchPredictResponse;
use Prelude\Responses\WatchSendEventsResponse;
use Prelude\Responses\WatchSendFeedbacksResponse;

interface WatchContract
{
    /**
     * @param WatchPredictParam|array{
     *   target: Target, dispatchID?: string, metadata?: Metadata, signals?: Signals
     * } $params
     */
    public function predict(
        array|WatchPredictParam $params,
        ?RequestOptions $requestOptions = null
    ): WatchPredictResponse;

    /**
     * @param array{events: list<Event>}|WatchSendEventsParam $params
     */
    public function sendEvents(
        array|WatchSendEventsParam $params,
        ?RequestOptions $requestOptions = null,
    ): WatchSendEventsResponse;

    /**
     * @param array{feedbacks: list<Feedback>}|WatchSendFeedbacksParam $params
     */
    public function sendFeedbacks(
        array|WatchSendFeedbacksParam $params,
        ?RequestOptions $requestOptions = null,
    ): WatchSendFeedbacksResponse;
}
