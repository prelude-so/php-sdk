<?php

declare(strict_types=1);

namespace Prelude\Notify\NotifySendBatchResponse\Result;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;

/**
 * Present only if success is true.
 *
 * @phpstan-type MessageShape = array{
 *   id?: string|null,
 *   correlationID?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   expiresAt?: \DateTimeInterface|null,
 *   from?: string|null,
 *   locale?: string|null,
 *   scheduleAt?: \DateTimeInterface|null,
 *   to?: string|null,
 * }
 */
final class Message implements BaseModel
{
    /** @use SdkModel<MessageShape> */
    use SdkModel;

    /**
     * The message identifier.
     */
    #[Optional]
    public ?string $id;

    /**
     * The correlation identifier for the message.
     */
    #[Optional('correlation_id')]
    public ?string $correlationID;

    /**
     * The message creation date in RFC3339 format.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * The message expiration date in RFC3339 format.
     */
    #[Optional('expires_at')]
    public ?\DateTimeInterface $expiresAt;

    /**
     * The Sender ID used for this message.
     */
    #[Optional]
    public ?string $from;

    /**
     * The locale used for the message, if any.
     */
    #[Optional]
    public ?string $locale;

    /**
     * When the message will actually be sent in RFC3339 format with timezone offset.
     */
    #[Optional('schedule_at')]
    public ?\DateTimeInterface $scheduleAt;

    /**
     * The recipient's phone number in E.164 format.
     */
    #[Optional]
    public ?string $to;

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
        ?string $id = null,
        ?string $correlationID = null,
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $expiresAt = null,
        ?string $from = null,
        ?string $locale = null,
        ?\DateTimeInterface $scheduleAt = null,
        ?string $to = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $correlationID && $obj['correlationID'] = $correlationID;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $expiresAt && $obj['expiresAt'] = $expiresAt;
        null !== $from && $obj['from'] = $from;
        null !== $locale && $obj['locale'] = $locale;
        null !== $scheduleAt && $obj['scheduleAt'] = $scheduleAt;
        null !== $to && $obj['to'] = $to;

        return $obj;
    }

    /**
     * The message identifier.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The correlation identifier for the message.
     */
    public function withCorrelationID(string $correlationID): self
    {
        $obj = clone $this;
        $obj['correlationID'] = $correlationID;

        return $obj;
    }

    /**
     * The message creation date in RFC3339 format.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * The message expiration date in RFC3339 format.
     */
    public function withExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $obj = clone $this;
        $obj['expiresAt'] = $expiresAt;

        return $obj;
    }

    /**
     * The Sender ID used for this message.
     */
    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj['from'] = $from;

        return $obj;
    }

    /**
     * The locale used for the message, if any.
     */
    public function withLocale(string $locale): self
    {
        $obj = clone $this;
        $obj['locale'] = $locale;

        return $obj;
    }

    /**
     * When the message will actually be sent in RFC3339 format with timezone offset.
     */
    public function withScheduleAt(\DateTimeInterface $scheduleAt): self
    {
        $obj = clone $this;
        $obj['scheduleAt'] = $scheduleAt;

        return $obj;
    }

    /**
     * The recipient's phone number in E.164 format.
     */
    public function withTo(string $to): self
    {
        $obj = clone $this;
        $obj['to'] = $to;

        return $obj;
    }
}
