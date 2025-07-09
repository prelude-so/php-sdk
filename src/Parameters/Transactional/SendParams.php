<?php

declare(strict_types=1);

namespace Prelude\Parameters\Transactional;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Concerns\Params;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\Serde\MapOf;
use Prelude\Core\Serde\UnionOf;

class SendParams implements BaseModel
{
    use Model;
    use Params;

    #[Api('template_id')]
    public string $templateID;

    #[Api]
    public string $to;

    #[Api('callback_url', optional: true)]
    public ?string $callbackURL;

    #[Api('correlation_id', optional: true)]
    public ?string $correlationID;

    #[Api('expires_at', optional: true)]
    public ?string $expiresAt;

    #[Api(optional: true)]
    public ?string $from;

    #[Api(optional: true)]
    public ?string $locale;

    /** @var null|array<string, string> $variables */
    #[Api(type: new UnionOf([new MapOf('string'), 'null']), optional: true)]
    public ?array $variables;
}

SendParams::_loadMetadata();
