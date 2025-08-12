<?php

declare(strict_types=1);

namespace Prelude\Responses\Transactional;

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

    public function __construct()
    {
        self::introspect();
        $this->unsetOptionalProperties();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string, string> $variables
     */
    public static function new(
        string $id,
        \DateTimeInterface $createdAt,
        \DateTimeInterface $expiresAt,
        string $templateID,
        string $to,
        array $variables,
        ?string $callbackURL = null,
        ?string $correlationID = null,
        ?string $from = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->createdAt = $createdAt;
        $obj->expiresAt = $expiresAt;
        $obj->templateID = $templateID;
        $obj->to = $to;
        $obj->variables = $variables;

        null !== $callbackURL && $obj->callbackURL = $callbackURL;
        null !== $correlationID && $obj->correlationID = $correlationID;
        null !== $from && $obj->from = $from;

        return $obj;
    }

    /**
     * The message identifier.
     */
    public function setID(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * The message creation date.
     */
    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * The message expiration date.
     */
    public function setExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $this->expiresAt = $expiresAt;

        return $this;
    }

    /**
     * The template identifier.
     */
    public function setTemplateID(string $templateID): self
    {
        $this->templateID = $templateID;

        return $this;
    }

    /**
     * The recipient's phone number.
     */
    public function setTo(string $to): self
    {
        $this->to = $to;

        return $this;
    }

    /**
     * The variables to be replaced in the template.
     *
     * @param array<string, string> $variables
     */
    public function setVariables(array $variables): self
    {
        $this->variables = $variables;

        return $this;
    }

    /**
     * The callback URL.
     */
    public function setCallbackURL(string $callbackURL): self
    {
        $this->callbackURL = $callbackURL;

        return $this;
    }

    /**
     * A user-defined identifier to correlate this transactional message with. It is returned in the response and any webhook events that refer to this transactional message.
     */
    public function setCorrelationID(string $correlationID): self
    {
        $this->correlationID = $correlationID;

        return $this;
    }

    /**
     * The Sender ID.
     */
    public function setFrom(string $from): self
    {
        $this->from = $from;

        return $this;
    }
}
