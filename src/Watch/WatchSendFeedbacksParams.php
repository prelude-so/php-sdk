<?php

declare(strict_types=1);

namespace Prelude\Watch;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Concerns\SdkParams;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Watch\WatchSendFeedbacksParams\Feedback;
use Prelude\Watch\WatchSendFeedbacksParams\Feedback\Metadata;
use Prelude\Watch\WatchSendFeedbacksParams\Feedback\Signals;
use Prelude\Watch\WatchSendFeedbacksParams\Feedback\Target;
use Prelude\Watch\WatchSendFeedbacksParams\Feedback\Type;

/**
 * Send feedback regarding your end-users verification funnel. Events will be analyzed for proactive fraud prevention and risk scoring.
 *
 * @see Prelude\Services\WatchService::sendFeedbacks()
 *
 * @phpstan-type WatchSendFeedbacksParamsShape = array{
 *   feedbacks: list<Feedback|array{
 *     target: Target,
 *     type: value-of<Type>,
 *     dispatch_id?: string|null,
 *     metadata?: Metadata|null,
 *     signals?: Signals|null,
 *   }>,
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
    #[Api(list: Feedback::class)]
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
     * @param list<Feedback|array{
     *   target: Target,
     *   type: value-of<Type>,
     *   dispatch_id?: string|null,
     *   metadata?: Metadata|null,
     *   signals?: Signals|null,
     * }> $feedbacks
     */
    public static function with(array $feedbacks): self
    {
        $obj = new self;

        $obj['feedbacks'] = $feedbacks;

        return $obj;
    }

    /**
     * A list of feedbacks to send.
     *
     * @param list<Feedback|array{
     *   target: Target,
     *   type: value-of<Type>,
     *   dispatch_id?: string|null,
     *   metadata?: Metadata|null,
     *   signals?: Signals|null,
     * }> $feedbacks
     */
    public function withFeedbacks(array $feedbacks): self
    {
        $obj = clone $this;
        $obj['feedbacks'] = $feedbacks;

        return $obj;
    }
}
