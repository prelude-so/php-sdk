<?php

declare(strict_types=1);

namespace Prelude\Parameters\Verification;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Concerns\Params;
use Prelude\Core\Contracts\BaseModel;

class CreateParams implements BaseModel
{
    use Model;
    use Params;

    /**
     * @var array{type?: string, value?: string} $target
     */
    #[Api]
    public array $target;

    #[Api('dispatch_id', optional: true)]
    public string $dispatchID;

    /**
     * @var array{correlationID?: string} $metadata
     */
    #[Api(optional: true)]
    public array $metadata;

    /**
     * @var array{
     *
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
     *
     * } $options
     */
    #[Api(optional: true)]
    public array $options;

    /**
     * @var array{
     *
     *     appVersion?: string,
     *     deviceID?: string,
     *     deviceModel?: string,
     *     devicePlatform?: string,
     *     ip?: string,
     *     isTrustedUser?: bool,
     *     osVersion?: string,
     *     userAgent?: string,
     *
     * } $signals
     */
    #[Api(optional: true)]
    public array $signals;
}

CreateParams::_loadMetadata();
