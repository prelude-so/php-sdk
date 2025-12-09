<?php

declare(strict_types=1);

namespace Prelude\Services;

use Prelude\Client;
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
use Prelude\Notify\NotifyListSubscriptionPhoneNumbersParams\State;
use Prelude\Notify\NotifyListSubscriptionPhoneNumbersResponse;
use Prelude\Notify\NotifySendBatchParams;
use Prelude\Notify\NotifySendBatchResponse;
use Prelude\Notify\NotifySendParams;
use Prelude\Notify\NotifySendParams\PreferredChannel;
use Prelude\Notify\NotifySendResponse;
use Prelude\RequestOptions;
use Prelude\ServiceContracts\NotifyContract;

final class NotifyService implements NotifyContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a specific subscription management configuration by its ID.
     *
     * @throws APIException
     */
    public function getSubscriptionConfig(
        string $configID,
        ?RequestOptions $requestOptions = null
    ): NotifyGetSubscriptionConfigResponse {
        /** @var BaseResponse<NotifyGetSubscriptionConfigResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['v2/notify/management/subscriptions/%1$s', $configID],
            options: $requestOptions,
            convert: NotifyGetSubscriptionConfigResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the current subscription status for a specific phone number within a subscription configuration.
     *
     * @param array{configID: string}|NotifyGetSubscriptionPhoneNumberParams $params
     *
     * @throws APIException
     */
    public function getSubscriptionPhoneNumber(
        string $phoneNumber,
        array|NotifyGetSubscriptionPhoneNumberParams $params,
        ?RequestOptions $requestOptions = null,
    ): NotifyGetSubscriptionPhoneNumberResponse {
        [$parsed, $options] = NotifyGetSubscriptionPhoneNumberParams::parseRequest(
            $params,
            $requestOptions,
        );
        $configID = $parsed['configID'];
        unset($parsed['configID']);

        /** @var BaseResponse<NotifyGetSubscriptionPhoneNumberResponse> */
        $response = $this->client->request(
            method: 'get',
            path: [
                'v2/notify/management/subscriptions/%1$s/phone_numbers/%2$s',
                $configID,
                $phoneNumber,
            ],
            options: $options,
            convert: NotifyGetSubscriptionPhoneNumberResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a paginated list of subscription management configurations for your account.
     *
     * Each configuration represents a subscription management setup with phone numbers for receiving opt-out/opt-in requests and a callback URL for webhook events.
     *
     * @param array{
     *   cursor?: string, limit?: int
     * }|NotifyListSubscriptionConfigsParams $params
     *
     * @throws APIException
     */
    public function listSubscriptionConfigs(
        array|NotifyListSubscriptionConfigsParams $params,
        ?RequestOptions $requestOptions = null,
    ): NotifyListSubscriptionConfigsResponse {
        [$parsed, $options] = NotifyListSubscriptionConfigsParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<NotifyListSubscriptionConfigsResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'v2/notify/management/subscriptions',
            query: $parsed,
            options: $options,
            convert: NotifyListSubscriptionConfigsResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a paginated list of subscription events (status changes) for a specific phone number within a subscription configuration.
     *
     * Events are ordered by timestamp in descending order (most recent first).
     *
     * @param array{
     *   configID: string, cursor?: string, limit?: int
     * }|NotifyListSubscriptionPhoneNumberEventsParams $params
     *
     * @throws APIException
     */
    public function listSubscriptionPhoneNumberEvents(
        string $phoneNumber,
        array|NotifyListSubscriptionPhoneNumberEventsParams $params,
        ?RequestOptions $requestOptions = null,
    ): NotifyListSubscriptionPhoneNumberEventsResponse {
        [$parsed, $options] = NotifyListSubscriptionPhoneNumberEventsParams::parseRequest(
            $params,
            $requestOptions,
        );
        $configID = $parsed['configID'];
        unset($parsed['configID']);

        /** @var BaseResponse<NotifyListSubscriptionPhoneNumberEventsResponse> */
        $response = $this->client->request(
            method: 'get',
            path: [
                'v2/notify/management/subscriptions/%1$s/phone_numbers/%2$s/events',
                $configID,
                $phoneNumber,
            ],
            query: $parsed,
            options: $options,
            convert: NotifyListSubscriptionPhoneNumberEventsResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a paginated list of phone numbers and their subscription statuses for a specific subscription configuration.
     *
     * You can optionally filter by subscription state (SUB or UNSUB).
     *
     * @param array{
     *   cursor?: string, limit?: int, state?: 'SUB'|'UNSUB'|State
     * }|NotifyListSubscriptionPhoneNumbersParams $params
     *
     * @throws APIException
     */
    public function listSubscriptionPhoneNumbers(
        string $configID,
        array|NotifyListSubscriptionPhoneNumbersParams $params,
        ?RequestOptions $requestOptions = null,
    ): NotifyListSubscriptionPhoneNumbersResponse {
        [$parsed, $options] = NotifyListSubscriptionPhoneNumbersParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<NotifyListSubscriptionPhoneNumbersResponse> */
        $response = $this->client->request(
            method: 'get',
            path: [
                'v2/notify/management/subscriptions/%1$s/phone_numbers', $configID,
            ],
            query: $parsed,
            options: $options,
            convert: NotifyListSubscriptionPhoneNumbersResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Send transactional and marketing messages to your users via SMS and WhatsApp with automatic compliance enforcement.
     *
     * @param array{
     *   templateID: string,
     *   to: string,
     *   callbackURL?: string,
     *   correlationID?: string,
     *   expiresAt?: string|\DateTimeInterface,
     *   from?: string,
     *   locale?: string,
     *   preferredChannel?: 'sms'|'whatsapp'|PreferredChannel,
     *   scheduleAt?: string|\DateTimeInterface,
     *   variables?: array<string,string>,
     * }|NotifySendParams $params
     *
     * @throws APIException
     */
    public function send(
        array|NotifySendParams $params,
        ?RequestOptions $requestOptions = null
    ): NotifySendResponse {
        [$parsed, $options] = NotifySendParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<NotifySendResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'v2/notify',
            body: (object) $parsed,
            options: $options,
            convert: NotifySendResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Send the same message to multiple recipients in a single request.
     *
     * @param array{
     *   templateID: string,
     *   to: list<string>,
     *   callbackURL?: string,
     *   correlationID?: string,
     *   expiresAt?: string|\DateTimeInterface,
     *   from?: string,
     *   locale?: string,
     *   preferredChannel?: 'sms'|'whatsapp'|NotifySendBatchParams\PreferredChannel,
     *   scheduleAt?: string|\DateTimeInterface,
     *   variables?: array<string,string>,
     * }|NotifySendBatchParams $params
     *
     * @throws APIException
     */
    public function sendBatch(
        array|NotifySendBatchParams $params,
        ?RequestOptions $requestOptions = null
    ): NotifySendBatchResponse {
        [$parsed, $options] = NotifySendBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<NotifySendBatchResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'v2/notify/batch',
            body: (object) $parsed,
            options: $options,
            convert: NotifySendBatchResponse::class,
        );

        return $response->parse();
    }
}
