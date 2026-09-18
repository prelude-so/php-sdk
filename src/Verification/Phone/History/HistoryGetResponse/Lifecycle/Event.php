<?php

declare(strict_types=1);

namespace Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle\Event\Attempt;
use Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle\Event\Check;
use Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle\Event\Create;
use Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle\Event\Signals;
use Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle\Event\Type;

/**
 * One timeline entry. `type` names the single payload field that is set.
 *
 * @phpstan-import-type AttemptShape from \Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle\Event\Attempt
 * @phpstan-import-type CheckShape from \Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle\Event\Check
 * @phpstan-import-type CreateShape from \Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle\Event\Create
 * @phpstan-import-type SignalsShape from \Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle\Event\Signals
 *
 * @phpstan-type EventShape = array{
 *   type: Type|value-of<Type>,
 *   attempt?: null|Attempt|AttemptShape,
 *   check?: null|Check|CheckShape,
 *   create?: null|Create|CreateShape,
 *   signals?: null|Signals|SignalsShape,
 * }
 */
final class Event implements BaseModel
{
    /** @use SdkModel<EventShape> */
    use SdkModel;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * One message sent for this verification.
     */
    #[Optional]
    public ?Attempt $attempt;

    /**
     * One code submission for this verification.
     */
    #[Optional]
    public ?Check $check;

    #[Optional]
    public ?Create $create;

    #[Optional]
    public ?Signals $signals;

    /**
     * `new Event()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Event::with(type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Event)->withType(...)
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
     * @param Type|value-of<Type> $type
     * @param Attempt|AttemptShape|null $attempt
     * @param Check|CheckShape|null $check
     * @param Create|CreateShape|null $create
     * @param Signals|SignalsShape|null $signals
     */
    public static function with(
        Type|string $type,
        Attempt|array|null $attempt = null,
        Check|array|null $check = null,
        Create|array|null $create = null,
        Signals|array|null $signals = null,
    ): self {
        $self = new self;

        $self['type'] = $type;

        null !== $attempt && $self['attempt'] = $attempt;
        null !== $check && $self['check'] = $check;
        null !== $create && $self['create'] = $create;
        null !== $signals && $self['signals'] = $signals;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * One message sent for this verification.
     *
     * @param Attempt|AttemptShape $attempt
     */
    public function withAttempt(Attempt|array $attempt): self
    {
        $self = clone $this;
        $self['attempt'] = $attempt;

        return $self;
    }

    /**
     * One code submission for this verification.
     *
     * @param Check|CheckShape $check
     */
    public function withCheck(Check|array $check): self
    {
        $self = clone $this;
        $self['check'] = $check;

        return $self;
    }

    /**
     * @param Create|CreateShape $create
     */
    public function withCreate(Create|array $create): self
    {
        $self = clone $this;
        $self['create'] = $create;

        return $self;
    }

    /**
     * @param Signals|SignalsShape $signals
     */
    public function withSignals(Signals|array $signals): self
    {
        $self = clone $this;
        $self['signals'] = $signals;

        return $self;
    }
}
