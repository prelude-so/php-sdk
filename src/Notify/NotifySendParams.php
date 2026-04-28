<?php

declare(strict_types=1);

namespace Prelude\Notify;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Concerns\SdkParams;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Notify\NotifySendParams\Context;
use Prelude\Notify\NotifySendParams\Document;
use Prelude\Notify\NotifySendParams\PreferredChannel;

/**
 * Send transactional and marketing messages to your users via SMS, RCS and WhatsApp with automatic compliance enforcement.
 *
 * @see Prelude\Services\NotifyService::send()
 *
 * @phpstan-import-type ContextShape from \Prelude\Notify\NotifySendParams\Context
 * @phpstan-import-type DocumentShape from \Prelude\Notify\NotifySendParams\Document
 *
 * @phpstan-type NotifySendParamsShape = array{
 *   templateID: string,
 *   to: string,
 *   callbackURL?: string|null,
 *   context?: null|Context|ContextShape,
 *   correlationID?: string|null,
 *   document?: null|Document|DocumentShape,
 *   expiresAt?: \DateTimeInterface|null,
 *   from?: string|null,
 *   locale?: string|null,
 *   preferredChannel?: null|PreferredChannel|value-of<PreferredChannel>,
 *   scheduleAt?: \DateTimeInterface|null,
 *   text?: string|null,
 *   variables?: array<string,string>|null,
 * }
 */
final class NotifySendParams implements BaseModel
{
    /** @use SdkModel<NotifySendParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The template identifier configured by your Customer Success team.
     */
    #[Required('template_id')]
    public string $templateID;

    /**
     * The recipient's phone number in E.164 format.
     */
    #[Required]
    public string $to;

    /**
     * The URL where webhooks will be sent for message delivery events.
     */
    #[Optional('callback_url')]
    public ?string $callbackURL;

    /**
     * Context for replying to an inbound message. When provided, the message is sent as a WhatsApp reply within the 24-hour conversation window.
     */
    #[Optional]
    public ?Context $context;

    /**
     * A user-defined identifier to correlate this message with your internal systems. It is returned in the response and any webhook events that refer to this message.
     */
    #[Optional('correlation_id')]
    public ?string $correlationID;

    /**
     * A media attachment to include in the message header. Supported on
     * WhatsApp templates registered with a `DOCUMENT`, `IMAGE`, or
     * `VIDEO` header. The media type is determined by the template's
     * registered header format; send the matching file type for each.
     *
     * - `DOCUMENT` headers accept PDF and other document formats; `filename` is required and displayed to the recipient.
     * - `IMAGE` headers accept `.png`, `.jpg`, `.jpeg`, and `.webp` URLs; `filename` is ignored.
     * - `VIDEO` headers accept `.mp4` and `.3gp` URLs; `filename` is ignored.
     */
    #[Optional]
    public ?Document $document;

    /**
     * The message expiration date in RFC3339 format. The message will not be sent if this time is reached.
     */
    #[Optional('expires_at')]
    public ?\DateTimeInterface $expiresAt;

    /**
     * The Sender ID. Must be approved for your account.
     */
    #[Optional]
    public ?string $from;

    /**
     * A BCP-47 formatted locale string with the language the text message will be sent to. If there's no locale set, the language will be determined by the country code of the phone number. If the language specified doesn't exist, the default set on the template will be used.
     */
    #[Optional]
    public ?string $locale;

    /**
     * The preferred channel to be used in priority for message delivery. If the channel is unavailable, the system will fallback to other available channels.
     *
     * @var value-of<PreferredChannel>|null $preferredChannel
     */
    #[Optional('preferred_channel', enum: PreferredChannel::class)]
    public ?string $preferredChannel;

    /**
     * Schedule the message for future delivery in RFC3339 format. Marketing messages can be scheduled up to 90 days in advance and will be automatically adjusted for compliance with local time window restrictions.
     */
    #[Optional('schedule_at')]
    public ?\DateTimeInterface $scheduleAt;

    /**
     * The reply message body. Required when `context.reply_to` is provided. Used for 2-way WhatsApp messaging to send free-form text replies within a conversation window.
     */
    #[Optional]
    public ?string $text;

    /**
     * The variables to be replaced in the template.
     *
     * @var array<string,string>|null $variables
     */
    #[Optional(map: 'string')]
    public ?array $variables;

