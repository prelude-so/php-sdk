<?php

declare(strict_types=1);

namespace Prelude\Verification\VerificationCreateParams;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Verification\VerificationCreateParams\Signals\DevicePlatform;

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
     * @param null|DevicePlatform::* $devicePlatform
     */
    public static function with(
        ?string $appVersion = null,
        ?string $deviceID = null,
        ?string $deviceModel = null,
        ?string $devicePlatform = null,
        ?string $ip = null,
        ?bool $isTrustedUser = null,
        ?string $osVersion = null,
        ?string $userAgent = null,
    ): self {
        $obj = new self;

        null !== $appVersion && $obj->appVersion = $appVersion;
        null !== $deviceID && $obj->deviceID = $deviceID;
        null !== $deviceModel && $obj->deviceModel = $deviceModel;
        null !== $devicePlatform && $obj->devicePlatform = $devicePlatform;
        null !== $ip && $obj->ip = $ip;
        null !== $isTrustedUser && $obj->isTrustedUser = $isTrustedUser;
        null !== $osVersion && $obj->osVersion = $osVersion;
        null !== $userAgent && $obj->userAgent = $userAgent;

        return $obj;
    }

    /**
     * The version of your application.
     */
    public function withAppVersion(string $appVersion): self
    {
        $obj = clone $this;
        $obj->appVersion = $appVersion;

        return $obj;
    }

    /**
     * The unique identifier for the user's device. For Android, this corresponds to the `ANDROID_ID` and for iOS, this corresponds to the `identifierForVendor`.
     */
    public function withDeviceID(string $deviceID): self
    {
        $obj = clone $this;
        $obj->deviceID = $deviceID;

        return $obj;
    }

    /**
     * The model of the user's device.
     */
    public function withDeviceModel(string $deviceModel): self
    {
        $obj = clone $this;
        $obj->deviceModel = $deviceModel;

        return $obj;
    }

    /**
     * The type of the user's device.
     *
     * @param DevicePlatform::* $devicePlatform
     */
    public function withDevicePlatform(string $devicePlatform): self
    {
        $obj = clone $this;
        $obj->devicePlatform = $devicePlatform;

        return $obj;
    }

    /**
     * The IP address of the user's device.
     */
    public function withIP(string $ip): self
    {
        $obj = clone $this;
        $obj->ip = $ip;

        return $obj;
    }

    /**
     * This signal should provide a higher level of trust, indicating that the user is genuine. Contact us to discuss your use case. For more details, refer to [Signals](/verify/v2/documentation/prevent-fraud#signals).
     */
    public function withIsTrustedUser(bool $isTrustedUser): self
    {
        $obj = clone $this;
        $obj->isTrustedUser = $isTrustedUser;

        return $obj;
    }

    /**
     * The version of the user's device operating system.
     */
    public function withOsVersion(string $osVersion): self
    {
        $obj = clone $this;
        $obj->osVersion = $osVersion;

        return $obj;
    }

    /**
     * The user agent of the user's device. If the individual fields (os_version, device_platform, device_model) are provided, we will prioritize those values instead of parsing them from the user agent string.
     */
    public function withUserAgent(string $userAgent): self
    {
        $obj = clone $this;
        $obj->userAgent = $userAgent;

        return $obj;
    }
}
