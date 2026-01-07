<?php

declare(strict_types=1);

namespace Prelude\ServiceContracts;

use Prelude\Core\Exceptions\APIException;
use Prelude\Lookup\LookupLookupParams\Type;
use Prelude\Lookup\LookupLookupResponse;
use Prelude\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Prelude\RequestOptions
 */
interface LookupContract
{
    /**
     * @api
     *
     * @param string $phoneNumber An E.164 formatted phone number to look up.
     * @param list<Type|value-of<Type>> $type Optional features. Possible values are:
     *   * `cnam` - Retrieve CNAM (Caller ID Name) along with other information. Contact us if you need to use this functionality.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function lookup(
        string $phoneNumber,
        ?array $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): LookupLookupResponse;
}
