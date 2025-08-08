<?php

declare(strict_types=1);

namespace Prelude\Contracts;

use Prelude\Models\WatchPredictParams;
use Prelude\Models\WatchPredictParams\Metadata;
use Prelude\Models\WatchPredictParams\Signals;
use Prelude\Models\WatchPredictParams\Target;
use Prelude\Models\WatchSendEventsParams;
use Prelude\Models\WatchSendEventsParams\Event;
use Prelude\Models\WatchSendFeedbacksParams;
use Prelude\Models\WatchSendFeedbacksParams\Feedback;
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
