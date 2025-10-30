<?php

declare(strict_types=1);

namespace Prelude\Services;

use Prelude\Client;
use Prelude\Core\Exceptions\APIException;
use Prelude\RequestOptions;
use Prelude\ServiceContracts\TransactionalContract;
use Prelude\Transactional\TransactionalSendParams;
use Prelude\Transactional\TransactionalSendParams\PreferredChannel;
use Prelude\Transactional\TransactionalSendResponse;

use const Prelude\Core\OMIT as omit;

final class TransactionalService implements TransactionalContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Send a transactional message to your user.
     *
     * @param string $templateID the template identifier
     * @param string $to the recipient's phone number
     * @param string $callbackURL the callback URL
     * @param string $correlationID A user-defined identifier to correlate this transactional message with. It is returned in the response and any webhook events that refer to this transactionalmessage.
     * @param string $expiresAt the message expiration date
     * @param string $from the Sender ID
     * @param string $locale A BCP-47 formatted locale string with the language the text message will be sent to. If there's no locale set, the language will be determined by the country code of the phone number. If the language specified doesn't exist, the default set on the template will be used.
     * @param PreferredChannel|value-of<PreferredChannel> $preferredChannel The preferred delivery channel for the message. When specified, the system will prioritize sending via the requested channel if the template is configured for it.
     *
     * If not specified and the template is configured for WhatsApp, the message will be sent via WhatsApp first, with automatic fallback to SMS if WhatsApp delivery is unavailable.
     *
     * Supported channels: `sms`, `rcs`, `whatsapp`.
     * @param array<string,
     * string,> $variables The variables to be replaced in the template
     *
     * @throws APIException
     */
    public function send(
        $templateID,
        $to,
        $callbackURL = omit,
        $correlationID = omit,
        $expiresAt = omit,
        $from = omit,
        $locale = omit,
        $preferredChannel = omit,
        $variables = omit,
        ?RequestOptions $requestOptions = null,
    ): TransactionalSendResponse {
        $params = [
            'templateID' => $templateID,
            'to' => $to,
            'callbackURL' => $callbackURL,
            'correlationID' => $correlationID,
            'expiresAt' => $expiresAt,
            'from' => $from,
            'locale' => $locale,
            'preferredChannel' => $preferredChannel,
            'variables' => $variables,
        ];

        return $this->sendRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function sendRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): TransactionalSendResponse {
        [$parsed, $options] = TransactionalSendParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'v2/transactional',
            body: (object) $parsed,
            options: $options,
            convert: TransactionalSendResponse::class,
        );
    }
}
