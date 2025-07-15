<?php

declare(strict_types=1);

namespace Prelude\Parameters\Lookup;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Concerns\Params;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\None;
use Prelude\Core\Serde\ListOf;

final class LookupParams implements BaseModel
{
    use Model;
    use Params;

    /** @var null|list<string> $type */
    #[Api(type: new ListOf('string'), optional: true)]
    public ?array $type;

    /**
     * You must use named parameters to construct this object. If an named argument is not
     * given, it will not be included during JSON serialization. The arguments are untyped
     * so you can pass any JSON serializable value, but the API expects the types to match
     * the PHPDoc types.
     *
     * @param null|list<string> $type
     */
    final public function __construct($type = None::NOT_GIVEN)
    {
        $this->constructFromArgs(func_get_args());
    }
}

LookupParams::_loadMetadata();
