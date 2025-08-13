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

    /**
     * `new VerificationCheckResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerificationCheckResponse::with(status: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VerificationCheckResponse)->withStatus(...)
     * ```
     */
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
    public static function with(
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
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }

    /**
     * The verification identifier.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The metadata for this verification.
     */
    public function withMetadata(Metadata $metadata): self
    {
        $obj = clone $this;
        $obj->metadata = $metadata;

        return $obj;
    }

    public function withRequestID(string $requestID): self
    {
        $obj = clone $this;
        $obj->requestID = $requestID;

        return $obj;
    }
}
