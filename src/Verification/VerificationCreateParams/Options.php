<?php

declare(strict_types=1);

namespace Prelude\Verification\VerificationCreateParams;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Verification\VerificationCreateParams\Options\AppRealm;
use Prelude\Verification\VerificationCreateParams\Options\Channel;
use Prelude\Verification\VerificationCreateParams\Options\Method;
use Prelude\Verification\VerificationCreateParams\Options\PreferredChannel;

/**
 * Verification options.
 *
 * @phpstan-import-type AppRealmShape from \Prelude\Verification\VerificationCreateParams\Options\AppRealm
 *
 * @phpstan-type OptionsShape = array{
 *   appRealm?: null|AppRealm|AppRealmShape,
 *   callbackURL?: string|null,
 *   channels?: list<Channel|value-of<Channel>>|null,
 *   codeSize?: int|null,
 *   customCode?: string|null,
 *   forceChallenge?: bool|null,
 *   locale?: string|null,
 *   maxAutoFallbacks?: int|null,
 *   method?: null|Method|value-of<Method>,
 *   preferredChannel?: null|PreferredChannel|value-of<PreferredChannel>,
 *   senderID?: string|null,
 *   templateID?: string|null,
 *   variables?: array<string,string>|null,
 * }
 */
final class Options implements BaseModel
{
    /** @use SdkModel<OptionsShape> */
    use SdkModel;

    /**
     * This allows automatic OTP retrieval on mobile apps and web browsers. Supported platforms are Android (SMS Retriever API) and Web (WebOTP API).
     */
    #[Optional('app_realm')]
    public ?AppRealm $appRealm;

    /**
     * The URL where webhooks will be sent when verification events occur, including verification creation, attempt creation, and delivery status changes. For more details, refer to [Webhook](/verify/v2/documentation/webhook).
     */
    #[Optional('callback_url')]
    public ?string $callbackURL;

    /**
     * The channels this verification may use, in the order they are tried. Channels you omit are never used, including on retries. This option can only be set when the verification is created. The list is recorded on the verification and applies for its whole lifecycle, so `channels` sent while retrying an existing verification is ignored — unlike `preferred_channel`, which is honored on every retry. Every channel you list must be enabled on your account and active in the destination country, otherwise the request fails with `channel_not_enabled_in_region`. Prelude still picks the best provider within each channel. Cannot be combined with `preferred_channel`. Voice is requested through `method` instead. Disabled by default — contact support to enable it.
     *
     * @var list<value-of<Channel>>|null $channels
     */
    #[Optional(list: Channel::class)]
    public ?array $channels;

    /**
     * The size of the code generated. It should be between 4 and 8. Defaults to the code size specified from the Dashboard.
     */
    #[Optional('code_size')]
    public ?int $codeSize;

    /**
     * The custom code to use for OTP verification. To use the custom code feature, contact us to enable it for your account. For more details, refer to [Custom Code](/verify/v2/documentation/custom-codes).
     */
    #[Optional('custom_code')]
    public ?string $customCode;

    /**
     * When `true`, the verification is routed through challenge-safe channels (non-SMS/Voice) regardless of country eligibility or any antispam outcome. The resulting verification has `status: "challenged"`. Use this when you have your own signal that the request is suspicious and want stricter routing — the verification is **not** classified as fraud and does not contribute to anti-fraud counters or risk factors. This feature is disabled by default — contact Prelude support to enable it on your account.
     */
    #[Optional('force_challenge')]
    public ?bool $forceChallenge;

    /**
     * A BCP-47 formatted locale string with the language the text message will be sent to. If there's no locale set, the language will be determined by the country code of the phone number. If the language specified doesn't exist, it defaults to US English.
     */
    #[Optional]
    public ?string $locale;

    /**
     * Maximum number of delivery attempts Prelude may add on its own after the one you requested. `0` means a single attempt: if it cannot be delivered, Prelude neither tries another provider nor another channel, and does not retry automatically. `1` allows one additional attempt, and so on — a value larger than the number of routes available for the destination simply behaves like the default. When omitted, Prelude retries as your account is configured, across as many channels as the route offers.
     *
     * This option can only be set when the verification is created. The value is recorded on the verification and applies for its whole lifecycle, so a `max_auto_fallbacks` sent while retrying an existing verification is ignored — the limit cannot be raised or lowered after the fact. A retry you ask for is not an automatic attempt, so it gets a fresh allowance of the same limit. This option is disabled by default — contact Prelude support to enable it on your account.
     */
    #[Optional('max_auto_fallbacks')]
    public ?int $maxAutoFallbacks;

