<?php

declare(strict_types=1);

namespace Prelude\Responses;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\Conversion\ListOf;
use Prelude\Responses\VerificationNewResponse\Channel;
use Prelude\Responses\VerificationNewResponse\Metadata;
use Prelude\Responses\VerificationNewResponse\Method;
use Prelude\Responses\VerificationNewResponse\Reason;
use Prelude\Responses\VerificationNewResponse\Silent;
use Prelude\Responses\VerificationNewResponse\Status;

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

    #[Api]
    public string $id;

    /** @var Method::* $method */
    #[Api]
    public string $method;

    /** @var Status::* $status */
    #[Api]
    public string $status;

    /** @var null|list<Channel::*> $channels */
    #[Api(type: new ListOf(enum: Channel::class), optional: true)]
    public ?array $channels;

    #[Api(optional: true)]
    public ?Metadata $metadata;

    /** @var null|Reason::* $reason */
    #[Api(optional: true)]
    public ?string $reason;

    #[Api('request_id', optional: true)]
    public ?string $requestID;

    #[Api(optional: true)]
    public ?Silent $silent;

    /**
     * You must use named parameters to construct this object.
     *
     * @param Method::*             $method
     * @param Status::*             $status
     * @param null|list<Channel::*> $channels
     * @param null|Reason::*        $reason
     */
    final public function __construct(
        string $id,
        string $method,
        string $status,
        ?array $channels = null,
        ?Metadata $metadata = null,
        ?string $reason = null,
        ?string $requestID = null,
        ?Silent $silent = null,
    ) {
        self::introspect();
        $this->unsetOptionalProperties();

        $this->id = $id;
        $this->method = $method;
        $this->status = $status;

        null !== $channels && $this->channels = $channels;
        null !== $metadata && $this->metadata = $metadata;
        null !== $reason && $this->reason = $reason;
        null !== $requestID && $this->requestID = $requestID;
        null !== $silent && $this->silent = $silent;
    }
}
