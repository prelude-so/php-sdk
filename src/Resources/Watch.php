<?php

declare(strict_types=1);

namespace Prelude\Resources;

use Prelude\Client;
use Prelude\Contracts\WatchContract;
use Prelude\Core\Conversion;
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

final class Watch implements WatchContract
{
    public function __construct(private Client $client) {}

    /**
     * Predict the outcome of a verification based on Prelude’s anti-fraud system.
     *
     * @param array{
     *   target: Target, dispatchID?: string, metadata?: Metadata, signals?: Signals
     * }|WatchPredictParam $params
     */
    public function predict(
        array|WatchPredictParam $params,
        ?RequestOptions $requestOptions = null
    ): WatchPredictResponse {
        [$parsed, $options] = WatchPredictParam::parseRequest(
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
     * @param array{events: list<Event>}|WatchSendEventsParam $params
     */
    public function sendEvents(
        array|WatchSendEventsParam $params,
        ?RequestOptions $requestOptions = null
    ): WatchSendEventsResponse {
        [$parsed, $options] = WatchSendEventsParam::parseRequest(
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
     * @param array{feedbacks: list<Feedback>}|WatchSendFeedbacksParam $params
     */
    public function sendFeedbacks(
        array|WatchSendFeedbacksParam $params,
        ?RequestOptions $requestOptions = null,
    ): WatchSendFeedbacksResponse {
        [$parsed, $options] = WatchSendFeedbacksParam::parseRequest(
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
