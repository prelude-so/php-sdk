<?php

declare(strict_types=1);

namespace Prelude\Responses;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Responses\VerificationCheckResponse\Metadata;
use Prelude\Responses\VerificationCheckResponse\Status;

/**
 * @phpstan-type verification_check_response_alias = array{
 *   status: Status::*, id?: string, metadata?: Metadata, requestID?: string
 * }
 */
final class VerificationCheckResponse implements BaseModel
{
    use Model;

    /**
     * The status of the check.
     *
     * @var Status::* $status
     */
    #[Api]
    public string $status;

    /**
     * The verification identifier.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * The metadata for this verification.
     */
    #[Api(optional: true)]
    public ?Metadata $metadata;

    #[Api('request_id', optional: true)]
    public ?string $requestID;

    /**
     * You must use named parameters to construct this object.
     *
     * @param Status::* $status
     */
    final public function __construct(
        string $status,
        ?string $id = null,
        ?Metadata $metadata = null,
        ?string $requestID = null,
    ) {
        self::introspect();
        $this->unsetOptionalProperties();

        $this->status = $status;

        null !== $id && $this->id = $id;
        null !== $metadata && $this->metadata = $metadata;
        null !== $requestID && $this->requestID = $requestID;
    }
}
