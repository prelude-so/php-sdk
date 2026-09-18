<?php

declare(strict_types=1);

namespace Prelude\Notify;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;

/**
 * @phpstan-type NotifyReplyResponseShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   replyTo: string,
 *   text: string,
 *   to: string,
 *   callbackURL?: string|null,
 *   correlationID?: string|null,
 * }
 */
final class NotifyReplyResponse implements BaseModel
{
    /** @use SdkModel<NotifyReplyResponseShape> */
    use SdkModel;

    /**
     * The reply message identifier.
     */
    #[Required]
    public string $id;

    /**
     * The reply creation date in RFC3339 format.
     */
    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    /**
     * The inbound message ID this reply was sent in response to.
     */
    #[Required('reply_to')]
    public string $replyTo;

    /**
     * The reply message body that was sent.
     */
    #[Required]
    public string $text;

    /**
     * The recipient's phone number in E.164 format.
     */
    #[Required]
    public string $to;

    /**
     * The callback URL where webhooks will be sent.
     */
    #[Optional('callback_url')]
    public ?string $callbackURL;

    /**
     * The user-defined correlation identifier echoed back from the request.
     */
    #[Optional('correlation_id')]
    public ?string $correlationID;

    /**
     * `new NotifyReplyResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NotifyReplyResponse::with(
     *   id: ..., createdAt: ..., replyTo: ..., text: ..., to: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NotifyReplyResponse)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withReplyTo(...)
     *   ->withText(...)
     *   ->withTo(...)
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
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        string $replyTo,
        string $text,
        string $to,
        ?string $callbackURL = null,
        ?string $correlationID = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['replyTo'] = $replyTo;
        $self['text'] = $text;
        $self['to'] = $to;

        null !== $callbackURL && $self['callbackURL'] = $callbackURL;
        null !== $correlationID && $self['correlationID'] = $correlationID;

        return $self;
    }

    /**
     * The reply message identifier.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The reply creation date in RFC3339 format.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The inbound message ID this reply was sent in response to.
     */
    public function withReplyTo(string $replyTo): self
    {
        $self = clone $this;
        $self['replyTo'] = $replyTo;

        return $self;
    }

    /**
     * The reply message body that was sent.
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }

    /**
     * The recipient's phone number in E.164 format.
     */
    public function withTo(string $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }

    /**
     * The callback URL where webhooks will be sent.
     */
    public function withCallbackURL(string $callbackURL): self
    {
        $self = clone $this;
        $self['callbackURL'] = $callbackURL;

        return $self;
    }

    /**
     * The user-defined correlation identifier echoed back from the request.
     */
    public function withCorrelationID(string $correlationID): self
    {
        $self = clone $this;
        $self['correlationID'] = $correlationID;

        return $self;
    }
}
