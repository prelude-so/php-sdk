<?php

declare(strict_types=1);

namespace Prelude\Verification;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Concerns\SdkResponse;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\Conversion\Contracts\ResponseConverter;
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
 *   request_id?: string|null,
 *   silent?: Silent|null,
 * }
 */
final class VerificationNewResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<VerificationNewResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * The verification identifier.
     */
    #[Api]
    public string $id;

    /**
     * The method used for verifying this phone number.
     *
     * @var value-of<Method> $method
     */
    #[Api(enum: Method::class)]
    public string $method;

    /**
     * The status of the verification.
     *
     * @var value-of<Status> $status
     */
    #[Api(enum: Status::class)]
    public string $status;

    /**
     * The ordered sequence of channels to be used for verification.
     *
     * @var list<value-of<Channel>>|null $channels
     */
    #[Api(list: Channel::class, optional: true)]
    public ?array $channels;

    /**
     * The metadata for this verification.
     */
    #[Api(optional: true)]
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
    #[Api(enum: Reason::class, optional: true)]
    public ?string $reason;

    #[Api(optional: true)]
    public ?string $request_id;

    /**
     * The silent verification specific properties.
     */
    #[Api(optional: true)]
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
     * @param Reason|value-of<Reason> $reason
     */
    public static function with(
        string $id,
        Method|string $method,
        Status|string $status,
        ?array $channels = null,
        ?Metadata $metadata = null,
        Reason|string|null $reason = null,
        ?string $request_id = null,
        ?Silent $silent = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj['method'] = $method;
        $obj['status'] = $status;

        null !== $channels && $obj['channels'] = $channels;
        null !== $metadata && $obj->metadata = $metadata;
        null !== $reason && $obj['reason'] = $reason;
        null !== $request_id && $obj->request_id = $request_id;
        null !== $silent && $obj->silent = $silent;

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
     * The method used for verifying this phone number.
     *
     * @param Method|value-of<Method> $method
     */
    public function withMethod(Method|string $method): self
    {
        $obj = clone $this;
        $obj['method'] = $method;

        return $obj;
    }

    /**
     * The status of the verification.
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
     * The ordered sequence of channels to be used for verification.
     *
     * @param list<Channel|value-of<Channel>> $channels
     */
    public function withChannels(array $channels): self
    {
        $obj = clone $this;
        $obj['channels'] = $channels;

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
        $obj = clone $this;
        $obj['reason'] = $reason;

        return $obj;
    }

    public function withRequestID(string $requestID): self
    {
        $obj = clone $this;
        $obj->request_id = $requestID;

        return $obj;
    }

    /**
     * The silent verification specific properties.
     */
    public function withSilent(Silent $silent): self
    {
        $obj = clone $this;
        $obj->silent = $silent;

        return $obj;
    }
}
