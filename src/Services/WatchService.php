<?php

declare(strict_types=1);

namespace Prelude\Services;

use Prelude\Client;
use Prelude\Contracts\WatchContract;
use Prelude\Core\Conversion;
use Prelude\Core\Util;
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

final class WatchService implements WatchContract
{
    public function __construct(private Client $client) {}

    /**
     * Predict the outcome of a verification based on Prelude’s anti-fraud system.
     *
     * @param Target $target The prediction target. Only supports phone numbers for now.
     * @param string $dispatchID the identifier of the dispatch that came from the front-end SDK
     * @param Metadata $metadata the metadata for this prediction
     * @param Signals $signals The signals used for anti-fraud. For more details, refer to [Signals](/verify/v2/documentation/prevent-fraud#signals).
     */
    public function predict(
        $target,
        $dispatchID = null,
        $metadata = null,
        $signals = null,
        ?RequestOptions $requestOptions = null,
    ): WatchPredictResponse {
        $args = [
            'target' => $target,
            'dispatchID' => $dispatchID,
            'metadata' => $metadata,
            'signals' => $signals,
        ];
        $args = Util::array_filter_null(
            $args,
            ['dispatchID', 'metadata', 'signals']
        );
        [$parsed, $options] = WatchPredictParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'v2/watch/predict',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(WatchPredictResponse::class, value: $resp);
    }

    /**
     * Send real-time event data from end-user interactions within your application. Events will be analyzed for proactive fraud prevention and risk scoring.
     *
     * @param list<Event> $events a list of events to dispatch
     */
    public function sendEvents(
        $events,
        ?RequestOptions $requestOptions = null
    ): WatchSendEventsResponse {
        $args = ['events' => $events];
        [$parsed, $options] = WatchSendEventsParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'v2/watch/event',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(WatchSendEventsResponse::class, value: $resp);
    }

    /**
     * Send feedback regarding your end-users verification funnel. Events will be analyzed for proactive fraud prevention and risk scoring.
     *
     * @param list<Feedback> $feedbacks a list of feedbacks to send
     */
    public function sendFeedbacks(
        $feedbacks,
        ?RequestOptions $requestOptions = null
    ): WatchSendFeedbacksResponse {
        $args = ['feedbacks' => $feedbacks];
        [$parsed, $options] = WatchSendFeedbacksParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'v2/watch/feedback',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(WatchSendFeedbacksResponse::class, value: $resp);
    }
}
