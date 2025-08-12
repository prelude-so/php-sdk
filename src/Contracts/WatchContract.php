<?php

declare(strict_types=1);

namespace Prelude\Contracts;

use Prelude\RequestOptions;
use Prelude\Responses\Watch\WatchPredictResponse;
use Prelude\Responses\Watch\WatchSendEventsResponse;
use Prelude\Responses\Watch\WatchSendFeedbacksResponse;
use Prelude\Watch\WatchPredictParams;
use Prelude\Watch\WatchPredictParams\Metadata;
use Prelude\Watch\WatchPredictParams\Signals;
use Prelude\Watch\WatchPredictParams\Target;
use Prelude\Watch\WatchSendEventsParams;
use Prelude\Watch\WatchSendEventsParams\Event;
use Prelude\Watch\WatchSendFeedbacksParams;
use Prelude\Watch\WatchSendFeedbacksParams\Feedback;

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
