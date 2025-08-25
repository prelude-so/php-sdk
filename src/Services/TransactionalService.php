<?php

declare(strict_types=1);

namespace Prelude\Services;

use Prelude\Client;
use Prelude\Contracts\TransactionalContract;
use Prelude\Core\Conversion;
use Prelude\RequestOptions;
use Prelude\Responses\Transactional\TransactionalSendResponse;
use Prelude\Transactional\TransactionalSendParams;

use const Prelude\Core\OMIT as omit;

final class TransactionalService implements TransactionalContract
{
    public function __construct(private Client $client) {}

    /**
     * Send a transactional message to your user.
     *
     * @param string $templateID the template identifier
     * @param string $to the recipient's phone number
     * @param string $callbackURL the callback URL
     * @param string $correlationID A user-defined identifier to correlate this transactional message with. It is returned in the response and any webhook events that refer to this transactionalmessage.
     * @param string $expiresAt the message expiration date
     * @param string $from the Sender ID
     * @param string $locale A BCP-47 formatted locale string with the language the text message will be sent to. If there's no locale set, the language will be determined by the country code of the phone number. If the language specified doesn't exist, the default set on the template will be used.
     * @param array<string,
     * string,> $variables The variables to be replaced in the template
     */
    public function send(
        $templateID,
        $to,
        $callbackURL = omit,
        $correlationID = omit,
        $expiresAt = omit,
        $from = omit,
        $locale = omit,
        $variables = omit,
        ?RequestOptions $requestOptions = null,
    ): TransactionalSendResponse {
        [$parsed, $options] = TransactionalSendParams::parseRequest(
            [
                'templateID' => $templateID,
                'to' => $to,
                'callbackURL' => $callbackURL,
                'correlationID' => $correlationID,
                'expiresAt' => $expiresAt,
                'from' => $from,
                'locale' => $locale,
                'variables' => $variables,
            ],
            $requestOptions,
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'v2/transactional',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(TransactionalSendResponse::class, value: $resp);
    }
}
