<?php

declare(strict_types=1);

namespace Prelude\Watch\WatchSendFeedbacksParams\Feedback;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Watch\WatchSendFeedbacksParams\Feedback\Signals\DevicePlatform;

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
    public static function from(
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
    public function setAppVersion(string $appVersion): self
    {
        $this->appVersion = $appVersion;

        return $this;
    }

    /**
     * The unique identifier for the user's device. For Android, this corresponds to the `ANDROID_ID` and for iOS, this corresponds to the `identifierForVendor`.
     */
    public function setDeviceID(string $deviceID): self
    {
        $this->deviceID = $deviceID;

        return $this;
    }

    /**
     * The model of the user's device.
     */
    public function setDeviceModel(string $deviceModel): self
    {
        $this->deviceModel = $deviceModel;

        return $this;
    }

    /**
     * The type of the user's device.
     *
     * @param DevicePlatform::* $devicePlatform
     */
    public function setDevicePlatform(string $devicePlatform): self
    {
        $this->devicePlatform = $devicePlatform;

        return $this;
    }

    /**
     * The IP address of the user's device.
     */
    public function setIP(string $ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * This signal should provide a higher level of trust, indicating that the user is genuine. Contact us to discuss your use case. For more details, refer to [Signals](/verify/v2/documentation/prevent-fraud#signals).
     */
    public function setIsTrustedUser(bool $isTrustedUser): self
    {
        $this->isTrustedUser = $isTrustedUser;

        return $this;
    }

    /**
     * The version of the user's device operating system.
     */
    public function setOsVersion(string $osVersion): self
    {
        $this->osVersion = $osVersion;

        return $this;
    }

    /**
     * The user agent of the user's device. If the individual fields (os_version, device_platform, device_model) are provided, we will prioritize those values instead of parsing them from the user agent string.
     */
    public function setUserAgent(string $userAgent): self
    {
        $this->userAgent = $userAgent;

        return $this;
    }
}
