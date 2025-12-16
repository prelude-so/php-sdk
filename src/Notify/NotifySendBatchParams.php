<?php

declare(strict_types=1);

namespace Prelude\Notify;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Concerns\SdkParams;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Notify\NotifySendBatchParams\PreferredChannel;

/**
 * Send the same message to multiple recipients in a single request.
 *
 * @see Prelude\Services\NotifyService::sendBatch()
 *
 * @phpstan-type NotifySendBatchParamsShape = array{
 *   templateID: string,
 *   to: list<string>,
 *   callbackURL?: string|null,
 *   correlationID?: string|null,
 *   expiresAt?: \DateTimeInterface|null,
 *   from?: string|null,
 *   locale?: string|null,
 *   preferredChannel?: null|PreferredChannel|value-of<PreferredChannel>,
 *   scheduleAt?: \DateTimeInterface|null,
 *   variables?: array<string,string>|null,
 * }
 */
final class NotifySendBatchParams implements BaseModel
{
    /** @use SdkModel<NotifySendBatchParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The template identifier configured by your Customer Success team.
     */
    #[Required('template_id')]
    public string $templateID;

    /**
     * The list of recipients' phone numbers in E.164 format.
     *
     * @var list<string> $to
     */
    #[Required(list: 'string')]
    public array $to;

    /**
     * The URL where webhooks will be sent for delivery events.
     */
    #[Optional('callback_url')]
    public ?string $callbackURL;

    /**
     * A user-defined identifier to correlate this request with your internal systems.
     */
    #[Optional('correlation_id')]
    public ?string $correlationID;

    /**
     * The message expiration date in RFC3339 format. Messages will not be sent after this time.
     */
    #[Optional('expires_at')]
    public ?\DateTimeInterface $expiresAt;

    /**
     * The Sender ID. Must be approved for your account.
     */
    #[Optional]
    public ?string $from;

    /**
     * A BCP-47 formatted locale string.
     */
    #[Optional]
    public ?string $locale;

    /**
     * Preferred channel for delivery. If unavailable, automatic fallback applies.
     *
     * @var value-of<PreferredChannel>|null $preferredChannel
     */
    #[Optional('preferred_channel', enum: PreferredChannel::class)]
    public ?string $preferredChannel;

    /**
     * Schedule delivery in RFC3339 format. Marketing sends may be adjusted to comply with local time windows.
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
     * `new NotifySendBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NotifySendBatchParams::with(templateID: ..., to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NotifySendBatchParams)->withTemplateID(...)->withTo(...)
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
     * @param list<string> $to
     * @param PreferredChannel|value-of<PreferredChannel> $preferredChannel
     * @param array<string,string> $variables
     */
    public static function with(
        string $templateID,
        array $to,
        ?string $callbackURL = null,
        ?string $correlationID = null,
        ?\DateTimeInterface $expiresAt = null,
        ?string $from = null,
        ?string $locale = null,
        PreferredChannel|string|null $preferredChannel = null,
        ?\DateTimeInterface $scheduleAt = null,
        ?array $variables = null,
    ): self {
        $self = new self;

        $self['templateID'] = $templateID;
        $self['to'] = $to;

        null !== $callbackURL && $self['callbackURL'] = $callbackURL;
        null !== $correlationID && $self['correlationID'] = $correlationID;
        null !== $expiresAt && $self['expiresAt'] = $expiresAt;
        null !== $from && $self['from'] = $from;
        null !== $locale && $self['locale'] = $locale;
        null !== $preferredChannel && $self['preferredChannel'] = $preferredChannel;
        null !== $scheduleAt && $self['scheduleAt'] = $scheduleAt;
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
     * The list of recipients' phone numbers in E.164 format.
     *
     * @param list<string> $to
     */
    public function withTo(array $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }

    /**
     * The URL where webhooks will be sent for delivery events.
     */
    public function withCallbackURL(string $callbackURL): self
    {
        $self = clone $this;
        $self['callbackURL'] = $callbackURL;

        return $self;
    }

    /**
     * A user-defined identifier to correlate this request with your internal systems.
     */
    public function withCorrelationID(string $correlationID): self
    {
        $self = clone $this;
        $self['correlationID'] = $correlationID;

        return $self;
    }

    /**
     * The message expiration date in RFC3339 format. Messages will not be sent after this time.
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
     * A BCP-47 formatted locale string.
     */
    public function withLocale(string $locale): self
    {
        $self = clone $this;
        $self['locale'] = $locale;

        return $self;
    }

    /**
     * Preferred channel for delivery. If unavailable, automatic fallback applies.
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
     * Schedule delivery in RFC3339 format. Marketing sends may be adjusted to comply with local time windows.
     */
    public function withScheduleAt(\DateTimeInterface $scheduleAt): self
    {
        $self = clone $this;
        $self['scheduleAt'] = $scheduleAt;

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
