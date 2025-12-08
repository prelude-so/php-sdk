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
 *   app_realm?: AppRealm|null,
 *   callback_url?: string|null,
 *   code_size?: int|null,
 *   custom_code?: string|null,
 *   integration?: value-of<Integration>|null,
 *   locale?: string|null,
 *   method?: value-of<Method>|null,
 *   preferred_channel?: value-of<PreferredChannel>|null,
 *   sender_id?: string|null,
 *   template_id?: string|null,
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
    #[Optional]
    public ?AppRealm $app_realm;

    /**
     * The URL where webhooks will be sent when verification events occur, including verification creation, attempt creation, and delivery status changes. For more details, refer to [Webhook](/verify/v2/documentation/webhook).
     */
    #[Optional]
    public ?string $callback_url;

    /**
     * The size of the code generated. It should be between 4 and 8. Defaults to the code size specified from the Dashboard.
     */
    #[Optional]
    public ?int $code_size;

    /**
     * The custom code to use for OTP verification. To use the custom code feature, contact us to enable it for your account. For more details, refer to [Custom Code](/verify/v2/documentation/custom-codes).
     */
    #[Optional]
    public ?string $custom_code;

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
     * @var value-of<PreferredChannel>|null $preferred_channel
     */
    #[Optional(enum: PreferredChannel::class)]
    public ?string $preferred_channel;

    /**
     * The Sender ID to use for this message. The Sender ID needs to be enabled by Prelude.
     */
    #[Optional]
    public ?string $sender_id;

    /**
     * The identifier of a verification template. It applies use case-specific settings, such as the message content or certain verification parameters.
     */
    #[Optional]
    public ?string $template_id;

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
     * @param AppRealm|array{platform: value-of<Platform>, value: string} $app_realm
     * @param Integration|value-of<Integration> $integration
     * @param Method|value-of<Method> $method
     * @param PreferredChannel|value-of<PreferredChannel> $preferred_channel
     * @param array<string,string> $variables
     */
    public static function with(
        AppRealm|array|null $app_realm = null,
        ?string $callback_url = null,
        ?int $code_size = null,
        ?string $custom_code = null,
        Integration|string|null $integration = null,
        ?string $locale = null,
        Method|string|null $method = null,
        PreferredChannel|string|null $preferred_channel = null,
        ?string $sender_id = null,
        ?string $template_id = null,
        ?array $variables = null,
    ): self {
        $obj = new self;

        null !== $app_realm && $obj['app_realm'] = $app_realm;
        null !== $callback_url && $obj['callback_url'] = $callback_url;
        null !== $code_size && $obj['code_size'] = $code_size;
        null !== $custom_code && $obj['custom_code'] = $custom_code;
        null !== $integration && $obj['integration'] = $integration;
        null !== $locale && $obj['locale'] = $locale;
        null !== $method && $obj['method'] = $method;
        null !== $preferred_channel && $obj['preferred_channel'] = $preferred_channel;
        null !== $sender_id && $obj['sender_id'] = $sender_id;
        null !== $template_id && $obj['template_id'] = $template_id;
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
        $obj['app_realm'] = $appRealm;

        return $obj;
    }

    /**
     * The URL where webhooks will be sent when verification events occur, including verification creation, attempt creation, and delivery status changes. For more details, refer to [Webhook](/verify/v2/documentation/webhook).
     */
    public function withCallbackURL(string $callbackURL): self
    {
        $obj = clone $this;
        $obj['callback_url'] = $callbackURL;

        return $obj;
    }

    /**
     * The size of the code generated. It should be between 4 and 8. Defaults to the code size specified from the Dashboard.
     */
    public function withCodeSize(int $codeSize): self
    {
        $obj = clone $this;
        $obj['code_size'] = $codeSize;

        return $obj;
    }

    /**
     * The custom code to use for OTP verification. To use the custom code feature, contact us to enable it for your account. For more details, refer to [Custom Code](/verify/v2/documentation/custom-codes).
     */
    public function withCustomCode(string $customCode): self
    {
        $obj = clone $this;
        $obj['custom_code'] = $customCode;

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
        $obj['preferred_channel'] = $preferredChannel;

        return $obj;
    }

    /**
     * The Sender ID to use for this message. The Sender ID needs to be enabled by Prelude.
     */
    public function withSenderID(string $senderID): self
    {
        $obj = clone $this;
        $obj['sender_id'] = $senderID;

        return $obj;
    }

    /**
     * The identifier of a verification template. It applies use case-specific settings, such as the message content or certain verification parameters.
     */
    public function withTemplateID(string $templateID): self
    {
        $obj = clone $this;
        $obj['template_id'] = $templateID;

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
