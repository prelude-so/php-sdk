<?php

declare(strict_types=1);

namespace Prelude\VerificationManagement;

use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;

/**
 * @phpstan-type VerificationManagementDeletePhoneNumberResponseShape = array{
 *   phone_number: string
 * }
 */
final class VerificationManagementDeletePhoneNumberResponse implements BaseModel
{
    /** @use SdkModel<VerificationManagementDeletePhoneNumberResponseShape> */
    use SdkModel;

    /**
     * The E.164 formatted phone number that was removed from the list.
     */
    #[Required]
    public string $phone_number;

    /**
     * `new VerificationManagementDeletePhoneNumberResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerificationManagementDeletePhoneNumberResponse::with(phone_number: ...)
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
    public static function with(string $phone_number): self
    {
        $obj = new self;

        $obj['phone_number'] = $phone_number;

        return $obj;
    }

    /**
     * The E.164 formatted phone number that was removed from the list.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }
}
