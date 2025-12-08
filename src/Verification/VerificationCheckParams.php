<?php

declare(strict_types=1);

namespace Prelude\Verification;

use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Concerns\SdkParams;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Verification\VerificationCheckParams\Target;
use Prelude\Verification\VerificationCheckParams\Target\Type;

/**
 * Check the validity of a verification code.
 *
 * @see Prelude\Services\VerificationService::check()
 *
 * @phpstan-type VerificationCheckParamsShape = array{
 *   code: string, target: Target|array{type: value-of<Type>, value: string}
 * }
 */
final class VerificationCheckParams implements BaseModel
{
    /** @use SdkModel<VerificationCheckParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The OTP code to validate.
     */
    #[Required]
    public string $code;

    /**
     * The verification target. Either a phone number or an email address. To use the email verification feature contact us to discuss your use case.
     */
    #[Required]
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
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Target|array{type: value-of<Type>, value: string} $target
     */
    public static function with(string $code, Target|array $target): self
    {
        $obj = new self;

        $obj['code'] = $code;
        $obj['target'] = $target;

        return $obj;
    }

    /**
     * The OTP code to validate.
     */
    public function withCode(string $code): self
    {
        $obj = clone $this;
        $obj['code'] = $code;

        return $obj;
    }

    /**
     * The verification target. Either a phone number or an email address. To use the email verification feature contact us to discuss your use case.
     *
     * @param Target|array{type: value-of<Type>, value: string} $target
     */
    public function withTarget(Target|array $target): self
    {
        $obj = clone $this;
        $obj['target'] = $target;

        return $obj;
    }
}
