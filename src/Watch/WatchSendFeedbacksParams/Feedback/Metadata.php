<?php

declare(strict_types=1);

namespace Prelude\Watch\WatchSendFeedbacksParams\Feedback;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;

/**
 * The metadata for this feedback.
 *
 * @phpstan-type MetadataShape = array{correlation_id?: string|null}
 */
final class Metadata implements BaseModel
{
    /** @use SdkModel<MetadataShape> */
    use SdkModel;

    /**
     * A user-defined identifier to correlate this feedback with. It is returned in the response and any webhook events that refer to this feedback.
     */
    #[Optional]
    public ?string $correlation_id;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $correlation_id = null): self
    {
        $obj = new self;

        null !== $correlation_id && $obj['correlation_id'] = $correlation_id;

        return $obj;
    }

    /**
     * A user-defined identifier to correlate this feedback with. It is returned in the response and any webhook events that refer to this feedback.
     */
    public function withCorrelationID(string $correlationID): self
    {
        $obj = clone $this;
        $obj['correlation_id'] = $correlationID;

        return $obj;
    }
}
