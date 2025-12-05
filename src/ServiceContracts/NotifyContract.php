<?php

declare(strict_types=1);

namespace Prelude\ServiceContracts;

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

interface NotifyContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function getSubscriptionConfig(
        string $configID,
        ?RequestOptions $requestOptions = null
    ): NotifyGetSubscriptionConfigResponse;

    /**
     * @api
     *
     * @param array<mixed>|NotifyGetSubscriptionPhoneNumberParams $params
     *
     * @throws APIException
     */
    public function getSubscriptionPhoneNumber(
        string $phoneNumber,
        array|NotifyGetSubscriptionPhoneNumberParams $params,
        ?RequestOptions $requestOptions = null,
    ): NotifyGetSubscriptionPhoneNumberResponse;

    /**
     * @api
     *
     * @param array<mixed>|NotifyListSubscriptionConfigsParams $params
     *
     * @throws APIException
     */
    public function listSubscriptionConfigs(
        array|NotifyListSubscriptionConfigsParams $params,
        ?RequestOptions $requestOptions = null,
    ): NotifyListSubscriptionConfigsResponse;

    /**
     * @api
     *
     * @param array<mixed>|NotifyListSubscriptionPhoneNumberEventsParams $params
     *
     * @throws APIException
     */
    public function listSubscriptionPhoneNumberEvents(
        string $phoneNumber,
        array|NotifyListSubscriptionPhoneNumberEventsParams $params,
        ?RequestOptions $requestOptions = null,
    ): NotifyListSubscriptionPhoneNumberEventsResponse;

    /**
     * @api
     *
     * @param array<mixed>|NotifyListSubscriptionPhoneNumbersParams $params
     *
     * @throws APIException
     */
    public function listSubscriptionPhoneNumbers(
        string $configID,
        array|NotifyListSubscriptionPhoneNumbersParams $params,
        ?RequestOptions $requestOptions = null,
    ): NotifyListSubscriptionPhoneNumbersResponse;

    /**
     * @api
     *
     * @param array<mixed>|NotifySendParams $params
     *
     * @throws APIException
     */
    public function send(
        array|NotifySendParams $params,
        ?RequestOptions $requestOptions = null
    ): NotifySendResponse;

    /**
     * @api
     *
     * @param array<mixed>|NotifySendBatchParams $params
     *
     * @throws APIException
     */
    public function sendBatch(
        array|NotifySendBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): NotifySendBatchResponse;
}