    /**
     * The method used for verifying this phone number. The 'voice' option provides an accessible alternative for visually impaired users by delivering the verification code through a phone call rather than a text message. It also allows verification of landline numbers that cannot receive SMS messages. The 'message' option explicitly requests message delivery (SMS, WhatsApp ...) and skips silent verification, useful for scenarios requiring direct user interaction.
     *
     * @var value-of<Method>|null $method
     */
    #[Optional(enum: Method::class)]
    public ?string $method;

    /**
     * The channel to prioritize when delivering the verification. Prelude prioritizes this channel on the first attempt and continues to prefer it on retries while an untried route on that channel remains; once those are exhausted, retries fall back to the next best available route. If the channel is unavailable (for example, when a verification is challenged), Prelude uses the best available route instead. Cannot be combined with `channels`.
     *
     * @var value-of<PreferredChannel>|null $preferredChannel
     */
    #[Optional('preferred_channel', enum: PreferredChannel::class)]
    public ?string $preferredChannel;

    /**
     * The Sender ID to use for this message. The Sender ID needs to be enabled by Prelude.
     */
    #[Optional('sender_id')]
    public ?string $senderID;

    /**
     * The identifier of a verification template. It applies use case-specific settings, such as the message content or certain verification parameters.
     */
    #[Optional('template_id')]
    public ?string $templateID;

    /**
     * The variables to be replaced in the template.
     *
     * @var array<string,string>|null $variables
     */
    #[Optional(map: 'string')]
    public ?array $variables;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AppRealm|AppRealmShape|null $appRealm
     * @param list<Channel|value-of<Channel>>|null $channels
     * @param Method|value-of<Method>|null $method
     * @param PreferredChannel|value-of<PreferredChannel>|null $preferredChannel
     * @param array<string,string>|null $variables
     */
    public static function with(
        AppRealm|array|null $appRealm = null,
        ?string $callbackURL = null,
        ?array $channels = null,
        ?int $codeSize = null,
        ?string $customCode = null,
        ?bool $forceChallenge = null,
        ?string $locale = null,
        ?int $maxAutoFallbacks = null,
        Method|string|null $method = null,
        PreferredChannel|string|null $preferredChannel = null,
        ?string $senderID = null,
        ?string $templateID = null,
        ?array $variables = null,
    ): self {
        $self = new self;

        null !== $appRealm && $self['appRealm'] = $appRealm;
        null !== $callbackURL && $self['callbackURL'] = $callbackURL;
        null !== $channels && $self['channels'] = $channels;
        null !== $codeSize && $self['codeSize'] = $codeSize;
        null !== $customCode && $self['customCode'] = $customCode;
        null !== $forceChallenge && $self['forceChallenge'] = $forceChallenge;
        null !== $locale && $self['locale'] = $locale;
        null !== $maxAutoFallbacks && $self['maxAutoFallbacks'] = $maxAutoFallbacks;
        null !== $method && $self['method'] = $method;
        null !== $preferredChannel && $self['preferredChannel'] = $preferredChannel;
        null !== $senderID && $self['senderID'] = $senderID;
        null !== $templateID && $self['templateID'] = $templateID;
        null !== $variables && $self['variables'] = $variables;

        return $self;
    }

    /**
     * This allows automatic OTP retrieval on mobile apps and web browsers. Supported platforms are Android (SMS Retriever API) and Web (WebOTP API).
     *
     * @param AppRealm|AppRealmShape $appRealm
     */
    public function withAppRealm(AppRealm|array $appRealm): self
    {
        $self = clone $this;
        $self['appRealm'] = $appRealm;

        return $self;
    }

    /**
     * The URL where webhooks will be sent when verification events occur, including verification creation, attempt creation, and delivery status changes. For more details, refer to [Webhook](/verify/v2/documentation/webhook).
     */
    public function withCallbackURL(string $callbackURL): self
    {
        $self = clone $this;
        $self['callbackURL'] = $callbackURL;

        return $self;
    }

