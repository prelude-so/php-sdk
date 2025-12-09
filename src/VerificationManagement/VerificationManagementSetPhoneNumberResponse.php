<?php

declare(strict_types=1);

namespace Prelude\VerificationManagement;

use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;

/**
 * @phpstan-type VerificationManagementSetPhoneNumberResponseShape = array{
 *   phoneNumber: string
 * }
 */
final class VerificationManagementSetPhoneNumberResponse implements BaseModel
{
    /** @use SdkModel<VerificationManagementSetPhoneNumberResponseShape> */
    use SdkModel;

    /**
     * The E.164 formatted phone number that was added to the list.
     */
    #[Required('phone_number')]
    public string $phoneNumber;

    /**
     * `new VerificationManagementSetPhoneNumberResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerificationManagementSetPhoneNumberResponse::with(phoneNumber: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VerificationManagementSetPhoneNumberResponse)->withPhoneNumber(...)
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
        $obj = new self;

        $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }

    /**
     * The E.164 formatted phone number that was added to the list.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }
}
