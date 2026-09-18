<?php

declare(strict_types=1);

namespace Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle\Event\Attempt;

use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle\Event\Attempt\DeliveryEvent\Status;

/**
 * @phpstan-type DeliveryEventShape = array{
 *   receivedAt: \DateTimeInterface,
 *   status: \Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle\Event\Attempt\DeliveryEvent\Status|value-of<\Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle\Event\Attempt\DeliveryEvent\Status>,
 * }
 */
final class DeliveryEvent implements BaseModel
{
    /** @use SdkModel<DeliveryEventShape> */
    use SdkModel;

    #[Required('received_at')]
    public \DateTimeInterface $receivedAt;

    /**
     * The state this event reported. It is finer-grained than the attempt's `delivery_status` and includes the states a silent verification goes through.
     *
     * @var value-of<Status> $status
     */
    #[Required(
        enum: Status::class,
    )]
    public string $status;

    /**
     * `new DeliveryEvent()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DeliveryEvent::with(receivedAt: ..., status: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DeliveryEvent)->withReceivedAt(...)->withStatus(...)
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
     * @param Status|value-of<Status> $status
     */
    public static function with(
        \DateTimeInterface $receivedAt,
        Status|string $status,
    ): self {
        $self = new self;

        $self['receivedAt'] = $receivedAt;
        $self['status'] = $status;

        return $self;
    }

    public function withReceivedAt(\DateTimeInterface $receivedAt): self
    {
        $self = clone $this;
        $self['receivedAt'] = $receivedAt;

        return $self;
    }

    /**
     * The state this event reported. It is finer-grained than the attempt's `delivery_status` and includes the states a silent verification goes through.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(
        Status|string $status,
    ): self {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