    /**
     * The channels this verification may use, in the order they are tried. Channels you omit are never used, including on retries. This option can only be set when the verification is created. The list is recorded on the verification and applies for its whole lifecycle, so `channels` sent while retrying an existing verification is ignored — unlike `preferred_channel`, which is honored on every retry. Every channel you list must be enabled on your account and active in the destination country, otherwise the request fails with `channel_not_enabled_in_region`. Prelude still picks the best provider within each channel. Cannot be combined with `preferred_channel`. Voice is requested through `method` instead. Disabled by default — contact support to enable it.
     *
     * @param list<Channel|value-of<Channel>> $channels
     */
    public function withChannels(array $channels): self
    {
        $self = clone $this;
        $self['channels'] = $channels;

        return $self;
    }

    /**
     * The size of the code generated. It should be between 4 and 8. Defaults to the code size specified from the Dashboard.
     */
    public function withCodeSize(int $codeSize): self
    {
        $self = clone $this;
        $self['codeSize'] = $codeSize;

        return $self;
    }

    /**
     * The custom code to use for OTP verification. To use the custom code feature, contact us to enable it for your account. For more details, refer to [Custom Code](/verify/v2/documentation/custom-codes).
     */
    public function withCustomCode(string $customCode): self
    {
        $self = clone $this;
        $self['customCode'] = $customCode;

        return $self;
    }

    /**
     * When `true`, the verification is routed through challenge-safe channels (non-SMS/Voice) regardless of country eligibility or any antispam outcome. The resulting verification has `status: "challenged"`. Use this when you have your own signal that the request is suspicious and want stricter routing — the verification is **not** classified as fraud and does not contribute to anti-fraud counters or risk factors. This feature is disabled by default — contact Prelude support to enable it on your account.
     */
    public function withForceChallenge(bool $forceChallenge): self
    {
        $self = clone $this;
        $self['forceChallenge'] = $forceChallenge;

        return $self;
    }

    /**
     * A BCP-47 formatted locale string with the language the text message will be sent to. If there's no locale set, the language will be determined by the country code of the phone number. If the language specified doesn't exist, it defaults to US English.
     */
    public function withLocale(string $locale): self
    {
        $self = clone $this;
        $self['locale'] = $locale;

        return $self;
    }

    /**
     * Maximum number of delivery attempts Prelude may add on its own after the one you requested. `0` means a single attempt: if it cannot be delivered, Prelude neither tries another provider nor another channel, and does not retry automatically. `1` allows one additional attempt, and so on — a value larger than the number of routes available for the destination simply behaves like the default. When omitted, Prelude retries as your account is configured, across as many channels as the route offers.
     *
     * This option can only be set when the verification is created. The value is recorded on the verification and applies for its whole lifecycle, so a `max_auto_fallbacks` sent while retrying an existing verification is ignored — the limit cannot be raised or lowered after the fact. A retry you ask for is not an automatic attempt, so it gets a fresh allowance of the same limit. This option is disabled by default — contact Prelude support to enable it on your account.
     */
    public function withMaxAutoFallbacks(int $maxAutoFallbacks): self
    {
        $self = clone $this;
        $self['maxAutoFallbacks'] = $maxAutoFallbacks;

        return $self;
    }

    /**
     * The method used for verifying this phone number. The 'voice' option provides an accessible alternative for visually impaired users by delivering the verification code through a phone call rather than a text message. It also allows verification of landline numbers that cannot receive SMS messages. The 'message' option explicitly requests message delivery (SMS, WhatsApp ...) and skips silent verification, useful for scenarios requiring direct user interaction.
     *
     * @param Method|value-of<Method> $method
     */
    public function withMethod(Method|string $method): self
    {
        $self = clone $this;
        $self['method'] = $method;

        return $self;
    }

    /**
     * The channel to prioritize when delivering the verification. Prelude prioritizes this channel on the first attempt and continues to prefer it on retries while an untried route on that channel remains; once those are exhausted, retries fall back to the next best available route. If the channel is unavailable (for example, when a verification is challenged), Prelude uses the best available route instead. Cannot be combined with `channels`.
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
     * The Sender ID to use for this message. The Sender ID needs to be enabled by Prelude.
     */
    public function withSenderID(string $senderID): self
    {
        $self = clone $this;
        $self['senderID'] = $senderID;

        return $self;
    }

    /**
     * The identifier of a verification template. It applies use case-specific settings, such as the message content or certain verification parameters.
     */
    public function withTemplateID(string $templateID): self
    {
        $self = clone $this;
        $self['templateID'] = $templateID;

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
