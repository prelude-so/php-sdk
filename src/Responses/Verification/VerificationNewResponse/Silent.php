<?php

declare(strict_types=1);

namespace Prelude\Responses\Verification\VerificationNewResponse;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;

/**
 * The silent verification specific properties.
 *
 * @phpstan-type silent_alias = array{requestURL: string}
 */
final class Silent implements BaseModel
{
    use Model;

    /**
     * The URL to start the silent verification towards.
     */
    #[Api('request_url')]
    public string $requestURL;

    public function __construct()
    {
        self::introspect();
        $this->unsetOptionalProperties();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function new(string $requestURL): self
    {
        $obj = new self;

        $obj->requestURL = $requestURL;

        return $obj;
    }

    /**
     * The URL to start the silent verification towards.
     */
    public function setRequestURL(string $requestURL): self
    {
        $this->requestURL = $requestURL;

        return $this;
    }
}
