<?php

declare(strict_types=1);

namespace Prelude\Services;

use Prelude\Client;
use Prelude\Core\Contracts\BaseResponse;
use Prelude\Core\Exceptions\APIException;
use Prelude\RequestOptions;
use Prelude\ServiceContracts\WatchRawContract;
use Prelude\Signals;
use Prelude\Target;
use Prelude\Watch\WatchEvaluateParams;
use Prelude\Watch\WatchEvaluateResponse;
use Prelude\Watch\WatchPredictParams;
use Prelude\Watch\WatchPredictParams\Metadata;
use Prelude\Watch\WatchPredictResponse;
use Prelude\Watch\WatchSendEventsParams;
use Prelude\Watch\WatchSendEventsParams\Event;
use Prelude\Watch\WatchSendEventsResponse;
use Prelude\Watch\WatchSendFeedbacksParams;
use Prelude\Watch\WatchSendFeedbacksParams\Feedback;
use Prelude\Watch\WatchSendFeedbacksResponse;

/**
 * Evaluate email addresses and phone numbers for trustworthiness.
 *
 * @phpstan-import-type MetadataShape from \Prelude\Watch\WatchPredictParams\Metadata
 * @phpstan-import-type EventShape from \Prelude\Watch\WatchSendEventsParams\Event
 * @phpstan-import-type FeedbackShape from \Prelude\Watch\WatchSendFeedbacksParams\Feedback
 * @phpstan-import-type TargetShape from \Prelude\Target
 * @phpstan-import-type SignalsShape from \Prelude\Signals
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
     * **Beta.** The request and response shapes may still change, and flows and recipes are configured by Prelude on your behalf for now. Talk to us before you build against it.
     *
     * Score a target against the rules configured for one moment in your product — signup, checkout, password reset. The flow selects which recipes run; each recipe scores its rules against a threshold and returns its own verdict, and the evaluation answers with the most severe verdict and action across them. Where Predict returns a single model-derived outcome, Eval returns the full breakdown, so you can see which rules fired and which could not run. Scoring-only — it does not update counters by itself.
     *
     * @param array{
     *   flowID: string,
     *   target: Target|TargetShape,
     *   attributes?: array<string,string>,
     *   dispatchID?: string,
     *   signals?: Signals|SignalsShape,
     * }|WatchEvaluateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WatchEvaluateResponse>
     *
     * @throws APIException
     */
    public function evaluate(
        array|WatchEvaluateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WatchEvaluateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'v2/watch/eval',
            body: (object) $parsed,
            options: $options,
            convert: WatchEvaluateResponse::class,
        );
    }

    /**
     * @api
     *
     * At signup, score the user's phone number or email address (target) as legitimate or suspicious. Scoring-only — does not update counters by itself. When using Feedback, call predict before verification.started on the same target (and correlation_id when used) so feedback can warm Watch auth-start counters. Use Events for product fraud labels; use Feedback only if you run your own phone verification funnel outside Prelude Verify.
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
     * Send custom fraud signals from your application (labels and confidence levels). Events capture product-specific risk patterns and are weighted when scoring traffic. Use without Predict or Feedback if you only need to report product-side abuse (for example account.banned). Feedback is a separate, optional endpoint for self-hosted phone verification funnels.
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
     * Optional. Report verification-funnel steps (verification.started, verification.completed) when you run phone verification outside Prelude Verify. Feeds Watch abuse-rate counters for your own flow. Call Predict on the same target before verification.started and reuse metadata.correlation_id so auth-start counters receive predict signals; without a linked predict, only attempt-rate counters update on started. Not required if you only use Events and/or Predict, or if Verify already handles verification for that traffic.
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
