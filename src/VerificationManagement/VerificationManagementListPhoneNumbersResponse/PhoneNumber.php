<?php

declare(strict_types=1);

namespace Prelude\VerificationManagement\VerificationManagementListPhoneNumbersResponse;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;

/**
 * @phpstan-type PhoneNumberShape = array{
 *   createdAt: \DateTimeInterface, phoneNumber: string
 * }
 */
final class PhoneNumber implements BaseModel
{
    /** @use SdkModel<PhoneNumberShape> */
    use SdkModel;

    /**
     * The date and time when the phone number was added to the list.
     */
    #[Api('created_at')]
    public \DateTimeInterface $createdAt;

    /**
     * An E.164 formatted phone number.
     */
    #[Api('phone_number')]
    public string $phoneNumber;

    /**
     * `new PhoneNumber()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumber::with(createdAt: ..., phoneNumber: ...)
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
        \DateTimeInterface $createdAt,
        string $phoneNumber
    ): self {
        $obj = new self;

        $obj->createdAt = $createdAt;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    /**
     * The date and time when the phone number was added to the list.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * An E.164 formatted phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }
}
