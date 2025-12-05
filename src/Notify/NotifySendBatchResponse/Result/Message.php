<?php

declare(strict_types=1);

namespace Prelude\Notify\NotifySendBatchResponse\Result;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;

/**
 * Present only if success is true.
 *
 * @phpstan-type MessageShape = array{
 *   id?: string|null,
 *   correlation_id?: string|null,
 *   created_at?: \DateTimeInterface|null,
 *   expires_at?: \DateTimeInterface|null,
 *   from?: string|null,
 *   locale?: string|null,
 *   schedule_at?: \DateTimeInterface|null,
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
    #[Api(optional: true)]
    public ?string $id;

    /**
     * The correlation identifier for the message.
     */
    #[Api(optional: true)]
    public ?string $correlation_id;

    /**
     * The message creation date in RFC3339 format.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    /**
     * The message expiration date in RFC3339 format.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $expires_at;

    /**
     * The Sender ID used for this message.
     */
    #[Api(optional: true)]
    public ?string $from;

    /**
     * The locale used for the message, if any.
     */
    #[Api(optional: true)]
    public ?string $locale;

    /**
     * When the message will actually be sent in RFC3339 format with timezone offset.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $schedule_at;

    /**
     * The recipient's phone number in E.164 format.
     */
    #[Api(optional: true)]
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
        ?string $correlation_id = null,
        ?\DateTimeInterface $created_at = null,
        ?\DateTimeInterface $expires_at = null,
        ?string $from = null,
        ?string $locale = null,
        ?\DateTimeInterface $schedule_at = null,
        ?string $to = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $correlation_id && $obj['correlation_id'] = $correlation_id;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $expires_at && $obj['expires_at'] = $expires_at;
        null !== $from && $obj['from'] = $from;
        null !== $locale && $obj['locale'] = $locale;
        null !== $schedule_at && $obj['schedule_at'] = $schedule_at;
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
        $obj['correlation_id'] = $correlationID;

        return $obj;
    }

    /**
     * The message creation date in RFC3339 format.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * The message expiration date in RFC3339 format.
     */
    public function withExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $obj = clone $this;
        $obj['expires_at'] = $expiresAt;

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
        $obj['schedule_at'] = $scheduleAt;

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
