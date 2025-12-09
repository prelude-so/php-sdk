<?php

declare(strict_types=1);

namespace Prelude\Notify;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Notify\NotifyListSubscriptionPhoneNumbersResponse\PhoneNumber;
use Prelude\Notify\NotifyListSubscriptionPhoneNumbersResponse\PhoneNumber\Source;
use Prelude\Notify\NotifyListSubscriptionPhoneNumbersResponse\PhoneNumber\State;

/**
 * @phpstan-type NotifyListSubscriptionPhoneNumbersResponseShape = array{
 *   phoneNumbers: list<PhoneNumber>, nextCursor?: string|null
 * }
 */
final class NotifyListSubscriptionPhoneNumbersResponse implements BaseModel
{
    /** @use SdkModel<NotifyListSubscriptionPhoneNumbersResponseShape> */
    use SdkModel;

    /**
     * A list of phone numbers and their subscription statuses.
     *
     * @var list<PhoneNumber> $phoneNumbers
     */
    #[Required('phone_numbers', list: PhoneNumber::class)]
    public array $phoneNumbers;

    /**
     * Pagination cursor for the next page of results. Omitted if there are no more pages.
     */
    #[Optional('next_cursor')]
    public ?string $nextCursor;

    /**
     * `new NotifyListSubscriptionPhoneNumbersResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NotifyListSubscriptionPhoneNumbersResponse::with(phoneNumbers: ...)
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
     * @param list<PhoneNumber|array{
     *   configID: string,
     *   phoneNumber: string,
     *   source: value-of<Source>,
     *   state: value-of<State>,
     *   updatedAt: \DateTimeInterface,
     *   reason?: string|null,
     * }> $phoneNumbers
     */
    public static function with(
        array $phoneNumbers,
        ?string $nextCursor = null
    ): self {
        $obj = new self;

        $obj['phoneNumbers'] = $phoneNumbers;

        null !== $nextCursor && $obj['nextCursor'] = $nextCursor;

        return $obj;
    }

    /**
     * A list of phone numbers and their subscription statuses.
     *
     * @param list<PhoneNumber|array{
     *   configID: string,
     *   phoneNumber: string,
     *   source: value-of<Source>,
     *   state: value-of<State>,
     *   updatedAt: \DateTimeInterface,
     *   reason?: string|null,
     * }> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj['phoneNumbers'] = $phoneNumbers;

        return $obj;
    }

    /**
     * Pagination cursor for the next page of results. Omitted if there are no more pages.
     */
    public function withNextCursor(string $nextCursor): self
    {
        $obj = clone $this;
        $obj['nextCursor'] = $nextCursor;

        return $obj;
    }
}
