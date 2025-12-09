<?php

declare(strict_types=1);

namespace Prelude\Services;

use Prelude\Client;
use Prelude\Core\Contracts\BaseResponse;
use Prelude\Core\Exceptions\APIException;
use Prelude\RequestOptions;
use Prelude\ServiceContracts\VerificationRawContract;
use Prelude\Verification\VerificationCheckParams;
use Prelude\Verification\VerificationCheckResponse;
use Prelude\Verification\VerificationCreateParams;
use Prelude\Verification\VerificationCreateParams\Options\AppRealm\Platform;
use Prelude\Verification\VerificationCreateParams\Options\Integration;
use Prelude\Verification\VerificationCreateParams\Options\Method;
use Prelude\Verification\VerificationCreateParams\Options\PreferredChannel;
use Prelude\Verification\VerificationCreateParams\Signals\DevicePlatform;
use Prelude\Verification\VerificationCreateParams\Target\Type;
use Prelude\Verification\VerificationNewResponse;

final class VerificationRawService implements VerificationRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new verification for a specific phone number. If another non-expired verification exists (the request is performed within the verification window), this endpoint will perform a retry instead.
     *
     * @param array{
     *   target: array{type: 'phone_number'|'email_address'|Type, value: string},
     *   dispatchID?: string,
     *   metadata?: array{correlationID?: string},
     *   options?: array{
     *     appRealm?: array{platform: 'android'|Platform, value: string},
     *     callbackURL?: string,
     *     codeSize?: int,
     *     customCode?: string,
     *     integration?: 'auth0'|'supabase'|Integration,
     *     locale?: string,
     *     method?: 'auto'|'voice'|'message'|Method,
     *     preferredChannel?: 'sms'|'rcs'|'whatsapp'|'viber'|'zalo'|'telegram'|PreferredChannel,
     *     senderID?: string,
     *     templateID?: string,
     *     variables?: array<string,string>,
     *   },
     *   signals?: array{
     *     appVersion?: string,
     *     deviceID?: string,
     *     deviceModel?: string,
     *     devicePlatform?: 'android'|'ios'|'ipados'|'tvos'|'web'|DevicePlatform,
     *     ip?: string,
     *     isTrustedUser?: bool,
     *     ja4Fingerprint?: string,
     *     osVersion?: string,
     *     userAgent?: string,
     *   },
     * }|VerificationCreateParams $params
     *
     * @return BaseResponse<VerificationNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|VerificationCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VerificationCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'v2/verification',
            body: (object) $parsed,
            options: $options,
            convert: VerificationNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Check the validity of a verification code.
     *
     * @param array{
     *   code: string,
     *   target: array{
     *     type: 'phone_number'|'email_address'|VerificationCheckParams\Target\Type,
     *     value: string,
     *   },
     * }|VerificationCheckParams $params
     *
     * @return BaseResponse<VerificationCheckResponse>
     *
     * @throws APIException
     */
    public function check(
        array|VerificationCheckParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VerificationCheckParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'v2/verification/check',
            body: (object) $parsed,
            options: $options,
            convert: VerificationCheckResponse::class,
        );
    }
}
