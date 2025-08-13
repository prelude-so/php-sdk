<?php

declare(strict_types=1);

namespace Prelude\Responses\Verification;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\Conversion\ListOf;
use Prelude\Responses\Verification\VerificationNewResponse\Channel;
use Prelude\Responses\Verification\VerificationNewResponse\Metadata;
use Prelude\Responses\Verification\VerificationNewResponse\Method;
use Prelude\Responses\Verification\VerificationNewResponse\Reason;
use Prelude\Responses\Verification\VerificationNewResponse\Silent;
use Prelude\Responses\Verification\VerificationNewResponse\Status;

/**
 * @phpstan-type verification_new_response_alias = array{
 *   id: string,
 *   method: Method::*,
 *   status: Status::*,
 *   channels?: list<Channel::*>,
 *   metadata?: Metadata,
 *   reason?: Reason::*,
 *   requestID?: string,
 *   silent?: Silent,
 * }
 */
final class VerificationNewResponse implements BaseModel
{
    use Model;

    /**
     * The verification identifier.
     */
    #[Api]
    public string $id;

    /**
     * The method used for verifying this phone number.
     *
     * @var Method::* $method
     */
    #[Api(enum: Method::class)]
    public string $method;

    /**
     * The status of the verification.
     *
     * @var Status::* $status
     */
    #[Api(enum: Status::class)]
    public string $status;

    /**
     * The ordered sequence of channels to be used for verification.
     *
     * @var null|list<Channel::*> $channels
     */
    #[Api(type: new ListOf(enum: Channel::class), optional: true)]
    public ?array $channels;

    /**
     * The metadata for this verification.
     */
    #[Api(optional: true)]
    public ?Metadata $metadata;

    /**
     * The reason why the verification was blocked. Only present when status is "blocked".
     *
     * @var null|Reason::* $reason
     */
    #[Api(enum: Reason::class, optional: true)]
    public ?string $reason;

    #[Api('request_id', optional: true)]
    public ?string $requestID;

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
        self::introspect();
        $this->unsetOptionalProperties();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Method::* $method
     * @param Status::* $status
     * @param null|list<Channel::*> $channels
     * @param null|Reason::* $reason
     */
    public static function with(
        string $id,
        string $method,
        string $status,
        ?array $channels = null,
        ?Metadata $metadata = null,
        ?string $reason = null,
        ?string $requestID = null,
        ?Silent $silent = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->method = $method;
        $obj->status = $status;

        null !== $channels && $obj->channels = $channels;
        null !== $metadata && $obj->metadata = $metadata;
        null !== $reason && $obj->reason = $reason;
        null !== $requestID && $obj->requestID = $requestID;
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
     * @param Method::* $method
     */
    public function withMethod(string $method): self
    {
        $obj = clone $this;
        $obj->method = $method;

        return $obj;
    }

    /**
     * The status of the verification.
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
     * The ordered sequence of channels to be used for verification.
     *
     * @param list<Channel::*> $channels
     */
    public function withChannels(array $channels): self
    {
        $obj = clone $this;
        $obj->channels = $channels;

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
     *
     * @param Reason::* $reason
     */
    public function withReason(string $reason): self
    {
        $obj = clone $this;
        $obj->reason = $reason;

        return $obj;
    }

    public function withRequestID(string $requestID): self
    {
        $obj = clone $this;
        $obj->requestID = $requestID;

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
