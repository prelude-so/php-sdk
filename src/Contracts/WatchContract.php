<?php

declare(strict_types=1);

namespace Prelude\Contracts;

use Prelude\Models\PredictResponse;
use Prelude\Models\SendEventsResponse;
use Prelude\Models\SendFeedbacksResponse;
use Prelude\Parameters\Watch\PredictParams\Metadata;
use Prelude\Parameters\Watch\PredictParams\Signals;
use Prelude\Parameters\Watch\PredictParams\Target;
use Prelude\Parameters\Watch\SendEventsParams\Event;
use Prelude\Parameters\Watch\SendFeedbacksParams\Feedback;
use Prelude\RequestOptions;

interface WatchContract
{
    /**
     * @param array{
     *   target?: Target, dispatchID?: string, metadata?: Metadata, signals?: Signals
     * } $params
     */
    public function predict(
        array $params,
        ?RequestOptions $requestOptions = null
    ): PredictResponse;

    /**
     * @param array{events?: list<Event>} $params
     */
    public function sendEvents(
        array $params,
        ?RequestOptions $requestOptions = null
    ): SendEventsResponse;

    /**
     * @param array{feedbacks?: list<Feedback>} $params
     */
    public function sendFeedbacks(
        array $params,
        ?RequestOptions $requestOptions = null
    ): SendFeedbacksResponse;
}
