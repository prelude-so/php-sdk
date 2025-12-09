<?php

declare(strict_types=1);

namespace Prelude\Notify;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Concerns\SdkParams;
use Prelude\Core\Contracts\BaseModel;

/**
 * Retrieve a paginated list of subscription management configurations for your account.
 *
 * Each configuration represents a subscription management setup with phone numbers for receiving opt-out/opt-in requests and a callback URL for webhook events.
 *
 * @see Prelude\Services\NotifyService::listSubscriptionConfigs()
 *
 * @phpstan-type NotifyListSubscriptionConfigsParamsShape = array{
 *   cursor?: string, limit?: int
 * }
 */
final class NotifyListSubscriptionConfigsParams implements BaseModel
{
    /** @use SdkModel<NotifyListSubscriptionConfigsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Pagination cursor from the previous response.
     */
    #[Optional]
    public ?string $cursor;

    /**
     * Maximum number of configurations to return per page.
     */
    #[Optional]
    public ?int $limit;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $cursor = null, ?int $limit = null): self
    {
        $self = new self;

        null !== $cursor && $self['cursor'] = $cursor;
        null !== $limit && $self['limit'] = $limit;

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
     * Maximum number of configurations to return per page.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }
}
