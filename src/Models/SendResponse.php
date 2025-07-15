<?php

declare(strict_types=1);

namespace Prelude\Models;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\Serde\MapOf;

final class SendResponse implements BaseModel
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
     * You must use named parameters to construct this object.
     *
     * @param array<string, string> $variables
     */
    final public function __construct(
        string $id,
        \DateTimeInterface $createdAt,
        \DateTimeInterface $expiresAt,
        string $templateID,
        string $to,
        array $variables,
        ?string $callbackURL = null,
        ?string $correlationID = null,
        ?string $from = null,
    ) {
        $this->id = $id;
        $this->createdAt = $createdAt;
        $this->expiresAt = $expiresAt;
        $this->templateID = $templateID;
        $this->to = $to;
        $this->variables = $variables;
        $this->callbackURL = $callbackURL;
        $this->correlationID = $correlationID;
        $this->from = $from;
    }
}

SendResponse::_loadMetadata();
