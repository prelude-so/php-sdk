<?php

declare(strict_types=1);

namespace Prelude\Parameters\VerificationCreateParam;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;

/**
 * The metadata for this verification. This object will be returned with every response or webhook sent that refers to this verification.
 *
 * @phpstan-type metadata_alias = array{correlationID?: string}
 */
final class Metadata implements BaseModel
{
    use Model;

    /**
     * A user-defined identifier to correlate this verification with. It is returned in the response and any webhook events that refer to this verification.
     */
    #[Api('correlation_id', optional: true)]
    public ?string $correlationID;

    /**
     * You must use named parameters to construct this object.
     */
    final public function __construct(?string $correlationID = null)
    {
        self::introspect();
        $this->unsetOptionalProperties();

        null !== $correlationID && $this->correlationID = $correlationID;
    }
}
