<?php

declare(strict_types=1);

namespace Prelude\VerificationManagement;

use Prelude\Core\Attributes\Required;
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
 * @see Prelude\Services\VerificationManagementService::setPhoneNumber()
 *
 * @phpstan-type VerificationManagementSetPhoneNumberParamsShape = array{
 *   phoneNumber: string
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
    #[Required('phone_number')]
    public string $phoneNumber;

    /**
     * `new VerificationManagementSetPhoneNumberParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerificationManagementSetPhoneNumberParams::with(phoneNumber: ...)
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
    public static function with(string $phoneNumber): self
    {
        $self = new self;

        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * An E.164 formatted phone number to add to the list.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }
}
