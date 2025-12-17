<?php

declare(strict_types=1);

namespace Prelude\Notify;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Concerns\SdkParams;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Notify\NotifyListSubscriptionPhoneNumbersParams\State;

/**
 * Retrieve a paginated list of phone numbers and their subscription statuses for a specific subscription configuration.
 *
 * You can optionally filter by subscription state (SUB or UNSUB).
 *
 * @see Prelude\Services\NotifyService::listSubscriptionPhoneNumbers()
 *
 * @phpstan-type NotifyListSubscriptionPhoneNumbersParamsShape = array{
 *   cursor?: string|null, limit?: int|null, state?: null|State|value-of<State>
 * }
 */
final class NotifyListSubscriptionPhoneNumbersParams implements BaseModel
{
    /** @use SdkModel<NotifyListSubscriptionPhoneNumbersParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Pagination cursor from the previous response.
     */
    #[Optional]
    public ?string $cursor;

    /**
     * Maximum number of phone numbers to return per page.
     */
    #[Optional]
    public ?int $limit;

    /**
     * Filter by subscription state.
     *
     * @var value-of<State>|null $state
     */
    #[Optional(enum: State::class)]
    public ?string $state;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param State|value-of<State>|null $state
     */
    public static function with(
        ?string $cursor = null,
        ?int $limit = null,
        State|string|null $state = null
    ): self {
        $self = new self;

        null !== $cursor && $self['cursor'] = $cursor;
        null !== $limit && $self['limit'] = $limit;
        null !== $state && $self['state'] = $state;

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
     * Maximum number of phone numbers to return per page.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Filter by subscription state.
     *
     * @param State|value-of<State> $state
     */
    public function withState(State|string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }
}
