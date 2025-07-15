<?php

declare(strict_types=1);

namespace Prelude\Parameters\Watch;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Concerns\Params;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\None;
use Prelude\Parameters\Watch\PredictParams\Metadata;
use Prelude\Parameters\Watch\PredictParams\Signals;
use Prelude\Parameters\Watch\PredictParams\Target;

final class PredictParams implements BaseModel
{
    use Model;
    use Params;

    #[Api]
    public Target $target;

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
     * @param null|string   $dispatchID
     * @param null|Metadata $metadata
     * @param null|Signals  $signals
     */
    final public function __construct(
        $target,
        $dispatchID = None::NOT_GIVEN,
        $metadata = None::NOT_GIVEN,
        $signals = None::NOT_GIVEN,
    ) {
        $this->constructFromArgs(func_get_args());
    }
}

PredictParams::_loadMetadata();
