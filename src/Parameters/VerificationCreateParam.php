<?php

declare(strict_types=1);

namespace Prelude\Parameters;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Concerns\Params;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Parameters\VerificationCreateParam\Metadata;
use Prelude\Parameters\VerificationCreateParam\Options;
use Prelude\Parameters\VerificationCreateParam\Signals;
use Prelude\Parameters\VerificationCreateParam\Target;

final class VerificationCreateParam implements BaseModel
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
        self::introspect();
        $this->unsetOptionalProperties();

        $this->target = $target;

        null !== $dispatchID && $this->dispatchID = $dispatchID;
        null !== $metadata && $this->metadata = $metadata;
        null !== $options && $this->options = $options;
        null !== $signals && $this->signals = $signals;
    }
}
