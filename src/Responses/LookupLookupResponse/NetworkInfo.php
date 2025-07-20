<?php

declare(strict_types=1);

namespace Prelude\Responses\LookupLookupResponse;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;

/**
 * @phpstan-type network_info_alias = array{
 *   carrierName?: string, mcc?: string, mnc?: string
 * }
 */
final class NetworkInfo implements BaseModel
{
    use Model;

    #[Api('carrier_name', optional: true)]
    public ?string $carrierName;

    #[Api(optional: true)]
    public ?string $mcc;

    #[Api(optional: true)]
    public ?string $mnc;

    /**
     * You must use named parameters to construct this object.
     */
    final public function __construct(
        ?string $carrierName = null,
        ?string $mcc = null,
        ?string $mnc = null
    ) {
        self::introspect();
        $this->unsetOptionalProperties();

        null !== $carrierName && $this->carrierName = $carrierName;
        null !== $mcc && $this->mcc = $mcc;
        null !== $mnc && $this->mnc = $mnc;
    }
}
