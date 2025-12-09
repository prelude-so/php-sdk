<?php

declare(strict_types=1);

namespace Prelude\Watch\WatchPredictParams;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;

/**
 * The metadata for this prediction.
 *
 * @phpstan-type MetadataShape = array{correlationID?: string|null}
 */
final class Metadata implements BaseModel
{
    /** @use SdkModel<MetadataShape> */
    use SdkModel;

    /**
     * A user-defined identifier to correlate this prediction with. It is returned in the response and any webhook events that refer to this prediction.
     */
    #[Optional('correlation_id')]
    public ?string $correlationID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $correlationID = null): self
    {
        $self = new self;

        null !== $correlationID && $self['correlationID'] = $correlationID;

        return $self;
    }

    /**
     * A user-defined identifier to correlate this prediction with. It is returned in the response and any webhook events that refer to this prediction.
     */
    public function withCorrelationID(string $correlationID): self
    {
        $self = clone $this;
        $self['correlationID'] = $correlationID;

        return $self;
    }
}
