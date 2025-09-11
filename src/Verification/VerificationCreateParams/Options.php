<?php

declare(strict_types=1);

namespace Prelude\Verification\VerificationCreateParams;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Verification\VerificationCreateParams\Options\AppRealm;
use Prelude\Verification\VerificationCreateParams\Options\Method;
use Prelude\Verification\VerificationCreateParams\Options\PreferredChannel;

/**
 * Verification options.
 *
 * @phpstan-type options_alias = array{
 *   appRealm?: AppRealm|null,
 *   callbackURL?: string|null,
 *   codeSize?: int|null,
 *   customCode?: string|null,
 *   locale?: string|null,
 *   method?: value-of<Method>|null,
 *   preferredChannel?: value-of<PreferredChannel>|null,
 *   senderID?: string|null,
 *   templateID?: string|null,
 *   variables?: array<string, string>|null,
 * }
 */
final class Options implements BaseModel
{
    /** @use SdkModel<options_alias> */
    use SdkModel;

    /**
     * This allows you to automatically retrieve and fill the OTP code on mobile apps. Currently only Android devices are supported.
     */
    #[Api('app_realm', optional: true)]
    public ?AppRealm $appRealm;

    /**
     * The URL where webhooks will be sent when verification events occur, including verification creation, attempt creation, and delivery status changes. For more details, refer to [Webhook](/verify/v2/documentation/webhook).
     */
    #[Api('callback_url', optional: true)]
    public ?string $callbackURL;

    /**
     * The size of the code generated. It should be between 4 and 8. Defaults to the code size specified from the Dashboard.
     */
    #[Api('code_size', optional: true)]
    public ?int $codeSize;

    /**
     * The custom code to use for OTP verification. To use the custom code feature, contact us to enable it for your account. For more details, refer to [Custom Code](/verify/v2/documentation/custom-codes).
     */
    #[Api('custom_code', optional: true)]
    public ?string $customCode;

    /**
     * A BCP-47 formatted locale string with the language the text message will be sent to. If there's no locale set, the language will be determined by the country code of the phone number. If the language specified doesn't exist, it defaults to US English.
     */
    #[Api(optional: true)]
    public ?string $locale;

    /**
     * The method used for verifying this phone number. The 'voice' option provides an accessible alternative for visually impaired users by delivering the verification code through a phone call rather than a text message. It also allows verification of landline numbers that cannot receive SMS messages.
     *
     * @var value-of<Method>|null $method
     */
    #[Api(enum: Method::class, optional: true)]
    public ?string $method;

    /**
     * The preferred channel to be used in priority for verification.
     *
     * @var value-of<PreferredChannel>|null $preferredChannel
     */
    #[Api('preferred_channel', enum: PreferredChannel::class, optional: true)]
    public ?string $preferredChannel;

    /**
     * The Sender ID to use for this message. The Sender ID needs to be enabled by Prelude.
     */
    #[Api('sender_id', optional: true)]
    public ?string $senderID;

    /**
     * The identifier of a verification template. It applies use case-specific settings, such as the message content or certain verification parameters.
     */
    #[Api('template_id', optional: true)]
    public ?string $templateID;

    /**
     * The variables to be replaced in the template.
     *
     * @var array<string, string>|null $variables
     */
    #[Api(map: 'string', optional: true)]
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
     * @param Method|value-of<Method> $method
     * @param PreferredChannel|value-of<PreferredChannel> $preferredChannel
     * @param array<string, string> $variables
     */
    public static function with(
        ?AppRealm $appRealm = null,
        ?string $callbackURL = null,
        ?int $codeSize = null,
        ?string $customCode = null,
        ?string $locale = null,
        Method|string|null $method = null,
        PreferredChannel|string|null $preferredChannel = null,
        ?string $senderID = null,
        ?string $templateID = null,
        ?array $variables = null,
    ): self {
        $obj = new self;

        null !== $appRealm && $obj->appRealm = $appRealm;
        null !== $callbackURL && $obj->callbackURL = $callbackURL;
        null !== $codeSize && $obj->codeSize = $codeSize;
        null !== $customCode && $obj->customCode = $customCode;
        null !== $locale && $obj->locale = $locale;
        null !== $method && $obj->method = $method instanceof Method ? $method->value : $method;
        null !== $preferredChannel && $obj->preferredChannel = $preferredChannel instanceof PreferredChannel ? $preferredChannel->value : $preferredChannel;
        null !== $senderID && $obj->senderID = $senderID;
        null !== $templateID && $obj->templateID = $templateID;
        null !== $variables && $obj->variables = $variables;

        return $obj;
    }

    /**
     * This allows you to automatically retrieve and fill the OTP code on mobile apps. Currently only Android devices are supported.
     */
    public function withAppRealm(AppRealm $appRealm): self
    {
        $obj = clone $this;
        $obj->appRealm = $appRealm;

        return $obj;
    }

    /**
     * The URL where webhooks will be sent when verification events occur, including verification creation, attempt creation, and delivery status changes. For more details, refer to [Webhook](/verify/v2/documentation/webhook).
     */
    public function withCallbackURL(string $callbackURL): self
    {
        $obj = clone $this;
        $obj->callbackURL = $callbackURL;

        return $obj;
    }

    /**
     * The size of the code generated. It should be between 4 and 8. Defaults to the code size specified from the Dashboard.
     */
    public function withCodeSize(int $codeSize): self
    {
        $obj = clone $this;
        $obj->codeSize = $codeSize;

        return $obj;
    }

    /**
     * The custom code to use for OTP verification. To use the custom code feature, contact us to enable it for your account. For more details, refer to [Custom Code](/verify/v2/documentation/custom-codes).
     */
    public function withCustomCode(string $customCode): self
    {
        $obj = clone $this;
        $obj->customCode = $customCode;

        return $obj;
    }

    /**
     * A BCP-47 formatted locale string with the language the text message will be sent to. If there's no locale set, the language will be determined by the country code of the phone number. If the language specified doesn't exist, it defaults to US English.
     */
    public function withLocale(string $locale): self
    {
        $obj = clone $this;
        $obj->locale = $locale;

        return $obj;
    }

    /**
     * The method used for verifying this phone number. The 'voice' option provides an accessible alternative for visually impaired users by delivering the verification code through a phone call rather than a text message. It also allows verification of landline numbers that cannot receive SMS messages.
     *
     * @param Method|value-of<Method> $method
     */
    public function withMethod(Method|string $method): self
    {
        $obj = clone $this;
        $obj->method = $method instanceof Method ? $method->value : $method;

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
        $obj->preferredChannel = $preferredChannel instanceof PreferredChannel ? $preferredChannel->value : $preferredChannel;

        return $obj;
    }

    /**
     * The Sender ID to use for this message. The Sender ID needs to be enabled by Prelude.
     */
    public function withSenderID(string $senderID): self
    {
        $obj = clone $this;
        $obj->senderID = $senderID;

        return $obj;
    }

    /**
     * The identifier of a verification template. It applies use case-specific settings, such as the message content or certain verification parameters.
     */
    public function withTemplateID(string $templateID): self
    {
        $obj = clone $this;
        $obj->templateID = $templateID;

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
