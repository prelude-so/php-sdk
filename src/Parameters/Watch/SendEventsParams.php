<?php

declare(strict_types=1);

namespace Prelude\Parameters\Watch;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Concerns\Params;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\Serde\ListOf;

class SendEventsParams implements BaseModel
{
    use Model;
    use Params;

    /**
     * @var list<array{
     *
     *     confidence?: string,
     *     label?: string,
     *     target?: array{type?: string, value?: string},
     *
     * }> $events
     */
    #[Api(type: new ListOf(new ListOf('mixed')))]
    public array $events;
}

SendEventsParams::_loadMetadata();
