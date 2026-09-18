<?php

declare(strict_types=1);

namespace Prelude\VerificationManagement\Sandbox;

use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\VerificationManagement\Sandbox\SandboxListPhoneNumbersResponse\PhoneNumber;

/**
 * @phpstan-import-type PhoneNumberShape from \Prelude\VerificationManagement\Sandbox\SandboxListPhoneNumbersResponse\PhoneNumber
 *
 * @phpstan-type SandboxListPhoneNumbersResponseShape = array{
 *   phoneNumbers: list<PhoneNumber|PhoneNumberShape>
 * }
 */
final class SandboxListPhoneNumbersResponse implements BaseModel
{
    /** @use SdkModel<SandboxListPhoneNumbersResponseShape> */
    use SdkModel;

    /**
     * A list of sandbox phone numbers.
     *
     * @var list<PhoneNumber> $phoneNumbers
     */
    #[Required('phone_numbers', list: PhoneNumber::class)]
    public array $phoneNumbers;

    /**
     * `new SandboxListPhoneNumbersResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SandboxListPhoneNumbersResponse::with(phoneNumbers: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SandboxListPhoneNumbersResponse)->withPhoneNumbers(...)
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
     * @param list<PhoneNumber|PhoneNumberShape> $phoneNumbers
     */
    public static function with(array $phoneNumbers): self
    {
        $self = new self;

        $self['phoneNumbers'] = $phoneNumbers;

        return $self;
    }

    /**
     * A list of sandbox phone numbers.
     *
     * @param list<PhoneNumber|PhoneNumberShape> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $self = clone $this;
        $self['phoneNumbers'] = $phoneNumbers;

        return $self;
    }
}
