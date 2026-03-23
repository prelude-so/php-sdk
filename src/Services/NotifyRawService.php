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
use Prelude\Notify\NotifySendParams\Document;
use Prelude\Notify\NotifySendParams\PreferredChannel;
use Prelude\Notify\NotifySendResponse;
use Prelude\RequestOptions;
use Prelude\ServiceContracts\NotifyRawContract;

/**
 * Send transactional and marketing messages with compliance enforcement.
 *
 * @phpstan-import-type DocumentShape from \Prelude\Notify\NotifySendParams\Document
 * @phpstan-import-type DocumentShape from \Prelude\Notify\NotifySendBatchParams\Document as DocumentShape1
 * @phpstan-import-type RequestOpts from \Prelude\RequestOptions
 */
final class NotifyRawService implements NotifyRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a specific subscription management configuration by its ID.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['v2/notify/management/subscriptions/%1$s', $configID],
            options: $requestOptions,
            convert: NotifyGetSubscriptionConfigResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the current subscription status for a specific phone number within a subscription configuration.
     *
     * @param string $phoneNumber The phone number in E.164 format (e.g., +33612345678)
     * @param array{configID: string}|NotifyGetSubscriptionPhoneNumberParams $params
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
    ): BaseResponse {
        [$parsed, $options] = NotifyGetSubscriptionPhoneNumberParams::parseRequest(
            $params,
            $requestOptions,
        );
        $configID = $parsed['configID'];
        unset($parsed['configID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'v2/notify/management/subscriptions/%1$s/phone_numbers/%2$s',
                $configID,
                $phoneNumber,
            ],
            options: $options,
            convert: NotifyGetSubscriptionPhoneNumberResponse::class,
        );
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NotifyListSubscriptionConfigsResponse>
     *
     * @throws APIException
     */
    public function listSubscriptionConfigs(
        array|NotifyListSubscriptionConfigsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NotifyListSubscriptionConfigsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'v2/notify/management/subscriptions',
            query: $parsed,
            options: $options,
            convert: NotifyListSubscriptionConfigsResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a paginated list of subscription events (status changes) for a specific phone number within a subscription configuration.
     *
     * Events are ordered by timestamp in descending order (most recent first).
     *
     * @param string $phoneNumber Path param: The phone number in E.164 format (e.g., +33612345678)
     * @param array{
     *   configID: string, cursor?: string, limit?: int
     * }|NotifyListSubscriptionPhoneNumberEventsParams $params
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
    ): BaseResponse {
        [$parsed, $options] = NotifyListSubscriptionPhoneNumberEventsParams::parseRequest(
            $params,
            $requestOptions,
        );
        $configID = $parsed['configID'];
        unset($parsed['configID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
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
    }

    /**
     * @api
     *
     * Retrieve a paginated list of phone numbers and their subscription statuses for a specific subscription configuration.
     *
     * You can optionally filter by subscription state (SUB or UNSUB).
     *
     * @param string $configID The subscription configuration ID
     * @param array{
     *   cursor?: string, limit?: int, state?: State|value-of<State>
     * }|NotifyListSubscriptionPhoneNumbersParams $params
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
    ): BaseResponse {
        [$parsed, $options] = NotifyListSubscriptionPhoneNumbersParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'v2/notify/management/subscriptions/%1$s/phone_numbers', $configID,
            ],
            query: $parsed,
            options: $options,
            convert: NotifyListSubscriptionPhoneNumbersResponse::class,
        );
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
     *   document?: Document|DocumentShape,
     *   expiresAt?: \DateTimeInterface,
     *   from?: string,
     *   locale?: string,
     *   preferredChannel?: PreferredChannel|value-of<PreferredChannel>,
     *   scheduleAt?: \DateTimeInterface,
     *   variables?: array<string,string>,
     * }|NotifySendParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NotifySendResponse>
     *
     * @throws APIException
     */
    public function send(
        array|NotifySendParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NotifySendParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'v2/notify',
            body: (object) $parsed,
            options: $options,
            convert: NotifySendResponse::class,
        );
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
     *   document?: NotifySendBatchParams\Document|DocumentShape1,
     *   expiresAt?: \DateTimeInterface,
     *   from?: string,
     *   locale?: string,
     *   preferredChannel?: NotifySendBatchParams\PreferredChannel|value-of<NotifySendBatchParams\PreferredChannel>,
     *   scheduleAt?: \DateTimeInterface,
     *   variables?: array<string,string>,
     * }|NotifySendBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NotifySendBatchResponse>
     *
     * @throws APIException
     */
    public function sendBatch(
        array|NotifySendBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NotifySendBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'v2/notify/batch',
            body: (object) $parsed,
            options: $options,
            convert: NotifySendBatchResponse::class,
        );
    }
}
