<?php

declare(strict_types=1);

namespace Prelude\ServiceContracts;

use Prelude\Core\Exceptions\APIException;
use Prelude\RequestOptions;
use Prelude\Signals;
use Prelude\Target;
use Prelude\Watch\WatchEvaluateResponse;
use Prelude\Watch\WatchPredictParams\Metadata;
use Prelude\Watch\WatchPredictResponse;
use Prelude\Watch\WatchSendEventsParams\Event;
use Prelude\Watch\WatchSendEventsResponse;
use Prelude\Watch\WatchSendFeedbacksParams\Feedback;
use Prelude\Watch\WatchSendFeedbacksResponse;

/**
 * @phpstan-import-type MetadataShape from \Prelude\Watch\WatchPredictParams\Metadata
 * @phpstan-import-type EventShape from \Prelude\Watch\WatchSendEventsParams\Event
 * @phpstan-import-type FeedbackShape from \Prelude\Watch\WatchSendFeedbacksParams\Feedback
 * @phpstan-import-type TargetShape from \Prelude\Target
 * @phpstan-import-type SignalsShape from \Prelude\Signals
 * @phpstan-import-type RequestOpts from \Prelude\RequestOptions
 */
interface WatchContract
{
    /**
     * @api
     *
     * @param string $flowID The flow to evaluate. A flow names the moment you are guarding and selects the recipes that run.
     * @param Target|TargetShape $target the identifier to score — a phone number or email address
     * @param array<string,string> $attributes Values for the attributes the flow's recipes declare, keyed without the `attr.` namespace a rule uses to reference them.
     *
     * An attribute a recipe declares and this request omits is treated as missing evidence, not as an empty value: the rules reading it report `NOT_EVALUATED` rather than being scored as though the condition were false. A key no recipe in the flow declares is ignored rather than rejected, so one payload can serve flows that read different attributes.
     * @param string $dispatchID The identifier of the dispatch that came from the front-end SDK. Signals it carries fill in anything the request did not state; the request wins where both supply a value.
     * @param Signals|SignalsShape $signals The signals used for anti-fraud. For more details, refer to [Signals](/verify/v2/documentation/prevent-fraud#signals).
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function evaluate(
        string $flowID,
        Target|array $target,
        ?array $attributes = null,
        ?string $dispatchID = null,
        Signals|array|null $signals = null,
        RequestOptions|array|null $requestOptions = null,
    ): WatchEvaluateResponse;

    /**
     * @api
     *
     * @param Target|TargetShape $target the signup identifier to score — a phone number or email address
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
    ): WatchPredictResponse;

    /**
     * @api
     *
     * @param list<Event|EventShape> $events A list of events to dispatch. A maximum of 100 events can be sent in a single request.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function sendEvents(
        array $events,
        RequestOptions|array|null $requestOptions = null
    ): WatchSendEventsResponse;

    /**
     * @api
     *
     * @param list<Feedback|FeedbackShape> $feedbacks A list of feedbacks to send. A maximum of 100 feedbacks can be sent in a single request.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function sendFeedbacks(
        array $feedbacks,
        RequestOptions|array|null $requestOptions = null
    ): WatchSendFeedbacksResponse;
}
