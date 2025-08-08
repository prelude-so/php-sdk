<?php

declare(strict_types=1);

namespace Prelude\Models\VerificationCreateParams;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\Conversion\MapOf;
use Prelude\Models\VerificationCreateParams\Options\AppRealm;
use Prelude\Models\VerificationCreateParams\Options\Method;
use Prelude\Models\VerificationCreateParams\Options\PreferredChannel;

/**
 * Verification options.
 *
 * @phpstan-type options_alias = array{
 *   appRealm?: AppRealm,
 *   callbackURL?: string,
 *   codeSize?: int,
 *   customCode?: string,
 *   locale?: string,
 *   method?: Method::*,
 *   preferredChannel?: PreferredChannel::*,
 *   senderID?: string,
 *   templateID?: string,
 *   variables?: array<string, string>,
 * }
 */
final class Options implements BaseModel
{
    use Model;

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
     * @var null|Method::* $method
     */
    #[Api(enum: Method::class, optional: true)]
    public ?string $method;

    /**
     * The preferred channel to be used in priority for verification.
     *
     * @var null|PreferredChannel::* $preferredChannel
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
     * @var null|array<string, string> $variables
     */
    #[Api(type: new MapOf('string'), optional: true)]
    public ?array $variables;

    public function __construct()
    {
        self::introspect();
        $this->unsetOptionalProperties();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param null|Method::* $method
     * @param null|PreferredChannel::* $preferredChannel
     * @param null|array<string, string> $variables
     */
    public static function new(
        ?AppRealm $appRealm = null,
        ?string $callbackURL = null,
        ?int $codeSize = null,
        ?string $customCode = null,
        ?string $locale = null,
        ?string $method = null,
        ?string $preferredChannel = null,
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
        null !== $method && $obj->method = $method;
        null !== $preferredChannel && $obj->preferredChannel = $preferredChannel;
        null !== $senderID && $obj->senderID = $senderID;
        null !== $templateID && $obj->templateID = $templateID;
        null !== $variables && $obj->variables = $variables;

        return $obj;
    }

    /**
     * This allows you to automatically retrieve and fill the OTP code on mobile apps. Currently only Android devices are supported.
     */
    public function setAppRealm(AppRealm $appRealm): self
    {
        $this->appRealm = $appRealm;

        return $this;
    }

    /**
     * The URL where webhooks will be sent when verification events occur, including verification creation, attempt creation, and delivery status changes. For more details, refer to [Webhook](/verify/v2/documentation/webhook).
     */
    public function setCallbackURL(string $callbackURL): self
    {
        $this->callbackURL = $callbackURL;

        return $this;
    }

    /**
     * The size of the code generated. It should be between 4 and 8. Defaults to the code size specified from the Dashboard.
     */
    public function setCodeSize(int $codeSize): self
    {
        $this->codeSize = $codeSize;

        return $this;
    }

    /**
     * The custom code to use for OTP verification. To use the custom code feature, contact us to enable it for your account. For more details, refer to [Custom Code](/verify/v2/documentation/custom-codes).
     */
    public function setCustomCode(string $customCode): self
    {
        $this->customCode = $customCode;

        return $this;
    }

    /**
     * A BCP-47 formatted locale string with the language the text message will be sent to. If there's no locale set, the language will be determined by the country code of the phone number. If the language specified doesn't exist, it defaults to US English.
     */
    public function setLocale(string $locale): self
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * The method used for verifying this phone number. The 'voice' option provides an accessible alternative for visually impaired users by delivering the verification code through a phone call rather than a text message. It also allows verification of landline numbers that cannot receive SMS messages.
     *
     * @param Method::* $method
     */
    public function setMethod(string $method): self
    {
        $this->method = $method;

        return $this;
    }

    /**
     * The preferred channel to be used in priority for verification.
     *
     * @param PreferredChannel::* $preferredChannel
     */
    public function setPreferredChannel(string $preferredChannel): self
    {
        $this->preferredChannel = $preferredChannel;

        return $this;
    }

    /**
     * The Sender ID to use for this message. The Sender ID needs to be enabled by Prelude.
     */
    public function setSenderID(string $senderID): self
    {
        $this->senderID = $senderID;

        return $this;
    }

    /**
     * The identifier of a verification template. It applies use case-specific settings, such as the message content or certain verification parameters.
     */
    public function setTemplateID(string $templateID): self
    {
        $this->templateID = $templateID;

        return $this;
    }

    /**
     * The variables to be replaced in the template.
     *
     * @param array<string, string> $variables
     */
    public function setVariables(array $variables): self
    {
        $this->variables = $variables;

        return $this;
    }
}
