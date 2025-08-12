<?php

declare(strict_types=1);

namespace Prelude\Responses\Lookup\LookupLookupResponse;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;

/**
 * The current carrier information.
 *
 * @phpstan-type network_info_alias = array{
 *   carrierName?: string, mcc?: string, mnc?: string
 * }
 */
final class NetworkInfo implements BaseModel
{
    use Model;

    /**
     * The name of the carrier.
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
    public static function from(
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
     * The name of the carrier.
     */
    public function setCarrierName(string $carrierName): self
    {
        $this->carrierName = $carrierName;

        return $this;
    }

    /**
     * Mobile Country Code.
     */
    public function setMcc(string $mcc): self
    {
        $this->mcc = $mcc;

        return $this;
    }

    /**
     * Mobile Network Code.
     */
    public function setMnc(string $mnc): self
    {
        $this->mnc = $mnc;

        return $this;
    }
}
