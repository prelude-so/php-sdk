<?php

declare(strict_types=1);

namespace Prelude\Verification\VerificationCreateParams\Options;

use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Verification\VerificationCreateParams\Options\AppRealm\Platform;

/**
 * This allows automatic OTP retrieval on mobile apps and web browsers. Supported platforms are Android (SMS Retriever API) and Web (WebOTP API).
 *
 * @phpstan-type AppRealmShape = array{
 *   platform: Platform|value-of<Platform>, value: string
 * }
 */
final class AppRealm implements BaseModel
{
    /** @use SdkModel<AppRealmShape> */
    use SdkModel;

    /**
     * The platform for automatic OTP retrieval. Use "android" for the SMS Retriever API or "web" for the WebOTP API.
     *
     * @var value-of<Platform> $platform
     */
    #[Required(enum: Platform::class)]
    public string $platform;

    /**
     * The value depends on the platform:
     * - For Android: The SMS Retriever API hash code (11 characters). See [Google documentation](https://developers.google.com/identity/sms-retriever/verify#computing_your_apps_hash_string).
     * - For Web: The origin domain (e.g., "example.com" or "www.example.com"). See [WebOTP API documentation](https://developer.mozilla.org/en-US/docs/Web/API/WebOTP_API).
     */
    #[Required]
    public string $value;

    /**
     * `new AppRealm()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AppRealm::with(platform: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AppRealm)->withPlatform(...)->withValue(...)
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
     * @param Platform|value-of<Platform> $platform
     */
    public static function with(Platform|string $platform, string $value): self
    {
        $self = new self;

        $self['platform'] = $platform;
        $self['value'] = $value;

        return $self;
    }

    /**
     * The platform for automatic OTP retrieval. Use "android" for the SMS Retriever API or "web" for the WebOTP API.
     *
     * @param Platform|value-of<Platform> $platform
     */
    public function withPlatform(Platform|string $platform): self
    {
        $self = clone $this;
        $self['platform'] = $platform;

        return $self;
    }

    /**
     * The value depends on the platform:
     * - For Android: The SMS Retriever API hash code (11 characters). See [Google documentation](https://developers.google.com/identity/sms-retriever/verify#computing_your_apps_hash_string).
     * - For Web: The origin domain (e.g., "example.com" or "www.example.com"). See [WebOTP API documentation](https://developer.mozilla.org/en-US/docs/Web/API/WebOTP_API).
     */
    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
