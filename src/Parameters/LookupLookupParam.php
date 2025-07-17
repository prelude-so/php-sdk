<?php

declare(strict_types=1);

namespace Prelude\Parameters;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Concerns\Params;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\Serde\ListOf;
use Prelude\Parameters\LookupLookupParam\Type;

final class LookupLookupParam implements BaseModel
{
    use Model;
    use Params;

    /** @var null|list<Type::*> $type */
    #[Api(type: new ListOf(enum: Type::class), optional: true)]
    public ?array $type;

    /**
     * You must use named parameters to construct this object.
     *
     * @param null|list<Type::*> $type
     */
    final public function __construct(?array $type = null)
    {
        self::_introspect();
        $this->unsetOptionalProperties();

        null !== $type && $this->type = $type;
    }
}
