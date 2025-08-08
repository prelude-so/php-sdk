<?php

declare(strict_types=1);

namespace Prelude\Models\WatchSendFeedbacksParams\Feedback;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;

/**
 * The metadata for this feedback.
 *
 * @phpstan-type metadata_alias = array{correlationID?: string}
 */
final class Metadata implements BaseModel
{
    use Model;

    /**
     * A user-defined identifier to correlate this feedback with. It is returned in the response and any webhook events that refer to this feedback.
     */
    #[Api('correlation_id', optional: true)]
    public ?string $correlationID;

    public function __construct()
    {
        self::introspect();
        $this->unsetOptionalProperties();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function new(?string $correlationID = null): self
    {
        $obj = new self;

        null !== $correlationID && $obj->correlationID = $correlationID;

        return $obj;
    }

    /**
     * A user-defined identifier to correlate this feedback with. It is returned in the response and any webhook events that refer to this feedback.
     */
    public function setCorrelationID(string $correlationID): self
    {
        $this->correlationID = $correlationID;

        return $this;
    }
}
