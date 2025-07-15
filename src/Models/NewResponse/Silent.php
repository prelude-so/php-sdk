<?php

declare(strict_types=1);

namespace Prelude\Models\NewResponse;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;

final class Silent implements BaseModel
{
    use Model;

    #[Api('request_url')]
    public string $requestURL;

    /**
     * You must use named parameters to construct this object. If an named argument is not
     * given, it will not be included during JSON serialization. The arguments are untyped
     * so you can pass any JSON serializable value, but the API expects the types to match
     * the PHPDoc types.
     *
     * @param string $requestURL `required`
     */
    final public function __construct($requestURL)
    {
        $this->constructFromArgs(func_get_args());
    }
}

Silent::_loadMetadata();
