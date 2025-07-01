<?php

declare(strict_types=1);

namespace Prelude\Models;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\None;
use Prelude\Core\Serde\ListOf;

class LookupResponse implements BaseModel
{
    use Model;

    #[Api('caller_name', optional: true)]
    public string $callerName;

    #[Api('country_code', optional: true)]
    public string $countryCode;

    /**
     * @var list<string> $flags
     */
    #[Api(type: new ListOf('string'), optional: true)]
    public array $flags;

    #[Api('line_type', optional: true)]
    public string $lineType;

    /**
     * @var array{carrierName?: string, mcc?: string, mnc?: string} $networkInfo
     */
    #[Api('network_info', optional: true)]
    public array $networkInfo;

    /**
     * @var array{
     *
     * carrierName?: string, mcc?: string, mnc?: string
     *
     * } $originalNetworkInfo
     */
    #[Api('original_network_info', optional: true)]
    public array $originalNetworkInfo;

    #[Api('phone_number', optional: true)]
    public string $phoneNumber;

    /**
     * @param string                                                  $callerName
     * @param string                                                  $countryCode
     * @param list<string>                                            $flags
     * @param string                                                  $lineType
     * @param array{carrierName?: string, mcc?: string, mnc?: string} $networkInfo
     * @param array{
     *
     * carrierName?: string, mcc?: string, mnc?: string
     *
     * } $originalNetworkInfo
     * @param string $phoneNumber
     */
    final public function __construct(
        None|string $callerName = None::NOT_SET,
        None|string $countryCode = None::NOT_SET,
        array|None $flags = None::NOT_SET,
        None|string $lineType = None::NOT_SET,
        array|None $networkInfo = None::NOT_SET,
        array|None $originalNetworkInfo = None::NOT_SET,
        None|string $phoneNumber = None::NOT_SET
    ) {
        $args = func_get_args();

        $data = [];
        for ($i = 0; $i < count($args); ++$i) {
            if (None::NOT_SET !== $args[$i]) {
                $data[self::$_constructorArgNames[$i]] = $args[$i] ?? null;
            }
        }

        $this->__unserialize($data);
    }
}

LookupResponse::_loadMetadata();
