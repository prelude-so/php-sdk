<?php

declare(strict_types=1);

namespace Prelude\Core\ServiceContracts;

use Prelude\Lookup\LookupLookupParams\Type;
use Prelude\Lookup\LookupLookupResponse;
use Prelude\RequestOptions;

use const Prelude\Core\OMIT as omit;

interface LookupContract
{
    /**
     * @api
     *
     * @param list<Type::*> $type Optional features. Possible values are:
     *   * `cnam` - Retrieve CNAM (Caller ID Name) along with other information. Contact us if you need to use this functionality.
     */
    public function lookup(
        string $phoneNumber,
        $type = omit,
        ?RequestOptions $requestOptions = null,
    ): LookupLookupResponse;
}
