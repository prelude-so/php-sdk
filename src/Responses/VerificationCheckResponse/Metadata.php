<?php

declare(strict_types=1);

namespace Prelude\Responses\VerificationCheckResponse;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;

final class Metadata implements BaseModel
{
    use Model;

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
