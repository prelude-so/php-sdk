<?php

declare(strict_types=1);

namespace Prelude\Core\Attributes;

use Prelude\Core\Contracts\Converter;
use Prelude\Core\Contracts\StaticConverter;

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class Api
{
    /**
     * @param ?array<string|int,string|Converter|StaticConverter> $union
     */
    public function __construct(
        public ?string $apiName = null,
        public string|Converter|StaticConverter|null $type = null,
        public bool $optional = false,
        public ?string $discriminator = null,
        public ?array $union = null,
    ) {
    }
}
