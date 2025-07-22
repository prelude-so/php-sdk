<?php

declare(strict_types=1);

namespace Prelude\Responses;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\Conversion\MapOf;

/**
 * @phpstan-type transactional_send_response_alias = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   expiresAt: \DateTimeInterface,
 *   templateID: string,
 *   to: string,
 *   variables: array<string, string>,
 *   callbackURL?: string,
 *   correlationID?: string,
 *   from?: string,
 * }
 */
final class TransactionalSendResponse implements BaseModel
{
    use Model;

    /**
     * The message identifier.
     */
    #[Api]
    public string $id;

    /**
     * The message creation date.
     */
    #[Api('created_at')]
    public \DateTimeInterface $createdAt;

    /**
     * The message expiration date.
     */
    #[Api('expires_at')]
    public \DateTimeInterface $expiresAt;

    /**
     * The template identifier.
     */
    #[Api('template_id')]
    public string $templateID;

    /**
     * The recipient's phone number.
     */
    #[Api]
    public string $to;

    /**
     * The variables to be replaced in the template.
     *
     * @var array<string, string> $variables
     */
    #[Api(type: new MapOf('string'))]
    public array $variables;

    /**
     * The callback URL.
     */
    #[Api('callback_url', optional: true)]
    public ?string $callbackURL;

    /**
     * A user-defined identifier to correlate this transactional message with. It is returned in the response and any webhook events that refer to this transactional message.
     */
    #[Api('correlation_id', optional: true)]
    public ?string $correlationID;

    /**
     * The Sender ID.
     */
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
        self::introspect();
        $this->unsetOptionalProperties();

        $this->id = $id;
        $this->createdAt = $createdAt;
        $this->expiresAt = $expiresAt;
        $this->templateID = $templateID;
        $this->to = $to;
        $this->variables = $variables;

        null !== $callbackURL && $this->callbackURL = $callbackURL;
        null !== $correlationID && $this->correlationID = $correlationID;
        null !== $from && $this->from = $from;
    }
}
