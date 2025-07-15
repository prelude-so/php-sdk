<?php

declare(strict_types=1);

namespace Prelude\Parameters\Watch\SendEventsParams;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Parameters\Watch\SendEventsParams\Event\Target;

final class Event implements BaseModel
{
    use Model;

    #[Api]
    public string $confidence;

    #[Api]
    public string $label;

    #[Api]
    public Target $target;

    /**
     * You must use named parameters to construct this object. If an named argument is not
     * given, it will not be included during JSON serialization. The arguments are untyped
     * so you can pass any JSON serializable value, but the API expects the types to match
     * the PHPDoc types.
     *
     * @param string $confidence `required`
     * @param string $label      `required`
     * @param Target $target     `required`
     */
    final public function __construct($confidence, $label, $target)
    {
        $this->constructFromArgs(func_get_args());
    }
}

Event::_loadMetadata();
