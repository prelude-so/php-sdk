<?php

declare(strict_types=1);

namespace Prelude\Parameters\Verification\CreateParams\Options;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;

final class AppRealm implements BaseModel
{
    use Model;

    #[Api]
    public string $platform;

    #[Api]
    public string $value;

    /**
     * You must use named parameters to construct this object.
     */
    final public function __construct(string $platform, string $value)
    {
        $this->platform = $platform;
        $this->value = $value;
    }
}

AppRealm::_loadMetadata();
