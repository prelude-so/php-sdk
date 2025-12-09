<?php

declare(strict_types=1);

namespace Prelude\Notify\NotifyListSubscriptionConfigsResponse\Config;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;

/**
 * The subscription messages configuration.
 *
 * @phpstan-type MessagesShape = array{
 *   helpMessage?: string|null,
 *   startMessage?: string|null,
 *   stopMessage?: string|null,
 * }
 */
final class Messages implements BaseModel
{
    /** @use SdkModel<MessagesShape> */
    use SdkModel;

    /**
     * Message sent when user requests help.
     */
    #[Optional('help_message')]
    public ?string $helpMessage;

    /**
     * Message sent when user subscribes.
     */
    #[Optional('start_message')]
    public ?string $startMessage;

    /**
     * Message sent when user unsubscribes.
     */
    #[Optional('stop_message')]
    public ?string $stopMessage;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $helpMessage = null,
        ?string $startMessage = null,
        ?string $stopMessage = null,
    ): self {
        $self = new self;

        null !== $helpMessage && $self['helpMessage'] = $helpMessage;
        null !== $startMessage && $self['startMessage'] = $startMessage;
        null !== $stopMessage && $self['stopMessage'] = $stopMessage;

        return $self;
    }

    /**
     * Message sent when user requests help.
     */
    public function withHelpMessage(string $helpMessage): self
    {
        $self = clone $this;
        $self['helpMessage'] = $helpMessage;

        return $self;
    }

    /**
     * Message sent when user subscribes.
     */
    public function withStartMessage(string $startMessage): self
    {
        $self = clone $this;
        $self['startMessage'] = $startMessage;

        return $self;
    }

    /**
     * Message sent when user unsubscribes.
     */
    public function withStopMessage(string $stopMessage): self
    {
        $self = clone $this;
        $self['stopMessage'] = $stopMessage;

        return $self;
    }
}
