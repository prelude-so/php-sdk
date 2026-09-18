<?php

declare(strict_types=1);

namespace Prelude\Verification\Phone\History;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Concerns\SdkParams;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Verification\Phone\History\HistoryListParams\Channel;
use Prelude\Verification\Phone\History\HistoryListParams\DevicePlatform;
use Prelude\Verification\Phone\History\HistoryListParams\Status;

/**
 * List your phone verifications, most recent first, one entry per verification with its outcome, channels, attempts and cost. Every filter is optional and they combine with AND.
 *
 * Use it to find every verification a phone number went through from your support tooling, then [Get a phone verification](/verify/v2/api-reference/history/get-a-phone-verification) for the full timeline of one of them. A cursor is bound to the filters that produced it: pass `next_cursor` back with the exact same query parameters.
 *
 * @see Prelude\Services\Verification\Phone\HistoryService::list()
 *
 * @phpstan-type HistoryListParamsShape = array{
 *   channels?: list<Channel|value-of<Channel>>|null,
 *   cursor?: string|null,
 *   devicePlatform?: null|DevicePlatform|value-of<DevicePlatform>,
 *   from?: \DateTimeInterface|null,
 *   limit?: int|null,
 *   maxAttempts?: int|null,
 *   minAttempts?: int|null,
 *   phoneNumber?: string|null,
 *   region?: string|null,
 *   status?: null|Status|value-of<Status>,
 *   templateID?: string|null,
 *   to?: \DateTimeInterface|null,
 * }
 */
final class HistoryListParams implements BaseModel
{
    /** @use SdkModel<HistoryListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Only verifications that could use one of these channels. Repeat the parameter for several values.
     *
     * @var list<value-of<Channel>>|null $channels
     */
    #[Optional(list: Channel::class)]
    public ?array $channels;

    /**
     * Pagination cursor from the previous response.
     */
    #[Optional]
    public ?string $cursor;

    /**
     * Only verifications created from this device platform.
     *
     * @var value-of<DevicePlatform>|null $devicePlatform
     */
    #[Optional(enum: DevicePlatform::class)]
    public ?string $devicePlatform;

    /**
     * Only verifications created at or after this RFC 3339 timestamp. Goes with `to`, at most 6 months apart. Without them the whole history is searched.
     */
    #[Optional]
    public ?\DateTimeInterface $from;

    /**
     * Maximum number of verifications to return per page.
     */
    #[Optional]
    public ?int $limit;

    /**
     * Only verifications that sent at most this many messages. `0` keeps the verifications that never sent one.
     */
    #[Optional]
    public ?int $maxAttempts;

    /**
     * Only verifications that sent at least this many messages.
     */
    #[Optional]
    public ?int $minAttempts;

    /**
     * Only verifications targeting this E.164 phone number. The leading `+` may be omitted.
     */
    #[Optional]
    public ?string $phoneNumber;

    /**
     * Only verifications of phone numbers from this region, as an ISO 3166-1 alpha-2 code.
     */
    #[Optional]
    public ?string $region;

    /**
     * Only verifications in this status. `pending_check` cannot be filtered on.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * Only verifications sent with this template, as returned in `template_id` by [Get a phone verification](/verify/v2/api-reference/history/get-a-phone-verification). Built-in templates (`prelude:*`) cannot be filtered on.
     */
    #[Optional]
    public ?string $templateID;

    /**
     * Only verifications created at or before this RFC 3339 timestamp. Goes with `from`.
     */
    #[Optional]
    public ?\DateTimeInterface $to;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Channel|value-of<Channel>>|null $channels
     * @param DevicePlatform|value-of<DevicePlatform>|null $devicePlatform
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        ?array $channels = null,
        ?string $cursor = null,
        DevicePlatform|string|null $devicePlatform = null,
        ?\DateTimeInterface $from = null,
        ?int $limit = null,
        ?int $maxAttempts = null,
        ?int $minAttempts = null,
        ?string $phoneNumber = null,
        ?string $region = null,
        Status|string|null $status = null,
        ?string $templateID = null,
        ?\DateTimeInterface $to = null,
    ): self {
        $self = new self;

        null !== $channels && $self['channels'] = $channels;
        null !== $cursor && $self['cursor'] = $cursor;
        null !== $devicePlatform && $self['devicePlatform'] = $devicePlatform;
        null !== $from && $self['from'] = $from;
        null !== $limit && $self['limit'] = $limit;
        null !== $maxAttempts && $self['maxAttempts'] = $maxAttempts;
        null !== $minAttempts && $self['minAttempts'] = $minAttempts;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $region && $self['region'] = $region;
        null !== $status && $self['status'] = $status;
        null !== $templateID && $self['templateID'] = $templateID;
        null !== $to && $self['to'] = $to;

        return $self;
    }

    /**
     * Only verifications that could use one of these channels. Repeat the parameter for several values.
     *
     * @param list<Channel|value-of<Channel>> $channels
     */
    public function withChannels(array $channels): self
    {
        $self = clone $this;
        $self['channels'] = $channels;

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
     * Only verifications created from this device platform.
     *
     * @param DevicePlatform|value-of<DevicePlatform> $devicePlatform
     */
    public function withDevicePlatform(
        DevicePlatform|string $devicePlatform
    ): self {
        $self = clone $this;
        $self['devicePlatform'] = $devicePlatform;

        return $self;
    }

    /**
     * Only verifications created at or after this RFC 3339 timestamp. Goes with `to`, at most 6 months apart. Without them the whole history is searched.
     */
    public function withFrom(\DateTimeInterface $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * Maximum number of verifications to return per page.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Only verifications that sent at most this many messages. `0` keeps the verifications that never sent one.
     */
    public function withMaxAttempts(int $maxAttempts): self
    {
        $self = clone $this;
        $self['maxAttempts'] = $maxAttempts;

        return $self;
    }

    /**
     * Only verifications that sent at least this many messages.
     */
    public function withMinAttempts(int $minAttempts): self
    {
        $self = clone $this;
        $self['minAttempts'] = $minAttempts;

        return $self;
    }

    /**
     * Only verifications targeting this E.164 phone number. The leading `+` may be omitted.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Only verifications of phone numbers from this region, as an ISO 3166-1 alpha-2 code.
     */
    public function withRegion(string $region): self
    {
        $self = clone $this;
        $self['region'] = $region;

        return $self;
    }

    /**
     * Only verifications in this status. `pending_check` cannot be filtered on.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Only verifications sent with this template, as returned in `template_id` by [Get a phone verification](/verify/v2/api-reference/history/get-a-phone-verification). Built-in templates (`prelude:*`) cannot be filtered on.
     */
    public function withTemplateID(string $templateID): self
    {
        $self = clone $this;
        $self['templateID'] = $templateID;

        return $self;
    }

    /**
     * Only verifications created at or before this RFC 3339 timestamp. Goes with `from`.
     */
    public function withTo(\DateTimeInterface $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }
}
