<?php

declare(strict_types=1);

namespace Prelude\Parameters\WatchSendFeedbacksParam\Feedback;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Parameters\WatchSendFeedbacksParam\Feedback\Target\Type;

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
        $this->type = $type;
        $this->value = $value;

        self::_introspect();
    }
}
