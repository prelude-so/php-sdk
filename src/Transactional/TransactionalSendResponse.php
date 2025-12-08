<?php

declare(strict_types=1);

namespace Prelude\Transactional;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;

/**
 * @phpstan-type TransactionalSendResponseShape = array{
 *   id: string,
 *   created_at: \DateTimeInterface,
 *   expires_at: \DateTimeInterface,
 *   template_id: string,
 *   to: string,
 *   variables: array<string,string>,
 *   callback_url?: string|null,
 *   correlation_id?: string|null,
 *   from?: string|null,
 * }
 */
final class TransactionalSendResponse implements BaseModel
{
    /** @use SdkModel<TransactionalSendResponseShape> */
    use SdkModel;

    /**
     * The message identifier.
     */
    #[Required]
    public string $id;

    /**
     * The message creation date.
     */
    #[Required]
    public \DateTimeInterface $created_at;

    /**
     * The message expiration date.
     */
    #[Required]
    public \DateTimeInterface $expires_at;

    /**
     * The template identifier.
     */
    #[Required]
    public string $template_id;

    /**
     * The recipient's phone number.
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
     * The callback URL.
     */
    #[Optional]
    public ?string $callback_url;

    /**
     * A user-defined identifier to correlate this transactional message with. It is returned in the response and any webhook events that refer to this transactional message.
     */
    #[Optional]
    public ?string $correlation_id;

    /**
     * The Sender ID.
     */
    #[Optional]
    public ?string $from;

    /**
     * `new TransactionalSendResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TransactionalSendResponse::with(
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
     * (new TransactionalSendResponse)
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
     * The message creation date.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * The message expiration date.
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
     * The recipient's phone number.
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
     * The callback URL.
     */
    public function withCallbackURL(string $callbackURL): self
    {
        $obj = clone $this;
        $obj['callback_url'] = $callbackURL;

        return $obj;
    }

    /**
     * A user-defined identifier to correlate this transactional message with. It is returned in the response and any webhook events that refer to this transactional message.
     */
    public function withCorrelationID(string $correlationID): self
    {
        $obj = clone $this;
        $obj['correlation_id'] = $correlationID;

        return $obj;
    }

    /**
     * The Sender ID.
     */
    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj['from'] = $from;

        return $obj;
    }
}
