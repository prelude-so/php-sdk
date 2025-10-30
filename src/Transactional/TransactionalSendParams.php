<?php

declare(strict_types=1);

namespace Prelude\Transactional;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Concerns\SdkParams;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Transactional\TransactionalSendParams\PreferredChannel;

/**
 * Send a transactional message to your user.
 *
 * @see Prelude\Transactional->send
 *
 * @phpstan-type TransactionalSendParamsShape = array{
 *   templateID: string,
 *   to: string,
 *   callbackURL?: string,
 *   correlationID?: string,
 *   expiresAt?: string,
 *   from?: string,
 *   locale?: string,
 *   preferredChannel?: PreferredChannel|value-of<PreferredChannel>,
 *   variables?: array<string, string>,
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
    #[Api('template_id')]
    public string $templateID;

    /**
     * The recipient's phone number.
     */
    #[Api]
    public string $to;

    /**
     * The callback URL.
     */
    #[Api('callback_url', optional: true)]
    public ?string $callbackURL;

    /**
     * A user-defined identifier to correlate this transactional message with. It is returned in the response and any webhook events that refer to this transactionalmessage.
     */
    #[Api('correlation_id', optional: true)]
    public ?string $correlationID;

    /**
     * The message expiration date.
     */
    #[Api('expires_at', optional: true)]
    public ?string $expiresAt;

    /**
     * The Sender ID.
     */
    #[Api(optional: true)]
    public ?string $from;

    /**
     * A BCP-47 formatted locale string with the language the text message will be sent to. If there's no locale set, the language will be determined by the country code of the phone number. If the language specified doesn't exist, the default set on the template will be used.
     */
    #[Api(optional: true)]
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
    #[Api('preferred_channel', enum: PreferredChannel::class, optional: true)]
    public ?string $preferredChannel;

    /**
     * The variables to be replaced in the template.
     *
     * @var array<string, string>|null $variables
     */
    #[Api(map: 'string', optional: true)]
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
     * @param PreferredChannel|value-of<PreferredChannel> $preferredChannel
     * @param array<string, string> $variables
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
        $obj = new self;

        $obj->templateID = $templateID;
        $obj->to = $to;

        null !== $callbackURL && $obj->callbackURL = $callbackURL;
        null !== $correlationID && $obj->correlationID = $correlationID;
        null !== $expiresAt && $obj->expiresAt = $expiresAt;
        null !== $from && $obj->from = $from;
        null !== $locale && $obj->locale = $locale;
        null !== $preferredChannel && $obj['preferredChannel'] = $preferredChannel;
        null !== $variables && $obj->variables = $variables;

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
     * The callback URL.
     */
    public function withCallbackURL(string $callbackURL): self
    {
        $obj = clone $this;
        $obj->callbackURL = $callbackURL;

        return $obj;
    }

    /**
     * A user-defined identifier to correlate this transactional message with. It is returned in the response and any webhook events that refer to this transactionalmessage.
     */
    public function withCorrelationID(string $correlationID): self
    {
        $obj = clone $this;
        $obj->correlationID = $correlationID;

        return $obj;
    }

    /**
     * The message expiration date.
     */
    public function withExpiresAt(string $expiresAt): self
    {
        $obj = clone $this;
        $obj->expiresAt = $expiresAt;

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
        $obj['preferredChannel'] = $preferredChannel;

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
}
