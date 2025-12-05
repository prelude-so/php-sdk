<?php

declare(strict_types=1);

namespace Prelude\Notify;

use Prelude\Core\Attributes\Api;
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
 *   cursor?: string, limit?: int, state?: State|value-of<State>
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
    #[Api(optional: true)]
    public ?string $cursor;

    /**
     * Maximum number of phone numbers to return per page.
     */
    #[Api(optional: true)]
    public ?int $limit;

    /**
     * Filter by subscription state.
     *
     * @var value-of<State>|null $state
     */
    #[Api(enum: State::class, optional: true)]
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
     * @param State|value-of<State> $state
     */
    public static function with(
        ?string $cursor = null,
        ?int $limit = null,
        State|string|null $state = null
    ): self {
        $obj = new self;

        null !== $cursor && $obj->cursor = $cursor;
        null !== $limit && $obj->limit = $limit;
        null !== $state && $obj['state'] = $state;

        return $obj;
    }

    /**
     * Pagination cursor from the previous response.
     */
    public function withCursor(string $cursor): self
    {
        $obj = clone $this;
        $obj->cursor = $cursor;

        return $obj;
    }

    /**
     * Maximum number of phone numbers to return per page.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }

    /**
     * Filter by subscription state.
     *
     * @param State|value-of<State> $state
     */
    public function withState(State|string $state): self
    {
        $obj = clone $this;
        $obj['state'] = $state;

        return $obj;
    }
}
