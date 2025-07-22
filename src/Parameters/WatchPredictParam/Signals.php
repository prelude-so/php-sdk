<?php

declare(strict_types=1);

namespace Prelude\Parameters\WatchPredictParam;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Parameters\WatchPredictParam\Signals\DevicePlatform;

/**
 * The signals used for anti-fraud. For more details, refer to [Signals](/verify/v2/documentation/prevent-fraud#signals).
 *
 * @phpstan-type signals_alias = array{
 *   appVersion?: string,
 *   deviceID?: string,
 *   deviceModel?: string,
 *   devicePlatform?: DevicePlatform::*,
 *   ip?: string,
 *   isTrustedUser?: bool,
 *   osVersion?: string,
 *   userAgent?: string,
 * }
 */
final class Signals implements BaseModel
{
    use Model;

    /**
     * The version of your application.
     */
    #[Api('app_version', optional: true)]
    public ?string $appVersion;

    /**
     * The unique identifier for the user's device. For Android, this corresponds to the `ANDROID_ID` and for iOS, this corresponds to the `identifierForVendor`.
     */
    #[Api('device_id', optional: true)]
    public ?string $deviceID;

    /**
     * The model of the user's device.
     */
    #[Api('device_model', optional: true)]
    public ?string $deviceModel;

    /**
     * The type of the user's device.
     *
     * @var null|DevicePlatform::* $devicePlatform
     */
    #[Api('device_platform', enum: DevicePlatform::class, optional: true)]
    public ?string $devicePlatform;

    /**
     * The IP address of the user's device.
     */
    #[Api(optional: true)]
    public ?string $ip;

    /**
     * This signal should provide a higher level of trust, indicating that the user is genuine. Contact us to discuss your use case. For more details, refer to [Signals](/verify/v2/documentation/prevent-fraud#signals).
     */
    #[Api('is_trusted_user', optional: true)]
    public ?bool $isTrustedUser;

    /**
     * The version of the user's device operating system.
     */
    #[Api('os_version', optional: true)]
    public ?string $osVersion;

    /**
     * The user agent of the user's device. If the individual fields (os_version, device_platform, device_model) are provided, we will prioritize those values instead of parsing them from the user agent string.
     */
    #[Api('user_agent', optional: true)]
    public ?string $userAgent;

    /**
     * You must use named parameters to construct this object.
     *
     * @param null|DevicePlatform::* $devicePlatform
     */
    final public function __construct(
        ?string $appVersion = null,
        ?string $deviceID = null,
        ?string $deviceModel = null,
        ?string $devicePlatform = null,
        ?string $ip = null,
        ?bool $isTrustedUser = null,
        ?string $osVersion = null,
        ?string $userAgent = null,
    ) {
        self::introspect();
        $this->unsetOptionalProperties();

        null !== $appVersion && $this->appVersion = $appVersion;
        null !== $deviceID && $this->deviceID = $deviceID;
        null !== $deviceModel && $this->deviceModel = $deviceModel;
        null !== $devicePlatform && $this->devicePlatform = $devicePlatform;
        null !== $ip && $this->ip = $ip;
        null !== $isTrustedUser && $this->isTrustedUser = $isTrustedUser;
        null !== $osVersion && $this->osVersion = $osVersion;
        null !== $userAgent && $this->userAgent = $userAgent;
    }
}
