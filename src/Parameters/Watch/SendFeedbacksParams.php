<?php

declare(strict_types=1);

namespace Prelude\Parameters\Watch;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Concerns\Params;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\Serde\ListOf;
use Prelude\Parameters\Watch\SendFeedbacksParams\Feedback;

class SendFeedbacksParams implements BaseModel
{
    use Model;
    use Params;

    /** @var list<Feedback> $feedbacks */
    #[Api(type: new ListOf(Feedback::class))]
    public array $feedbacks;
}

SendFeedbacksParams::_loadMetadata();
