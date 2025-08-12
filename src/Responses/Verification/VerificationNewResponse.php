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
    public static function from(
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
    public function setID(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * The method used for verifying this phone number.
     *
     * @param Method::* $method
     */
    public function setMethod(string $method): self
    {
        $this->method = $method;

        return $this;
    }

    /**
     * The status of the verification.
     *
     * @param Status::* $status
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * The ordered sequence of channels to be used for verification.
     *
     * @param list<Channel::*> $channels
     */
    public function setChannels(array $channels): self
    {
        $this->channels = $channels;

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

    /**
     * The reason why the verification was blocked. Only present when status is "blocked".
     *
     * @param Reason::* $reason
     */
    public function setReason(string $reason): self
    {
        $this->reason = $reason;

        return $this;
    }

    public function setRequestID(string $requestID): self
    {
        $this->requestID = $requestID;

        return $this;
    }

    /**
     * The silent verification specific properties.
     */
    public function setSilent(Silent $silent): self
    {
        $this->silent = $silent;

        return $this;
    }
}
