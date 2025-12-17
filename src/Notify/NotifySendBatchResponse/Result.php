<?php

declare(strict_types=1);

namespace Prelude\Notify\NotifySendBatchResponse;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Notify\NotifySendBatchResponse\Result\Error;
use Prelude\Notify\NotifySendBatchResponse\Result\Message;

/**
 * @phpstan-import-type ErrorShape from \Prelude\Notify\NotifySendBatchResponse\Result\Error
 * @phpstan-import-type MessageShape from \Prelude\Notify\NotifySendBatchResponse\Result\Message
 *
 * @phpstan-type ResultShape = array{
 *   phoneNumber: string,
 *   success: bool,
 *   error?: null|Error|ErrorShape,
 *   message?: null|Message|MessageShape,
 * }
 */
final class Result implements BaseModel
{
    /** @use SdkModel<ResultShape> */
    use SdkModel;

    /**
     * The recipient's phone number in E.164 format.
     */
    #[Required('phone_number')]
    public string $phoneNumber;

    /**
     * Whether the message was accepted for delivery.
     */
    #[Required]
    public bool $success;

    /**
     * Present only if success is false.
     */
    #[Optional]
    public ?Error $error;

    /**
     * Present only if success is true.
     */
    #[Optional]
    public ?Message $message;

    /**
     * `new Result()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Result::with(phoneNumber: ..., success: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Result)->withPhoneNumber(...)->withSuccess(...)
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
     * @param Error|ErrorShape|null $error
     * @param Message|MessageShape|null $message
     */
    public static function with(
        string $phoneNumber,
        bool $success,
        Error|array|null $error = null,
        Message|array|null $message = null,
    ): self {
        $self = new self;

        $self['phoneNumber'] = $phoneNumber;
        $self['success'] = $success;

        null !== $error && $self['error'] = $error;
        null !== $message && $self['message'] = $message;

        return $self;
    }

    /**
     * The recipient's phone number in E.164 format.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Whether the message was accepted for delivery.
     */
    public function withSuccess(bool $success): self
    {
        $self = clone $this;
        $self['success'] = $success;

        return $self;
    }

    /**
     * Present only if success is false.
     *
     * @param Error|ErrorShape $error
     */
    public function withError(Error|array $error): self
    {
        $self = clone $this;
        $self['error'] = $error;

        return $self;
    }

    /**
     * Present only if success is true.
     *
     * @param Message|MessageShape $message
     */
    public function withMessage(Message|array $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }
}
