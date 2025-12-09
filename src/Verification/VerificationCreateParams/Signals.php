<?php

declare(strict_types=1);

namespace Prelude\Verification\VerificationCreateParams;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Verification\VerificationCreateParams\Signals\DevicePlatform;

/**
 * The signals used for anti-fraud. For more details, refer to [Signals](/verify/v2/documentation/prevent-fraud#signals).
 *
 * @phpstan-type SignalsShape = array{
 *   appVersion?: string|null,
 *   deviceID?: string|null,
 *   deviceModel?: string|null,
 *   devicePlatform?: value-of<DevicePlatform>|null,
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
     * The unique identifier for the user's device. For Android, this corresponds to the `ANDROID_ID` and for iOS, this corresponds to the `identifierForVendor`.
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
     * The IP address of the user's device.
     */
    #[Optional]
    public ?string $ip;

    /**
     * This signal should provide a higher level of trust, indicating that the user is genuine. Contact us to discuss your use case. For more details, refer to [Signals](/verify/v2/documentation/prevent-fraud#signals).
     */
    #[Optional('is_trusted_user')]
    public ?bool $isTrustedUser;

    /**
     * The JA4 fingerprint observed for the connection. Prelude will infer it automatically when requests go through our client SDK (which uses Prelude's edge), but you can also provide it explicitly if you terminate TLS yourself.
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
     * @param DevicePlatform|value-of<DevicePlatform> $devicePlatform
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
        $obj = new self;

        null !== $appVersion && $obj['appVersion'] = $appVersion;
        null !== $deviceID && $obj['deviceID'] = $deviceID;
        null !== $deviceModel && $obj['deviceModel'] = $deviceModel;
        null !== $devicePlatform && $obj['devicePlatform'] = $devicePlatform;
        null !== $ip && $obj['ip'] = $ip;
        null !== $isTrustedUser && $obj['isTrustedUser'] = $isTrustedUser;
        null !== $ja4Fingerprint && $obj['ja4Fingerprint'] = $ja4Fingerprint;
        null !== $osVersion && $obj['osVersion'] = $osVersion;
        null !== $userAgent && $obj['userAgent'] = $userAgent;

        return $obj;
    }

    /**
     * The version of your application.
     */
    public function withAppVersion(string $appVersion): self
    {
        $obj = clone $this;
        $obj['appVersion'] = $appVersion;

        return $obj;
    }

    /**
     * The unique identifier for the user's device. For Android, this corresponds to the `ANDROID_ID` and for iOS, this corresponds to the `identifierForVendor`.
     */
    public function withDeviceID(string $deviceID): self
    {
        $obj = clone $this;
        $obj['deviceID'] = $deviceID;

        return $obj;
    }

    /**
     * The model of the user's device.
     */
    public function withDeviceModel(string $deviceModel): self
    {
        $obj = clone $this;
        $obj['deviceModel'] = $deviceModel;

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
        $obj['devicePlatform'] = $devicePlatform;

        return $obj;
    }

    /**
     * The IP address of the user's device.
     */
    public function withIP(string $ip): self
    {
        $obj = clone $this;
        $obj['ip'] = $ip;

        return $obj;
    }

    /**
     * This signal should provide a higher level of trust, indicating that the user is genuine. Contact us to discuss your use case. For more details, refer to [Signals](/verify/v2/documentation/prevent-fraud#signals).
     */
    public function withIsTrustedUser(bool $isTrustedUser): self
    {
        $obj = clone $this;
        $obj['isTrustedUser'] = $isTrustedUser;

        return $obj;
    }

    /**
     * The JA4 fingerprint observed for the connection. Prelude will infer it automatically when requests go through our client SDK (which uses Prelude's edge), but you can also provide it explicitly if you terminate TLS yourself.
     */
    public function withJa4Fingerprint(string $ja4Fingerprint): self
    {
        $obj = clone $this;
        $obj['ja4Fingerprint'] = $ja4Fingerprint;

        return $obj;
    }

    /**
     * The version of the user's device operating system.
     */
    public function withOsVersion(string $osVersion): self
    {
        $obj = clone $this;
        $obj['osVersion'] = $osVersion;

        return $obj;
    }

    /**
     * The user agent of the user's device. If the individual fields (os_version, device_platform, device_model) are provided, we will prioritize those values instead of parsing them from the user agent string.
     */
    public function withUserAgent(string $userAgent): self
    {
        $obj = clone $this;
        $obj['userAgent'] = $userAgent;

        return $obj;
    }
}
