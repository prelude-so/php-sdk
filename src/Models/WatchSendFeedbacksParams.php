<?php

declare(strict_types=1);

namespace Prelude\Models;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Concerns\Params;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\Conversion\ListOf;
use Prelude\Models\WatchSendFeedbacksParams\Feedback;

/**
 * Send feedback regarding your end-users verification funnel. Events will be analyzed for proactive fraud prevention and risk scoring.
 *
 * @phpstan-type send_feedbacks_params = array{feedbacks: list<Feedback>}
 */
final class WatchSendFeedbacksParams implements BaseModel
{
    use Model;
    use Params;

    /**
     * A list of feedbacks to send.
     *
     * @var list<Feedback> $feedbacks
     */
    #[Api(type: new ListOf(Feedback::class))]
    public array $feedbacks;

    public function __construct()
    {
        self::introspect();
        $this->unsetOptionalProperties();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Feedback> $feedbacks
     */
    public static function new(array $feedbacks): self
    {
        $obj = new self;

        $obj->feedbacks = $feedbacks;

        return $obj;
    }
}
