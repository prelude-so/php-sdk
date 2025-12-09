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

interface NotifyRawContract
{
    /**
     * @api
     *
     * @param string $configID The subscription configuration ID
     *
     * @return BaseResponse<NotifyGetSubscriptionConfigResponse>
     *
     * @throws APIException
     */
    public function getSubscriptionConfig(
        string $configID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $phoneNumber The phone number in E.164 format (e.g., +33612345678)
     * @param array<mixed>|NotifyGetSubscriptionPhoneNumberParams $params
     *
     * @return BaseResponse<NotifyGetSubscriptionPhoneNumberResponse>
     *
     * @throws APIException
     */
    public function getSubscriptionPhoneNumber(
        string $phoneNumber,
        array|NotifyGetSubscriptionPhoneNumberParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|NotifyListSubscriptionConfigsParams $params
     *
     * @return BaseResponse<NotifyListSubscriptionConfigsResponse>
     *
     * @throws APIException
     */
    public function listSubscriptionConfigs(
        array|NotifyListSubscriptionConfigsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $phoneNumber Path param: The phone number in E.164 format (e.g., +33612345678)
     * @param array<mixed>|NotifyListSubscriptionPhoneNumberEventsParams $params
     *
     * @return BaseResponse<NotifyListSubscriptionPhoneNumberEventsResponse>
     *
     * @throws APIException
     */
    public function listSubscriptionPhoneNumberEvents(
        string $phoneNumber,
        array|NotifyListSubscriptionPhoneNumberEventsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $configID The subscription configuration ID
     * @param array<mixed>|NotifyListSubscriptionPhoneNumbersParams $params
     *
     * @return BaseResponse<NotifyListSubscriptionPhoneNumbersResponse>
     *
     * @throws APIException
     */
    public function listSubscriptionPhoneNumbers(
        string $configID,
        array|NotifyListSubscriptionPhoneNumbersParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|NotifySendParams $params
     *
     * @return BaseResponse<NotifySendResponse>
     *
     * @throws APIException
     */
    public function send(
        array|NotifySendParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|NotifySendBatchParams $params
     *
     * @return BaseResponse<NotifySendBatchResponse>
     *
     * @throws APIException
     */
    public function sendBatch(
        array|NotifySendBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
