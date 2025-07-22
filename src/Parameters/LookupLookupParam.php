<?php

declare(strict_types=1);

namespace Prelude\Parameters;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Concerns\Params;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\Conversion\ListOf;
use Prelude\Parameters\LookupLookupParam\Type;

/**
 * Retrieve detailed information about a phone number including carrier data, line type, and portability status.
 *
 * @phpstan-type lookup_params = array{type?: list<Type::*>}
 */
final class LookupLookupParam implements BaseModel
{
    use Model;
    use Params;

    /**
     * Optional features. Possible values are:
     *   * `cnam` - Retrieve CNAM (Caller ID Name) along with other information. Contact us if you need to use this functionality.
     *
     * @var null|list<Type::*> $type
     */
    #[Api(type: new ListOf(enum: Type::class), optional: true)]
    public ?array $type;

    /**
     * You must use named parameters to construct this object.
     *
     * @param null|list<Type::*> $type
     */
    final public function __construct(?array $type = null)
    {
        self::introspect();
        $this->unsetOptionalProperties();

        null !== $type && $this->type = $type;
    }
}
