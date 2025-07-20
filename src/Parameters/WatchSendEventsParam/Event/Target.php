<?php

declare(strict_types=1);

namespace Prelude\Parameters\WatchSendEventsParam\Event;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Parameters\WatchSendEventsParam\Event\Target\Type;

/**
 * @phpstan-type target_alias = array{type: Type::*, value: string}
 */
final class Target implements BaseModel
{
    use Model;

    /** @var Type::* $type */
    #[Api]
    public string $type;

    #[Api]
    public string $value;

    /**
     * You must use named parameters to construct this object.
     *
     * @param Type::* $type
     */
    final public function __construct(string $type, string $value)
    {
        self::introspect();

        $this->type = $type;
        $this->value = $value;
    }
}
