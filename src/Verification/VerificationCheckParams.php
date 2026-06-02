<?php

declare(strict_types=1);

namespace Prelude\Verification;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Concerns\SdkParams;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Verification\VerificationCheckParams\Psd2;
use Prelude\Verification\VerificationCheckParams\Target;

/**
 * Check the validity of a verification code.
 *
 * @see Prelude\Services\VerificationService::check()
 *
 * @phpstan-import-type TargetShape from \Prelude\Verification\VerificationCheckParams\Target
 * @phpstan-import-type Psd2Shape from \Prelude\Verification\VerificationCheckParams\Psd2
 *
 * @phpstan-type VerificationCheckParamsShape = array{
 *   code: string, target: Target|TargetShape, psd2?: null|Psd2|Psd2Shape
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
     * Required when checking a code issued under the `prelude:psd2` template. The submitted variables must match those provided at issuance; any mismatch invalidates the code (PSD2 SCA RTS Article 5 dynamic linking). Ignored on non-PSD2 verifications.
     */
    #[Optional]
    public ?Psd2 $psd2;

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
     * @param Target|TargetShape $target
     * @param Psd2|Psd2Shape|null $psd2
     */
    public static function with(
        string $code,
        Target|array $target,
        Psd2|array|null $psd2 = null
    ): self {
        $self = new self;

        $self['code'] = $code;
        $self['target'] = $target;

        null !== $psd2 && $self['psd2'] = $psd2;

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
     * @param Target|TargetShape $target
     */
    public function withTarget(Target|array $target): self
    {
        $self = clone $this;
        $self['target'] = $target;

        return $self;
    }

    /**
     * Required when checking a code issued under the `prelude:psd2` template. The submitted variables must match those provided at issuance; any mismatch invalidates the code (PSD2 SCA RTS Article 5 dynamic linking). Ignored on non-PSD2 verifications.
     *
     * @param Psd2|Psd2Shape $psd2
     */
    public function withPsd2(Psd2|array $psd2): self
    {
        $self = clone $this;
        $self['psd2'] = $psd2;

        return $self;
    }
}
