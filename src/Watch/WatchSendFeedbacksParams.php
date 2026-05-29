<?php

declare(strict_types=1);

namespace Prelude\Watch;

use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Concerns\SdkParams;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Watch\WatchSendFeedbacksParams\Feedback;

/**
 * Optional. Report verification-funnel steps (verification.started, verification.completed) when you run phone verification outside Prelude Verify. Feeds Watch abuse-rate counters for your own flow. Call Predict on the same target before verification.started and reuse metadata.correlation_id so auth-start counters receive predict signals; without a linked predict, only attempt-rate counters update on started. Not required if you only use Events and/or Predict, or if Verify already handles verification for that traffic.
 *
 * @see Prelude\Services\WatchService::sendFeedbacks()
 *
 * @phpstan-import-type FeedbackShape from \Prelude\Watch\WatchSendFeedbacksParams\Feedback
 *
 * @phpstan-type WatchSendFeedbacksParamsShape = array{
 *   feedbacks: list<Feedback|FeedbackShape>
 * }
 */
final class WatchSendFeedbacksParams implements BaseModel
{
    /** @use SdkModel<WatchSendFeedbacksParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A list of feedbacks to send. A maximum of 100 feedbacks can be sent in a single request.
     *
     * @var list<Feedback> $feedbacks
     */
    #[Required(list: Feedback::class)]
    public array $feedbacks;

    /**
     * `new WatchSendFeedbacksParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WatchSendFeedbacksParams::with(feedbacks: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WatchSendFeedbacksParams)->withFeedbacks(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Feedback|FeedbackShape> $feedbacks
     */
    public static function with(array $feedbacks): self
    {
        $self = new self;

        $self['feedbacks'] = $feedbacks;

        return $self;
    }

    /**
     * A list of feedbacks to send. A maximum of 100 feedbacks can be sent in a single request.
     *
     * @param list<Feedback|FeedbackShape> $feedbacks
     */
    public function withFeedbacks(array $feedbacks): self
    {
        $self = clone $this;
        $self['feedbacks'] = $feedbacks;

        return $self;
    }
}
