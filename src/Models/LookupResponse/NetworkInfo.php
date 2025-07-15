<?php

declare(strict_types=1);

namespace Prelude\Models\LookupResponse;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\None;

class NetworkInfo implements BaseModel
{
    use Model;

    #[Api('carrier_name', optional: true)]
    public ?string $carrierName;

    #[Api(optional: true)]
    public ?string $mcc;

    #[Api(optional: true)]
    public ?string $mnc;

    /**
     * You must use named parameters to construct this object. If an named argument is not
     * given, it will not be included during JSON serialization. The arguments are untyped
     * so you can pass any JSON serializable value, but the API expects the types to match
     * the PHPDoc types.
     *
     * @param null|string $carrierName
     * @param null|string $mcc
     * @param null|string $mnc
     */
    final public function __construct(
        $carrierName = None::NOT_GIVEN,
        $mcc = None::NOT_GIVEN,
        $mnc = None::NOT_GIVEN,
    ) {
        $this->constructFromArgs(func_get_args());
    }
}

NetworkInfo::_loadMetadata();
