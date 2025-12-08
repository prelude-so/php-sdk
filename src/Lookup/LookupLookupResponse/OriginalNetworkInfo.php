<?php

declare(strict_types=1);

namespace Prelude\Lookup\LookupLookupResponse;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;

/**
 * The original carrier information.
 *
 * @phpstan-type OriginalNetworkInfoShape = array{
 *   carrier_name?: string|null, mcc?: string|null, mnc?: string|null
 * }
 */
final class OriginalNetworkInfo implements BaseModel
{
    /** @use SdkModel<OriginalNetworkInfoShape> */
    use SdkModel;

    /**
     * The name of the original carrier.
     */
    #[Optional]
    public ?string $carrier_name;

    /**
     * Mobile Country Code.
     */
    #[Optional]
    public ?string $mcc;

    /**
     * Mobile Network Code.
     */
    #[Optional]
    public ?string $mnc;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $carrier_name = null,
        ?string $mcc = null,
        ?string $mnc = null
    ): self {
        $obj = new self;

        null !== $carrier_name && $obj['carrier_name'] = $carrier_name;
        null !== $mcc && $obj['mcc'] = $mcc;
        null !== $mnc && $obj['mnc'] = $mnc;

        return $obj;
    }

    /**
     * The name of the original carrier.
     */
    public function withCarrierName(string $carrierName): self
    {
        $obj = clone $this;
        $obj['carrier_name'] = $carrierName;

        return $obj;
    }

    /**
     * Mobile Country Code.
     */
    public function withMcc(string $mcc): self
    {
        $obj = clone $this;
        $obj['mcc'] = $mcc;

        return $obj;
    }

    /**
     * Mobile Network Code.
     */
    public function withMnc(string $mnc): self
    {
        $obj = clone $this;
        $obj['mnc'] = $mnc;

        return $obj;
    }
}
