<?php

declare(strict_types=1);

namespace Prelude\Models;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\None;
use Prelude\Core\Serde\ListOf;
use Prelude\Core\Serde\UnionOf;

class LookupResponse implements BaseModel
{
    use Model;

    #[Api('caller_name', optional: true)]
    public ?string $callerName;

    #[Api('country_code', optional: true)]
    public ?string $countryCode;

    /** @var null|list<string> $flags */
    #[Api(type: new UnionOf([new ListOf('string'), 'null']), optional: true)]
    public ?array $flags;

    #[Api('line_type', optional: true)]
    public ?string $lineType;

    /**
     * @var null|array{carrierName?: string, mcc?: string, mnc?: string} $networkInfo
     */
    #[Api('network_info', optional: true)]
    public ?array $networkInfo;

    /**
     * @var array{
     *   carrierName?: string, mcc?: string, mnc?: string
     * }|null $originalNetworkInfo
     */
    #[Api('original_network_info', optional: true)]
    public ?array $originalNetworkInfo;

    #[Api('phone_number', optional: true)]
    public ?string $phoneNumber;

    /**
     * @param null|string                                                  $callerName
     * @param null|string                                                  $countryCode
     * @param null|list<string>                                            $flags
     * @param null|string                                                  $lineType
     * @param null|array{carrierName?: string, mcc?: string, mnc?: string} $networkInfo
     * @param array{
     *   carrierName?: string, mcc?: string, mnc?: string
     * }|null $originalNetworkInfo
     * @param null|string $phoneNumber
     */
    final public function __construct(
        $callerName = None::NOT_GIVEN,
        $countryCode = None::NOT_GIVEN,
        $flags = None::NOT_GIVEN,
        $lineType = None::NOT_GIVEN,
        $networkInfo = None::NOT_GIVEN,
        $originalNetworkInfo = None::NOT_GIVEN,
        $phoneNumber = None::NOT_GIVEN,
    ) {
        $this->constructFromArgs(func_get_args());
    }
}

LookupResponse::_loadMetadata();
