<?php

declare(strict_types=1);

namespace Prelude\Responses\VerificationNewResponse;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;

/**
 * @phpstan-type silent_alias = array{requestURL: string}
 */
final class Silent implements BaseModel
{
    use Model;

    #[Api('request_url')]
    public string $requestURL;

    /**
     * You must use named parameters to construct this object.
     */
    final public function __construct(string $requestURL)
    {
        self::introspect();

        $this->requestURL = $requestURL;
    }
}
