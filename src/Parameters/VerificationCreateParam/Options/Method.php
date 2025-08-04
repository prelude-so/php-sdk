<?php

declare(strict_types=1);

namespace Prelude\Parameters\VerificationCreateParam\Options;

use Prelude\Core\Concerns\Enum;
use Prelude\Core\Conversion\Contracts\ConverterSource;

/**
 * The method used for verifying this phone number. The 'voice' option provides an accessible alternative for visually impaired users by delivering the verification code through a phone call rather than a text message. It also allows verification of landline numbers that cannot receive SMS messages.
 *
 * @phpstan-type method_alias = Method::*
 */
final class Method implements ConverterSource
{
    use Enum;

    public const AUTO = 'auto';

    public const VOICE = 'voice';
}
