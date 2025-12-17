<?php

declare(strict_types=1);

namespace Prelude\Verification\VerificationCreateParams;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Verification\VerificationCreateParams\Options\AppRealm;
use Prelude\Verification\VerificationCreateParams\Options\Integration;
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
 *   codeSize?: int|null,
 *   customCode?: string|null,
 *   integration?: null|Integration|value-of<Integration>,
 *   locale?: string|null,
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
     * This allows you to automatically retrieve and fill the OTP code on mobile apps. Currently only Android devices are supported.
     */
    #[Optional('app_realm')]
    public ?AppRealm $appRealm;

    /**
     * The URL where webhooks will be sent when verification events occur, including verification creation, attempt creation, and delivery status changes. For more details, refer to [Webhook](/verify/v2/documentation/webhook).
     */
    #[Optional('callback_url')]
    public ?string $callbackURL;

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
     * The integration that triggered the verification.
     *
     * @var value-of<Integration>|null $integration
     */
    #[Optional(enum: Integration::class)]
    public ?string $integration;

    /**
     * A BCP-47 formatted locale string with the language the text message will be sent to. If there's no locale set, the language will be determined by the country code of the phone number. If the language specified doesn't exist, it defaults to US English.
     */
    #[Optional]
    public ?string $locale;

    /**
     * The method used for verifying this phone number. The 'voice' option provides an accessible alternative for visually impaired users by delivering the verification code through a phone call rather than a text message. It also allows verification of landline numbers that cannot receive SMS messages. The 'message' option explicitly requests message delivery (SMS, WhatsApp ...) and skips silent verification, useful for scenarios requiring direct user interaction.
     *
     * @var value-of<Method>|null $method
     */
    #[Optional(enum: Method::class)]
    public ?string $method;

    /**
     * The preferred channel to be used in priority for verification.
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
     * @param Integration|value-of<Integration>|null $integration
     * @param Method|value-of<Method>|null $method
     * @param PreferredChannel|value-of<PreferredChannel>|null $preferredChannel
     * @param array<string,string>|null $variables
     */
    public static function with(
        AppRealm|array|null $appRealm = null,
        ?string $callbackURL = null,
        ?int $codeSize = null,
        ?string $customCode = null,
        Integration|string|null $integration = null,
        ?string $locale = null,
        Method|string|null $method = null,
        PreferredChannel|string|null $preferredChannel = null,
        ?string $senderID = null,
        ?string $templateID = null,
        ?array $variables = null,
    ): self {
        $self = new self;

        null !== $appRealm && $self['appRealm'] = $appRealm;
        null !== $callbackURL && $self['callbackURL'] = $callbackURL;
        null !== $codeSize && $self['codeSize'] = $codeSize;
        null !== $customCode && $self['customCode'] = $customCode;
        null !== $integration && $self['integration'] = $integration;
        null !== $locale && $self['locale'] = $locale;
        null !== $method && $self['method'] = $method;
        null !== $preferredChannel && $self['preferredChannel'] = $preferredChannel;
        null !== $senderID && $self['senderID'] = $senderID;
        null !== $templateID && $self['templateID'] = $templateID;
        null !== $variables && $self['variables'] = $variables;

        return $self;
    }

    /**
     * This allows you to automatically retrieve and fill the OTP code on mobile apps. Currently only Android devices are supported.
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
     * The integration that triggered the verification.
     *
     * @param Integration|value-of<Integration> $integration
     */
    public function withIntegration(Integration|string $integration): self
    {
        $self = clone $this;
        $self['integration'] = $integration;

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
     * The preferred channel to be used in priority for verification.
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
