<?php

declare(strict_types=1);

namespace Prelude\Parameters;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Concerns\Params;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\Serde\MapOf;

final class TransactionalSendParam implements BaseModel
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
     * You must use named parameters to construct this object.
     *
     * @param null|array<string, string> $variables
     */
    final public function __construct(
        string $templateID,
        string $to,
        ?string $callbackURL = null,
        ?string $correlationID = null,
        ?string $expiresAt = null,
        ?string $from = null,
        ?string $locale = null,
        ?array $variables = null,
    ) {
        self::introspect();
        $this->unsetOptionalProperties();

        $this->templateID = $templateID;
        $this->to = $to;

        null !== $callbackURL && $this->callbackURL = $callbackURL;
        null !== $correlationID && $this->correlationID = $correlationID;
        null !== $expiresAt && $this->expiresAt = $expiresAt;
        null !== $from && $this->from = $from;
        null !== $locale && $this->locale = $locale;
        null !== $variables && $this->variables = $variables;
    }
}
