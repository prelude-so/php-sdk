<?php

declare(strict_types=1);

namespace Prelude\Watch;

use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Concerns\SdkParams;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Watch\WatchSendFeedbacksParams\Feedback;

/**
 * Send feedback regarding your end-users verification funnel. Events will be analyzed for proactive fraud prevention and risk scoring.
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
     * A list of feedbacks to send.
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
     * A list of feedbacks to send.
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
