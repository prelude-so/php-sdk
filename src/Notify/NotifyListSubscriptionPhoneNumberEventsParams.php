<?php

declare(strict_types=1);

namespace Prelude\Notify;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Concerns\SdkParams;
use Prelude\Core\Contracts\BaseModel;

/**
 * Retrieve a paginated list of subscription events (status changes) for a specific phone number within a subscription configuration.
 *
 * Events are ordered by timestamp in descending order (most recent first).
 *
 * @see Prelude\Services\NotifyService::listSubscriptionPhoneNumberEvents()
 *
 * @phpstan-type NotifyListSubscriptionPhoneNumberEventsParamsShape = array{
 *   config_id: string, cursor?: string, limit?: int
 * }
 */
final class NotifyListSubscriptionPhoneNumberEventsParams implements BaseModel
{
    /** @use SdkModel<NotifyListSubscriptionPhoneNumberEventsParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $config_id;

    /**
     * Pagination cursor from the previous response.
     */
    #[Optional]
    public ?string $cursor;

    /**
     * Maximum number of events to return per page.
     */
    #[Optional]
    public ?int $limit;

    /**
     * `new NotifyListSubscriptionPhoneNumberEventsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NotifyListSubscriptionPhoneNumberEventsParams::with(config_id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NotifyListSubscriptionPhoneNumberEventsParams)->withConfigID(...)
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
        string $config_id,
        ?string $cursor = null,
        ?int $limit = null
    ): self {
        $obj = new self;

        $obj['config_id'] = $config_id;

        null !== $cursor && $obj['cursor'] = $cursor;
        null !== $limit && $obj['limit'] = $limit;

        return $obj;
    }

    public function withConfigID(string $configID): self
    {
        $obj = clone $this;
        $obj['config_id'] = $configID;

        return $obj;
    }

    /**
     * Pagination cursor from the previous response.
     */
    public function withCursor(string $cursor): self
    {
        $obj = clone $this;
        $obj['cursor'] = $cursor;

        return $obj;
    }

    /**
     * Maximum number of events to return per page.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj['limit'] = $limit;

        return $obj;
    }
}
