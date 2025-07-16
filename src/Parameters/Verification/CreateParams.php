<?php

declare(strict_types=1);

namespace Prelude\Parameters\Verification;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Concerns\Params;
use Prelude\Core\Contracts\BaseModel;
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
     * You must use named parameters to construct this object.
     */
    final public function __construct(
        Target $target,
        ?string $dispatchID = null,
        ?Metadata $metadata = null,
        ?Options $options = null,
        ?Signals $signals = null,
    ) {
        $this->target = $target;
        $this->dispatchID = $dispatchID;
        $this->metadata = $metadata;
        $this->options = $options;
        $this->signals = $signals;
    }
}

CreateParams::__introspect();
