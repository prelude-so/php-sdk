<?php

declare(strict_types=1);

namespace Prelude\Contracts;

use Prelude\Models\PredictResponse;
use Prelude\Models\SendEventsResponse;
use Prelude\Models\SendFeedbacksResponse;
use Prelude\Parameters\Watch\PredictParams;
use Prelude\Parameters\Watch\PredictParams\Metadata;
use Prelude\Parameters\Watch\PredictParams\Signals;
use Prelude\Parameters\Watch\PredictParams\Target;
use Prelude\Parameters\Watch\SendEventsParams;
use Prelude\Parameters\Watch\SendEventsParams\Event;
use Prelude\Parameters\Watch\SendFeedbacksParams;
use Prelude\Parameters\Watch\SendFeedbacksParams\Feedback;
use Prelude\RequestOptions;

interface WatchContract
{
    /**
     * @param PredictParams|array{
     *   target?: Target, dispatchID?: string, metadata?: Metadata, signals?: Signals
     * } $params
     */
    public function predict(
        array|PredictParams $params,
        ?RequestOptions $requestOptions = null
    ): PredictResponse;

    /**
     * @param array{events?: list<Event>}|SendEventsParams $params
     */
    public function sendEvents(
        array|SendEventsParams $params,
        ?RequestOptions $requestOptions = null
    ): SendEventsResponse;

    /**
     * @param array{feedbacks?: list<Feedback>}|SendFeedbacksParams $params
     */
    public function sendFeedbacks(
        array|SendFeedbacksParams $params,
        ?RequestOptions $requestOptions = null,
    ): SendFeedbacksResponse;
}
