<?php

declare(strict_types=1);

namespace Prelude\ServiceContracts;

use Prelude\Core\Exceptions\APIException;
use Prelude\Lookup\LookupLookupParams\Type;
use Prelude\Lookup\LookupLookupResponse;
use Prelude\RequestOptions;

use const Prelude\Core\OMIT as omit;

interface LookupContract
{
    /**
     * @api
     *
     * @param list<Type|value-of<Type>> $type Optional features. Possible values are:
     *   * `cnam` - Retrieve CNAM (Caller ID Name) along with other information. Contact us if you need to use this functionality.
     *
     * @throws APIException
     */
    public function lookup(
        string $phoneNumber,
        $type = omit,
        ?RequestOptions $requestOptions = null,
    ): LookupLookupResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function lookupRaw(
        string $phoneNumber,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): LookupLookupResponse;
}
