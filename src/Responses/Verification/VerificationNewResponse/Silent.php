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

    /**
     * `new Silent()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Silent::with(requestURL: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Silent)->withRequestURL(...)
     * ```
     */
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
    public static function with(string $requestURL): self
    {
        $obj = new self;

        $obj->requestURL = $requestURL;

        return $obj;
    }

    /**
     * The URL to start the silent verification towards.
     */
    public function withRequestURL(string $requestURL): self
    {
        $obj = clone $this;
        $obj->requestURL = $requestURL;

        return $obj;
    }
}
