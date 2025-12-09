<?php

declare(strict_types=1);

namespace Prelude\Transactional;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;

/**
 * @phpstan-type TransactionalSendResponseShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   expiresAt: \DateTimeInterface,
 *   templateID: string,
 *   to: string,
 *   variables: array<string,string>,
 *   callbackURL?: string|null,
 *   correlationID?: string|null,
 *   from?: string|null,
 * }
 */
final class TransactionalSendResponse implements BaseModel
{
    /** @use SdkModel<TransactionalSendResponseShape> */
    use SdkModel;

    /**
     * The message identifier.
     */
    #[Required]
    public string $id;

    /**
     * The message creation date.
     */
    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    /**
     * The message expiration date.
     */
    #[Required('expires_at')]
    public \DateTimeInterface $expiresAt;

    /**
     * The template identifier.
     */
    #[Required('template_id')]
    public string $templateID;

    /**
     * The recipient's phone number.
     */
    #[Required]
    public string $to;

    /**
     * The variables to be replaced in the template.
     *
     * @var array<string,string> $variables
     */
    #[Required(map: 'string')]
    public array $variables;

    /**
     * The callback URL.
     */
    #[Optional('callback_url')]
    public ?string $callbackURL;

    /**
     * A user-defined identifier to correlate this transactional message with. It is returned in the response and any webhook events that refer to this transactional message.
     */
    #[Optional('correlation_id')]
    public ?string $correlationID;

    /**
     * The Sender ID.
     */
    #[Optional]
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
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,string> $variables
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
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['expiresAt'] = $expiresAt;
        $self['templateID'] = $templateID;
        $self['to'] = $to;
        $self['variables'] = $variables;

        null !== $callbackURL && $self['callbackURL'] = $callbackURL;
        null !== $correlationID && $self['correlationID'] = $correlationID;
        null !== $from && $self['from'] = $from;

        return $self;
    }

    /**
     * The message identifier.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The message creation date.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The message expiration date.
     */
    public function withExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $self = clone $this;
        $self['expiresAt'] = $expiresAt;

        return $self;
    }

    /**
     * The template identifier.
     */
    public function withTemplateID(string $templateID): self
    {
        $self = clone $this;
        $self['templateID'] = $templateID;

        return $self;
    }

    /**
     * The recipient's phone number.
     */
    public function withTo(string $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }

    /**
     * The variables to be replaced in the template.
     *
     * @param array<string,string> $variables
     */
    public function withVariables(array $variables): self
    {
        $self = clone $this;
        $self['variables'] = $variables;

        return $self;
    }

    /**
     * The callback URL.
     */
    public function withCallbackURL(string $callbackURL): self
    {
        $self = clone $this;
        $self['callbackURL'] = $callbackURL;

        return $self;
    }

    /**
     * A user-defined identifier to correlate this transactional message with. It is returned in the response and any webhook events that refer to this transactional message.
     */
    public function withCorrelationID(string $correlationID): self
    {
        $self = clone $this;
        $self['correlationID'] = $correlationID;

        return $self;
    }

    /**
     * The Sender ID.
     */
    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }
}
