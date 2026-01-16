<?php

declare(strict_types=1);

namespace Prelude\Watch\WatchSendFeedbacksParams\Feedback;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Watch\WatchSendFeedbacksParams\Feedback\Signals\DevicePlatform;

/**
 * The signals used for anti-fraud. For more details, refer to [Signals](/verify/v2/documentation/prevent-fraud#signals).
 *
 * @phpstan-type SignalsShape = array{
 *   appVersion?: string|null,
 *   deviceID?: string|null,
 *   deviceModel?: string|null,
 *   devicePlatform?: null|DevicePlatform|value-of<DevicePlatform>,
 *   ip?: string|null,
 *   isTrustedUser?: bool|null,
 *   ja4Fingerprint?: string|null,
 *   osVersion?: string|null,
 *   userAgent?: string|null,
 * }
 */
final class Signals implements BaseModel
{
    /** @use SdkModel<SignalsShape> */
    use SdkModel;

    /**
     * The version of your application.
     */
    #[Optional('app_version')]
    public ?string $appVersion;

    /**
     * A unique ID for the user's device. You should ensure that each user device has a unique `device_id` value. Ideally, for Android, this corresponds to the `ANDROID_ID` and for iOS, this corresponds to the `identifierForVendor`.
     */
    #[Optional('device_id')]
    public ?string $deviceID;

    /**
     * The model of the user's device.
     */
    #[Optional('device_model')]
    public ?string $deviceModel;

    /**
     * The type of the user's device.
     *
     * @var value-of<DevicePlatform>|null $devicePlatform
     */
    #[Optional('device_platform', enum: DevicePlatform::class)]
    public ?string $devicePlatform;

    /**
     * The public IP v4 or v6 address of the end-user's device. You should collect this from your backend. If your backend is behind a proxy, use the `X-Forwarded-For`, `Forwarded`, `True-Client-IP`, `CF-Connecting-IP` or an equivalent header to get the actual public IP of the end-user's device.
     */
    #[Optional]
    public ?string $ip;

    /**
     * This signal should indicate a higher level of trust, explicitly stating that the user is genuine. Contact us to discuss your use case. For more details, refer to [Signals](/verify/v2/documentation/prevent-fraud#signals).
     */
    #[Optional('is_trusted_user')]
    public ?bool $isTrustedUser;

    /**
     * The JA4 fingerprint observed for the end-user's connection. Prelude will infer it automatically when you use our Frontend SDKs (which use Prelude's edge network), but you can also forward the value if you terminate TLS yourself.
     */
    #[Optional('ja4_fingerprint')]
    public ?string $ja4Fingerprint;

    /**
     * The version of the user's device operating system.
     */
    #[Optional('os_version')]
    public ?string $osVersion;

    /**
     * The user agent of the user's device. If the individual fields (os_version, device_platform, device_model) are provided, we will prioritize those values instead of parsing them from the user agent string.
     */
    #[Optional('user_agent')]
    public ?string $userAgent;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param DevicePlatform|value-of<DevicePlatform>|null $devicePlatform
     */
    public static function with(
        ?string $appVersion = null,
        ?string $deviceID = null,
        ?string $deviceModel = null,
        DevicePlatform|string|null $devicePlatform = null,
        ?string $ip = null,
        ?bool $isTrustedUser = null,
        ?string $ja4Fingerprint = null,
        ?string $osVersion = null,
        ?string $userAgent = null,
    ): self {
        $self = new self;

        null !== $appVersion && $self['appVersion'] = $appVersion;
        null !== $deviceID && $self['deviceID'] = $deviceID;
        null !== $deviceModel && $self['deviceModel'] = $deviceModel;
        null !== $devicePlatform && $self['devicePlatform'] = $devicePlatform;
        null !== $ip && $self['ip'] = $ip;
        null !== $isTrustedUser && $self['isTrustedUser'] = $isTrustedUser;
        null !== $ja4Fingerprint && $self['ja4Fingerprint'] = $ja4Fingerprint;
        null !== $osVersion && $self['osVersion'] = $osVersion;
        null !== $userAgent && $self['userAgent'] = $userAgent;

        return $self;
    }

    /**
     * The version of your application.
     */
    public function withAppVersion(string $appVersion): self
    {
        $self = clone $this;
        $self['appVersion'] = $appVersion;

        return $self;
    }

    /**
     * A unique ID for the user's device. You should ensure that each user device has a unique `device_id` value. Ideally, for Android, this corresponds to the `ANDROID_ID` and for iOS, this corresponds to the `identifierForVendor`.
     */
    public function withDeviceID(string $deviceID): self
    {
        $self = clone $this;
        $self['deviceID'] = $deviceID;

        return $self;
    }

    /**
     * The model of the user's device.
     */
    public function withDeviceModel(string $deviceModel): self
    {
        $self = clone $this;
        $self['deviceModel'] = $deviceModel;

        return $self;
    }

    /**
     * The type of the user's device.
     *
     * @param DevicePlatform|value-of<DevicePlatform> $devicePlatform
     */
    public function withDevicePlatform(
        DevicePlatform|string $devicePlatform
    ): self {
        $self = clone $this;
        $self['devicePlatform'] = $devicePlatform;

        return $self;
    }

    /**
     * The public IP v4 or v6 address of the end-user's device. You should collect this from your backend. If your backend is behind a proxy, use the `X-Forwarded-For`, `Forwarded`, `True-Client-IP`, `CF-Connecting-IP` or an equivalent header to get the actual public IP of the end-user's device.
     */
    public function withIP(string $ip): self
    {
        $self = clone $this;
        $self['ip'] = $ip;

        return $self;
    }

    /**
     * This signal should indicate a higher level of trust, explicitly stating that the user is genuine. Contact us to discuss your use case. For more details, refer to [Signals](/verify/v2/documentation/prevent-fraud#signals).
     */
    public function withIsTrustedUser(bool $isTrustedUser): self
    {
        $self = clone $this;
        $self['isTrustedUser'] = $isTrustedUser;

        return $self;
    }

    /**
     * The JA4 fingerprint observed for the end-user's connection. Prelude will infer it automatically when you use our Frontend SDKs (which use Prelude's edge network), but you can also forward the value if you terminate TLS yourself.
     */
    public function withJa4Fingerprint(string $ja4Fingerprint): self
    {
        $self = clone $this;
        $self['ja4Fingerprint'] = $ja4Fingerprint;

        return $self;
    }

    /**
     * The version of the user's device operating system.
     */
    public function withOsVersion(string $osVersion): self
    {
        $self = clone $this;
        $self['osVersion'] = $osVersion;

        return $self;
    }

    /**
     * The user agent of the user's device. If the individual fields (os_version, device_platform, device_model) are provided, we will prioritize those values instead of parsing them from the user agent string.
     */
    public function withUserAgent(string $userAgent): self
    {
        $self = clone $this;
        $self['userAgent'] = $userAgent;

        return $self;
    }
}
