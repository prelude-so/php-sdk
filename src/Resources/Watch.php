<?php

declare(strict_types=1);

namespace Prelude\Resources;

use Prelude\Client;
use Prelude\Contracts\WatchContract;
use Prelude\Core\Serde;
use Prelude\Models\PredictResponse;
use Prelude\Models\SendEventsResponse;
use Prelude\Models\SendFeedbacksResponse;
use Prelude\Parameters\WatchPredictParam;
use Prelude\Parameters\WatchPredictParam\Metadata;
use Prelude\Parameters\WatchPredictParam\Signals;
use Prelude\Parameters\WatchPredictParam\Target;
use Prelude\Parameters\WatchSendEventsParam;
use Prelude\Parameters\WatchSendEventsParam\Event;
use Prelude\Parameters\WatchSendFeedbacksParam;
use Prelude\Parameters\WatchSendFeedbacksParam\Feedback;
use Prelude\RequestOptions;

final class Watch implements WatchContract
{
    public function __construct(private Client $client) {}

    /**
     * @param WatchPredictParam|array{
     *   target?: Target, dispatchID?: string, metadata?: Metadata, signals?: Signals
     * } $params
     */
    public function predict(
        array|WatchPredictParam $params,
        ?RequestOptions $requestOptions = null
    ): PredictResponse {
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
        return Serde::coerce(PredictResponse::class, value: $resp);
    }

    /**
     * @param array{events?: list<Event>}|WatchSendEventsParam $params
     */
    public function sendEvents(
        array|WatchSendEventsParam $params,
        ?RequestOptions $requestOptions = null
    ): SendEventsResponse {
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
        return Serde::coerce(SendEventsResponse::class, value: $resp);
    }

    /**
     * @param array{feedbacks?: list<Feedback>}|WatchSendFeedbacksParam $params
     */
    public function sendFeedbacks(
        array|WatchSendFeedbacksParam $params,
        ?RequestOptions $requestOptions = null,
    ): SendFeedbacksResponse {
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
        return Serde::coerce(SendFeedbacksResponse::class, value: $resp);
    }
}
