<?php

declare(strict_types=1);

namespace Prelude\Notify;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;

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
        ?string $from = null,
        ?\DateTimeInterface $scheduleAt = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['createdAt'] = $createdAt;
        $obj['expiresAt'] = $expiresAt;
        $obj['templateID'] = $templateID;
        $obj['to'] = $to;
        $obj['variables'] = $variables;

        null !== $callbackURL && $obj['callbackURL'] = $callbackURL;
        null !== $correlationID && $obj['correlationID'] = $correlationID;
        null !== $from && $obj['from'] = $from;
        null !== $scheduleAt && $obj['scheduleAt'] = $scheduleAt;

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
     * The template identifier.
     */
    public function withTemplateID(string $templateID): self
    {
        $obj = clone $this;
        $obj['templateID'] = $templateID;

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

    /**
     * The variables to be replaced in the template.
     *
     * @param array<string,string> $variables
     */
    public function withVariables(array $variables): self
    {
        $obj = clone $this;
        $obj['variables'] = $variables;

        return $obj;
    }

    /**
     * The callback URL where webhooks will be sent.
     */
    public function withCallbackURL(string $callbackURL): self
    {
        $obj = clone $this;
        $obj['callbackURL'] = $callbackURL;

        return $obj;
    }

    /**
     * A user-defined identifier to correlate this message with your internal systems.
     */
    public function withCorrelationID(string $correlationID): self
    {
        $obj = clone $this;
        $obj['correlationID'] = $correlationID;

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
     * When the message will actually be sent in RFC3339 format with timezone offset. For marketing messages, this may differ from the requested schedule_at due to automatic compliance adjustments.
     */
    public function withScheduleAt(\DateTimeInterface $scheduleAt): self
    {
        $obj = clone $this;
        $obj['scheduleAt'] = $scheduleAt;

        return $obj;
    }
}
