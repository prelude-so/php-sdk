<?php

declare(strict_types=1);

namespace Prelude\ServiceContracts;

use Prelude\Core\Contracts\BaseResponse;
use Prelude\Core\Exceptions\APIException;
use Prelude\Notify\NotifyGetSubscriptionConfigResponse;
use Prelude\Notify\NotifyGetSubscriptionPhoneNumberParams;
use Prelude\Notify\NotifyGetSubscriptionPhoneNumberResponse;
use Prelude\Notify\NotifyListSubscriptionConfigsParams;
use Prelude\Notify\NotifyListSubscriptionConfigsResponse;
use Prelude\Notify\NotifyListSubscriptionPhoneNumberEventsParams;
use Prelude\Notify\NotifyListSubscriptionPhoneNumberEventsResponse;
use Prelude\Notify\NotifyListSubscriptionPhoneNumbersParams;
use Prelude\Notify\NotifyListSubscriptionPhoneNumbersResponse;
use Prelude\Notify\NotifySendBatchParams;
use Prelude\Notify\NotifySendBatchResponse;
use Prelude\Notify\NotifySendParams;
use Prelude\Notify\NotifySendResponse;
use Prelude\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Prelude\RequestOptions
 */
interface NotifyRawContract
{
    /**
     * @api
     *
     * @param string $configID The subscription configuration ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NotifyGetSubscriptionConfigResponse>
     *
     * @throws APIException
     */
    public function getSubscriptionConfig(
        string $configID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $phoneNumber The phone number in E.164 format (e.g., +33612345678)
     * @param array<string,mixed>|NotifyGetSubscriptionPhoneNumberParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NotifyGetSubscriptionPhoneNumberResponse>
     *
     * @throws APIException
     */
    public function getSubscriptionPhoneNumber(
        string $phoneNumber,
        array|NotifyGetSubscriptionPhoneNumberParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|NotifyListSubscriptionConfigsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NotifyListSubscriptionConfigsResponse>
     *
     * @throws APIException
     */
    public function listSubscriptionConfigs(
        array|NotifyListSubscriptionConfigsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $phoneNumber Path param: The phone number in E.164 format (e.g., +33612345678)
     * @param array<string,mixed>|NotifyListSubscriptionPhoneNumberEventsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NotifyListSubscriptionPhoneNumberEventsResponse>
     *
     * @throws APIException
     */
    public function listSubscriptionPhoneNumberEvents(
        string $phoneNumber,
        array|NotifyListSubscriptionPhoneNumberEventsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $configID The subscription configuration ID
     * @param array<string,mixed>|NotifyListSubscriptionPhoneNumbersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NotifyListSubscriptionPhoneNumbersResponse>
     *
     * @throws APIException
     */
    public function listSubscriptionPhoneNumbers(
        string $configID,
        array|NotifyListSubscriptionPhoneNumbersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|NotifySendParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NotifySendResponse>
     *
     * @throws APIException
     */
    public function send(
        array|NotifySendParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|NotifySendBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NotifySendBatchResponse>
     *
     * @throws APIException
     */
    public function sendBatch(
        array|NotifySendBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
