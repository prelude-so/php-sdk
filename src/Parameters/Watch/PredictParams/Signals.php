<?php

declare(strict_types=1);

namespace Prelude\Parameters\Watch\PredictParams;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Parameters\Watch\PredictParams\Signals\DevicePlatform;

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
        $this->appVersion = $appVersion;
        $this->deviceID = $deviceID;
        $this->deviceModel = $deviceModel;
        $this->devicePlatform = $devicePlatform;
        $this->ip = $ip;
        $this->isTrustedUser = $isTrustedUser;
        $this->osVersion = $osVersion;
        $this->userAgent = $userAgent;
    }
}

Signals::_loadMetadata();
