<?php

declare(strict_types=1);

namespace Prelude\Parameters\Verification;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Concerns\Params;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\None;
use Prelude\Parameters\Verification\CreateParams\Metadata;
use Prelude\Parameters\Verification\CreateParams\Options;
use Prelude\Parameters\Verification\CreateParams\Signals;
use Prelude\Parameters\Verification\CreateParams\Target;

final class CreateParams implements BaseModel
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
    public ?Options $options;

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
     * @param null|Options  $options
     * @param null|Signals  $signals
     */
    final public function __construct(
        $target,
        $dispatchID = None::NOT_GIVEN,
        $metadata = None::NOT_GIVEN,
        $options = None::NOT_GIVEN,
        $signals = None::NOT_GIVEN,
    ) {
        $this->constructFromArgs(func_get_args());
    }
}

CreateParams::_loadMetadata();
