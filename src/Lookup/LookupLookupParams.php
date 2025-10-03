<?php

declare(strict_types=1);

namespace Prelude\Lookup;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Concerns\SdkParams;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Lookup\LookupLookupParams\Type;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new LookupLookupParams); // set properties as needed
 * $client->lookup->lookup(...$params->toArray());
 * ```
 * Retrieve detailed information about a phone number including carrier data, line type, and portability status.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->lookup->lookup(...$params->toArray());`
 *
 * @see Prelude\Lookup->lookup
 *
 * @phpstan-type lookup_lookup_params = array{type?: list<Type|value-of<Type>>}
 */
final class LookupLookupParams implements BaseModel
{
    /** @use SdkModel<lookup_lookup_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Optional features. Possible values are:
     *   * `cnam` - Retrieve CNAM (Caller ID Name) along with other information. Contact us if you need to use this functionality.
     *
     * @var list<value-of<Type>>|null $type
     */
    #[Api(list: Type::class, optional: true)]
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
     * @param list<Type|value-of<Type>> $type
     */
    public static function with(?array $type = null): self
    {
        $obj = new self;

        null !== $type && $obj['type'] = $type;

        return $obj;
    }

    /**
     * Optional features. Possible values are:
     *   * `cnam` - Retrieve CNAM (Caller ID Name) along with other information. Contact us if you need to use this functionality.
     *
     * @param list<Type|value-of<Type>> $type
     */
    public function withType(array $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
