<?php

declare(strict_types=1);

namespace Prelude\Parameters\VerificationCreateParam\Options;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Parameters\VerificationCreateParam\Options\AppRealm\Platform;

/**
 * @phpstan-type app_realm_alias = array{platform: Platform::*, value: string}
 */
final class AppRealm implements BaseModel
{
    use Model;

    /** @var Platform::* $platform */
    #[Api]
    public string $platform;

    #[Api]
    public string $value;

    /**
     * You must use named parameters to construct this object.
     *
     * @param Platform::* $platform
     */
    final public function __construct(string $platform, string $value)
    {
        self::introspect();

        $this->platform = $platform;
        $this->value = $value;
    }
}
