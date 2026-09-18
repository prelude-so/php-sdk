<?php

declare(strict_types=1);

namespace Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle\Event;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle\Event\Attempt\Channel;
use Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle\Event\Attempt\DeliveryEvent;
use Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle\Event\Attempt\DeliveryStatus;
use Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle\Event\Attempt\PreferredChannel;
use Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle\Event\Attempt\Status;
use Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle\Event\Attempt\Trigger;
use Prelude\Verification\Phone\History\PhoneVerificationCarrier;
use Prelude\Verification\Phone\History\PhoneVerificationMoney;

/**
 * One message sent for this verification.
 *
 * @phpstan-import-type PhoneVerificationCarrierShape from \Prelude\Verification\Phone\History\PhoneVerificationCarrier
 * @phpstan-import-type PhoneVerificationMoneyShape from \Prelude\Verification\Phone\History\PhoneVerificationMoney
 * @phpstan-import-type DeliveryEventShape from \Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle\Event\Attempt\DeliveryEvent
 *
 * @phpstan-type AttemptShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   carrier?: null|PhoneVerificationCarrier|PhoneVerificationCarrierShape,
 *   channel?: null|Channel|value-of<Channel>,
 *   content?: string|null,
 *   cost?: null|PhoneVerificationMoney|PhoneVerificationMoneyShape,
 *   deliveryEvents?: list<DeliveryEvent|DeliveryEventShape>|null,
 *   deliveryStatus?: null|DeliveryStatus|value-of<DeliveryStatus>,
 *   preferredChannel?: null|PreferredChannel|value-of<PreferredChannel>,
 *   status?: null|Status|value-of<Status>,
 *   trigger?: null|Trigger|value-of<Trigger>,
 * }
 */
final class Attempt implements BaseModel
{
    /** @use SdkModel<AttemptShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    /**
     * The end user's mobile network.
     */
    #[Optional]
    public ?PhoneVerificationCarrier $carrier;

    /** @var value-of<Channel>|null $channel */
    #[Optional(enum: Channel::class)]
    public ?string $channel;

    /**
     * Message body. While the verification can still be completed, the code inside it is masked rather than removed.
     */
    #[Optional]
    public ?string $content;

    #[Optional]
    public ?PhoneVerificationMoney $cost;

    /** @var list<DeliveryEvent>|null $deliveryEvents */
    #[Optional('delivery_events', list: DeliveryEvent::class)]
    public ?array $deliveryEvents;

    /** @var value-of<DeliveryStatus>|null $deliveryStatus */
    #[Optional('delivery_status', enum: DeliveryStatus::class)]
    public ?string $deliveryStatus;

    /**
     * Channel you asked for, when it differs from the one used.
     *
     * @var value-of<PreferredChannel>|null $preferredChannel
     */
    #[Optional('preferred_channel', enum: PreferredChannel::class)]
    public ?string $preferredChannel;

    /** @var value-of<Status>|null $status */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * What caused the attempt.
     *
     * @var value-of<Trigger>|null $trigger
     */
    #[Optional(enum: Trigger::class)]
    public ?string $trigger;

    /**
     * `new Attempt()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Attempt::with(id: ..., createdAt: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Attempt)->withID(...)->withCreatedAt(...)
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
     * @param PhoneVerificationCarrier|PhoneVerificationCarrierShape|null $carrier
     * @param Channel|value-of<Channel>|null $channel
     * @param PhoneVerificationMoney|PhoneVerificationMoneyShape|null $cost
     * @param list<DeliveryEvent|DeliveryEventShape>|null $deliveryEvents
     * @param DeliveryStatus|value-of<DeliveryStatus>|null $deliveryStatus
     * @param PreferredChannel|value-of<PreferredChannel>|null $preferredChannel
     * @param Status|value-of<Status>|null $status
     * @param Trigger|value-of<Trigger>|null $trigger
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        PhoneVerificationCarrier|array|null $carrier = null,
        Channel|string|null $channel = null,
        ?string $content = null,
        PhoneVerificationMoney|array|null $cost = null,
        ?array $deliveryEvents = null,
        DeliveryStatus|string|null $deliveryStatus = null,
        PreferredChannel|string|null $preferredChannel = null,
        Status|string|null $status = null,
        Trigger|string|null $trigger = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;

        null !== $carrier && $self['carrier'] = $carrier;
        null !== $channel && $self['channel'] = $channel;
        null !== $content && $self['content'] = $content;
        null !== $cost && $self['cost'] = $cost;
        null !== $deliveryEvents && $self['deliveryEvents'] = $deliveryEvents;
        null !== $deliveryStatus && $self['deliveryStatus'] = $deliveryStatus;
        null !== $preferredChannel && $self['preferredChannel'] = $preferredChannel;
        null !== $status && $self['status'] = $status;
        null !== $trigger && $self['trigger'] = $trigger;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The end user's mobile network.
     *
     * @param PhoneVerificationCarrier|PhoneVerificationCarrierShape $carrier
     */
    public function withCarrier(PhoneVerificationCarrier|array $carrier): self
    {
        $self = clone $this;
        $self['carrier'] = $carrier;

        return $self;
    }

    /**
     * @param Channel|value-of<Channel> $channel
     */
    public function withChannel(Channel|string $channel): self
    {
        $self = clone $this;
        $self['channel'] = $channel;

        return $self;
    }

    /**
     * Message body. While the verification can still be completed, the code inside it is masked rather than removed.
     */
    public function withContent(string $content): self
    {
        $self = clone $this;
        $self['content'] = $content;

        return $self;
    }

    /**
     * @param PhoneVerificationMoney|PhoneVerificationMoneyShape $cost
     */
    public function withCost(PhoneVerificationMoney|array $cost): self
    {
        $self = clone $this;
        $self['cost'] = $cost;

        return $self;
    }

    /**
     * @param list<DeliveryEvent|DeliveryEventShape> $deliveryEvents
     */
    public function withDeliveryEvents(array $deliveryEvents): self
    {
        $self = clone $this;
        $self['deliveryEvents'] = $deliveryEvents;

        return $self;
    }

    /**
     * @param DeliveryStatus|value-of<DeliveryStatus> $deliveryStatus
     */
    public function withDeliveryStatus(
        DeliveryStatus|string $deliveryStatus
    ): self {
        $self = clone $this;
        $self['deliveryStatus'] = $deliveryStatus;

        return $self;
    }

    /**
     * Channel you asked for, when it differs from the one used.
     *
     * @param PreferredChannel|value-of<PreferredChannel> $preferredChannel
     */
    public function withPreferredChannel(
        PreferredChannel|string $preferredChannel
    ): self {
        $self = clone $this;
        $self['preferredChannel'] = $preferredChannel;

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

    /**
     * What caused the attempt.
     *
     * @param Trigger|value-of<Trigger> $trigger
     */
    public function withTrigger(Trigger|string $trigger): self
    {
        $self = clone $this;
        $self['trigger'] = $trigger;

        return $self;
    }
}
