<?php

declare(strict_types=1);

namespace Prelude\Parameters\Transactional;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Concerns\Params;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\None;
use Prelude\Core\Serde\MapOf;

final class SendParams implements BaseModel
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
    #[Api(type: new MapOf('string'), optional: true)]
    public ?array $variables;

    /**
     * You must use named parameters to construct this object. If an named argument is not
     * given, it will not be included during JSON serialization. The arguments are untyped
     * so you can pass any JSON serializable value, but the API expects the types to match
     * the PHPDoc types.
     *
     * @param string                     $templateID    `required`
     * @param string                     $to            `required`
     * @param null|string                $callbackURL
     * @param null|string                $correlationID
     * @param null|string                $expiresAt
     * @param null|string                $from
     * @param null|string                $locale
     * @param null|array<string, string> $variables
     */
    final public function __construct(
        $templateID,
        $to,
        $callbackURL = None::NOT_GIVEN,
        $correlationID = None::NOT_GIVEN,
        $expiresAt = None::NOT_GIVEN,
        $from = None::NOT_GIVEN,
        $locale = None::NOT_GIVEN,
        $variables = None::NOT_GIVEN,
    ) {
        $this->constructFromArgs(func_get_args());
    }
}

SendParams::_loadMetadata();
