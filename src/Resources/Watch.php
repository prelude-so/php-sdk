<?php

declare(strict_types=1);

namespace Prelude\Resources;

use Prelude\Client;
use Prelude\Contracts\WatchContract;
use Prelude\Core\Conversion;
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

final class Watch implements WatchContract
{
    public function __construct(private Client $client) {}

    /**
     * Predict the outcome of a verification based on Prelude’s anti-fraud system.
     *
     * @param array{
     *   target: Target, dispatchID?: string, metadata?: Metadata, signals?: Signals
     * }|WatchPredictParams $params
     */
    public function predict(
        array|WatchPredictParams $params,
        ?RequestOptions $requestOptions = null
    ): WatchPredictResponse {
        [$parsed, $options] = WatchPredictParams::parseRequest(
            $params,
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
     * @param array{events: list<Event>}|WatchSendEventsParams $params
     */
    public function sendEvents(
        array|WatchSendEventsParams $params,
        ?RequestOptions $requestOptions = null
    ): WatchSendEventsResponse {
        [$parsed, $options] = WatchSendEventsParams::parseRequest(
            $params,
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
     * @param array{feedbacks: list<Feedback>}|WatchSendFeedbacksParams $params
     */
    public function sendFeedbacks(
        array|WatchSendFeedbacksParams $params,
        ?RequestOptions $requestOptions = null,
    ): WatchSendFeedbacksResponse {
        [$parsed, $options] = WatchSendFeedbacksParams::parseRequest(
            $params,
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
