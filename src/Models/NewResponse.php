<?php

declare(strict_types=1);

namespace Prelude\Models;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\None;
use Prelude\Core\Serde\ListOf;
use Prelude\Models\NewResponse\Metadata;
use Prelude\Models\NewResponse\Silent;

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

    #[Api(optional: true)]
    public ?Metadata $metadata;

    #[Api(optional: true)]
    public ?string $reason;

    #[Api('request_id', optional: true)]
    public ?string $requestID;

    #[Api(optional: true)]
    public ?Silent $silent;

    /**
     * You must use named parameters to construct this object. If an named argument is not
     * given, it will not be included during JSON serialization. The arguments are untyped
     * so you can pass any JSON serializable value, but the API expects the types to match
     * the PHPDoc types.
     *
     * @param string            $id        `required`
     * @param string            $method    `required`
     * @param string            $status    `required`
     * @param null|list<string> $channels
     * @param null|Metadata     $metadata
     * @param null|string       $reason
     * @param null|string       $requestID
     * @param null|Silent       $silent
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
