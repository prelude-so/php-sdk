<?php

declare(strict_types=1);

namespace Prelude\Notify;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;

/**
 * @phpstan-type NotifySendResponseShape = array{
 *   id: string,
 *   created_at: \DateTimeInterface,
 *   expires_at: \DateTimeInterface,
 *   template_id: string,
 *   to: string,
 *   variables: array<string,string>,
 *   callback_url?: string|null,
 *   correlation_id?: string|null,
 *   from?: string|null,
 *   schedule_at?: \DateTimeInterface|null,
 * }
 */
final class NotifySendResponse implements BaseModel
{
    /** @use SdkModel<NotifySendResponseShape> */
    use SdkModel;

    /**
     * The message identifier.
     */
    #[Api]
    public string $id;

    /**
     * The message creation date in RFC3339 format.
     */
    #[Api]
    public \DateTimeInterface $created_at;

    /**
     * The message expiration date in RFC3339 format.
     */
    #[Api]
    public \DateTimeInterface $expires_at;

    /**
     * The template identifier.
     */
    #[Api]
    public string $template_id;

    /**
     * The recipient's phone number in E.164 format.
     */
    #[Api]
    public string $to;

    /**
     * The variables to be replaced in the template.
     *
     * @var array<string,string> $variables
     */
    #[Api(map: 'string')]
    public array $variables;

    /**
     * The callback URL where webhooks will be sent.
     */
    #[Api(optional: true)]
    public ?string $callback_url;

    /**
     * A user-defined identifier to correlate this message with your internal systems.
     */
    #[Api(optional: true)]
    public ?string $correlation_id;

    /**
     * The Sender ID used for this message.
     */
    #[Api(optional: true)]
    public ?string $from;

    /**
     * When the message will actually be sent in RFC3339 format with timezone offset. For marketing messages, this may differ from the requested schedule_at due to automatic compliance adjustments.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $schedule_at;

    /**
     * `new NotifySendResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NotifySendResponse::with(
     *   id: ...,
     *   created_at: ...,
     *   expires_at: ...,
     *   template_id: ...,
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
        \DateTimeInterface $created_at,
        \DateTimeInterface $expires_at,
        string $template_id,
        string $to,
        array $variables,
        ?string $callback_url = null,
        ?string $correlation_id = null,
        ?string $from = null,
        ?\DateTimeInterface $schedule_at = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['created_at'] = $created_at;
        $obj['expires_at'] = $expires_at;
        $obj['template_id'] = $template_id;
        $obj['to'] = $to;
        $obj['variables'] = $variables;

        null !== $callback_url && $obj['callback_url'] = $callback_url;
        null !== $correlation_id && $obj['correlation_id'] = $correlation_id;
        null !== $from && $obj['from'] = $from;
        null !== $schedule_at && $obj['schedule_at'] = $schedule_at;

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
     * The template identifier.
     */
    public function withTemplateID(string $templateID): self
    {
        $obj = clone $this;
        $obj['template_id'] = $templateID;

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
        $obj['callback_url'] = $callbackURL;

        return $obj;
    }

    /**
     * A user-defined identifier to correlate this message with your internal systems.
     */
    public function withCorrelationID(string $correlationID): self
    {
        $obj = clone $this;
        $obj['correlation_id'] = $correlationID;

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
        $obj['schedule_at'] = $scheduleAt;

        return $obj;
    }
}
