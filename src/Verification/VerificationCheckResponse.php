<?php

declare(strict_types=1);

namespace Prelude\Verification;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Verification\VerificationCheckResponse\Metadata;
use Prelude\Verification\VerificationCheckResponse\Status;

/**
 * @phpstan-type verification_check_response = array{
 *   status: value-of<Status>, id?: string, metadata?: Metadata, requestID?: string
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class VerificationCheckResponse implements BaseModel
{
    /** @use SdkModel<verification_check_response> */
    use SdkModel;

    /**
     * The status of the check.
     *
     * @var value-of<Status> $status
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
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status|value-of<Status> $status
     */
    public static function with(
        Status|string $status,
        ?string $id = null,
        ?Metadata $metadata = null,
        ?string $requestID = null,
    ): self {
        $obj = new self;

        $obj->status = $status instanceof Status ? $status->value : $status;

        null !== $id && $obj->id = $id;
        null !== $metadata && $obj->metadata = $metadata;
        null !== $requestID && $obj->requestID = $requestID;

        return $obj;
    }

    /**
     * The status of the check.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj->status = $status instanceof Status ? $status->value : $status;

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
