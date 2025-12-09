<?php

declare(strict_types=1);

namespace Prelude\Services;

use Prelude\Client;
use Prelude\Core\Exceptions\APIException;
use Prelude\Notify\NotifyGetSubscriptionConfigResponse;
use Prelude\Notify\NotifyGetSubscriptionPhoneNumberResponse;
use Prelude\Notify\NotifyListSubscriptionConfigsResponse;
use Prelude\Notify\NotifyListSubscriptionPhoneNumberEventsResponse;
use Prelude\Notify\NotifyListSubscriptionPhoneNumbersParams\State;
use Prelude\Notify\NotifyListSubscriptionPhoneNumbersResponse;
use Prelude\Notify\NotifySendBatchResponse;
use Prelude\Notify\NotifySendParams\PreferredChannel;
use Prelude\Notify\NotifySendResponse;
use Prelude\RequestOptions;
use Prelude\ServiceContracts\NotifyContract;

final class NotifyService implements NotifyContract
{
    /**
     * @api
     */
    public NotifyRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new NotifyRawService($client);
    }

    /**
     * @api
     *
     * Retrieve a specific subscription management configuration by its ID.
     *
     * @param string $configID The subscription configuration ID
     *
     * @throws APIException
     */
    public function getSubscriptionConfig(
        string $configID,
        ?RequestOptions $requestOptions = null
    ): NotifyGetSubscriptionConfigResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getSubscriptionConfig($configID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the current subscription status for a specific phone number within a subscription configuration.
     *
     * @param string $phoneNumber The phone number in E.164 format (e.g., +33612345678)
     * @param string $configID The subscription configuration ID
     *
     * @throws APIException
     */
    public function getSubscriptionPhoneNumber(
        string $phoneNumber,
        string $configID,
        ?RequestOptions $requestOptions = null,
    ): NotifyGetSubscriptionPhoneNumberResponse {
        $params = ['configID' => $configID];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getSubscriptionPhoneNumber($phoneNumber, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a paginated list of subscription management configurations for your account.
     *
     * Each configuration represents a subscription management setup with phone numbers for receiving opt-out/opt-in requests and a callback URL for webhook events.
     *
     * @param string $cursor Pagination cursor from the previous response
     * @param int $limit Maximum number of configurations to return per page
     *
     * @throws APIException
     */
    public function listSubscriptionConfigs(
        ?string $cursor = null,
        int $limit = 50,
        ?RequestOptions $requestOptions = null,
    ): NotifyListSubscriptionConfigsResponse {
        $params = ['cursor' => $cursor, 'limit' => $limit];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listSubscriptionConfigs(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a paginated list of subscription events (status changes) for a specific phone number within a subscription configuration.
     *
     * Events are ordered by timestamp in descending order (most recent first).
     *
     * @param string $phoneNumber Path param: The phone number in E.164 format (e.g., +33612345678)
     * @param string $configID Path param: The subscription configuration ID
     * @param string $cursor Query param: Pagination cursor from the previous response
     * @param int $limit Query param: Maximum number of events to return per page
     *
     * @throws APIException
     */
    public function listSubscriptionPhoneNumberEvents(
        string $phoneNumber,
        string $configID,
        ?string $cursor = null,
        int $limit = 50,
        ?RequestOptions $requestOptions = null,
    ): NotifyListSubscriptionPhoneNumberEventsResponse {
        $params = ['configID' => $configID, 'cursor' => $cursor, 'limit' => $limit];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listSubscriptionPhoneNumberEvents($phoneNumber, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a paginated list of phone numbers and their subscription statuses for a specific subscription configuration.
     *
     * You can optionally filter by subscription state (SUB or UNSUB).
     *
     * @param string $configID The subscription configuration ID
     * @param string $cursor Pagination cursor from the previous response
     * @param int $limit Maximum number of phone numbers to return per page
     * @param 'SUB'|'UNSUB'|State $state Filter by subscription state
     *
     * @throws APIException
     */
    public function listSubscriptionPhoneNumbers(
        string $configID,
        ?string $cursor = null,
        int $limit = 50,
        string|State|null $state = null,
        ?RequestOptions $requestOptions = null,
    ): NotifyListSubscriptionPhoneNumbersResponse {
        $params = ['cursor' => $cursor, 'limit' => $limit, 'state' => $state];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listSubscriptionPhoneNumbers($configID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Send transactional and marketing messages to your users via SMS and WhatsApp with automatic compliance enforcement.
     *
     * @param string $templateID the template identifier configured by your Customer Success team
     * @param string $to The recipient's phone number in E.164 format.
     * @param string $callbackURL the URL where webhooks will be sent for message delivery events
     * @param string $correlationID A user-defined identifier to correlate this message with your internal systems. It is returned in the response and any webhook events that refer to this message.
     * @param string|\DateTimeInterface $expiresAt The message expiration date in RFC3339 format. The message will not be sent if this time is reached.
     * @param string $from The Sender ID. Must be approved for your account.
     * @param string $locale A BCP-47 formatted locale string with the language the text message will be sent to. If there's no locale set, the language will be determined by the country code of the phone number. If the language specified doesn't exist, the default set on the template will be used.
     * @param 'sms'|'whatsapp'|PreferredChannel $preferredChannel The preferred channel to be used in priority for message delivery. If the channel is unavailable, the system will fallback to other available channels.
     * @param string|\DateTimeInterface $scheduleAt Schedule the message for future delivery in RFC3339 format. Marketing messages can be scheduled up to 90 days in advance and will be automatically adjusted for compliance with local time window restrictions.
     * @param array<string,string> $variables the variables to be replaced in the template
     *
     * @throws APIException
     */
    public function send(
        string $templateID,
        string $to,
        ?string $callbackURL = null,
        ?string $correlationID = null,
        string|\DateTimeInterface|null $expiresAt = null,
        ?string $from = null,
        ?string $locale = null,
        string|PreferredChannel|null $preferredChannel = null,
        string|\DateTimeInterface|null $scheduleAt = null,
        ?array $variables = null,
        ?RequestOptions $requestOptions = null,
    ): NotifySendResponse {
        $params = [
            'templateID' => $templateID,
            'to' => $to,
            'callbackURL' => $callbackURL,
            'correlationID' => $correlationID,
            'expiresAt' => $expiresAt,
            'from' => $from,
            'locale' => $locale,
            'preferredChannel' => $preferredChannel,
            'scheduleAt' => $scheduleAt,
            'variables' => $variables,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->send(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Send the same message to multiple recipients in a single request.
     *
     * @param string $templateID the template identifier configured by your Customer Success team
     * @param list<string> $to The list of recipients' phone numbers in E.164 format.
     * @param string $callbackURL the URL where webhooks will be sent for delivery events
     * @param string $correlationID a user-defined identifier to correlate this request with your internal systems
     * @param string|\DateTimeInterface $expiresAt The message expiration date in RFC3339 format. Messages will not be sent after this time.
     * @param string $from The Sender ID. Must be approved for your account.
     * @param string $locale a BCP-47 formatted locale string
     * @param 'sms'|'whatsapp'|\Prelude\Notify\NotifySendBatchParams\PreferredChannel $preferredChannel Preferred channel for delivery. If unavailable, automatic fallback applies.
     * @param string|\DateTimeInterface $scheduleAt Schedule delivery in RFC3339 format. Marketing sends may be adjusted to comply with local time windows.
     * @param array<string,string> $variables the variables to be replaced in the template
     *
     * @throws APIException
     */
    public function sendBatch(
        string $templateID,
        array $to,
        ?string $callbackURL = null,
        ?string $correlationID = null,
        string|\DateTimeInterface|null $expiresAt = null,
        ?string $from = null,
        ?string $locale = null,
        string|\Prelude\Notify\NotifySendBatchParams\PreferredChannel|null $preferredChannel = null,
        string|\DateTimeInterface|null $scheduleAt = null,
        ?array $variables = null,
        ?RequestOptions $requestOptions = null,
    ): NotifySendBatchResponse {
        $params = [
            'templateID' => $templateID,
            'to' => $to,
            'callbackURL' => $callbackURL,
            'correlationID' => $correlationID,
            'expiresAt' => $expiresAt,
            'from' => $from,
            'locale' => $locale,
            'preferredChannel' => $preferredChannel,
            'scheduleAt' => $scheduleAt,
            'variables' => $variables,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->sendBatch(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
