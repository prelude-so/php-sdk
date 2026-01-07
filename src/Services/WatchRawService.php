<?php

declare(strict_types=1);

namespace Prelude\Services;

use Prelude\Client;
use Prelude\Core\Contracts\BaseResponse;
use Prelude\Core\Exceptions\APIException;
use Prelude\RequestOptions;
use Prelude\ServiceContracts\WatchRawContract;
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

/**
 * @phpstan-import-type TargetShape from \Prelude\Watch\WatchPredictParams\Target
 * @phpstan-import-type MetadataShape from \Prelude\Watch\WatchPredictParams\Metadata
 * @phpstan-import-type SignalsShape from \Prelude\Watch\WatchPredictParams\Signals
 * @phpstan-import-type EventShape from \Prelude\Watch\WatchSendEventsParams\Event
 * @phpstan-import-type FeedbackShape from \Prelude\Watch\WatchSendFeedbacksParams\Feedback
 * @phpstan-import-type RequestOpts from \Prelude\RequestOptions
 */
final class WatchRawService implements WatchRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Predict the outcome of a verification based on Prelude’s anti-fraud system.
     *
     * @param array{
     *   target: Target|TargetShape,
     *   dispatchID?: string,
     *   metadata?: Metadata|MetadataShape,
     *   signals?: Signals|SignalsShape,
     * }|WatchPredictParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WatchPredictResponse>
     *
     * @throws APIException
     */
    public function predict(
        array|WatchPredictParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WatchPredictParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{events: list<Event|EventShape>}|WatchSendEventsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WatchSendEventsResponse>
     *
     * @throws APIException
     */
    public function sendEvents(
        array|WatchSendEventsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WatchSendEventsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   feedbacks: list<Feedback|FeedbackShape>
     * }|WatchSendFeedbacksParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WatchSendFeedbacksResponse>
     *
     * @throws APIException
     */
    public function sendFeedbacks(
        array|WatchSendFeedbacksParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WatchSendFeedbacksParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'v2/watch/feedback',
            body: (object) $parsed,
            options: $options,
            convert: WatchSendFeedbacksResponse::class,
        );
    }
}
