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
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $correlationID && $self['correlationID'] = $correlationID;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $expiresAt && $self['expiresAt'] = $expiresAt;
        null !== $from && $self['from'] = $from;
        null !== $locale && $self['locale'] = $locale;
        null !== $scheduleAt && $self['scheduleAt'] = $scheduleAt;
        null !== $to && $self['to'] = $to;

        return $self;
    }

    /**
     * The message identifier.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The correlation identifier for the message.
     */
    public function withCorrelationID(string $correlationID): self
    {
        $self = clone $this;
        $self['correlationID'] = $correlationID;

        return $self;
    }

    /**
     * The message creation date in RFC3339 format.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The message expiration date in RFC3339 format.
     */
    public function withExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $self = clone $this;
        $self['expiresAt'] = $expiresAt;

        return $self;
    }

    /**
     * The Sender ID used for this message.
     */
    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * The locale used for the message, if any.
     */
    public function withLocale(string $locale): self
    {
        $self = clone $this;
        $self['locale'] = $locale;

        return $self;
    }

    /**
     * When the message will actually be sent in RFC3339 format with timezone offset.
     */
    public function withScheduleAt(\DateTimeInterface $scheduleAt): self
    {
        $self = clone $this;
        $self['scheduleAt'] = $scheduleAt;

        return $self;
    }

    /**
     * The recipient's phone number in E.164 format.
     */
    public function withTo(string $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }
}
