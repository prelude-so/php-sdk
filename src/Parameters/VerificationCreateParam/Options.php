<?php

declare(strict_types=1);

namespace Prelude\Parameters\VerificationCreateParam;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\Conversion\MapOf;
use Prelude\Parameters\VerificationCreateParam\Options\AppRealm;
use Prelude\Parameters\VerificationCreateParam\Options\Method;
use Prelude\Parameters\VerificationCreateParam\Options\PreferredChannel;

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
    #[Api(optional: true)]
    public ?string $method;

    /**
     * The preferred channel to be used in priority for verification.
     *
     * @var null|PreferredChannel::* $preferredChannel
     */
    #[Api('preferred_channel', optional: true)]
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

    /**
     * You must use named parameters to construct this object.
     *
     * @param null|Method::*             $method
     * @param null|PreferredChannel::*   $preferredChannel
     * @param null|array<string, string> $variables
     */
    final public function __construct(
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
    ) {
        self::introspect();
        $this->unsetOptionalProperties();

        null !== $appRealm && $this->appRealm = $appRealm;
        null !== $callbackURL && $this->callbackURL = $callbackURL;
        null !== $codeSize && $this->codeSize = $codeSize;
        null !== $customCode && $this->customCode = $customCode;
        null !== $locale && $this->locale = $locale;
        null !== $method && $this->method = $method;
        null !== $preferredChannel && $this->preferredChannel = $preferredChannel;
        null !== $senderID && $this->senderID = $senderID;
        null !== $templateID && $this->templateID = $templateID;
        null !== $variables && $this->variables = $variables;
    }
}
