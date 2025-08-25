<?php

declare(strict_types=1);

namespace Prelude\Contracts;

use Prelude\Lookup\LookupLookupParams\Type;
use Prelude\RequestOptions;
use Prelude\Responses\Lookup\LookupLookupResponse;

use const Prelude\Core\OMIT as omit;

interface LookupContract
{
    /**
     * @param list<Type::*> $type Optional features. Possible values are:
     *   * `cnam` - Retrieve CNAM (Caller ID Name) along with other information. Contact us if you need to use this functionality.
     */
    public function lookup(
        string $phoneNumber,
        $type = omit,
        ?RequestOptions $requestOptions = null,
    ): LookupLookupResponse;
}
