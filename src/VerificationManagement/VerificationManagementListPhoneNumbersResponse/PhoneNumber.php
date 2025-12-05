<?php

declare(strict_types=1);

namespace Prelude\VerificationManagement\VerificationManagementListPhoneNumbersResponse;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;

/**
 * @phpstan-type PhoneNumberShape = array{
 *   created_at: \DateTimeInterface, phone_number: string
 * }
 */
final class PhoneNumber implements BaseModel
{
    /** @use SdkModel<PhoneNumberShape> */
    use SdkModel;

    /**
     * The date and time when the phone number was added to the list.
     */
    #[Api]
    public \DateTimeInterface $created_at;

    /**
     * An E.164 formatted phone number.
     */
    #[Api]
    public string $phone_number;

    /**
     * `new PhoneNumber()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumber::with(created_at: ..., phone_number: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PhoneNumber)->withCreatedAt(...)->withPhoneNumber(...)
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
    public static function with(
        \DateTimeInterface $created_at,
        string $phone_number
    ): self {
        $obj = new self;

        $obj['created_at'] = $created_at;
        $obj['phone_number'] = $phone_number;

        return $obj;
    }

    /**
     * The date and time when the phone number was added to the list.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * An E.164 formatted phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }
}
