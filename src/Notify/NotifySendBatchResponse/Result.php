<?php

declare(strict_types=1);

namespace Prelude\Notify\NotifySendBatchResponse;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Notify\NotifySendBatchResponse\Result\Error;
use Prelude\Notify\NotifySendBatchResponse\Result\Message;

/**
 * @phpstan-type ResultShape = array{
 *   phone_number: string,
 *   success: bool,
 *   error?: Error|null,
 *   message?: Message|null,
 * }
 */
final class Result implements BaseModel
{
    /** @use SdkModel<ResultShape> */
    use SdkModel;

    /**
     * The recipient's phone number in E.164 format.
     */
    #[Api]
    public string $phone_number;

    /**
     * Whether the message was accepted for delivery.
     */
    #[Api]
    public bool $success;

    /**
     * Present only if success is false.
     */
    #[Api(optional: true)]
    public ?Error $error;

    /**
     * Present only if success is true.
     */
    #[Api(optional: true)]
    public ?Message $message;

    /**
     * `new Result()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Result::with(phone_number: ..., success: ...)
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
     * @param Error|array{code?: string|null, message?: string|null} $error
     * @param Message|array{
     *   id?: string|null,
     *   correlation_id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   expires_at?: \DateTimeInterface|null,
     *   from?: string|null,
     *   locale?: string|null,
     *   schedule_at?: \DateTimeInterface|null,
     *   to?: string|null,
     * } $message
     */
    public static function with(
        string $phone_number,
        bool $success,
        Error|array|null $error = null,
        Message|array|null $message = null,
    ): self {
        $obj = new self;

        $obj['phone_number'] = $phone_number;
        $obj['success'] = $success;

        null !== $error && $obj['error'] = $error;
        null !== $message && $obj['message'] = $message;

        return $obj;
    }

    /**
     * The recipient's phone number in E.164 format.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }

    /**
     * Whether the message was accepted for delivery.
     */
    public function withSuccess(bool $success): self
    {
        $obj = clone $this;
        $obj['success'] = $success;

        return $obj;
    }

    /**
     * Present only if success is false.
     *
     * @param Error|array{code?: string|null, message?: string|null} $error
     */
    public function withError(Error|array $error): self
    {
        $obj = clone $this;
        $obj['error'] = $error;

        return $obj;
    }

    /**
     * Present only if success is true.
     *
     * @param Message|array{
     *   id?: string|null,
     *   correlation_id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   expires_at?: \DateTimeInterface|null,
     *   from?: string|null,
     *   locale?: string|null,
     *   schedule_at?: \DateTimeInterface|null,
     *   to?: string|null,
     * } $message
     */
    public function withMessage(Message|array $message): self
    {
        $obj = clone $this;
        $obj['message'] = $message;

        return $obj;
    }
}
