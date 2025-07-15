<?php

declare(strict_types=1);

namespace Prelude\Models;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\Serde\ListOf;
use Prelude\Models\LookupResponse\NetworkInfo;
use Prelude\Models\LookupResponse\OriginalNetworkInfo;

final class LookupResponse implements BaseModel
{
    use Model;

    #[Api('caller_name', optional: true)]
    public ?string $callerName;

    #[Api('country_code', optional: true)]
    public ?string $countryCode;

    /** @var null|list<string> $flags */
    #[Api(type: new ListOf('string'), optional: true)]
    public ?array $flags;

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
     * @param null|list<string> $flags
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
        $this->callerName = $callerName;
        $this->countryCode = $countryCode;
        $this->flags = $flags;
        $this->lineType = $lineType;
        $this->networkInfo = $networkInfo;
        $this->originalNetworkInfo = $originalNetworkInfo;
        $this->phoneNumber = $phoneNumber;
    }
}

LookupResponse::_loadMetadata();
