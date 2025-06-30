<?php

declare(strict_types=1);

namespace Prelude\Parameters\Watch;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Concerns\Params;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\Serde\ListOf;

class SendFeedbacksParams implements BaseModel
{
    use Model;
    use Params;

    /**
     * @var list<array{
     *
     *     target?: array{type?: string, value?: string},
     *     type?: string,
     *     dispatchID?: string,
     *     metadata?: array{correlationID?: string},
     *     signals?: array{
     *
     *         appVersion?: string,
     *         deviceID?: string,
     *         deviceModel?: string,
     *         devicePlatform?: string,
     *         ip?: string,
     *         isTrustedUser?: bool,
     *         osVersion?: string,
     *         userAgent?: string,
     *
     * },
     *
     * }> $feedbacks
     */
    #[Api(type: new ListOf(new ListOf('mixed')))]
    public array $feedbacks;
}

SendFeedbacksParams::_loadMetadata();
