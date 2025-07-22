<?php

declare(strict_types=1);

namespace Prelude\Parameters\VerificationCreateParam\Options;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Parameters\VerificationCreateParam\Options\AppRealm\Platform;

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
     * You must use named parameters to construct this object.
     *
     * @param Platform::* $platform
     */
    final public function __construct(string $platform, string $value)
    {
        self::introspect();

        $this->platform = $platform;
        $this->value = $value;
    }
}
