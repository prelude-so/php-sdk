<?php

declare(strict_types=1);

namespace Prelude\Parameters\Verification\CreateParams;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\None;

class Signals implements BaseModel
{
    use Model;

    #[Api('app_version', optional: true)]
    public ?string $appVersion;

    #[Api('device_id', optional: true)]
    public ?string $deviceID;

    #[Api('device_model', optional: true)]
    public ?string $deviceModel;

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
     * You must use named parameters to construct this object. If an named argument is not
     * given, it will not be included during JSON serialization. The arguments are untyped
     * so you can pass any JSON serializable value, but the API expects the types to match
     * the PHPDoc types.
     *
     * @param null|string $appVersion
     * @param null|string $deviceID
     * @param null|string $deviceModel
     * @param null|string $devicePlatform
     * @param null|string $ip
     * @param null|bool   $isTrustedUser
     * @param null|string $osVersion
     * @param null|string $userAgent
     */
    final public function __construct(
        $appVersion = None::NOT_GIVEN,
        $deviceID = None::NOT_GIVEN,
        $deviceModel = None::NOT_GIVEN,
        $devicePlatform = None::NOT_GIVEN,
        $ip = None::NOT_GIVEN,
        $isTrustedUser = None::NOT_GIVEN,
        $osVersion = None::NOT_GIVEN,
        $userAgent = None::NOT_GIVEN,
    ) {
        $this->constructFromArgs(func_get_args());
    }
}

Signals::_loadMetadata();
