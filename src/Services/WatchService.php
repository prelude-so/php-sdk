<?php

declare(strict_types=1);

namespace Prelude\Services;

use Prelude\Client;
use Prelude\Core\Exceptions\APIException;
use Prelude\RequestOptions;
use Prelude\ServiceContracts\WatchContract;
use Prelude\Watch\WatchPredictParams;
use Prelude\Watch\WatchPredictParams\Metadata;
use Prelude\Watch\WatchPredictParams\Signals;
use Prelude\Watch\WatchPredictParams\Target;
use Prelude\Watch\WatchPredictResponse;
use Prelude\Watch\WatchSendEventsParams;
use Prelude\Watch\WatchSendEventsParams\Event;
use Prelude\Watch\WatchSendEventsResponse;
use Prelude\Watch\WatchSendFeedbacksParams;
use Prelude\Watch\WatchSendFeedbacksParams\Feedback;
use Prelude\Watch\WatchSendFeedbacksResponse;

use const Prelude\Core\OMIT as omit;

final class WatchService implements WatchContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Predict the outcome of a verification based on Prelude’s anti-fraud system.
     *
     * @param Target $target The prediction target. Only supports phone numbers for now.
     * @param string $dispatchID the identifier of the dispatch that came from the front-end SDK
     * @param Metadata $metadata the metadata for this prediction
     * @param Signals $signals The signals used for anti-fraud. For more details, refer to [Signals](/verify/v2/documentation/prevent-fraud#signals).
     *
     * @throws APIException
     */
    public function predict(
        $target,
        $dispatchID = omit,
        $metadata = omit,
        $signals = omit,
        ?RequestOptions $requestOptions = null,
    ): WatchPredictResponse {
        $params = [
            'target' => $target,
            'dispatchID' => $dispatchID,
            'metadata' => $metadata,
            'signals' => $signals,
        ];

        return $this->predictRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function predictRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): WatchPredictResponse {
        [$parsed, $options] = WatchPredictParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'v2/watch/predict',
            body: (object) $parsed,
            options: $options,
            convert: WatchPredictResponse::class,
        );
    }

    /**
     * @api
     *
     * Send real-time event data from end-user interactions within your application. Events will be analyzed for proactive fraud prevention and risk scoring.
     *
     * @param list<Event> $events a list of events to dispatch
     *
     * @throws APIException
     */
    public function sendEvents(
        $events,
        ?RequestOptions $requestOptions = null
    ): WatchSendEventsResponse {
        $params = ['events' => $events];

        return $this->sendEventsRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function sendEventsRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): WatchSendEventsResponse {
        [$parsed, $options] = WatchSendEventsParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'v2/watch/event',
            body: (object) $parsed,
            options: $options,
            convert: WatchSendEventsResponse::class,
        );
    }

    /**
     * @api
     *
     * Send feedback regarding your end-users verification funnel. Events will be analyzed for proactive fraud prevention and risk scoring.
     *
     * @param list<Feedback> $feedbacks a list of feedbacks to send
     *
     * @throws APIException
     */
    public function sendFeedbacks(
        $feedbacks,
        ?RequestOptions $requestOptions = null
    ): WatchSendFeedbacksResponse {
        $params = ['feedbacks' => $feedbacks];

        return $this->sendFeedbacksRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function sendFeedbacksRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): WatchSendFeedbacksResponse {
        [$parsed, $options] = WatchSendFeedbacksParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'v2/watch/feedback',
            body: (object) $parsed,
            options: $options,
            convert: WatchSendFeedbacksResponse::class,
        );
    }
}
