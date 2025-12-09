<?php

declare(strict_types=1);

namespace Prelude\Verification;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Verification\VerificationNewResponse\Channel;
use Prelude\Verification\VerificationNewResponse\Metadata;
use Prelude\Verification\VerificationNewResponse\Method;
use Prelude\Verification\VerificationNewResponse\Reason;
use Prelude\Verification\VerificationNewResponse\Silent;
use Prelude\Verification\VerificationNewResponse\Status;

/**
 * @phpstan-type VerificationNewResponseShape = array{
 *   id: string,
 *   method: value-of<Method>,
 *   status: value-of<Status>,
 *   channels?: list<value-of<Channel>>|null,
 *   metadata?: Metadata|null,
 *   reason?: value-of<Reason>|null,
 *   requestID?: string|null,
 *   silent?: Silent|null,
 * }
 */
final class VerificationNewResponse implements BaseModel
{
    /** @use SdkModel<VerificationNewResponseShape> */
    use SdkModel;

    /**
     * The verification identifier.
     */
    #[Required]
    public string $id;

    /**
     * The method used for verifying this phone number.
     *
     * @var value-of<Method> $method
     */
    #[Required(enum: Method::class)]
    public string $method;

    /**
     * The status of the verification.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * The ordered sequence of channels to be used for verification.
     *
     * @var list<value-of<Channel>>|null $channels
     */
    #[Optional(list: Channel::class)]
    public ?array $channels;

    /**
     * The metadata for this verification.
     */
    #[Optional]
    public ?Metadata $metadata;

    /**
     * The reason why the verification was blocked. Only present when status is "blocked".
     *  * `expired_signature` - The signature of the SDK signals is expired. They should be sent within
     *    the hour following their collection.
     *  * `in_block_list` - The phone number is part of the configured block list.
     *  * `invalid_phone_line` - The phone number is not a valid line number (e.g. landline).
     *  * `invalid_phone_number` - The phone number is not a valid phone number (e.g. unallocated range).
     *  * `invalid_signature` - The signature of the SDK signals is invalid.
     *  * `repeated_attempts` - The phone number has made too many verification attempts.
     *  * `suspicious` - The verification attempt was deemed suspicious by the anti-fraud system.
     *
     * @var value-of<Reason>|null $reason
     */
    #[Optional(enum: Reason::class)]
    public ?string $reason;

    #[Optional('request_id')]
    public ?string $requestID;

    /**
     * The silent verification specific properties.
     */
    #[Optional]
    public ?Silent $silent;

    /**
     * `new VerificationNewResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerificationNewResponse::with(id: ..., method: ..., status: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VerificationNewResponse)->withID(...)->withMethod(...)->withStatus(...)
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
     * @param Method|value-of<Method> $method
     * @param Status|value-of<Status> $status
     * @param list<Channel|value-of<Channel>> $channels
     * @param Metadata|array{correlationID?: string|null} $metadata
     * @param Reason|value-of<Reason> $reason
     * @param Silent|array{requestURL: string} $silent
     */
    public static function with(
        string $id,
        Method|string $method,
        Status|string $status,
        ?array $channels = null,
        Metadata|array|null $metadata = null,
        Reason|string|null $reason = null,
        ?string $requestID = null,
        Silent|array|null $silent = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['method'] = $method;
        $self['status'] = $status;

        null !== $channels && $self['channels'] = $channels;
        null !== $metadata && $self['metadata'] = $metadata;
        null !== $reason && $self['reason'] = $reason;
        null !== $requestID && $self['requestID'] = $requestID;
        null !== $silent && $self['silent'] = $silent;

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
     * The method used for verifying this phone number.
     *
     * @param Method|value-of<Method> $method
     */
    public function withMethod(Method|string $method): self
    {
        $self = clone $this;
        $self['method'] = $method;

        return $self;
    }

    /**
     * The status of the verification.
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
     * The ordered sequence of channels to be used for verification.
     *
     * @param list<Channel|value-of<Channel>> $channels
     */
    public function withChannels(array $channels): self
    {
        $self = clone $this;
        $self['channels'] = $channels;

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

    /**
     * The reason why the verification was blocked. Only present when status is "blocked".
     *  * `expired_signature` - The signature of the SDK signals is expired. They should be sent within
     *    the hour following their collection.
     *  * `in_block_list` - The phone number is part of the configured block list.
     *  * `invalid_phone_line` - The phone number is not a valid line number (e.g. landline).
     *  * `invalid_phone_number` - The phone number is not a valid phone number (e.g. unallocated range).
     *  * `invalid_signature` - The signature of the SDK signals is invalid.
     *  * `repeated_attempts` - The phone number has made too many verification attempts.
     *  * `suspicious` - The verification attempt was deemed suspicious by the anti-fraud system.
     *
     * @param Reason|value-of<Reason> $reason
     */
    public function withReason(Reason|string $reason): self
    {
        $self = clone $this;
        $self['reason'] = $reason;

        return $self;
    }

    public function withRequestID(string $requestID): self
    {
        $self = clone $this;
        $self['requestID'] = $requestID;

        return $self;
    }

    /**
     * The silent verification specific properties.
     *
     * @param Silent|array{requestURL: string} $silent
     */
    public function withSilent(Silent|array $silent): self
    {
        $self = clone $this;
        $self['silent'] = $silent;

        return $self;
    }
}
