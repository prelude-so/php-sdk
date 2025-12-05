<?php

declare(strict_types=1);

namespace Prelude\Notify;

use Prelude\Core\Attributes\Api;
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
 *   template_id: string,
 *   to: string,
 *   callback_url?: string,
 *   correlation_id?: string,
 *   expires_at?: \DateTimeInterface,
 *   from?: string,
 *   locale?: string,
 *   preferred_channel?: PreferredChannel|value-of<PreferredChannel>,
 *   schedule_at?: \DateTimeInterface,
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
    #[Api]
    public string $template_id;

    /**
     * The recipient's phone number in E.164 format.
     */
    #[Api]
    public string $to;

    /**
     * The URL where webhooks will be sent for message delivery events.
     */
    #[Api(optional: true)]
    public ?string $callback_url;

    /**
     * A user-defined identifier to correlate this message with your internal systems. It is returned in the response and any webhook events that refer to this message.
     */
    #[Api(optional: true)]
    public ?string $correlation_id;

    /**
     * The message expiration date in RFC3339 format. The message will not be sent if this time is reached.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $expires_at;

    /**
     * The Sender ID. Must be approved for your account.
     */
    #[Api(optional: true)]
    public ?string $from;

    /**
     * A BCP-47 formatted locale string with the language the text message will be sent to. If there's no locale set, the language will be determined by the country code of the phone number. If the language specified doesn't exist, the default set on the template will be used.
     */
    #[Api(optional: true)]
    public ?string $locale;

    /**
     * The preferred channel to be used in priority for message delivery. If the channel is unavailable, the system will fallback to other available channels.
     *
     * @var value-of<PreferredChannel>|null $preferred_channel
     */
    #[Api(enum: PreferredChannel::class, optional: true)]
    public ?string $preferred_channel;

    /**
     * Schedule the message for future delivery in RFC3339 format. Marketing messages can be scheduled up to 90 days in advance and will be automatically adjusted for compliance with local time window restrictions.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $schedule_at;

    /**
     * The variables to be replaced in the template.
     *
     * @var array<string,string>|null $variables
     */
    #[Api(map: 'string', optional: true)]
    public ?array $variables;

    /**
     * `new NotifySendParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NotifySendParams::with(template_id: ..., to: ...)
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
     * @param PreferredChannel|value-of<PreferredChannel> $preferred_channel
     * @param array<string,string> $variables
     */
    public static function with(
        string $template_id,
        string $to,
        ?string $callback_url = null,
        ?string $correlation_id = null,
        ?\DateTimeInterface $expires_at = null,
        ?string $from = null,
        ?string $locale = null,
        PreferredChannel|string|null $preferred_channel = null,
        ?\DateTimeInterface $schedule_at = null,
        ?array $variables = null,
    ): self {
        $obj = new self;

        $obj->template_id = $template_id;
        $obj->to = $to;

        null !== $callback_url && $obj->callback_url = $callback_url;
        null !== $correlation_id && $obj->correlation_id = $correlation_id;
        null !== $expires_at && $obj->expires_at = $expires_at;
        null !== $from && $obj->from = $from;
        null !== $locale && $obj->locale = $locale;
        null !== $preferred_channel && $obj['preferred_channel'] = $preferred_channel;
        null !== $schedule_at && $obj->schedule_at = $schedule_at;
        null !== $variables && $obj->variables = $variables;

        return $obj;
    }

    /**
     * The template identifier configured by your Customer Success team.
     */
    public function withTemplateID(string $templateID): self
    {
        $obj = clone $this;
        $obj->template_id = $templateID;

        return $obj;
    }

    /**
     * The recipient's phone number in E.164 format.
     */
    public function withTo(string $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

        return $obj;
    }

    /**
     * The URL where webhooks will be sent for message delivery events.
     */
    public function withCallbackURL(string $callbackURL): self
    {
        $obj = clone $this;
        $obj->callback_url = $callbackURL;

        return $obj;
    }

    /**
     * A user-defined identifier to correlate this message with your internal systems. It is returned in the response and any webhook events that refer to this message.
     */
    public function withCorrelationID(string $correlationID): self
    {
        $obj = clone $this;
        $obj->correlation_id = $correlationID;

        return $obj;
    }

    /**
     * The message expiration date in RFC3339 format. The message will not be sent if this time is reached.
     */
    public function withExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $obj = clone $this;
        $obj->expires_at = $expiresAt;

        return $obj;
    }

    /**
     * The Sender ID. Must be approved for your account.
     */
    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj->from = $from;

        return $obj;
    }

    /**
     * A BCP-47 formatted locale string with the language the text message will be sent to. If there's no locale set, the language will be determined by the country code of the phone number. If the language specified doesn't exist, the default set on the template will be used.
     */
    public function withLocale(string $locale): self
    {
        $obj = clone $this;
        $obj->locale = $locale;

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
        $obj['preferred_channel'] = $preferredChannel;

        return $obj;
    }

    /**
     * Schedule the message for future delivery in RFC3339 format. Marketing messages can be scheduled up to 90 days in advance and will be automatically adjusted for compliance with local time window restrictions.
     */
    public function withScheduleAt(\DateTimeInterface $scheduleAt): self
    {
        $obj = clone $this;
        $obj->schedule_at = $scheduleAt;

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
        $obj->variables = $variables;

        return $obj;
    }
}
