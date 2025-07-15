<?php

declare(strict_types=1);

namespace Prelude\Models;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\Serde\ListOf;
use Prelude\Models\NewResponse\Metadata;
use Prelude\Models\NewResponse\Silent;

final class NewResponse implements BaseModel
{
    use Model;

    #[Api]
    public string $id;

    #[Api]
    public string $method;

    #[Api]
    public string $status;

    /** @var null|list<string> $channels */
    #[Api(type: new ListOf('string'), optional: true)]
    public ?array $channels;

    #[Api(optional: true)]
    public ?Metadata $metadata;

    #[Api(optional: true)]
    public ?string $reason;

    #[Api('request_id', optional: true)]
    public ?string $requestID;

    #[Api(optional: true)]
    public ?Silent $silent;

    /**
     * You must use named parameters to construct this object.
     *
     * @param null|list<string> $channels
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

NewResponse::_loadMetadata();
