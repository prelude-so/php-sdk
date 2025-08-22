<?php

declare(strict_types=1);

namespace Prelude\Responses\Transactional;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\Conversion\MapOf;

final class TransactionalSendResponse implements BaseModel
{
    use SdkModel;

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
     * `new TransactionalSendResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TransactionalSendResponse::with(
     *   id: ...,
     *   createdAt: ...,
     *   expiresAt: ...,
     *   templateID: ...,
     *   to: ...,
     *   variables: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TransactionalSendResponse)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withExpiresAt(...)
     *   ->withTemplateID(...)
     *   ->withTo(...)
     *   ->withVariables(...)
     * ```
     */
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
    public static function with(
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
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The message creation date.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * The message expiration date.
     */
    public function withExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $obj = clone $this;
        $obj->expiresAt = $expiresAt;

        return $obj;
    }

    /**
     * The template identifier.
     */
    public function withTemplateID(string $templateID): self
    {
        $obj = clone $this;
        $obj->templateID = $templateID;

        return $obj;
    }

    /**
     * The recipient's phone number.
     */
    public function withTo(string $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

        return $obj;
    }

    /**
     * The variables to be replaced in the template.
     *
     * @param array<string, string> $variables
     */
    public function withVariables(array $variables): self
    {
        $obj = clone $this;
        $obj->variables = $variables;

        return $obj;
    }

    /**
     * The callback URL.
     */
    public function withCallbackURL(string $callbackURL): self
    {
        $obj = clone $this;
        $obj->callbackURL = $callbackURL;

        return $obj;
    }

    /**
     * A user-defined identifier to correlate this transactional message with. It is returned in the response and any webhook events that refer to this transactional message.
     */
    public function withCorrelationID(string $correlationID): self
    {
        $obj = clone $this;
        $obj->correlationID = $correlationID;

        return $obj;
    }

    /**
     * The Sender ID.
     */
    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj->from = $from;

        return $obj;
    }
}
