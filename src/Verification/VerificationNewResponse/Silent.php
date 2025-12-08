<?php

declare(strict_types=1);

namespace Prelude\Verification\VerificationNewResponse;

use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;

/**
 * The silent verification specific properties.
 *
 * @phpstan-type SilentShape = array{request_url: string}
 */
final class Silent implements BaseModel
{
    /** @use SdkModel<SilentShape> */
    use SdkModel;

    /**
     * The URL to start the silent verification towards.
     */
    #[Required]
    public string $request_url;

    /**
     * `new Silent()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Silent::with(request_url: ...)
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
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $request_url): self
    {
        $obj = new self;

        $obj['request_url'] = $request_url;

        return $obj;
    }

    /**
     * The URL to start the silent verification towards.
     */
    public function withRequestURL(string $requestURL): self
    {
        $obj = clone $this;
        $obj['request_url'] = $requestURL;

        return $obj;
    }
}
