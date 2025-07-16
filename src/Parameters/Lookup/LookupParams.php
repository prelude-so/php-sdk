<?php

declare(strict_types=1);

namespace Prelude\Parameters\Lookup;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Concerns\Params;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\Serde\ListOf;
use Prelude\Parameters\Lookup\LookupParams\Type;

final class LookupParams implements BaseModel
{
    use Model;
    use Params;

    /** @var null|list<Type::*> $type */
    #[Api(type: new ListOf(Type::class), optional: true)]
    public ?array $type;

    /**
     * You must use named parameters to construct this object.
     *
     * @param null|list<Type::*> $type
     */
    final public function __construct(?array $type = null)
    {
        $this->type = $type;
    }
}

LookupParams::__introspect();
