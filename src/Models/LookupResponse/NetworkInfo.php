<?php

declare(strict_types=1);

namespace Prelude\Models\LookupResponse;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;

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
        $this->carrierName = $carrierName;
        $this->mcc = $mcc;
        $this->mnc = $mnc;
    }
}

NetworkInfo::_loadMetadata();
