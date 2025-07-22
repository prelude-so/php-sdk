<?php

declare(strict_types=1);

namespace Prelude\Parameters;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Concerns\Params;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Parameters\VerificationCheckParam\Target;

/**
 * Check the validity of a verification code.
 *
 * @phpstan-type check_params = array{code: string, target: Target}
 */
final class VerificationCheckParam implements BaseModel
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
     * You must use named parameters to construct this object.
     */
    final public function __construct(string $code, Target $target)
    {
        self::introspect();

        $this->code = $code;
        $this->target = $target;
    }
}
