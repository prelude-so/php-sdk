<?php

declare(strict_types=1);

namespace Prelude\Parameters\Watch;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Concerns\Params;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\Serde\ListOf;
use Prelude\Parameters\Watch\SendFeedbacksParams\Feedback;

final class SendFeedbacksParams implements BaseModel
{
    use Model;
    use Params;

    /** @var list<Feedback> $feedbacks */
    #[Api(type: new ListOf(Feedback::class))]
    public array $feedbacks;

    /**
     * You must use named parameters to construct this object.
     *
     * @param list<Feedback> $feedbacks
     */
    final public function __construct(array $feedbacks)
    {
        $this->feedbacks = $feedbacks;
    }
}

SendFeedbacksParams::_loadMetadata();
