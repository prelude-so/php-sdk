<?php

declare(strict_types=1);

namespace Prelude\Transactional;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Concerns\SdkParams;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Transactional\TransactionalSendParams\PreferredChannel;

/**
 * Legacy route maintained for backward compatibility. Migrate to `/v2/notify` instead.
 *
 * @deprecated
 * @see Prelude\Services\TransactionalService::send()
 *
 * @phpstan-type TransactionalSendParamsShape = array{
 *   templateID: string,
 *   to: string,
 *   callbackURL?: string|null,
 *   correlationID?: string|null,
 *   expiresAt?: string|null,
 *   from?: string|null,
 *   locale?: string|null,
 *   preferredChannel?: null|PreferredChannel|value-of<PreferredChannel>,
 *   variables?: array<string,string>|null,
 * }
 */
final class TransactionalSendParams implements BaseModel
{
    /** @use SdkModel<TransactionalSendParamsShape> */
    use SdkModel;
    use SdkParams;

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
     * The callback URL.
     */
    #[Optional('callback_url')]
    public ?string $callbackURL;

    /**
     * A user-defined identifier to correlate this transactional message with. It is returned in the response and any webhook events that refer to this transactionalmessage.
     */
    #[Optional('correlation_id')]
    public ?string $correlationID;

    /**
     * The message expiration date.
     */
    #[Optional('expires_at')]
    public ?string $expiresAt;

    /**
     * The Sender ID.
     */
    #[Optional]
    public ?string $from;

    /**
     * A BCP-47 formatted locale string with the language the text message will be sent to. If there's no locale set, the language will be determined by the country code of the phone number. If the language specified doesn't exist, the default set on the template will be used.
     */
    #[Optional]
    public ?string $locale;

    /**
     * The preferred delivery channel for the message. When specified, the system will prioritize sending via the requested channel if the template is configured for it.
     *
     * If not specified and the template is configured for WhatsApp, the message will be sent via WhatsApp first, with automatic fallback to SMS if WhatsApp delivery is unavailable.
     *
     * Supported channels: `sms`, `rcs`, `whatsapp`.
     *
     * @var value-of<PreferredChannel>|null $preferredChannel
     */
    #[Optional('preferred_channel', enum: PreferredChannel::class)]
    public ?string $preferredChannel;

    /**
     * The variables to be replaced in the template.
     *
     * @var array<string,string>|null $variables
     */
    #[Optional(map: 'string')]
    public ?array $variables;

    /**
     * `new TransactionalSendParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TransactionalSendParams::with(templateID: ..., to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TransactionalSendParams)->withTemplateID(...)->withTo(...)
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
     * @param PreferredChannel|value-of<PreferredChannel>|null $preferredChannel
     * @param array<string,string>|null $variables
     */
    public static function with(
        string $templateID,
        string $to,
        ?string $callbackURL = null,
        ?string $correlationID = null,
        ?string $expiresAt = null,
        ?string $from = null,
        ?string $locale = null,
        PreferredChannel|string|null $preferredChannel = null,
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
        null !== $variables && $self['variables'] = $variables;

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
     * The callback URL.
     */
    public function withCallbackURL(string $callbackURL): self
    {
        $self = clone $this;
        $self['callbackURL'] = $callbackURL;

        return $self;
    }

    /**
     * A user-defined identifier to correlate this transactional message with. It is returned in the response and any webhook events that refer to this transactionalmessage.
     */
    public function withCorrelationID(string $correlationID): self
    {
        $self = clone $this;
        $self['correlationID'] = $correlationID;

        return $self;
    }

    /**
     * The message expiration date.
     */
    public function withExpiresAt(string $expiresAt): self
    {
        $self = clone $this;
        $self['expiresAt'] = $expiresAt;

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
     * The preferred delivery channel for the message. When specified, the system will prioritize sending via the requested channel if the template is configured for it.
     *
     * If not specified and the template is configured for WhatsApp, the message will be sent via WhatsApp first, with automatic fallback to SMS if WhatsApp delivery is unavailable.
     *
     * Supported channels: `sms`, `rcs`, `whatsapp`.
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
