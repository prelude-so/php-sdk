<?php

declare(strict_types=1);

namespace Prelude\Parameters\Watch;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Concerns\Params;
use Prelude\Core\Contracts\BaseModel;

class PredictParams implements BaseModel
{
    use Model;
    use Params;

    /** @var array{type?: string, value?: string} $target */
    #[Api]
    public array $target;

    #[Api('dispatch_id', optional: true)]
    public ?string $dispatchID;

    /** @var null|array{correlationID?: string} $metadata */
    #[Api(optional: true)]
    public ?array $metadata;

    /**
     * @var array{
     *   appVersion?: string,
     *   deviceID?: string,
     *   deviceModel?: string,
     *   devicePlatform?: string,
     *   ip?: string,
     *   isTrustedUser?: bool,
     *   osVersion?: string,
     *   userAgent?: string,
     * }|null $signals
     */
    #[Api(optional: true)]
    public ?array $signals;
}

PredictParams::_loadMetadata();
