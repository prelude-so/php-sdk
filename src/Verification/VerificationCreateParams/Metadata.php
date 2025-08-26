<?php

declare(strict_types=1);

namespace Prelude\Verification\VerificationCreateParams;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;

/**
 * The metadata for this verification. This object will be returned with every response or webhook sent that refers to this verification.
 *
 * @phpstan-type metadata_alias = array{correlationID?: string|null}
 */
final class Metadata implements BaseModel
{
    /** @use SdkModel<metadata_alias> */
    use SdkModel;

    /**
     * A user-defined identifier to correlate this verification with. It is returned in the response and any webhook events that refer to this verification.
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
    public static function with(?string $correlationID = null): self
    {
        $obj = new self;

        null !== $correlationID && $obj->correlationID = $correlationID;

        return $obj;
    }

    /**
     * A user-defined identifier to correlate this verification with. It is returned in the response and any webhook events that refer to this verification.
     */
    public function withCorrelationID(string $correlationID): self
    {
        $obj = clone $this;
        $obj->correlationID = $correlationID;

        return $obj;
    }
}
