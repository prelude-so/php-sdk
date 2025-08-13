<?php

declare(strict_types=1);

namespace Prelude\Verification\VerificationCreateParams\Options;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Verification\VerificationCreateParams\Options\AppRealm\Platform;

/**
 * This allows you to automatically retrieve and fill the OTP code on mobile apps. Currently only Android devices are supported.
 *
 * @phpstan-type app_realm_alias = array{platform: Platform::*, value: string}
 */
final class AppRealm implements BaseModel
{
    use Model;

    /**
     * The platform the SMS will be sent to. We are currently only supporting "android".
     *
     * @var Platform::* $platform
     */
    #[Api(enum: Platform::class)]
    public string $platform;

    /**
     * The Android SMS Retriever API hash code that identifies your app.
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
        self::introspect();
        $this->unsetOptionalProperties();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Platform::* $platform
     */
    public static function with(string $platform, string $value): self
    {
        $obj = new self;

        $obj->platform = $platform;
        $obj->value = $value;

        return $obj;
    }

    /**
     * The platform the SMS will be sent to. We are currently only supporting "android".
     *
     * @param Platform::* $platform
     */
    public function withPlatform(string $platform): self
    {
        $obj = clone $this;
        $obj->platform = $platform;

        return $obj;
    }

    /**
     * The Android SMS Retriever API hash code that identifies your app.
     */
    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }
}
