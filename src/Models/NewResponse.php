<?php

declare(strict_types=1);

namespace Prelude\Models;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\Serde\ListOf;
use Prelude\Models\NewResponse\Channel;
use Prelude\Models\NewResponse\Metadata;
use Prelude\Models\NewResponse\Method;
use Prelude\Models\NewResponse\Reason;
use Prelude\Models\NewResponse\Silent;
use Prelude\Models\NewResponse\Status;

final class NewResponse implements BaseModel
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
    #[Api(type: new ListOf(Channel::class), optional: true)]
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
        $this->id = $id;
        $this->method = $method;
        $this->status = $status;
        $this->channels = $channels;
        $this->metadata = $metadata;
        $this->reason = $reason;
        $this->requestID = $requestID;
        $this->silent = $silent;
    }
}

NewResponse::__introspect();
