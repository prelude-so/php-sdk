<?php

declare(strict_types=1);

namespace Prelude\Responses\Verification;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Responses\Verification\VerificationCheckResponse\Metadata;
use Prelude\Responses\Verification\VerificationCheckResponse\Status;

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
    #[Api(enum: Status::class)]
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

    public function __construct()
    {
        self::introspect();
        $this->unsetOptionalProperties();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status::* $status
     */
    public static function new(
        string $status,
        ?string $id = null,
        ?Metadata $metadata = null,
        ?string $requestID = null,
    ): self {
        $obj = new self;

        $obj->status = $status;

        null !== $id && $obj->id = $id;
        null !== $metadata && $obj->metadata = $metadata;
        null !== $requestID && $obj->requestID = $requestID;

        return $obj;
    }

    /**
     * The status of the check.
     *
     * @param Status::* $status
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * The verification identifier.
     */
    public function setID(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * The metadata for this verification.
     */
    public function setMetadata(Metadata $metadata): self
    {
        $this->metadata = $metadata;

        return $this;
    }

    public function setRequestID(string $requestID): self
    {
        $this->requestID = $requestID;

        return $this;
    }
}
