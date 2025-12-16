<?php

declare(strict_types=1);

namespace Prelude\Verification;

use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Concerns\SdkParams;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Verification\VerificationCheckParams\Target;

/**
 * Check the validity of a verification code.
 *
 * @see Prelude\Services\VerificationService::check()
 *
 * @phpstan-import-type TargetShape from \Prelude\Verification\VerificationCheckParams\Target
 *
 * @phpstan-type VerificationCheckParamsShape = array{
 *   code: string, target: TargetShape
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
     * @param TargetShape $target
     */
    public static function with(string $code, Target|array $target): self
    {
        $self = new self;

        $self['code'] = $code;
        $self['target'] = $target;

        return $self;
    }

    /**
     * The OTP code to validate.
     */
    public function withCode(string $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

        return $self;
    }

    /**
     * The verification target. Either a phone number or an email address. To use the email verification feature contact us to discuss your use case.
     *
     * @param TargetShape $target
     */
    public function withTarget(Target|array $target): self
    {
        $self = clone $this;
        $self['target'] = $target;

        return $self;
    }
}
