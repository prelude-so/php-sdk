<?php

declare(strict_types=1);

namespace Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle\Event;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle\Event\Signals\Status;

/**
 * @phpstan-type SignalsShape = array{
 *   receivedAt: \DateTimeInterface,
 *   expiredAt?: \DateTimeInterface|null,
 *   status?: null|Status|value-of<Status>,
 * }
 */
final class Signals implements BaseModel
{
    /** @use SdkModel<SignalsShape> */
    use SdkModel;

    #[Required('received_at')]
    public \DateTimeInterface $receivedAt;

    #[Optional('expired_at')]
    public ?\DateTimeInterface $expiredAt;

    /** @var value-of<Status>|null $status */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * `new Signals()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Signals::with(receivedAt: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Signals)->withReceivedAt(...)
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
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        \DateTimeInterface $receivedAt,
        ?\DateTimeInterface $expiredAt = null,
        Status|string|null $status = null,
    ): self {
        $self = new self;

        $self['receivedAt'] = $receivedAt;

        null !== $expiredAt && $self['expiredAt'] = $expiredAt;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    public function withReceivedAt(\DateTimeInterface $receivedAt): self
    {
        $self = clone $this;
        $self['receivedAt'] = $receivedAt;

        return $self;
    }

    public function withExpiredAt(\DateTimeInterface $expiredAt): self
    {
        $self = clone $this;
        $self['expiredAt'] = $expiredAt;

        return $self;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
