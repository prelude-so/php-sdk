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
 *   template_id: string,
 *   to: string,
 *   callback_url?: string,
 *   correlation_id?: string,
 *   expires_at?: string,
 *   from?: string,
 *   locale?: string,
 *   preferred_channel?: PreferredChannel|value-of<PreferredChannel>,
 *   variables?: array<string,string>,
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
    #[Required]
    public string $template_id;

    /**
     * The recipient's phone number.
     */
    #[Required]
    public string $to;

    /**
     * The callback URL.
     */
    #[Optional]
    public ?string $callback_url;

    /**
     * A user-defined identifier to correlate this transactional message with. It is returned in the response and any webhook events that refer to this transactionalmessage.
     */
    #[Optional]
    public ?string $correlation_id;

    /**
     * The message expiration date.
     */
    #[Optional]
    public ?string $expires_at;

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
     * @var value-of<PreferredChannel>|null $preferred_channel
     */
    #[Optional(enum: PreferredChannel::class)]
    public ?string $preferred_channel;

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
     * TransactionalSendParams::with(template_id: ..., to: ...)
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
     * @param PreferredChannel|value-of<PreferredChannel> $preferred_channel
     * @param array<string,string> $variables
     */
    public static function with(
        string $template_id,
        string $to,
        ?string $callback_url = null,
        ?string $correlation_id = null,
        ?string $expires_at = null,
        ?string $from = null,
        ?string $locale = null,
        PreferredChannel|string|null $preferred_channel = null,
        ?array $variables = null,
    ): self {
        $obj = new self;

        $obj['template_id'] = $template_id;
        $obj['to'] = $to;

        null !== $callback_url && $obj['callback_url'] = $callback_url;
        null !== $correlation_id && $obj['correlation_id'] = $correlation_id;
        null !== $expires_at && $obj['expires_at'] = $expires_at;
        null !== $from && $obj['from'] = $from;
        null !== $locale && $obj['locale'] = $locale;
        null !== $preferred_channel && $obj['preferred_channel'] = $preferred_channel;
        null !== $variables && $obj['variables'] = $variables;

        return $obj;
    }

    /**
     * The template identifier.
     */
    public function withTemplateID(string $templateID): self
    {
        $obj = clone $this;
        $obj['template_id'] = $templateID;

        return $obj;
    }

    /**
     * The recipient's phone number.
     */
    public function withTo(string $to): self
    {
        $obj = clone $this;
        $obj['to'] = $to;

        return $obj;
    }

    /**
     * The callback URL.
     */
    public function withCallbackURL(string $callbackURL): self
    {
        $obj = clone $this;
        $obj['callback_url'] = $callbackURL;

        return $obj;
    }

    /**
     * A user-defined identifier to correlate this transactional message with. It is returned in the response and any webhook events that refer to this transactionalmessage.
     */
    public function withCorrelationID(string $correlationID): self
    {
        $obj = clone $this;
        $obj['correlation_id'] = $correlationID;

        return $obj;
    }

    /**
     * The message expiration date.
     */
    public function withExpiresAt(string $expiresAt): self
    {
        $obj = clone $this;
        $obj['expires_at'] = $expiresAt;

        return $obj;
    }

    /**
     * The Sender ID.
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
        $obj = clone $this;
        $obj['preferred_channel'] = $preferredChannel;

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
