<?php

declare(strict_types=1);

namespace Prelude\Watch\WatchSendFeedbacksParams\Feedback;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Watch\WatchSendFeedbacksParams\Feedback\Signals\DevicePlatform;

/**
 * The signals used for anti-fraud. For more details, refer to [Signals](/verify/v2/documentation/prevent-fraud#signals).
 *
 * @phpstan-type SignalsShape = array{
 *   app_version?: string|null,
 *   device_id?: string|null,
 *   device_model?: string|null,
 *   device_platform?: value-of<DevicePlatform>|null,
 *   ip?: string|null,
 *   is_trusted_user?: bool|null,
 *   ja4_fingerprint?: string|null,
 *   os_version?: string|null,
 *   user_agent?: string|null,
 * }
 */
final class Signals implements BaseModel
{
    /** @use SdkModel<SignalsShape> */
    use SdkModel;

    /**
     * The version of your application.
     */
    #[Api(optional: true)]
    public ?string $app_version;

    /**
     * The unique identifier for the user's device. For Android, this corresponds to the `ANDROID_ID` and for iOS, this corresponds to the `identifierForVendor`.
     */
    #[Api(optional: true)]
    public ?string $device_id;

    /**
     * The model of the user's device.
     */
    #[Api(optional: true)]
    public ?string $device_model;

    /**
     * The type of the user's device.
     *
     * @var value-of<DevicePlatform>|null $device_platform
     */
    #[Api(enum: DevicePlatform::class, optional: true)]
    public ?string $device_platform;

    /**
     * The IP address of the user's device.
     */
    #[Api(optional: true)]
    public ?string $ip;

    /**
     * This signal should provide a higher level of trust, indicating that the user is genuine. Contact us to discuss your use case. For more details, refer to [Signals](/verify/v2/documentation/prevent-fraud#signals).
     */
    #[Api(optional: true)]
    public ?bool $is_trusted_user;

    /**
     * The JA4 fingerprint observed for the connection. Prelude will infer it automatically when requests go through our client SDK (which uses Prelude's edge), but you can also provide it explicitly if you terminate TLS yourself.
     */
    #[Api(optional: true)]
    public ?string $ja4_fingerprint;

    /**
     * The version of the user's device operating system.
     */
    #[Api(optional: true)]
    public ?string $os_version;

    /**
     * The user agent of the user's device. If the individual fields (os_version, device_platform, device_model) are provided, we will prioritize those values instead of parsing them from the user agent string.
     */
    #[Api(optional: true)]
    public ?string $user_agent;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param DevicePlatform|value-of<DevicePlatform> $device_platform
     */
    public static function with(
        ?string $app_version = null,
        ?string $device_id = null,
        ?string $device_model = null,
        DevicePlatform|string|null $device_platform = null,
        ?string $ip = null,
        ?bool $is_trusted_user = null,
        ?string $ja4_fingerprint = null,
        ?string $os_version = null,
        ?string $user_agent = null,
    ): self {
        $obj = new self;

        null !== $app_version && $obj->app_version = $app_version;
        null !== $device_id && $obj->device_id = $device_id;
        null !== $device_model && $obj->device_model = $device_model;
        null !== $device_platform && $obj['device_platform'] = $device_platform;
        null !== $ip && $obj->ip = $ip;
        null !== $is_trusted_user && $obj->is_trusted_user = $is_trusted_user;
        null !== $ja4_fingerprint && $obj->ja4_fingerprint = $ja4_fingerprint;
        null !== $os_version && $obj->os_version = $os_version;
        null !== $user_agent && $obj->user_agent = $user_agent;

        return $obj;
    }

    /**
     * The version of your application.
     */
    public function withAppVersion(string $appVersion): self
    {
        $obj = clone $this;
        $obj->app_version = $appVersion;

        return $obj;
    }

    /**
     * The unique identifier for the user's device. For Android, this corresponds to the `ANDROID_ID` and for iOS, this corresponds to the `identifierForVendor`.
     */
    public function withDeviceID(string $deviceID): self
    {
        $obj = clone $this;
        $obj->device_id = $deviceID;

        return $obj;
    }

    /**
     * The model of the user's device.
     */
    public function withDeviceModel(string $deviceModel): self
    {
        $obj = clone $this;
        $obj->device_model = $deviceModel;

        return $obj;
    }

    /**
     * The type of the user's device.
     *
     * @param DevicePlatform|value-of<DevicePlatform> $devicePlatform
     */
    public function withDevicePlatform(
        DevicePlatform|string $devicePlatform
    ): self {
        $obj = clone $this;
        $obj['device_platform'] = $devicePlatform;

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
        $obj->is_trusted_user = $isTrustedUser;

        return $obj;
    }

    /**
     * The JA4 fingerprint observed for the connection. Prelude will infer it automatically when requests go through our client SDK (which uses Prelude's edge), but you can also provide it explicitly if you terminate TLS yourself.
     */
    public function withJa4Fingerprint(string $ja4Fingerprint): self
    {
        $obj = clone $this;
        $obj->ja4_fingerprint = $ja4Fingerprint;

        return $obj;
    }

    /**
     * The version of the user's device operating system.
     */
    public function withOsVersion(string $osVersion): self
    {
        $obj = clone $this;
        $obj->os_version = $osVersion;

        return $obj;
    }

    /**
     * The user agent of the user's device. If the individual fields (os_version, device_platform, device_model) are provided, we will prioritize those values instead of parsing them from the user agent string.
     */
    public function withUserAgent(string $userAgent): self
    {
        $obj = clone $this;
        $obj->user_agent = $userAgent;

        return $obj;
    }
}
