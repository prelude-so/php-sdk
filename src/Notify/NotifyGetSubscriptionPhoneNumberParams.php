<?php

declare(strict_types=1);

namespace Prelude\Notify;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Concerns\SdkParams;
use Prelude\Core\Contracts\BaseModel;

/**
 * Retrieve the current subscription status for a specific phone number within a subscription configuration.
 *
 * @see Prelude\Services\NotifyService::getSubscriptionPhoneNumber()
 *
 * @phpstan-type NotifyGetSubscriptionPhoneNumberParamsShape = array{
 *   config_id: string
 * }
 */
final class NotifyGetSubscriptionPhoneNumberParams implements BaseModel
{
    /** @use SdkModel<NotifyGetSubscriptionPhoneNumberParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $config_id;

    /**
     * `new NotifyGetSubscriptionPhoneNumberParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NotifyGetSubscriptionPhoneNumberParams::with(config_id: ...)
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
    public static function with(string $config_id): self
    {
        $obj = new self;

        $obj->config_id = $config_id;

        return $obj;
    }

    public function withConfigID(string $configID): self
    {
        $obj = clone $this;
        $obj->config_id = $configID;

        return $obj;
    }
}
