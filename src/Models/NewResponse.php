<?php

declare(strict_types=1);

namespace Prelude\Models;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\None;
use Prelude\Core\Serde\ListOf;

class NewResponse implements BaseModel
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

    /** @var null|array{correlationID?: string} $metadata */
    #[Api(optional: true)]
    public ?array $metadata;

    #[Api(optional: true)]
    public ?string $reason;

    #[Api('request_id', optional: true)]
    public ?string $requestID;

    /** @var null|array{requestURL?: string} $silent */
    #[Api(optional: true)]
    public ?array $silent;

    /**
     * @param string                             $id
     * @param string                             $method
     * @param string                             $status
     * @param null|list<string>                  $channels
     * @param null|array{correlationID?: string} $metadata
     * @param null|string                        $reason
     * @param null|string                        $requestID
     * @param null|array{requestURL?: string}    $silent
     */
    final public function __construct(
        $id,
        $method,
        $status,
        $channels = None::NOT_GIVEN,
        $metadata = None::NOT_GIVEN,
        $reason = None::NOT_GIVEN,
        $requestID = None::NOT_GIVEN,
        $silent = None::NOT_GIVEN,
    ) {
        $this->constructFromArgs(func_get_args());
    }
}

NewResponse::_loadMetadata();
