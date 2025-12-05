<?php

declare(strict_types=1);

namespace Prelude\Verification\VerificationCreateParams\Options;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Verification\VerificationCreateParams\Options\AppRealm\Platform;

/**
 * This allows you to automatically retrieve and fill the OTP code on mobile apps. Currently only Android devices are supported.
 *
 * @phpstan-type AppRealmShape = array{platform: value-of<Platform>, value: string}
 */
final class AppRealm implements BaseModel
{
    /** @use SdkModel<AppRealmShape> */
    use SdkModel;

    /**
     * The platform the SMS will be sent to. We are currently only supporting "android".
     *
     * @var value-of<Platform> $platform
     */
    #[Api(enum: Platform::class)]
    public string $platform;

    /**
     * The Android SMS Retriever API hash code that identifies your app.
     * For more information, see [Google documentation](https://developers.google.com/identity/sms-retriever/verify#computing_your_apps_hash_string).
     */
    #[Api]
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
        $obj = new self;

        $obj['platform'] = $platform;
        $obj['value'] = $value;

        return $obj;
    }

    /**
     * The platform the SMS will be sent to. We are currently only supporting "android".
     *
     * @param Platform|value-of<Platform> $platform
     */
    public function withPlatform(Platform|string $platform): self
    {
        $obj = clone $this;
        $obj['platform'] = $platform;

        return $obj;
    }

    /**
     * The Android SMS Retriever API hash code that identifies your app.
     * For more information, see [Google documentation](https://developers.google.com/identity/sms-retriever/verify#computing_your_apps_hash_string).
     */
    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj['value'] = $value;

        return $obj;
    }
}
