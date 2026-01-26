<?php

declare(strict_types=1);

namespace Prelude\Notify;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Notify\NotifySendResponse\Encoding;

/**
 * @phpstan-type NotifySendResponseShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   expiresAt: \DateTimeInterface,
 *   templateID: string,
 *   to: string,
 *   variables: array<string,string>,
 *   callbackURL?: string|null,
 *   correlationID?: string|null,
 *   encoding?: null|Encoding|value-of<Encoding>,
 *   estimatedSegmentCount?: int|null,
 *   from?: string|null,
 *   scheduleAt?: \DateTimeInterface|null,
 * }
 */
final class NotifySendResponse implements BaseModel
{
    /** @use SdkModel<NotifySendResponseShape> */
    use SdkModel;

    /**
     * The message identifier.
     */
    #[Required]
    public string $id;

    /**
     * The message creation date in RFC3339 format.
     */
    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    /**
     * The message expiration date in RFC3339 format.
     */
    #[Required('expires_at')]
    public \DateTimeInterface $expiresAt;

    /**
     * The template identifier.
     */
    #[Required('template_id')]
    public string $templateID;

    /**
     * The recipient's phone number in E.164 format.
     */
    #[Required]
    public string $to;

    /**
     * The variables to be replaced in the template.
     *
     * @var array<string,string> $variables
     */
    #[Required(map: 'string')]
    public array $variables;

    /**
     * The callback URL where webhooks will be sent.
     */
    #[Optional('callback_url')]
    public ?string $callbackURL;

    /**
     * A user-defined identifier to correlate this message with your internal systems.
     */
    #[Optional('correlation_id')]
    public ?string $correlationID;

    /**
     * The SMS encoding type based on message content. GSM-7 supports standard characters (up to 160 chars per segment), while UCS-2 supports Unicode including emoji (up to 70 chars per segment). Only present for SMS messages.
     *
     * @var value-of<Encoding>|null $encoding
     */
    #[Optional(enum: Encoding::class)]
    public ?string $encoding;

    /**
     * The estimated number of SMS segments for this message. This value is not contractual; the actual segment count will be determined after the SMS is sent by the provider. Only present for SMS messages.
     */
    #[Optional('estimated_segment_count')]
    public ?int $estimatedSegmentCount;

    /**
     * The Sender ID used for this message.
     */
    #[Optional]
    public ?string $from;

    /**
     * When the message will actually be sent in RFC3339 format with timezone offset. For marketing messages, this may differ from the requested schedule_at due to automatic compliance adjustments.
     */
    #[Optional('schedule_at')]
    public ?\DateTimeInterface $scheduleAt;

    /**
     * `new NotifySendResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NotifySendResponse::with(
     *   id: ...,
     *   createdAt: ...,
     *   expiresAt: ...,
     *   templateID: ...,
     *   to: ...,
     *   variables: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NotifySendResponse)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withExpiresAt(...)
     *   ->withTemplateID(...)
     *   ->withTo(...)
     *   ->withVariables(...)
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
     * @param array<string,string> $variables
     * @param Encoding|value-of<Encoding>|null $encoding
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        \DateTimeInterface $expiresAt,
        string $templateID,
        string $to,
        array $variables,
        ?string $callbackURL = null,
        ?string $correlationID = null,
        Encoding|string|null $encoding = null,
        ?int $estimatedSegmentCount = null,
        ?string $from = null,
        ?\DateTimeInterface $scheduleAt = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['expiresAt'] = $expiresAt;
        $self['templateID'] = $templateID;
        $self['to'] = $to;
        $self['variables'] = $variables;

        null !== $callbackURL && $self['callbackURL'] = $callbackURL;
        null !== $correlationID && $self['correlationID'] = $correlationID;
        null !== $encoding && $self['encoding'] = $encoding;
        null !== $estimatedSegmentCount && $self['estimatedSegmentCount'] = $estimatedSegmentCount;
        null !== $from && $self['from'] = $from;
        null !== $scheduleAt && $self['scheduleAt'] = $scheduleAt;

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
     * The template identifier.
     */
    public function withTemplateID(string $templateID): self
    {
        $self = clone $this;
        $self['templateID'] = $templateID;

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

    /**
     * The variables to be replaced in the template.
     *
     * @param array<string,string> $variables
     */
    public function withVariables(array $variables): self
    {
        $self = clone $this;
        $self['variables'] = $variables;

        return $self;
    }

    /**
     * The callback URL where webhooks will be sent.
     */
    public function withCallbackURL(string $callbackURL): self
    {
        $self = clone $this;
        $self['callbackURL'] = $callbackURL;

        return $self;
    }

    /**
     * A user-defined identifier to correlate this message with your internal systems.
     */
    public function withCorrelationID(string $correlationID): self
    {
        $self = clone $this;
        $self['correlationID'] = $correlationID;

        return $self;
    }

    /**
     * The SMS encoding type based on message content. GSM-7 supports standard characters (up to 160 chars per segment), while UCS-2 supports Unicode including emoji (up to 70 chars per segment). Only present for SMS messages.
     *
     * @param Encoding|value-of<Encoding> $encoding
     */
    public function withEncoding(Encoding|string $encoding): self
    {
        $self = clone $this;
        $self['encoding'] = $encoding;

        return $self;
    }

    /**
     * The estimated number of SMS segments for this message. This value is not contractual; the actual segment count will be determined after the SMS is sent by the provider. Only present for SMS messages.
     */
    public function withEstimatedSegmentCount(int $estimatedSegmentCount): self
    {
        $self = clone $this;
        $self['estimatedSegmentCount'] = $estimatedSegmentCount;

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
     * When the message will actually be sent in RFC3339 format with timezone offset. For marketing messages, this may differ from the requested schedule_at due to automatic compliance adjustments.
     */
    public function withScheduleAt(\DateTimeInterface $scheduleAt): self
    {
        $self = clone $this;
        $self['scheduleAt'] = $scheduleAt;

        return $self;
    }
}
