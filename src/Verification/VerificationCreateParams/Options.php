<?php

declare(strict_types=1);

namespace Prelude\Verification\VerificationCreateParams;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Verification\VerificationCreateParams\Options\AppRealm;
use Prelude\Verification\VerificationCreateParams\Options\AppRealm\Platform;
use Prelude\Verification\VerificationCreateParams\Options\Integration;
use Prelude\Verification\VerificationCreateParams\Options\Method;
use Prelude\Verification\VerificationCreateParams\Options\PreferredChannel;

/**
 * Verification options.
 *
 * @phpstan-type OptionsShape = array{
 *   appRealm?: AppRealm|null,
 *   callbackURL?: string|null,
 *   codeSize?: int|null,
 *   customCode?: string|null,
 *   integration?: value-of<Integration>|null,
 *   locale?: string|null,
 *   method?: value-of<Method>|null,
 *   preferredChannel?: value-of<PreferredChannel>|null,
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
     * @param AppRealm|array{platform: value-of<Platform>, value: string} $appRealm
     * @param Integration|value-of<Integration> $integration
     * @param Method|value-of<Method> $method
     * @param PreferredChannel|value-of<PreferredChannel> $preferredChannel
     * @param array<string,string> $variables
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
        $obj = new self;

        null !== $appRealm && $obj['appRealm'] = $appRealm;
        null !== $callbackURL && $obj['callbackURL'] = $callbackURL;
        null !== $codeSize && $obj['codeSize'] = $codeSize;
        null !== $customCode && $obj['customCode'] = $customCode;
        null !== $integration && $obj['integration'] = $integration;
        null !== $locale && $obj['locale'] = $locale;
        null !== $method && $obj['method'] = $method;
        null !== $preferredChannel && $obj['preferredChannel'] = $preferredChannel;
        null !== $senderID && $obj['senderID'] = $senderID;
        null !== $templateID && $obj['templateID'] = $templateID;
        null !== $variables && $obj['variables'] = $variables;

        return $obj;
    }

    /**
     * This allows you to automatically retrieve and fill the OTP code on mobile apps. Currently only Android devices are supported.
     *
     * @param AppRealm|array{platform: value-of<Platform>, value: string} $appRealm
     */
    public function withAppRealm(AppRealm|array $appRealm): self
    {
        $obj = clone $this;
        $obj['appRealm'] = $appRealm;

        return $obj;
    }

    /**
     * The URL where webhooks will be sent when verification events occur, including verification creation, attempt creation, and delivery status changes. For more details, refer to [Webhook](/verify/v2/documentation/webhook).
     */
    public function withCallbackURL(string $callbackURL): self
    {
        $obj = clone $this;
        $obj['callbackURL'] = $callbackURL;

        return $obj;
    }

    /**
     * The size of the code generated. It should be between 4 and 8. Defaults to the code size specified from the Dashboard.
     */
    public function withCodeSize(int $codeSize): self
    {
        $obj = clone $this;
        $obj['codeSize'] = $codeSize;

        return $obj;
    }

    /**
     * The custom code to use for OTP verification. To use the custom code feature, contact us to enable it for your account. For more details, refer to [Custom Code](/verify/v2/documentation/custom-codes).
     */
    public function withCustomCode(string $customCode): self
    {
        $obj = clone $this;
        $obj['customCode'] = $customCode;

        return $obj;
    }

    /**
     * The integration that triggered the verification.
     *
     * @param Integration|value-of<Integration> $integration
     */
    public function withIntegration(Integration|string $integration): self
    {
        $obj = clone $this;
        $obj['integration'] = $integration;

        return $obj;
    }

    /**
     * A BCP-47 formatted locale string with the language the text message will be sent to. If there's no locale set, the language will be determined by the country code of the phone number. If the language specified doesn't exist, it defaults to US English.
     */
    public function withLocale(string $locale): self
    {
        $obj = clone $this;
        $obj['locale'] = $locale;

        return $obj;
    }

    /**
     * The method used for verifying this phone number. The 'voice' option provides an accessible alternative for visually impaired users by delivering the verification code through a phone call rather than a text message. It also allows verification of landline numbers that cannot receive SMS messages. The 'message' option explicitly requests message delivery (SMS, WhatsApp ...) and skips silent verification, useful for scenarios requiring direct user interaction.
     *
     * @param Method|value-of<Method> $method
     */
    public function withMethod(Method|string $method): self
    {
        $obj = clone $this;
        $obj['method'] = $method;

        return $obj;
    }

    /**
     * The preferred channel to be used in priority for verification.
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
     * The Sender ID to use for this message. The Sender ID needs to be enabled by Prelude.
     */
    public function withSenderID(string $senderID): self
    {
        $obj = clone $this;
        $obj['senderID'] = $senderID;

        return $obj;
    }

    /**
     * The identifier of a verification template. It applies use case-specific settings, such as the message content or certain verification parameters.
     */
    public function withTemplateID(string $templateID): self
    {
        $obj = clone $this;
        $obj['templateID'] = $templateID;

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
