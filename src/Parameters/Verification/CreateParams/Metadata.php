<?php

declare(strict_types=1);

namespace Prelude\Parameters\Verification\CreateParams;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\None;

final class Metadata implements BaseModel
{
    use Model;

    #[Api('correlation_id', optional: true)]
    public ?string $correlationID;

    /**
     * You must use named parameters to construct this object. If an named argument is not
     * given, it will not be included during JSON serialization. The arguments are untyped
     * so you can pass any JSON serializable value, but the API expects the types to match
     * the PHPDoc types.
     *
     * @param null|string $correlationID
     */
    final public function __construct($correlationID = None::NOT_GIVEN)
    {
        $this->constructFromArgs(func_get_args());
    }
}

Metadata::_loadMetadata();
