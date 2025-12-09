<?php

declare(strict_types=1);

namespace Prelude\Services;

use Prelude\Client;
use Prelude\Core\Contracts\BaseResponse;
use Prelude\Core\Exceptions\APIException;
use Prelude\RequestOptions;
use Prelude\ServiceContracts\WatchContract;
use Prelude\Watch\WatchPredictParams;
use Prelude\Watch\WatchPredictParams\Signals\DevicePlatform;
use Prelude\Watch\WatchPredictParams\Target\Type;
use Prelude\Watch\WatchPredictResponse;
use Prelude\Watch\WatchSendEventsParams;
use Prelude\Watch\WatchSendEventsParams\Event\Confidence;
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
     *   target: array{type: 'phone_number'|'email_address'|Type, value: string},
     *   dispatchID?: string,
     *   metadata?: array{correlationID?: string},
     *   signals?: array{
     *     appVersion?: string,
     *     deviceID?: string,
     *     deviceModel?: string,
     *     devicePlatform?: 'android'|'ios'|'ipados'|'tvos'|'web'|DevicePlatform,
     *     ip?: string,
     *     isTrustedUser?: bool,
     *     ja4Fingerprint?: string,
     *     osVersion?: string,
     *     userAgent?: string,
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

        /** @var BaseResponse<WatchPredictResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'v2/watch/predict',
            body: (object) $parsed,
            options: $options,
            convert: WatchPredictResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Send real-time event data from end-user interactions within your application. Events will be analyzed for proactive fraud prevention and risk scoring.
     *
     * @param array{
     *   events: list<array{
     *     confidence: 'maximum'|'high'|'neutral'|'low'|'minimum'|Confidence,
     *     label: string,
     *     target: array{
     *       type: 'phone_number'|'email_address'|WatchSendEventsParams\Event\Target\Type,
     *       value: string,
     *     },
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

        /** @var BaseResponse<WatchSendEventsResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'v2/watch/event',
            body: (object) $parsed,
            options: $options,
            convert: WatchSendEventsResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Send feedback regarding your end-users verification funnel. Events will be analyzed for proactive fraud prevention and risk scoring.
     *
     * @param array{
     *   feedbacks: list<array{
     *     target: array{
     *       type: 'phone_number'|'email_address'|WatchSendFeedbacksParams\Feedback\Target\Type,
     *       value: string,
     *     },
     *     type: 'verification.started'|'verification.completed'|WatchSendFeedbacksParams\Feedback\Type,
     *     dispatchID?: string,
     *     metadata?: array{correlationID?: string},
     *     signals?: array{
     *       appVersion?: string,
     *       deviceID?: string,
     *       deviceModel?: string,
     *       devicePlatform?: 'android'|'ios'|'ipados'|'tvos'|'web'|WatchSendFeedbacksParams\Feedback\Signals\DevicePlatform,
     *       ip?: string,
     *       isTrustedUser?: bool,
     *       ja4Fingerprint?: string,
     *       osVersion?: string,
     *       userAgent?: string,
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

        /** @var BaseResponse<WatchSendFeedbacksResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'v2/watch/feedback',
            body: (object) $parsed,
            options: $options,
            convert: WatchSendFeedbacksResponse::class,
        );

        return $response->parse();
    }
}
