<?php

declare(strict_types=1);

namespace Prelude\Lookup\LookupLookupResponse;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;

/**
 * The original carrier information.
 *
 * @phpstan-type original_network_info = array{
 *   carrierName?: string|null, mcc?: string|null, mnc?: string|null
 * }
 */
final class OriginalNetworkInfo implements BaseModel
{
    /** @use SdkModel<original_network_info> */
    use SdkModel;

    /**
     * The name of the original carrier.
     */
    #[Api('carrier_name', optional: true)]
    public ?string $carrierName;

    /**
     * Mobile Country Code.
     */
    #[Api(optional: true)]
    public ?string $mcc;

    /**
     * Mobile Network Code.
     */
    #[Api(optional: true)]
    public ?string $mnc;

    public function __construct()
    {
        self::introspect();
        $this->unsetOptionalProperties();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $carrierName = null,
        ?string $mcc = null,
        ?string $mnc = null
    ): self {
        $obj = new self;

        null !== $carrierName && $obj->carrierName = $carrierName;
        null !== $mcc && $obj->mcc = $mcc;
        null !== $mnc && $obj->mnc = $mnc;

        return $obj;
    }

    /**
     * The name of the original carrier.
     */
    public function withCarrierName(string $carrierName): self
    {
        $obj = clone $this;
        $obj->carrierName = $carrierName;

        return $obj;
    }

    /**
     * Mobile Country Code.
     */
    public function withMcc(string $mcc): self
    {
        $obj = clone $this;
        $obj->mcc = $mcc;

        return $obj;
    }

    /**
     * Mobile Network Code.
     */
    public function withMnc(string $mnc): self
    {
        $obj = clone $this;
        $obj->mnc = $mnc;

        return $obj;
    }
}
