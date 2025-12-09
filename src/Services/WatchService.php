<?php

declare(strict_types=1);

namespace Prelude\Services;

use Prelude\Client;
use Prelude\Core\Exceptions\APIException;
use Prelude\RequestOptions;
use Prelude\ServiceContracts\WatchContract;
use Prelude\Watch\WatchPredictParams\Signals\DevicePlatform;
use Prelude\Watch\WatchPredictParams\Target\Type;
use Prelude\Watch\WatchPredictResponse;
use Prelude\Watch\WatchSendEventsParams\Event\Confidence;
use Prelude\Watch\WatchSendEventsResponse;
use Prelude\Watch\WatchSendFeedbacksResponse;

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
     * @param array{
     *   type: 'phone_number'|'email_address'|Type, value: string
     * } $target The prediction target. Only supports phone numbers for now.
     * @param string $dispatchID the identifier of the dispatch that came from the front-end SDK
     * @param array{correlationID?: string} $metadata the metadata for this prediction
     * @param array{
     *   appVersion?: string,
     *   deviceID?: string,
     *   deviceModel?: string,
     *   devicePlatform?: 'android'|'ios'|'ipados'|'tvos'|'web'|DevicePlatform,
     *   ip?: string,
     *   isTrustedUser?: bool,
     *   ja4Fingerprint?: string,
     *   osVersion?: string,
     *   userAgent?: string,
     * } $signals The signals used for anti-fraud. For more details, refer to [Signals](/verify/v2/documentation/prevent-fraud#signals).
     *
     * @throws APIException
     */
    public function predict(
        array $target,
        ?string $dispatchID = null,
        ?array $metadata = null,
        ?array $signals = null,
        ?RequestOptions $requestOptions = null,
    ): WatchPredictResponse {
        $params = [
            'target' => $target,
            'dispatchID' => $dispatchID,
            'metadata' => $metadata,
            'signals' => $signals,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->predict(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Send real-time event data from end-user interactions within your application. Events will be analyzed for proactive fraud prevention and risk scoring.
     *
     * @param list<array{
     *   confidence: 'maximum'|'high'|'neutral'|'low'|'minimum'|Confidence,
     *   label: string,
     *   target: array{
     *     type: 'phone_number'|'email_address'|\Prelude\Watch\WatchSendEventsParams\Event\Target\Type,
     *     value: string,
     *   },
     * }> $events A list of events to dispatch
     *
     * @throws APIException
     */
    public function sendEvents(
        array $events,
        ?RequestOptions $requestOptions = null
    ): WatchSendEventsResponse {
        $params = ['events' => $events];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->sendEvents(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Send feedback regarding your end-users verification funnel. Events will be analyzed for proactive fraud prevention and risk scoring.
     *
     * @param list<array{
     *   target: array{
     *     type: 'phone_number'|'email_address'|\Prelude\Watch\WatchSendFeedbacksParams\Feedback\Target\Type,
     *     value: string,
     *   },
     *   type: 'verification.started'|'verification.completed'|\Prelude\Watch\WatchSendFeedbacksParams\Feedback\Type,
     *   dispatchID?: string,
     *   metadata?: array{correlationID?: string},
     *   signals?: array{
     *     appVersion?: string,
     *     deviceID?: string,
     *     deviceModel?: string,
     *     devicePlatform?: 'android'|'ios'|'ipados'|'tvos'|'web'|\Prelude\Watch\WatchSendFeedbacksParams\Feedback\Signals\DevicePlatform,
     *     ip?: string,
     *     isTrustedUser?: bool,
     *     ja4Fingerprint?: string,
     *     osVersion?: string,
     *     userAgent?: string,
     *   },
     * }> $feedbacks A list of feedbacks to send.
     *
     * @throws APIException
     */
    public function sendFeedbacks(
        array $feedbacks,
        ?RequestOptions $requestOptions = null
    ): WatchSendFeedbacksResponse {
        $params = ['feedbacks' => $feedbacks];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->sendFeedbacks(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
