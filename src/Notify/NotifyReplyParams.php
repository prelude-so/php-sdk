<?php

declare(strict_types=1);

namespace Prelude\Notify;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Concerns\SdkParams;
use Prelude\Core\Contracts\BaseModel;

/**
 * Send a free-form text reply to an inbound WhatsApp message within the 24-hour conversation window. See [WhatsApp 2-Way Messaging](/notify/v2/documentation/whatsapp) for details.
 *
 * @see Prelude\Services\NotifyService::reply()
 *
 * @phpstan-type NotifyReplyParamsShape = array{
 *   replyTo: string,
 *   text: string,
 *   to: string,
 *   callbackURL?: string|null,
 *   correlationID?: string|null,
 * }
 */
final class NotifyReplyParams implements BaseModel
{
    /** @use SdkModel<NotifyReplyParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The inbound message ID (prefixed with `im_`) to reply to. This ID is provided in the `inbound.message.received` webhook event.
     */
    #[Required('reply_to')]
    public string $replyTo;

    /**
     * The reply message body sent as a free-form WhatsApp text.
     */
    #[Required]
    public string $text;

    /**
     * The recipient's phone number in E.164 format. Must match the phone number that sent the original inbound message.
     */
    #[Required]
    public string $to;

    /**
     * The URL where webhooks will be sent for delivery events of this reply.
     */
    #[Optional('callback_url')]
    public ?string $callbackURL;

    /**
     * A user-defined identifier to correlate this reply with your internal systems. It is returned in the response and any webhook events that refer to this message.
     */
    #[Optional('correlation_id')]
    public ?string $correlationID;

    /**
     * `new NotifyReplyParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NotifyReplyParams::with(replyTo: ..., text: ..., to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NotifyReplyParams)->withReplyTo(...)->withText(...)->withTo(...)
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
        string $replyTo,
        string $text,
        string $to,
        ?string $callbackURL = null,
        ?string $correlationID = null,
    ): self {
        $self = new self;

        $self['replyTo'] = $replyTo;
        $self['text'] = $text;
        $self['to'] = $to;

        null !== $callbackURL && $self['callbackURL'] = $callbackURL;
        null !== $correlationID && $self['correlationID'] = $correlationID;

        return $self;
    }

    /**
     * The inbound message ID (prefixed with `im_`) to reply to. This ID is provided in the `inbound.message.received` webhook event.
     */
    public function withReplyTo(string $replyTo): self
    {
        $self = clone $this;
        $self['replyTo'] = $replyTo;

        return $self;
    }

    /**
     * The reply message body sent as a free-form WhatsApp text.
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }

    /**
     * The recipient's phone number in E.164 format. Must match the phone number that sent the original inbound message.
     */
    public function withTo(string $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }

    /**
     * The URL where webhooks will be sent for delivery events of this reply.
     */
    public function withCallbackURL(string $callbackURL): self
    {
        $self = clone $this;
        $self['callbackURL'] = $callbackURL;

        return $self;
    }

    /**
     * A user-defined identifier to correlate this reply with your internal systems. It is returned in the response and any webhook events that refer to this message.
     */
    public function withCorrelationID(string $correlationID): self
    {
        $self = clone $this;
        $self['correlationID'] = $correlationID;

        return $self;
    }
}
