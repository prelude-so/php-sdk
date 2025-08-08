<?php

declare(strict_types=1);

namespace Prelude\Models;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Concerns\Params;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\Conversion\ListOf;
use Prelude\Models\LookupLookupParams\Type;

/**
 * Retrieve detailed information about a phone number including carrier data, line type, and portability status.
 *
 * @phpstan-type lookup_params = array{type?: list<Type::*>}
 */
final class LookupLookupParams implements BaseModel
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

    public function __construct()
    {
        self::introspect();
        $this->unsetOptionalProperties();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param null|list<Type::*> $type
     */
    public static function new(?array $type = null): self
    {
        $obj = new self;

        null !== $type && $obj->type = $type;

        return $obj;
    }
}
