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
     * You must use named parameters to construct this object. If an named argument is not
     * given, it will not be included during JSON serialization. The arguments are untyped
     * so you can pass any JSON serializable value, but the API expects the types to match
     * the PHPDoc types.
     *
     * @param list<Feedback> $feedbacks `required`
     */
    final public function __construct($feedbacks)
    {
        $this->constructFromArgs(func_get_args());
    }
}

SendFeedbacksParams::_loadMetadata();
