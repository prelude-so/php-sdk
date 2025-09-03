<?php

declare(strict_types=1);

namespace Prelude\Watch;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Concerns\SdkParams;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Watch\WatchSendFeedbacksParams\Feedback;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new WatchSendFeedbacksParams); // set properties as needed
 * $client->watch->sendFeedbacks(...$params->toArray());
 * ```
 * Send feedback regarding your end-users verification funnel. Events will be analyzed for proactive fraud prevention and risk scoring.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->watch->sendFeedbacks(...$params->toArray());`
 *
 * @see Prelude\Watch->sendFeedbacks
 *
 * @phpstan-type watch_send_feedbacks_params = array{feedbacks: list<Feedback>}
 */
final class WatchSendFeedbacksParams implements BaseModel
{
    /** @use SdkModel<watch_send_feedbacks_params> */
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
     * @param list<Feedback> $feedbacks
     */
    public static function with(array $feedbacks): self
    {
        $obj = new self;

        $obj->feedbacks = $feedbacks;

        return $obj;
    }

    /**
     * A list of feedbacks to send.
     *
     * @param list<Feedback> $feedbacks
     */
    public function withFeedbacks(array $feedbacks): self
    {
        $obj = clone $this;
        $obj->feedbacks = $feedbacks;

        return $obj;
    }
}
