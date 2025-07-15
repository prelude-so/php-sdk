<?php

declare(strict_types=1);

namespace Prelude\Models;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\None;
use Prelude\Models\CheckResponse\Metadata;

final class CheckResponse implements BaseModel
{
    use Model;

    #[Api]
    public string $status;

    #[Api(optional: true)]
    public ?string $id;

    #[Api(optional: true)]
    public ?Metadata $metadata;

    #[Api('request_id', optional: true)]
    public ?string $requestID;

    /**
     * You must use named parameters to construct this object. If an named argument is not
     * given, it will not be included during JSON serialization. The arguments are untyped
     * so you can pass any JSON serializable value, but the API expects the types to match
     * the PHPDoc types.
     *
     * @param string        $status    `required`
     * @param null|string   $id
     * @param null|Metadata $metadata
     * @param null|string   $requestID
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
