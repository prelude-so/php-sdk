<?php

declare(strict_types=1);

namespace Prelude\Parameters\VerificationCreateParam;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Parameters\VerificationCreateParam\Signals\DevicePlatform;

/**
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

    #[Api('app_version', optional: true)]
    public ?string $appVersion;

    #[Api('device_id', optional: true)]
    public ?string $deviceID;

    #[Api('device_model', optional: true)]
    public ?string $deviceModel;

    /** @var null|DevicePlatform::* $devicePlatform */
    #[Api('device_platform', optional: true)]
    public ?string $devicePlatform;

    #[Api(optional: true)]
    public ?string $ip;

    #[Api('is_trusted_user', optional: true)]
    public ?bool $isTrustedUser;

    #[Api('os_version', optional: true)]
    public ?string $osVersion;

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
