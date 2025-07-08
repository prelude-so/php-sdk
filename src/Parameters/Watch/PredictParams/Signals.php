<?php

declare(strict_types=1);

namespace Prelude\Parameters\Watch\PredictParams;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\None;

class Signals implements BaseModel
{
    use Model;

    #[Api('app_version', optional: true)]
    public string $appVersion;

    #[Api('device_id', optional: true)]
    public string $deviceID;

    #[Api('device_model', optional: true)]
    public string $deviceModel;

    #[Api('device_platform', optional: true)]
    public string $devicePlatform;

    #[Api(optional: true)]
    public string $ip;

    #[Api('is_trusted_user', optional: true)]
    public bool $isTrustedUser;

    #[Api('os_version', optional: true)]
    public string $osVersion;

    #[Api('user_agent', optional: true)]
    public string $userAgent;

    /**
     * @param string $appVersion
     * @param string $deviceID
     * @param string $deviceModel
     * @param string $devicePlatform
     * @param string $ip
     * @param bool   $isTrustedUser
     * @param string $osVersion
     * @param string $userAgent
     */
    final public function __construct(
        None|string $appVersion = None::NOT_SET,
        None|string $deviceID = None::NOT_SET,
        None|string $deviceModel = None::NOT_SET,
        None|string $devicePlatform = None::NOT_SET,
        None|string $ip = None::NOT_SET,
        bool|None $isTrustedUser = None::NOT_SET,
        None|string $osVersion = None::NOT_SET,
        None|string $userAgent = None::NOT_SET
    ) {
        $args = func_get_args();

        $data = [];
        for ($i = 0; $i < count($args); ++$i) {
            if (None::NOT_SET !== $args[$i]) {
                $data[self::$_constructorArgNames[$i]] = $args[$i] ?? null;
            }
        }

        $this->__unserialize($data);
    }
}

Signals::_loadMetadata();