    /**
     * `new NotifySendParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NotifySendParams::with(templateID: ..., to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NotifySendParams)->withTemplateID(...)->withTo(...)
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
     * @param Context|ContextShape|null $context
     * @param Document|DocumentShape|null $document
     * @param PreferredChannel|value-of<PreferredChannel>|null $preferredChannel
     * @param array<string,string>|null $variables
     */
    public static function with(
        string $templateID,
        string $to,
        ?string $callbackURL = null,
        Context|array|null $context = null,
        ?string $correlationID = null,
        Document|array|null $document = null,
        ?\DateTimeInterface $expiresAt = null,
        ?string $from = null,
        ?string $locale = null,
        PreferredChannel|string|null $preferredChannel = null,
        ?\DateTimeInterface $scheduleAt = null,
        ?string $text = null,
        ?array $variables = null,
    ): self {
        $self = new self;

        $self['templateID'] = $templateID;
        $self['to'] = $to;

        null !== $callbackURL && $self['callbackURL'] = $callbackURL;
        null !== $context && $self['context'] = $context;
        null !== $correlationID && $self['correlationID'] = $correlationID;
        null !== $document && $self['document'] = $document;
        null !== $expiresAt && $self['expiresAt'] = $expiresAt;
        null !== $from && $self['from'] = $from;
        null !== $locale && $self['locale'] = $locale;
        null !== $preferredChannel && $self['preferredChannel'] = $preferredChannel;
        null !== $scheduleAt && $self['scheduleAt'] = $scheduleAt;
        null !== $text && $self['text'] = $text;
        null !== $variables && $self['variables'] = $variables;

        return $self;
    }

    /**
     * The template identifier configured by your Customer Success team.
     */
    public function withTemplateID(string $templateID): self
    {
        $self = clone $this;
        $self['templateID'] = $templateID;

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
     * The URL where webhooks will be sent for message delivery events.
     */
    public function withCallbackURL(string $callbackURL): self
    {
        $self = clone $this;
        $self['callbackURL'] = $callbackURL;

        return $self;
    }

    /**
     * Context for replying to an inbound message. When provided, the message is sent as a WhatsApp reply within the 24-hour conversation window.
     *
     * @param Context|ContextShape $context
     */
    public function withContext(Context|array $context): self
    {
        $self = clone $this;
        $self['context'] = $context;

        return $self;
    }

    /**
     * A user-defined identifier to correlate this message with your internal systems. It is returned in the response and any webhook events that refer to this message.
     */
    public function withCorrelationID(string $correlationID): self
    {
        $self = clone $this;
        $self['correlationID'] = $correlationID;

        return $self;
    }

    /**
     * A media attachment to include in the message header. Supported on
     * WhatsApp templates registered with a `DOCUMENT`, `IMAGE`, or
     * `VIDEO` header. The media type is determined by the template's
     * registered header format; send the matching file type for each.
     *
     * - `DOCUMENT` headers accept PDF and other document formats; `filename` is required and displayed to the recipient.
     * - `IMAGE` headers accept `.png`, `.jpg`, `.jpeg`, and `.webp` URLs; `filename` is ignored.
     * - `VIDEO` headers accept `.mp4` and `.3gp` URLs; `filename` is ignored.
     *
     * @param Document|DocumentShape $document
     */
    public function withDocument(Document|array $document): self
    {
        $self = clone $this;
        $self['document'] = $document;

        return $self;
    }

    /**
     * The message expiration date in RFC3339 format. The message will not be sent if this time is reached.
     */
    public function withExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $self = clone $this;
        $self['expiresAt'] = $expiresAt;

        return $self;
    }

    /**
     * The Sender ID. Must be approved for your account.
     */
    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * A BCP-47 formatted locale string with the language the text message will be sent to. If there's no locale set, the language will be determined by the country code of the phone number. If the language specified doesn't exist, the default set on the template will be used.
     */
    public function withLocale(string $locale): self
    {
        $self = clone $this;
        $self['locale'] = $locale;

        return $self;
    }

    /**
     * The preferred channel to be used in priority for message delivery. If the channel is unavailable, the system will fallback to other available channels.
     *
     * @param PreferredChannel|value-of<PreferredChannel> $preferredChannel
     */
    public function withPreferredChannel(
        PreferredChannel|string $preferredChannel
    ): self {
        $self = clone $this;
        $self['preferredChannel'] = $preferredChannel;

        return $self;
    }

    /**
     * Schedule the message for future delivery in RFC3339 format. Marketing messages can be scheduled up to 90 days in advance and will be automatically adjusted for compliance with local time window restrictions.
     */
    public function withScheduleAt(\DateTimeInterface $scheduleAt): self
    {
        $self = clone $this;
        $self['scheduleAt'] = $scheduleAt;

        return $self;
    }

    /**
     * The reply message body. Required when `context.reply_to` is provided. Used for 2-way WhatsApp messaging to send free-form text replies within a conversation window.
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

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
}
