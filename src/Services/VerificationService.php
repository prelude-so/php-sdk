<?php

declare(strict_types=1);

namespace Prelude\Services;

use Prelude\Client;
use Prelude\Core\Exceptions\APIException;
use Prelude\Core\Util;
use Prelude\RequestOptions;
use Prelude\ServiceContracts\VerificationContract;
use Prelude\Verification\VerificationCheckResponse;
use Prelude\Verification\VerificationCreateParams\Options\AppRealm\Platform;
use Prelude\Verification\VerificationCreateParams\Options\Integration;
use Prelude\Verification\VerificationCreateParams\Options\Method;
use Prelude\Verification\VerificationCreateParams\Options\PreferredChannel;
use Prelude\Verification\VerificationCreateParams\Signals\DevicePlatform;
use Prelude\Verification\VerificationCreateParams\Target\Type;
use Prelude\Verification\VerificationNewResponse;

final class VerificationService implements VerificationContract
{
    /**
     * @api
     */
    public VerificationRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new VerificationRawService($client);
    }

    /**
     * @api
     *
     * Create a new verification for a specific phone number. If another non-expired verification exists (the request is performed within the verification window), this endpoint will perform a retry instead.
     *
     * @param array{
     *   type: 'phone_number'|'email_address'|Type, value: string
     * } $target The verification target. Either a phone number or an email address. To use the email verification feature contact us to discuss your use case.
     * @param string $dispatchID the identifier of the dispatch that came from the front-end SDK
     * @param array{
     *   correlationID?: string
     * } $metadata The metadata for this verification. This object will be returned with every response or webhook sent that refers to this verification.
     * @param array{
     *   appRealm?: array{platform: 'android'|Platform, value: string},
     *   callbackURL?: string,
     *   codeSize?: int,
     *   customCode?: string,
     *   integration?: 'auth0'|'supabase'|Integration,
     *   locale?: string,
     *   method?: 'auto'|'voice'|'message'|Method,
     *   preferredChannel?: 'sms'|'rcs'|'whatsapp'|'viber'|'zalo'|'telegram'|PreferredChannel,
     *   senderID?: string,
     *   templateID?: string,
     *   variables?: array<string,string>,
     * } $options Verification options
     * @param array{
     *   appVersion?: string,
     *   deviceID?: string,
     *   deviceModel?: string,
     *   devicePlatform?: 'android'|'ios'|'ipados'|'tvos'|'web'|DevicePlatform,
     *   ip?: string,
     *   isTrustedUser?: bool,
     *   ja4Fingerprint?: string,
     *   osVersion?: string,
     *   userAgent?: string,
     * } $signals The signals used for anti-fraud. For more details, refer to [Signals](/verify/v2/documentation/prevent-fraud#signals).
     *
     * @throws APIException
     */
    public function create(
        array $target,
        ?string $dispatchID = null,
        ?array $metadata = null,
        ?array $options = null,
        ?array $signals = null,
        ?RequestOptions $requestOptions = null,
    ): VerificationNewResponse {
        $params = Util::removeNulls(
            [
                'target' => $target,
                'dispatchID' => $dispatchID,
                'metadata' => $metadata,
                'options' => $options,
                'signals' => $signals,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Check the validity of a verification code.
     *
     * @param string $code the OTP code to validate
     * @param array{
     *   type: 'phone_number'|'email_address'|\Prelude\Verification\VerificationCheckParams\Target\Type,
     *   value: string,
     * } $target The verification target. Either a phone number or an email address. To use the email verification feature contact us to discuss your use case.
     *
     * @throws APIException
     */
    public function check(
        string $code,
        array $target,
        ?RequestOptions $requestOptions = null
    ): VerificationCheckResponse {
        $params = Util::removeNulls(['code' => $code, 'target' => $target]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->check(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
