<?php

declare(strict_types=1);

namespace Prelude\Watch\WatchSendEventsParams;

use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Watch\WatchSendEventsParams\Event\Confidence;
use Prelude\Watch\WatchSendEventsParams\Event\Target;

/**
 * @phpstan-import-type TargetShape from \Prelude\Watch\WatchSendEventsParams\Event\Target
 *
 * @phpstan-type EventShape = array{
 *   confidence: Confidence|value-of<Confidence>,
 *   label: string,
 *   target: Target|TargetShape,
 * }
 */
final class Event implements BaseModel
{
    /** @use SdkModel<EventShape> */
    use SdkModel;

    /**
     * How much this event tells us to trust the end-user's legitimacy — not how certain you are that the event occurred. In increasing order of trust: `minimum`, `low`, `neutral`, `high`, `maximum`.
     *
     * Use `minimum` for an event tied to a user you trust the least to be legitimate (e.g. a `payment.chargeback`), and `maximum` for an event tied to a highly trustworthy user (e.g. a confirmed 3DS payment). Prelude weights these signals when scoring traffic: it filters out users tied to low-confidence events while preserving the experience for users tied to high-confidence ones.
     *
     * @var value-of<Confidence> $confidence
     */
    #[Required(enum: Confidence::class)]
    public string $confidence;

    /**
     * A label to describe what the event refers to.
     */
    #[Required]
    public string $label;

    /**
     * The event target. Only supports phone numbers for now.
     */
    #[Required]
    public Target $target;

    /**
     * `new Event()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Event::with(confidence: ..., label: ..., target: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Event)->withConfidence(...)->withLabel(...)->withTarget(...)
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
     * @param Confidence|value-of<Confidence> $confidence
     * @param Target|TargetShape $target
     */
    public static function with(
        Confidence|string $confidence,
        string $label,
        Target|array $target
    ): self {
        $self = new self;

        $self['confidence'] = $confidence;
        $self['label'] = $label;
        $self['target'] = $target;

        return $self;
    }

    /**
     * How much this event tells us to trust the end-user's legitimacy — not how certain you are that the event occurred. In increasing order of trust: `minimum`, `low`, `neutral`, `high`, `maximum`.
     *
     * Use `minimum` for an event tied to a user you trust the least to be legitimate (e.g. a `payment.chargeback`), and `maximum` for an event tied to a highly trustworthy user (e.g. a confirmed 3DS payment). Prelude weights these signals when scoring traffic: it filters out users tied to low-confidence events while preserving the experience for users tied to high-confidence ones.
     *
     * @param Confidence|value-of<Confidence> $confidence
     */
    public function withConfidence(Confidence|string $confidence): self
    {
        $self = clone $this;
        $self['confidence'] = $confidence;

        return $self;
    }

    /**
     * A label to describe what the event refers to.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * The event target. Only supports phone numbers for now.
     *
     * @param Target|TargetShape $target
     */
    public function withTarget(Target|array $target): self
    {
        $self = clone $this;
        $self['target'] = $target;

        return $self;
    }
}
