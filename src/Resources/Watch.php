<?php

declare(strict_types=1);

namespace Prelude\Resources;

use Prelude\Client;
use Prelude\Contracts\WatchContract;
use Prelude\Core\Serde;
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

final class Watch implements WatchContract
{
    public function __construct(private Client $client) {}

    /**
     * @param PredictParams|array{
     *   target?: Target, dispatchID?: string, metadata?: Metadata, signals?: Signals
     * } $params
     */
    public function predict(
        array|PredictParams $params,
        ?RequestOptions $requestOptions = null
    ): PredictResponse {
        [$parsed, $options] = PredictParams::parseRequest($params, $requestOptions);
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
     * @param array{events?: list<Event>}|SendEventsParams $params
     */
    public function sendEvents(
        array|SendEventsParams $params,
        ?RequestOptions $requestOptions = null
    ): SendEventsResponse {
        [$parsed, $options] = SendEventsParams::parseRequest(
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
     * @param array{feedbacks?: list<Feedback>}|SendFeedbacksParams $params
     */
    public function sendFeedbacks(
        array|SendFeedbacksParams $params,
        ?RequestOptions $requestOptions = null
    ): SendFeedbacksResponse {
        [$parsed, $options] = SendFeedbacksParams::parseRequest(
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
