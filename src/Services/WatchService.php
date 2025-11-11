<?php

declare(strict_types=1);

namespace Prelude\Services;

use Prelude\Client;
use Prelude\Core\Exceptions\APIException;
use Prelude\RequestOptions;
use Prelude\ServiceContracts\WatchContract;
use Prelude\Watch\WatchPredictParams;
use Prelude\Watch\WatchPredictResponse;
use Prelude\Watch\WatchSendEventsParams;
use Prelude\Watch\WatchSendEventsResponse;
use Prelude\Watch\WatchSendFeedbacksParams;
use Prelude\Watch\WatchSendFeedbacksResponse;

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
     * @param array{
     *   target: array{type: "phone_number"|"email_address", value: string},
     *   dispatch_id?: string,
     *   metadata?: array{correlation_id?: string},
     *   signals?: array{
     *     app_version?: string,
     *     device_id?: string,
     *     device_model?: string,
     *     device_platform?: "android"|"ios"|"ipados"|"tvos"|"web",
     *     ip?: string,
     *     is_trusted_user?: bool,
     *     ja4_fingerprint?: string,
     *     os_version?: string,
     *     user_agent?: string,
     *   },
     * }|WatchPredictParams $params
     *
     * @throws APIException
     */
    public function predict(
        array|WatchPredictParams $params,
        ?RequestOptions $requestOptions = null
    ): WatchPredictResponse {
        [$parsed, $options] = WatchPredictParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   events: list<array{
     *     confidence: "maximum"|"high"|"neutral"|"low"|"minimum",
     *     label: string,
     *     target: array{type: "phone_number"|"email_address", value: string},
     *   }>,
     * }|WatchSendEventsParams $params
     *
     * @throws APIException
     */
    public function sendEvents(
        array|WatchSendEventsParams $params,
        ?RequestOptions $requestOptions = null
    ): WatchSendEventsResponse {
        [$parsed, $options] = WatchSendEventsParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   feedbacks: list<array{
     *     target: array{type: "phone_number"|"email_address", value: string},
     *     type: "verification.started"|"verification.completed",
     *     dispatch_id?: string,
     *     metadata?: array{correlation_id?: string},
     *     signals?: array{
     *       app_version?: string,
     *       device_id?: string,
     *       device_model?: string,
     *       device_platform?: "android"|"ios"|"ipados"|"tvos"|"web",
     *       ip?: string,
     *       is_trusted_user?: bool,
     *       ja4_fingerprint?: string,
     *       os_version?: string,
     *       user_agent?: string,
     *     },
     *   }>,
     * }|WatchSendFeedbacksParams $params
     *
     * @throws APIException
     */
    public function sendFeedbacks(
        array|WatchSendFeedbacksParams $params,
        ?RequestOptions $requestOptions = null,
    ): WatchSendFeedbacksResponse {
        [$parsed, $options] = WatchSendFeedbacksParams::parseRequest(
            $params,
            $requestOptions,
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
