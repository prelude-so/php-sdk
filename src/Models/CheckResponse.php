<?php

declare(strict_types=1);

namespace Prelude\Models;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\None;

class CheckResponse implements BaseModel
{
    use Model;

    #[Api]
    public string $status;

    #[Api(optional: true)]
    public ?string $id;

    /** @var null|array{correlationID?: string} $metadata */
    #[Api(optional: true)]
    public ?array $metadata;

    #[Api('request_id', optional: true)]
    public ?string $requestID;

    /**
     * @param string                             $status
     * @param null|string                        $id
     * @param null|array{correlationID?: string} $metadata
     * @param null|string                        $requestID
     */
    final public function __construct(
        $status,
        $id = None::NOT_GIVEN,
        $metadata = None::NOT_GIVEN,
        $requestID = None::NOT_GIVEN,
    ) {
        $this->constructFromArgs(func_get_args());
    }
}

CheckResponse::_loadMetadata();
