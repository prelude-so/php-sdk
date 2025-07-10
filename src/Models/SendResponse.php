<?php

declare(strict_types=1);

namespace Prelude\Models;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\None;
use Prelude\Core\Serde\MapOf;

class SendResponse implements BaseModel
{
    use Model;

    #[Api]
    public string $id;

    #[Api('created_at')]
    public \DateTimeInterface $createdAt;

    #[Api('expires_at')]
    public \DateTimeInterface $expiresAt;

    #[Api('template_id')]
    public string $templateID;

    #[Api]
    public string $to;

    /** @var array<string, string> $variables */
    #[Api(type: new MapOf('string'))]
    public array $variables;

    #[Api('callback_url', optional: true)]
    public ?string $callbackURL;

    #[Api('correlation_id', optional: true)]
    public ?string $correlationID;

    #[Api(optional: true)]
    public ?string $from;

    /**
     * You must use named parameters to construct this object. If an named argument is not
     * given, it will not be included during JSON serialization. The arguments are untyped
     * so you can pass any JSON serializable value, but the API expects the types to match
     * the PHPDoc types.
     *
     * @param string                $id            `required`
     * @param \DateTimeInterface    $createdAt     `required`
     * @param \DateTimeInterface    $expiresAt     `required`
     * @param string                $templateID    `required`
     * @param string                $to            `required`
     * @param array<string, string> $variables     `required`
     * @param null|string           $callbackURL
     * @param null|string           $correlationID
     * @param null|string           $from
     */
    final public function __construct(
        $id,
        $createdAt,
        $expiresAt,
        $templateID,
        $to,
        $variables,
        $callbackURL = None::NOT_GIVEN,
        $correlationID = None::NOT_GIVEN,
        $from = None::NOT_GIVEN,
    ) {
        $this->constructFromArgs(func_get_args());
    }
}

SendResponse::_loadMetadata();
