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
 *   configID: string, cursor?: string|null, limit?: int|null
 * }
 */
final class NotifyListSubscriptionPhoneNumberEventsParams implements BaseModel
{
    /** @use SdkModel<NotifyListSubscriptionPhoneNumberEventsParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $configID;

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
     * NotifyListSubscriptionPhoneNumberEventsParams::with(configID: ...)
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
        string $configID,
        ?string $cursor = null,
        ?int $limit = null
    ): self {
        $self = new self;

        $self['configID'] = $configID;

        null !== $cursor && $self['cursor'] = $cursor;
        null !== $limit && $self['limit'] = $limit;

        return $self;
    }

    public function withConfigID(string $configID): self
    {
        $self = clone $this;
        $self['configID'] = $configID;

        return $self;
    }

    /**
     * Pagination cursor from the previous response.
     */
    public function withCursor(string $cursor): self
    {
        $self = clone $this;
        $self['cursor'] = $cursor;

        return $self;
    }

    /**
     * Maximum number of events to return per page.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }
}
