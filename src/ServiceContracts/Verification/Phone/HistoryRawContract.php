<?php

declare(strict_types=1);

namespace Prelude\ServiceContracts\Verification\Phone;

use Prelude\Core\Contracts\BaseResponse;
use Prelude\Core\Exceptions\APIException;
use Prelude\RequestOptions;
use Prelude\Verification\Phone\History\HistoryGetResponse;
use Prelude\Verification\Phone\History\HistoryListParams;
use Prelude\Verification\Phone\History\HistoryListResponse;

/**
 * @phpstan-import-type RequestOpts from \Prelude\RequestOptions
 */
interface HistoryRawContract
{
    /**
     * @api
     *
     * @param string $id the verification identifier
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<HistoryGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|HistoryListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<HistoryListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|HistoryListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
