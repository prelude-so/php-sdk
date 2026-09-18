<?php

declare(strict_types=1);

namespace Prelude\VerificationManagement\Sandbox;

use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;

/**
 * @phpstan-type SandboxAddPhoneNumberResponseShape = array{
 *   attemptCode: string, phoneNumber: string
 * }
 */
final class SandboxAddPhoneNumberResponse implements BaseModel
{
    /** @use SdkModel<SandboxAddPhoneNumberResponseShape> */
    use SdkModel;

    /**
     * The fixed attempt code associated with the sandbox phone number.
     */
    #[Required('attempt_code')]
    public string $attemptCode;

    /**
     * The E.164 formatted phone number that was added to the sandbox list.
     */
    #[Required('phone_number')]
    public string $phoneNumber;

    /**
     * `new SandboxAddPhoneNumberResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SandboxAddPhoneNumberResponse::with(attemptCode: ..., phoneNumber: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SandboxAddPhoneNumberResponse)->withAttemptCode(...)->withPhoneNumber(...)
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
    public static function with(string $attemptCode, string $phoneNumber): self
    {
        $self = new self;

        $self['attemptCode'] = $attemptCode;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * The fixed attempt code associated with the sandbox phone number.
     */
    public function withAttemptCode(string $attemptCode): self
    {
        $self = clone $this;
        $self['attemptCode'] = $attemptCode;

        return $self;
    }

    /**
     * The E.164 formatted phone number that was added to the sandbox list.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }
}
