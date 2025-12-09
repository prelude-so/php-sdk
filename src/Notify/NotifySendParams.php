<?php

declare(strict_types=1);

namespace Prelude\Notify;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Concerns\SdkParams;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Notify\NotifySendParams\PreferredChannel;

/**
 * Send transactional and marketing messages to your users via SMS and WhatsApp with automatic compliance enforcement.
 *
 * @see Prelude\Services\NotifyService::send()
 *
 * @phpstan-type NotifySendParamsShape = array{
 *   templateID: string,
 *   to: string,
 *   callbackURL?: string,
 *   correlationID?: string,
 *   expiresAt?: \DateTimeInterface,
 *   from?: string,
 *   locale?: string,
 *   preferredChannel?: PreferredChannel|value-of<PreferredChannel>,
 *   scheduleAt?: \DateTimeInterface,
 *   variables?: array<string,string>,
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
     * A user-defined identifier to correlate this message with your internal systems. It is returned in the response and any webhook events that refer to this message.
     */
    #[Optional('correlation_id')]
    public ?string $correlationID;

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
     * @param PreferredChannel|value-of<PreferredChannel> $preferredChannel
     * @param array<string,string> $variables
     */
    public static function with(
        string $templateID,
        string $to,
        ?string $callbackURL = null,
        ?string $correlationID = null,
        ?\DateTimeInterface $expiresAt = null,
        ?string $from = null,
        ?string $locale = null,
        PreferredChannel|string|null $preferredChannel = null,
        ?\DateTimeInterface $scheduleAt = null,
        ?array $variables = null,
    ): self {
        $obj = new self;

        $obj['templateID'] = $templateID;
        $obj['to'] = $to;

        null !== $callbackURL && $obj['callbackURL'] = $callbackURL;
        null !== $correlationID && $obj['correlationID'] = $correlationID;
        null !== $expiresAt && $obj['expiresAt'] = $expiresAt;
        null !== $from && $obj['from'] = $from;
        null !== $locale && $obj['locale'] = $locale;
        null !== $preferredChannel && $obj['preferredChannel'] = $preferredChannel;
        null !== $scheduleAt && $obj['scheduleAt'] = $scheduleAt;
        null !== $variables && $obj['variables'] = $variables;

        return $obj;
    }

    /**
     * The template identifier configured by your Customer Success team.
     */
    public function withTemplateID(string $templateID): self
    {
        $obj = clone $this;
        $obj['templateID'] = $templateID;

        return $obj;
    }

    /**
     * The recipient's phone number in E.164 format.
     */
    public function withTo(string $to): self
    {
        $obj = clone $this;
        $obj['to'] = $to;

        return $obj;
    }

    /**
     * The URL where webhooks will be sent for message delivery events.
     */
    public function withCallbackURL(string $callbackURL): self
    {
        $obj = clone $this;
        $obj['callbackURL'] = $callbackURL;

        return $obj;
    }

    /**
     * A user-defined identifier to correlate this message with your internal systems. It is returned in the response and any webhook events that refer to this message.
     */
    public function withCorrelationID(string $correlationID): self
    {
        $obj = clone $this;
        $obj['correlationID'] = $correlationID;

        return $obj;
    }

    /**
     * The message expiration date in RFC3339 format. The message will not be sent if this time is reached.
     */
    public function withExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $obj = clone $this;
        $obj['expiresAt'] = $expiresAt;

        return $obj;
    }

    /**
     * The Sender ID. Must be approved for your account.
     */
    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj['from'] = $from;

        return $obj;
    }

    /**
     * A BCP-47 formatted locale string with the language the text message will be sent to. If there's no locale set, the language will be determined by the country code of the phone number. If the language specified doesn't exist, the default set on the template will be used.
     */
    public function withLocale(string $locale): self
    {
        $obj = clone $this;
        $obj['locale'] = $locale;

        return $obj;
    }

    /**
     * The preferred channel to be used in priority for message delivery. If the channel is unavailable, the system will fallback to other available channels.
     *
     * @param PreferredChannel|value-of<PreferredChannel> $preferredChannel
     */
    public function withPreferredChannel(
        PreferredChannel|string $preferredChannel
    ): self {
        $obj = clone $this;
        $obj['preferredChannel'] = $preferredChannel;

        return $obj;
    }

    /**
     * Schedule the message for future delivery in RFC3339 format. Marketing messages can be scheduled up to 90 days in advance and will be automatically adjusted for compliance with local time window restrictions.
     */
    public function withScheduleAt(\DateTimeInterface $scheduleAt): self
    {
        $obj = clone $this;
        $obj['scheduleAt'] = $scheduleAt;

        return $obj;
    }

    /**
     * The variables to be replaced in the template.
     *
     * @param array<string,string> $variables
     */
    public function withVariables(array $variables): self
    {
        $obj = clone $this;
        $obj['variables'] = $variables;

        return $obj;
    }
}
