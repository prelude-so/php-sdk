<?php

declare(strict_types=1);

namespace Prelude\VerificationManagement;

use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;

/**
 * @phpstan-type VerificationManagementDeletePhoneNumberResponseShape = array{
 *   phoneNumber: string
 * }
 */
final class VerificationManagementDeletePhoneNumberResponse implements BaseModel
{
    /** @use SdkModel<VerificationManagementDeletePhoneNumberResponseShape> */
    use SdkModel;

    /**
     * The E.164 formatted phone number that was removed from the list.
     */
    #[Required('phone_number')]
    public string $phoneNumber;

    /**
     * `new VerificationManagementDeletePhoneNumberResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerificationManagementDeletePhoneNumberResponse::with(phoneNumber: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VerificationManagementDeletePhoneNumberResponse)->withPhoneNumber(...)
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
    public static function with(string $phoneNumber): self
    {
        $self = new self;

        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * The E.164 formatted phone number that was removed from the list.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }
}
