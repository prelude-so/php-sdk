<?php

declare(strict_types=1);

namespace Prelude\Services;

use Prelude\Client;
use Prelude\Core\Exceptions\APIException;
use Prelude\Core\Util;
use Prelude\Notify\NotifyGetSubscriptionConfigResponse;
use Prelude\Notify\NotifyGetSubscriptionPhoneNumberResponse;
use Prelude\Notify\NotifyListSubscriptionConfigsResponse;
use Prelude\Notify\NotifyListSubscriptionPhoneNumberEventsResponse;
use Prelude\Notify\NotifyListSubscriptionPhoneNumbersParams\State;
use Prelude\Notify\NotifyListSubscriptionPhoneNumbersResponse;
use Prelude\Notify\NotifySendBatchResponse;
use Prelude\Notify\NotifySendParams\Document;
use Prelude\Notify\NotifySendParams\PreferredChannel;
use Prelude\Notify\NotifySendResponse;
use Prelude\RequestOptions;
use Prelude\ServiceContracts\NotifyContract;

/**
 * @phpstan-import-type DocumentShape from \Prelude\Notify\NotifySendParams\Document
 * @phpstan-import-type DocumentShape from \Prelude\Notify\NotifySendBatchParams\Document as DocumentShape1
 * @phpstan-import-type RequestOpts from \Prelude\RequestOptions
 */
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getSubscriptionConfig(
        string $configID,
        RequestOptions|array|null $requestOptions = null
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getSubscriptionPhoneNumber(
        string $phoneNumber,
        string $configID,
        RequestOptions|array|null $requestOptions = null,
    ): NotifyGetSubscriptionPhoneNumberResponse {
        $params = Util::removeNulls(['configID' => $configID]);

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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listSubscriptionConfigs(
        ?string $cursor = null,
        int $limit = 50,
        RequestOptions|array|null $requestOptions = null,
    ): NotifyListSubscriptionConfigsResponse {
        $params = Util::removeNulls(['cursor' => $cursor, 'limit' => $limit]);

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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listSubscriptionPhoneNumberEvents(
        string $phoneNumber,
        string $configID,
        ?string $cursor = null,
        int $limit = 50,
        RequestOptions|array|null $requestOptions = null,
    ): NotifyListSubscriptionPhoneNumberEventsResponse {
        $params = Util::removeNulls(
            ['configID' => $configID, 'cursor' => $cursor, 'limit' => $limit]
        );

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
     * @param State|value-of<State> $state Filter by subscription state
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listSubscriptionPhoneNumbers(
        string $configID,
        ?string $cursor = null,
        int $limit = 50,
        State|string|null $state = null,
        RequestOptions|array|null $requestOptions = null,
    ): NotifyListSubscriptionPhoneNumbersResponse {
        $params = Util::removeNulls(
            ['cursor' => $cursor, 'limit' => $limit, 'state' => $state]
        );

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
     * @param Document|DocumentShape $document A document to attach to the message. Only supported on WhatsApp templates that have a document header.
     * @param \DateTimeInterface $expiresAt The message expiration date in RFC3339 format. The message will not be sent if this time is reached.
     * @param string $from The Sender ID. Must be approved for your account.
     * @param string $locale A BCP-47 formatted locale string with the language the text message will be sent to. If there's no locale set, the language will be determined by the country code of the phone number. If the language specified doesn't exist, the default set on the template will be used.
     * @param PreferredChannel|value-of<PreferredChannel> $preferredChannel The preferred channel to be used in priority for message delivery. If the channel is unavailable, the system will fallback to other available channels.
     * @param \DateTimeInterface $scheduleAt Schedule the message for future delivery in RFC3339 format. Marketing messages can be scheduled up to 90 days in advance and will be automatically adjusted for compliance with local time window restrictions.
     * @param array<string,string> $variables the variables to be replaced in the template
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function send(
        string $templateID,
        string $to,
        ?string $callbackURL = null,
        ?string $correlationID = null,
        Document|array|null $document = null,
        ?\DateTimeInterface $expiresAt = null,
        ?string $from = null,
        ?string $locale = null,
        PreferredChannel|string|null $preferredChannel = null,
        ?\DateTimeInterface $scheduleAt = null,
        ?array $variables = null,
        RequestOptions|array|null $requestOptions = null,
    ): NotifySendResponse {
        $params = Util::removeNulls(
            [
                'templateID' => $templateID,
                'to' => $to,
                'callbackURL' => $callbackURL,
                'correlationID' => $correlationID,
                'document' => $document,
                'expiresAt' => $expiresAt,
                'from' => $from,
                'locale' => $locale,
                'preferredChannel' => $preferredChannel,
                'scheduleAt' => $scheduleAt,
                'variables' => $variables,
            ],
        );

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
     * @param \Prelude\Notify\NotifySendBatchParams\Document|DocumentShape1 $document A document to attach to the message. Only supported on WhatsApp templates that have a document header.
     * @param \DateTimeInterface $expiresAt The message expiration date in RFC3339 format. Messages will not be sent after this time.
     * @param string $from The Sender ID. Must be approved for your account.
     * @param string $locale a BCP-47 formatted locale string
     * @param \Prelude\Notify\NotifySendBatchParams\PreferredChannel|value-of<\Prelude\Notify\NotifySendBatchParams\PreferredChannel> $preferredChannel Preferred channel for delivery. If unavailable, automatic fallback applies.
     * @param \DateTimeInterface $scheduleAt Schedule delivery in RFC3339 format. Marketing sends may be adjusted to comply with local time windows.
     * @param array<string,string> $variables the variables to be replaced in the template
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function sendBatch(
        string $templateID,
        array $to,
        ?string $callbackURL = null,
        ?string $correlationID = null,
        \Prelude\Notify\NotifySendBatchParams\Document|array|null $document = null,
        ?\DateTimeInterface $expiresAt = null,
        ?string $from = null,
        ?string $locale = null,
        \Prelude\Notify\NotifySendBatchParams\PreferredChannel|string|null $preferredChannel = null,
        ?\DateTimeInterface $scheduleAt = null,
        ?array $variables = null,
        RequestOptions|array|null $requestOptions = null,
    ): NotifySendBatchResponse {
        $params = Util::removeNulls(
            [
                'templateID' => $templateID,
                'to' => $to,
                'callbackURL' => $callbackURL,
                'correlationID' => $correlationID,
                'document' => $document,
                'expiresAt' => $expiresAt,
                'from' => $from,
                'locale' => $locale,
                'preferredChannel' => $preferredChannel,
                'scheduleAt' => $scheduleAt,
                'variables' => $variables,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->sendBatch(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
