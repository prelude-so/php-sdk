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
 * Evaluate email addresses and phone numbers for trustworthiness.
 *
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
     * At signup, score the user's phone number or email address (target) as legitimate or suspicious. Scoring-only — does not update counters by itself. When using Feedback, call predict before verification.started on the same target (and correlation_id when used) so feedback can warm Watch auth-start counters. Use Events for product fraud labels; use Feedback only if you run your own phone verification funnel outside Prelude Verify.
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
     * Send custom fraud signals from your application (labels and confidence levels). Events capture product-specific risk patterns and are weighted when scoring traffic. Use without Predict or Feedback if you only need to report product-side abuse (for example account.banned). Feedback is a separate, optional endpoint for self-hosted phone verification funnels.
     *
     * @param list<Event|EventShape> $events A list of events to dispatch. A maximum of 100 events can be sent in a single request.
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
     * Optional. Report verification-funnel steps (verification.started, verification.completed) when you run phone verification outside Prelude Verify. Feeds Watch abuse-rate counters for your own flow. Call Predict on the same target before verification.started and reuse metadata.correlation_id so auth-start counters receive predict signals; without a linked predict, only attempt-rate counters update on started. Not required if you only use Events and/or Predict, or if Verify already handles verification for that traffic.
     *
     * @param list<Feedback|FeedbackShape> $feedbacks A list of feedbacks to send. A maximum of 100 feedbacks can be sent in a single request.
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
