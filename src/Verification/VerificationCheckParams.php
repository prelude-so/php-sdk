<?php

declare(strict_types=1);

namespace Prelude\Verification;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Concerns\Params;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Verification\VerificationCheckParams\Target;

/**
 * Check the validity of a verification code.
 *
 * @phpstan-type check_params = array{code: string, target: Target}
 */
final class VerificationCheckParams implements BaseModel
{
    use Model;
    use Params;

    /**
     * The OTP code to validate.
     */
    #[Api]
    public string $code;

    /**
     * The verification target. Either a phone number or an email address. To use the email verification feature contact us to discuss your use case.
     */
    #[Api]
    public Target $target;

    /**
     * `new VerificationCheckParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerificationCheckParams::with(code: ..., target: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VerificationCheckParams)->withCode(...)->withTarget(...)
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
    public static function with(string $code, Target $target): self
    {
        $obj = new self;

        $obj->code = $code;
        $obj->target = $target;

        return $obj;
    }

    /**
     * The OTP code to validate.
     */
    public function withCode(string $code): self
    {
        $obj = clone $this;
        $obj->code = $code;

        return $obj;
    }

    /**
     * The verification target. Either a phone number or an email address. To use the email verification feature contact us to discuss your use case.
     */
    public function withTarget(Target $target): self
    {
        $obj = clone $this;
        $obj->target = $target;

        return $obj;
    }
}
