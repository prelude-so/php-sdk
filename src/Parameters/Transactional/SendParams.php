<?php

declare(strict_types=1);

namespace Prelude\Parameters\Transactional;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Concerns\Params;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\Serde\MapOf;

class SendParams implements BaseModel
{
    use Model;
    use Params;

    #[Api('template_id')]
    public string $templateID;

    #[Api]
    public string $to;

    #[Api('callback_url', optional: true)]
    public string $callbackURL;

    #[Api('correlation_id', optional: true)]
    public string $correlationID;

    #[Api('expires_at', optional: true)]
    public string $expiresAt;

    #[Api(optional: true)]
    public string $from;

    #[Api(optional: true)]
    public string $locale;

    /**
     * @var array<string, string> $variables
     */
    #[Api(type: new MapOf('string'), optional: true)]
    public array $variables;
}

SendParams::_loadMetadata();
