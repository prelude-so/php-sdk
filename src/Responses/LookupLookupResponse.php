<?php

declare(strict_types=1);

namespace Prelude\Responses;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\Serde\ListOf;
use Prelude\Responses\LookupLookupResponse\Flag;
use Prelude\Responses\LookupLookupResponse\LineType;
use Prelude\Responses\LookupLookupResponse\NetworkInfo;
use Prelude\Responses\LookupLookupResponse\OriginalNetworkInfo;

final class LookupLookupResponse implements BaseModel
{
    use Model;

    #[Api('caller_name', optional: true)]
    public ?string $callerName;

    #[Api('country_code', optional: true)]
    public ?string $countryCode;

    /** @var null|list<Flag::*> $flags */
    #[Api(type: new ListOf(Flag::class), optional: true)]
    public ?array $flags;

    /** @var null|LineType::* $lineType */
    #[Api('line_type', optional: true)]
    public ?string $lineType;

    #[Api('network_info', optional: true)]
    public ?NetworkInfo $networkInfo;

    #[Api('original_network_info', optional: true)]
    public ?OriginalNetworkInfo $originalNetworkInfo;

    #[Api('phone_number', optional: true)]
    public ?string $phoneNumber;

    /**
     * You must use named parameters to construct this object.
     *
     * @param null|list<Flag::*> $flags
     * @param null|LineType::*   $lineType
     */
    final public function __construct(
        ?string $callerName = null,
        ?string $countryCode = null,
        ?array $flags = null,
        ?string $lineType = null,
        ?NetworkInfo $networkInfo = null,
        ?OriginalNetworkInfo $originalNetworkInfo = null,
        ?string $phoneNumber = null,
    ) {
        self::_introspect();
        $this->unsetOptionalProperties();

        null != $callerName && $this->callerName = $callerName;
        null != $countryCode && $this->countryCode = $countryCode;
        null != $flags && $this->flags = $flags;
        null != $lineType && $this->lineType = $lineType;
        null != $networkInfo && $this->networkInfo = $networkInfo;
        null != $originalNetworkInfo && $this->originalNetworkInfo = $originalNetworkInfo;
        null != $phoneNumber && $this->phoneNumber = $phoneNumber;
    }
}
