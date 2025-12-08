<?php

declare(strict_types=1);

namespace Prelude\VerificationManagement;

use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Concerns\SdkParams;
use Prelude\Core\Contracts\BaseModel;

/**
 * Remove a phone number from the allow or block list.
 *
 * This operation is idempotent - re-deleting the same phone number will not result in errors. If the phone number does not exist in the specified list, the operation will succeed without making any changes.
 *
 * In order to get access to this endpoint, contact our support team.
 *
 * @see Prelude\Services\VerificationManagementService::deletePhoneNumber()
 *
 * @phpstan-type VerificationManagementDeletePhoneNumberParamsShape = array{
 *   phone_number: string
 * }
 */
final class VerificationManagementDeletePhoneNumberParams implements BaseModel
{
    /** @use SdkModel<VerificationManagementDeletePhoneNumberParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * An E.164 formatted phone number to remove from the list.
     */
    #[Required]
    public string $phone_number;

    /**
     * `new VerificationManagementDeletePhoneNumberParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerificationManagementDeletePhoneNumberParams::with(phone_number: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VerificationManagementDeletePhoneNumberParams)->withPhoneNumber(...)
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
     * An E.164 formatted phone number to remove from the list.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }
}
