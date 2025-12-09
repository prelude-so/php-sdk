<?php

declare(strict_types=1);

namespace Prelude\Services;

use Prelude\Client;
use Prelude\Core\Exceptions\APIException;
use Prelude\Lookup\LookupLookupParams\Type;
use Prelude\Lookup\LookupLookupResponse;
use Prelude\RequestOptions;
use Prelude\ServiceContracts\LookupContract;

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
     * @param list<'cnam'|Type> $type Optional features. Possible values are:
     *   * `cnam` - Retrieve CNAM (Caller ID Name) along with other information. Contact us if you need to use this functionality.
     *
     * @throws APIException
     */
    public function lookup(
        string $phoneNumber,
        ?array $type = null,
        ?RequestOptions $requestOptions = null,
    ): LookupLookupResponse {
        $params = ['type' => $type];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->lookup($phoneNumber, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
