<?php

declare(strict_types=1);

namespace Prelude\Lookup;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Concerns\SdkParams;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\Conversion\ListOf;
use Prelude\Lookup\LookupLookupParams\Type;

/**
 * Retrieve detailed information about a phone number including carrier data, line type, and portability status.
 *
 * @phpstan-type lookup_params = array{type?: list<Type::*>}
 */
final class LookupLookupParams implements BaseModel
{
    use SdkModel;
    use SdkParams;

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
    public static function with(?array $type = null): self
    {
        $obj = new self;

        null !== $type && $obj->type = $type;

        return $obj;
    }

    /**
     * Optional features. Possible values are:
     *   * `cnam` - Retrieve CNAM (Caller ID Name) along with other information. Contact us if you need to use this functionality.
     *
     * @param list<Type::*> $type
     */
    public function withType(array $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }
}
