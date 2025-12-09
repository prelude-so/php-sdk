<?php

declare(strict_types=1);

namespace Prelude\Notify;

use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Concerns\SdkParams;
use Prelude\Core\Contracts\BaseModel;

/**
 * Retrieve the current subscription status for a specific phone number within a subscription configuration.
 *
 * @see Prelude\Services\NotifyService::getSubscriptionPhoneNumber()
 *
 * @phpstan-type NotifyGetSubscriptionPhoneNumberParamsShape = array{
 *   configID: string
 * }
 */
final class NotifyGetSubscriptionPhoneNumberParams implements BaseModel
{
    /** @use SdkModel<NotifyGetSubscriptionPhoneNumberParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $configID;

    /**
     * `new NotifyGetSubscriptionPhoneNumberParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NotifyGetSubscriptionPhoneNumberParams::with(configID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NotifyGetSubscriptionPhoneNumberParams)->withConfigID(...)
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
    public static function with(string $configID): self
    {
        $self = new self;

        $self['configID'] = $configID;

        return $self;
    }

    public function withConfigID(string $configID): self
    {
        $self = clone $this;
        $self['configID'] = $configID;

        return $self;
    }
}
