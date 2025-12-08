<?php

declare(strict_types=1);

namespace Prelude\Verification;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Verification\VerificationCheckResponse\Metadata;
use Prelude\Verification\VerificationCheckResponse\Status;

/**
 * @phpstan-type VerificationCheckResponseShape = array{
 *   status: value-of<Status>,
 *   id?: string|null,
 *   metadata?: Metadata|null,
 *   request_id?: string|null,
 * }
 */
final class VerificationCheckResponse implements BaseModel
{
    /** @use SdkModel<VerificationCheckResponseShape> */
    use SdkModel;

    /**
     * The status of the check.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * The verification identifier.
     */
    #[Optional]
    public ?string $id;

    /**
     * The metadata for this verification.
     */
    #[Optional]
    public ?Metadata $metadata;

    #[Optional]
    public ?string $request_id;

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
     * @param Metadata|array{correlation_id?: string|null} $metadata
     */
    public static function with(
        Status|string $status,
        ?string $id = null,
        Metadata|array|null $metadata = null,
        ?string $request_id = null,
    ): self {
        $obj = new self;

        $obj['status'] = $status;

        null !== $id && $obj['id'] = $id;
        null !== $metadata && $obj['metadata'] = $metadata;
        null !== $request_id && $obj['request_id'] = $request_id;

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
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * The verification identifier.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The metadata for this verification.
     *
     * @param Metadata|array{correlation_id?: string|null} $metadata
     */
    public function withMetadata(Metadata|array $metadata): self
    {
        $obj = clone $this;
        $obj['metadata'] = $metadata;

        return $obj;
    }

    public function withRequestID(string $requestID): self
    {
        $obj = clone $this;
        $obj['request_id'] = $requestID;

        return $obj;
    }
}
