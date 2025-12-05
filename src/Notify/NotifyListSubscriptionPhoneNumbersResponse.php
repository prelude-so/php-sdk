<?php

declare(strict_types=1);

namespace Prelude\Notify;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Concerns\SdkResponse;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\Conversion\Contracts\ResponseConverter;
use Prelude\Notify\NotifyListSubscriptionPhoneNumbersResponse\PhoneNumber;

/**
 * @phpstan-type NotifyListSubscriptionPhoneNumbersResponseShape = array{
 *   phone_numbers: list<PhoneNumber>, next_cursor?: string|null
 * }
 */
final class NotifyListSubscriptionPhoneNumbersResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<NotifyListSubscriptionPhoneNumbersResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * A list of phone numbers and their subscription statuses.
     *
     * @var list<PhoneNumber> $phone_numbers
     */
    #[Api(list: PhoneNumber::class)]
    public array $phone_numbers;

    /**
     * Pagination cursor for the next page of results. Omitted if there are no more pages.
     */
    #[Api(optional: true)]
    public ?string $next_cursor;

    /**
     * `new NotifyListSubscriptionPhoneNumbersResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NotifyListSubscriptionPhoneNumbersResponse::with(phone_numbers: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NotifyListSubscriptionPhoneNumbersResponse)->withPhoneNumbers(...)
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
     *
     * @param list<PhoneNumber> $phone_numbers
     */
    public static function with(
        array $phone_numbers,
        ?string $next_cursor = null
    ): self {
        $obj = new self;

        $obj->phone_numbers = $phone_numbers;

        null !== $next_cursor && $obj->next_cursor = $next_cursor;

        return $obj;
    }

    /**
     * A list of phone numbers and their subscription statuses.
     *
     * @param list<PhoneNumber> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj->phone_numbers = $phoneNumbers;

        return $obj;
    }

    /**
     * Pagination cursor for the next page of results. Omitted if there are no more pages.
     */
    public function withNextCursor(string $nextCursor): self
    {
        $obj = clone $this;
        $obj->next_cursor = $nextCursor;

        return $obj;
    }
}
