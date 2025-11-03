<?php

declare(strict_types=1);

namespace Prelude\VerificationManagement;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Concerns\SdkResponse;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\Conversion\Contracts\ResponseConverter;
use Prelude\VerificationManagement\VerificationManagementListPhoneNumbersResponse\PhoneNumber;

/**
 * @phpstan-type VerificationManagementListPhoneNumbersResponseShape = array{
 *   phoneNumbers: list<PhoneNumber>
 * }
 */
final class VerificationManagementListPhoneNumbersResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<VerificationManagementListPhoneNumbersResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * A list of phone numbers in the allow or block list.
     *
     * @var list<PhoneNumber> $phoneNumbers
     */
    #[Api('phone_numbers', list: PhoneNumber::class)]
    public array $phoneNumbers;

    /**
     * `new VerificationManagementListPhoneNumbersResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerificationManagementListPhoneNumbersResponse::with(phoneNumbers: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VerificationManagementListPhoneNumbersResponse)->withPhoneNumbers(...)
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
     * @param list<PhoneNumber> $phoneNumbers
     */
    public static function with(array $phoneNumbers): self
    {
        $obj = new self;

        $obj->phoneNumbers = $phoneNumbers;

        return $obj;
    }

    /**
     * A list of phone numbers in the allow or block list.
     *
     * @param list<PhoneNumber> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj->phoneNumbers = $phoneNumbers;

        return $obj;
    }
}
