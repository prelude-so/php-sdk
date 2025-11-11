<?php

declare(strict_types=1);

namespace Prelude\VerificationManagement;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Concerns\SdkParams;
use Prelude\Core\Contracts\BaseModel;

/**
 * Add a phone number to the allow or block list.
 *
 * This operation is idempotent - re-adding the same phone number will not result in duplicate entries or errors. If the phone number already exists in the specified list, the operation will succeed without making any changes.
 *
 * In order to get access to this endpoint, contact our support team.
 *
 * @see Prelude\VerificationManagement->setPhoneNumber
 *
 * @phpstan-type VerificationManagementSetPhoneNumberParamsShape = array{
 *   phone_number: string
 * }
 */
final class VerificationManagementSetPhoneNumberParams implements BaseModel
{
    /** @use SdkModel<VerificationManagementSetPhoneNumberParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * An E.164 formatted phone number to add to the list.
     */
    #[Api]
    public string $phone_number;

    /**
     * `new VerificationManagementSetPhoneNumberParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerificationManagementSetPhoneNumberParams::with(phone_number: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VerificationManagementSetPhoneNumberParams)->withPhoneNumber(...)
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

        $obj->phone_number = $phone_number;

        return $obj;
    }

    /**
     * An E.164 formatted phone number to add to the list.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phone_number = $phoneNumber;

        return $obj;
    }
}
