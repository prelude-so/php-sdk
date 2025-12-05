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
 *   phone_numbers: list<PhoneNumber>
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
     * @var list<PhoneNumber> $phone_numbers
     */
    #[Api(list: PhoneNumber::class)]
    public array $phone_numbers;

    /**
     * `new VerificationManagementListPhoneNumbersResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerificationManagementListPhoneNumbersResponse::with(phone_numbers: ...)
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
     * @param list<PhoneNumber|array{
     *   created_at: \DateTimeInterface, phone_number: string
     * }> $phone_numbers
     */
    public static function with(array $phone_numbers): self
    {
        $obj = new self;

        $obj['phone_numbers'] = $phone_numbers;

        return $obj;
    }

    /**
     * A list of phone numbers in the allow or block list.
     *
     * @param list<PhoneNumber|array{
     *   created_at: \DateTimeInterface, phone_number: string
     * }> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj['phone_numbers'] = $phoneNumbers;

        return $obj;
    }
}
