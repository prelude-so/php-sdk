<?php

declare(strict_types=1);

namespace Prelude\ServiceContracts;

use Prelude\RequestOptions;
use Prelude\Watch\WatchPredictParams\Metadata;
use Prelude\Watch\WatchPredictParams\Signals;
use Prelude\Watch\WatchPredictParams\Target;
use Prelude\Watch\WatchPredictResponse;
use Prelude\Watch\WatchSendEventsParams\Event;
use Prelude\Watch\WatchSendEventsResponse;
use Prelude\Watch\WatchSendFeedbacksParams\Feedback;
use Prelude\Watch\WatchSendFeedbacksResponse;

use const Prelude\Core\OMIT as omit;

interface WatchContract
{
    /**
     * @api
     *
     * @param Target $target The prediction target. Only supports phone numbers for now.
     * @param string $dispatchID the identifier of the dispatch that came from the front-end SDK
     * @param Metadata $metadata the metadata for this prediction
     * @param Signals $signals The signals used for anti-fraud. For more details, refer to [Signals](/verify/v2/documentation/prevent-fraud#signals).
     */
    public function predict(
        $target,
        $dispatchID = omit,
        $metadata = omit,
        $signals = omit,
        ?RequestOptions $requestOptions = null,
    ): WatchPredictResponse;

    /**
     * @api
     *
     * @param list<Event> $events a list of events to dispatch
     */
    public function sendEvents(
        $events,
        ?RequestOptions $requestOptions = null
    ): WatchSendEventsResponse;

    /**
     * @api
     *
     * @param list<Feedback> $feedbacks a list of feedbacks to send
     */
    public function sendFeedbacks(
        $feedbacks,
        ?RequestOptions $requestOptions = null
    ): WatchSendFeedbacksResponse;
}
