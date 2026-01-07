<?php

declare(strict_types=1);

namespace Prelude\Services;

use Prelude\Client;
use Prelude\Core\Exceptions\APIException;
use Prelude\Core\Util;
use Prelude\Lookup\LookupLookupParams\Type;
use Prelude\Lookup\LookupLookupResponse;
use Prelude\RequestOptions;
use Prelude\ServiceContracts\LookupContract;

/**
 * @phpstan-import-type RequestOpts from \Prelude\RequestOptions
 */
final class LookupService implements LookupContract
{
    /**
     * @api
     */
    public LookupRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new LookupRawService($client);
    }

    /**
     * @api
     *
     * Retrieve detailed information about a phone number including carrier data, line type, and portability status.
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
    ): LookupLookupResponse {
        $params = Util::removeNulls(['type' => $type]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->lookup($phoneNumber, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
