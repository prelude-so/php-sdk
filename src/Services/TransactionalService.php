<?php

declare(strict_types=1);

namespace Prelude\Services;

use Prelude\Client;
use Prelude\Core\Exceptions\APIException;
use Prelude\Core\Util;
use Prelude\RequestOptions;
use Prelude\ServiceContracts\TransactionalContract;
use Prelude\Transactional\TransactionalSendParams\Document;
use Prelude\Transactional\TransactionalSendParams\PreferredChannel;
use Prelude\Transactional\TransactionalSendResponse;

/**
 * @phpstan-import-type DocumentShape from \Prelude\Transactional\TransactionalSendParams\Document
 * @phpstan-import-type RequestOpts from \Prelude\RequestOptions
 */
final class TransactionalService implements TransactionalContract
{
    /**
     * @api
     */
    public TransactionalRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TransactionalRawService($client);
    }

    /**
     * @deprecated
     *
     * @api
     *
     * Legacy route maintained for backward compatibility. Migrate to `/v2/notify` instead.
     *
     * @param string $templateID the template identifier
     * @param string $to the recipient's phone number
     * @param string $callbackURL the callback URL
     * @param string $correlationID A user-defined identifier to correlate this transactional message with. It is returned in the response and any webhook events that refer to this transactionalmessage.
     * @param Document|DocumentShape $document A document to attach to the message. Only supported on WhatsApp templates that have a document header.
     * @param string $expiresAt the message expiration date
     * @param string $from the Sender ID
     * @param string $locale A BCP-47 formatted locale string with the language the text message will be sent to. If there's no locale set, the language will be determined by the country code of the phone number. If the language specified doesn't exist, the default set on the template will be used.
     * @param PreferredChannel|value-of<PreferredChannel> $preferredChannel The preferred delivery channel for the message. When specified, the system will prioritize sending via the requested channel if the template is configured for it.
     *
     * If not specified and the template is configured for WhatsApp, the message will be sent via WhatsApp first, with automatic fallback to SMS if WhatsApp delivery is unavailable.
     *
     * Supported channels: `sms`, `rcs`, `whatsapp`.
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
        ?string $expiresAt = null,
        ?string $from = null,
        ?string $locale = null,
        PreferredChannel|string|null $preferredChannel = null,
        ?array $variables = null,
        RequestOptions|array|null $requestOptions = null,
    ): TransactionalSendResponse {
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
                'variables' => $variables,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->send(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
