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
 *   requestID?: string|null,
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

    #[Optional('request_id')]
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
     * @param Metadata|array{correlationID?: string|null} $metadata
     */
    public static function with(
        Status|string $status,
        ?string $id = null,
        Metadata|array|null $metadata = null,
        ?string $requestID = null,
    ): self {
        $self = new self;

        $self['status'] = $status;

        null !== $id && $self['id'] = $id;
        null !== $metadata && $self['metadata'] = $metadata;
        null !== $requestID && $self['requestID'] = $requestID;

        return $self;
    }

    /**
     * The status of the check.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * The verification identifier.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The metadata for this verification.
     *
     * @param Metadata|array{correlationID?: string|null} $metadata
     */
    public function withMetadata(Metadata|array $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }

    public function withRequestID(string $requestID): self
    {
        $self = clone $this;
        $self['requestID'] = $requestID;

        return $self;
    }
}
