<?php

declare(strict_types=1);

namespace Prelude\Lookup;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Concerns\SdkParams;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Lookup\LookupLookupParams\Type;

/**
 * Retrieve detailed information about a phone number including carrier data, line type, and portability status.
 *
 * @see Prelude\Services\LookupService::lookup()
 *
 * @phpstan-type LookupLookupParamsShape = array{
 *   type?: list<Type|value-of<Type>>|null
 * }
 */
final class LookupLookupParams implements BaseModel
{
    /** @use SdkModel<LookupLookupParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Optional features. Possible values are:
     *   * `cnam` - Retrieve CNAM (Caller ID Name) along with other information. Contact us if you need to use this functionality.
     *
     * @var list<value-of<Type>>|null $type
     */
    #[Optional(list: Type::class)]
    public ?array $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Type|value-of<Type>>|null $type
     */
    public static function with(?array $type = null): self
    {
        $self = new self;

        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * Optional features. Possible values are:
     *   * `cnam` - Retrieve CNAM (Caller ID Name) along with other information. Contact us if you need to use this functionality.
     *
     * @param list<Type|value-of<Type>> $type
     */
    public function withType(array $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
