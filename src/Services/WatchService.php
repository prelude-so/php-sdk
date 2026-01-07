<?php

declare(strict_types=1);

namespace Prelude\Services;

use Prelude\Client;
use Prelude\Core\Exceptions\APIException;
use Prelude\Core\Util;
use Prelude\RequestOptions;
use Prelude\ServiceContracts\WatchContract;
use Prelude\Watch\WatchPredictParams\Metadata;
use Prelude\Watch\WatchPredictParams\Signals;
use Prelude\Watch\WatchPredictParams\Target;
use Prelude\Watch\WatchPredictResponse;
use Prelude\Watch\WatchSendEventsParams\Event;
use Prelude\Watch\WatchSendEventsResponse;
use Prelude\Watch\WatchSendFeedbacksParams\Feedback;
use Prelude\Watch\WatchSendFeedbacksResponse;

/**
 * @phpstan-import-type TargetShape from \Prelude\Watch\WatchPredictParams\Target
 * @phpstan-import-type MetadataShape from \Prelude\Watch\WatchPredictParams\Metadata
 * @phpstan-import-type SignalsShape from \Prelude\Watch\WatchPredictParams\Signals
 * @phpstan-import-type EventShape from \Prelude\Watch\WatchSendEventsParams\Event
 * @phpstan-import-type FeedbackShape from \Prelude\Watch\WatchSendFeedbacksParams\Feedback
 * @phpstan-import-type RequestOpts from \Prelude\RequestOptions
 */
final class WatchService implements WatchContract
{
    /**
     * @api
     */
    public WatchRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new WatchRawService($client);
    }

    /**
     * @api
     *
     * Predict the outcome of a verification based on Prelude’s anti-fraud system.
     *
     * @param Target|TargetShape $target The prediction target. Only supports phone numbers for now.
     * @param string $dispatchID the identifier of the dispatch that came from the front-end SDK
     * @param Metadata|MetadataShape $metadata the metadata for this prediction
     * @param Signals|SignalsShape $signals The signals used for anti-fraud. For more details, refer to [Signals](/verify/v2/documentation/prevent-fraud#signals).
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function predict(
        Target|array $target,
        ?string $dispatchID = null,
        Metadata|array|null $metadata = null,
        Signals|array|null $signals = null,
        RequestOptions|array|null $requestOptions = null,
    ): WatchPredictResponse {
        $params = Util::removeNulls(
            [
                'target' => $target,
                'dispatchID' => $dispatchID,
                'metadata' => $metadata,
                'signals' => $signals,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->predict(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Send real-time event data from end-user interactions within your application. Events will be analyzed for proactive fraud prevention and risk scoring.
     *
     * @param list<Event|EventShape> $events a list of events to dispatch
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function sendEvents(
        array $events,
        RequestOptions|array|null $requestOptions = null
    ): WatchSendEventsResponse {
        $params = Util::removeNulls(['events' => $events]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->sendEvents(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Send feedback regarding your end-users verification funnel. Events will be analyzed for proactive fraud prevention and risk scoring.
     *
     * @param list<Feedback|FeedbackShape> $feedbacks a list of feedbacks to send
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function sendFeedbacks(
        array $feedbacks,
        RequestOptions|array|null $requestOptions = null
    ): WatchSendFeedbacksResponse {
        $params = Util::removeNulls(['feedbacks' => $feedbacks]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->sendFeedbacks(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
