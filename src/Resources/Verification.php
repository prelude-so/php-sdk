<?php

declare(strict_types=1);

namespace Prelude\Resources;

use Prelude\Client;
use Prelude\Contracts\VerificationContract;
use Prelude\Core\Serde;
use Prelude\Models\CheckResponse;
use Prelude\Models\NewResponse;
use Prelude\Parameters\Verification\CheckParams;
use Prelude\Parameters\Verification\CreateParams;
use Prelude\RequestOptions;

class Verification implements VerificationContract
{
    public function __construct(protected Client $client) {}

    /**
     * @param array{
     *   target?: array{type?: string, value?: string},
     *   dispatchID?: string,
     *   metadata?: array{correlationID?: string},
     *   options?: array{
     *     appRealm?: array{platform?: string, value?: string},
     *     callbackURL?: string,
     *     codeSize?: int,
     *     customCode?: string,
     *     locale?: string,
     *     method?: string,
     *     preferredChannel?: string,
     *     senderID?: string,
     *     templateID?: string,
     *     variables?: array<string, string>,
     *   },
     *   signals?: array{
     *     appVersion?: string,
     *     deviceID?: string,
     *     deviceModel?: string,
     *     devicePlatform?: string,
     *     ip?: string,
     *     isTrustedUser?: bool,
     *     osVersion?: string,
     *     userAgent?: string,
     *   },
     * } $params
     */
    public function create(
        array $params,
        ?RequestOptions $requestOptions = null
    ): NewResponse {
        [$parsed, $options] = CreateParams::parseRequest($params, $requestOptions);
        $resp = $this->client->request(
            method: 'post',
            path: 'v2/verification',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Serde::coerce(NewResponse::class, value: $resp);
    }

    /**
     * @param array{
     *   code?: string, target?: array{type?: string, value?: string}
     * } $params
     */
    public function check(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CheckResponse {
        [$parsed, $options] = CheckParams::parseRequest($params, $requestOptions);
        $resp = $this->client->request(
            method: 'post',
            path: 'v2/verification/check',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Serde::coerce(CheckResponse::class, value: $resp);
    }
}
