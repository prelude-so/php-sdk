<?php

declare(strict_types=1);

namespace Prelude\Parameters\Watch;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Concerns\Params;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\Serde\ListOf;
use Prelude\Parameters\Watch\SendEventsParams\Event;

final class SendEventsParams implements BaseModel
{
    use Model;
    use Params;

    /** @var list<Event> $events */
    #[Api(type: new ListOf(Event::class))]
    public array $events;

    /**
     * You must use named parameters to construct this object. If an named argument is not
     * given, it will not be included during JSON serialization. The arguments are untyped
     * so you can pass any JSON serializable value, but the API expects the types to match
     * the PHPDoc types.
     *
     * @param list<Event> $events `required`
     */
    final public function __construct($events)
    {
        $this->constructFromArgs(func_get_args());
    }
}

SendEventsParams::_loadMetadata();
