<?php

declare(strict_types=1);

namespace Prelude\VerificationManagement;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Concerns\SdkResponse;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type VerificationManagementDeletePhoneNumberResponseShape = array{
 *   phoneNumber: string
 * }
 */
final class VerificationManagementDeletePhoneNumberResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<VerificationManagementDeletePhoneNumberResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * The E.164 formatted phone number that was removed from the list.
     */
    #[Api('phone_number')]
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
        $obj = new self;

        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    /**
     * The E.164 formatted phone number that was removed from the list.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }
}
