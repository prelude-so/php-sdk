<?php

declare(strict_types=1);

namespace Prelude\VerificationManagement;

use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\VerificationManagement\VerificationManagementListPhoneNumbersResponse\PhoneNumber;

/**
 * @phpstan-import-type PhoneNumberShape from \Prelude\VerificationManagement\VerificationManagementListPhoneNumbersResponse\PhoneNumber
 *
 * @phpstan-type VerificationManagementListPhoneNumbersResponseShape = array{
 *   phoneNumbers: list<PhoneNumberShape>
 * }
 */
final class VerificationManagementListPhoneNumbersResponse implements BaseModel
{
    /** @use SdkModel<VerificationManagementListPhoneNumbersResponseShape> */
    use SdkModel;

    /**
     * A list of phone numbers in the allow or block list.
     *
     * @var list<PhoneNumber> $phoneNumbers
     */
    #[Required('phone_numbers', list: PhoneNumber::class)]
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
     * @param list<PhoneNumberShape> $phoneNumbers
     */
    public static function with(array $phoneNumbers): self
    {
        $self = new self;

        $self['phoneNumbers'] = $phoneNumbers;

        return $self;
    }

    /**
     * A list of phone numbers in the allow or block list.
     *
     * @param list<PhoneNumberShape> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $self = clone $this;
        $self['phoneNumbers'] = $phoneNumbers;

        return $self;
    }
}
