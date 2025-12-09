<?php

declare(strict_types=1);

namespace Prelude\Lookup\LookupLookupResponse;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;

/**
 * The current carrier information.
 *
 * @phpstan-type NetworkInfoShape = array{
 *   carrierName?: string|null, mcc?: string|null, mnc?: string|null
 * }
 */
final class NetworkInfo implements BaseModel
{
    /** @use SdkModel<NetworkInfoShape> */
    use SdkModel;

    /**
     * The name of the carrier.
     */
    #[Optional('carrier_name')]
    public ?string $carrierName;

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
        ?string $carrierName = null,
        ?string $mcc = null,
        ?string $mnc = null
    ): self {
        $self = new self;

        null !== $carrierName && $self['carrierName'] = $carrierName;
        null !== $mcc && $self['mcc'] = $mcc;
        null !== $mnc && $self['mnc'] = $mnc;

        return $self;
    }

    /**
     * The name of the carrier.
     */
    public function withCarrierName(string $carrierName): self
    {
        $self = clone $this;
        $self['carrierName'] = $carrierName;

        return $self;
    }

    /**
     * Mobile Country Code.
     */
    public function withMcc(string $mcc): self
    {
        $self = clone $this;
        $self['mcc'] = $mcc;

        return $self;
    }

    /**
     * Mobile Network Code.
     */
    public function withMnc(string $mnc): self
    {
        $self = clone $this;
        $self['mnc'] = $mnc;

        return $self;
    }
}
