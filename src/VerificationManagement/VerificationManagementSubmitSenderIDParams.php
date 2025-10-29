<?php

declare(strict_types=1);

namespace Prelude\VerificationManagement;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Concerns\SdkParams;
use Prelude\Core\Contracts\BaseModel;

/**
 * This endpoint allows you to submit a new sender ID for verification purposes.
 *
 * In order to get access to this endpoint, contact our support team.
 *
 * @see Prelude\VerificationManagement->submitSenderID
 *
 * @phpstan-type VerificationManagementSubmitSenderIDParamsShape = array{
 *   senderID: string
 * }
 */
final class VerificationManagementSubmitSenderIDParams implements BaseModel
{
    /** @use SdkModel<VerificationManagementSubmitSenderIDParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The sender ID to add.
     */
    #[Api('sender_id')]
    public string $senderID;

    /**
     * `new VerificationManagementSubmitSenderIDParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerificationManagementSubmitSenderIDParams::with(senderID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VerificationManagementSubmitSenderIDParams)->withSenderID(...)
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
    public static function with(string $senderID): self
    {
        $obj = new self;

        $obj->senderID = $senderID;

        return $obj;
    }

    /**
     * The sender ID to add.
     */
    public function withSenderID(string $senderID): self
    {
        $obj = clone $this;
        $obj->senderID = $senderID;

        return $obj;
    }
}
