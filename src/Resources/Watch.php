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
use Prelude\Parameters\Watch\SendEventsParams;
use Prelude\Parameters\Watch\SendFeedbacksParams;
use Prelude\RequestOptions;

class Watch implements WatchContract
{
    public function __construct(protected Client $client) {}

    /**
     * @param array{
     *
     *     target?: array{type?: string, value?: string},
     *     dispatchID?: string,
     *     metadata?: array{correlationID?: string},
     *     signals?: array{
     *
     *         appVersion?: string,
     *         deviceID?: string,
     *         deviceModel?: string,
     *         devicePlatform?: string,
     *         ip?: string,
     *         isTrustedUser?: bool,
     *         osVersion?: string,
     *         userAgent?: string,
     *
     * },
     *
     * } $params
     * @param RequestOptions|array{
     *
     *     timeout?: float|null,
     *     maxRetries?: int|null,
     *     initialRetryDelay?: float|null,
     *     maxRetryDelay?: float|null,
     *     extraHeaders?: list<string>|null,
     *     extraQueryParams?: list<string>|null,
     *     extraBodyParams?: list<string>|null,
     *
     * }|null $requestOptions
     */
    public function predict(
        array $params,
        mixed $requestOptions = []
    ): PredictResponse {
        [$parsed, $options] = PredictParams::parseRequest(
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
     * @param array{
     *
     *     events?: list<array{
     *
     *         confidence?: string,
     *         label?: string,
     *         target?: array{type?: string, value?: string},
     *
     * }>,
     *
     * } $params
     * @param RequestOptions|array{
     *
     *     timeout?: float|null,
     *     maxRetries?: int|null,
     *     initialRetryDelay?: float|null,
     *     maxRetryDelay?: float|null,
     *     extraHeaders?: list<string>|null,
     *     extraQueryParams?: list<string>|null,
     *     extraBodyParams?: list<string>|null,
     *
     * }|null $requestOptions
     */
    public function sendEvents(
        array $params,
        mixed $requestOptions = []
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
     * @param array{
     *
     *     feedbacks?: list<array{
     *
     *         target?: array{type?: string, value?: string},
     *         type?: string,
     *         dispatchID?: string,
     *         metadata?: array{correlationID?: string},
     *         signals?: array{
     *
     *             appVersion?: string,
     *             deviceID?: string,
     *             deviceModel?: string,
     *             devicePlatform?: string,
     *             ip?: string,
     *             isTrustedUser?: bool,
     *             osVersion?: string,
     *             userAgent?: string,
     *
     * },
     *
     * }>,
     *
     * } $params
     * @param RequestOptions|array{
     *
     *     timeout?: float|null,
     *     maxRetries?: int|null,
     *     initialRetryDelay?: float|null,
     *     maxRetryDelay?: float|null,
     *     extraHeaders?: list<string>|null,
     *     extraQueryParams?: list<string>|null,
     *     extraBodyParams?: list<string>|null,
     *
     * }|null $requestOptions
     */
    public function sendFeedbacks(
        array $params,
        mixed $requestOptions = []
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
