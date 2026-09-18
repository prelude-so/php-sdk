<?php

declare(strict_types=1);

namespace Prelude\VerificationManagement\Sandbox;

use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Concerns\SdkParams;
use Prelude\Core\Contracts\BaseModel;

/**
 * Register a phone number as a sandbox number and associate it with a fixed attempt code. Subsequent verification attempts against this number will not trigger a real SMS/call and will validate against the configured attempt code.
 *
 * This operation is idempotent - re-adding the same phone number will overwrite the existing attempt code.
 *
 * In order to get access to this endpoint, contact our support team.
 *
 * @see Prelude\Services\VerificationManagement\SandboxService::addPhoneNumber()
 *
 * @phpstan-type SandboxAddPhoneNumberParamsShape = array{
 *   attemptCode: string, phoneNumber: string
 * }
 */
final class SandboxAddPhoneNumberParams implements BaseModel
{
    /** @use SdkModel<SandboxAddPhoneNumberParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The fixed attempt code that will validate verification attempts for this phone number.
     */
    #[Required('attempt_code')]
    public string $attemptCode;

    /**
     * An E.164 formatted phone number to add to the sandbox list.
     */
    #[Required('phone_number')]
    public string $phoneNumber;

    /**
     * `new SandboxAddPhoneNumberParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SandboxAddPhoneNumberParams::with(attemptCode: ..., phoneNumber: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SandboxAddPhoneNumberParams)->withAttemptCode(...)->withPhoneNumber(...)
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
     * The fixed attempt code that will validate verification attempts for this phone number.
     */
    public function withAttemptCode(string $attemptCode): self
    {
        $self = clone $this;
        $self['attemptCode'] = $attemptCode;

        return $self;
    }

    /**
     * An E.164 formatted phone number to add to the sandbox list.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }
}
