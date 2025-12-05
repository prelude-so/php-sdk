<?php

declare(strict_types=1);

namespace Prelude\Notify\NotifySendBatchResponse\Result;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;

/**
 * Present only if success is false.
 *
 * @phpstan-type ErrorShape = array{code?: string|null, message?: string|null}
 */
final class Error implements BaseModel
{
    /** @use SdkModel<ErrorShape> */
    use SdkModel;

    /**
     * The error code.
     */
    #[Api(optional: true)]
    public ?string $code;

    /**
     * A human-readable error message.
     */
    #[Api(optional: true)]
    public ?string $message;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $code = null,
        ?string $message = null
    ): self {
        $obj = new self;

        null !== $code && $obj->code = $code;
        null !== $message && $obj->message = $message;

        return $obj;
    }

    /**
     * The error code.
     */
    public function withCode(string $code): self
    {
        $obj = clone $this;
        $obj->code = $code;

        return $obj;
    }

    /**
     * A human-readable error message.
     */
    public function withMessage(string $message): self
    {
        $obj = clone $this;
        $obj->message = $message;

        return $obj;
    }
}
