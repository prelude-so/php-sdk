<?php

declare(strict_types=1);

namespace Prelude\Parameters\Watch\SendFeedbacksParams;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\None;

final class Feedback implements BaseModel
{
    use Model;

    #[Api]
    public Target $target;

    #[Api]
    public string $type;

    #[Api('dispatch_id', optional: true)]
    public ?string $dispatchID;

    #[Api(optional: true)]
    public ?Metadata $metadata;

    #[Api(optional: true)]
    public ?Signals $signals;

    /**
     * You must use named parameters to construct this object. If an named argument is not
     * given, it will not be included during JSON serialization. The arguments are untyped
     * so you can pass any JSON serializable value, but the API expects the types to match
     * the PHPDoc types.
     *
     * @param Target        $target     `required`
     * @param string        $type       `required`
     * @param null|string   $dispatchID
     * @param null|Metadata $metadata
     * @param null|Signals  $signals
     */
    final public function __construct(
        $target,
        $type,
        $dispatchID = None::NOT_GIVEN,
        $metadata = None::NOT_GIVEN,
        $signals = None::NOT_GIVEN,
    ) {
        $this->constructFromArgs(func_get_args());
    }
}

Feedback::_loadMetadata();
