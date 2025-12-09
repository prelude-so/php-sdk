<?php

declare(strict_types=1);

namespace Prelude\Notify\NotifyGetSubscriptionConfigResponse;

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
        $obj = new self;

        null !== $helpMessage && $obj['helpMessage'] = $helpMessage;
        null !== $startMessage && $obj['startMessage'] = $startMessage;
        null !== $stopMessage && $obj['stopMessage'] = $stopMessage;

        return $obj;
    }

    /**
     * Message sent when user requests help.
     */
    public function withHelpMessage(string $helpMessage): self
    {
        $obj = clone $this;
        $obj['helpMessage'] = $helpMessage;

        return $obj;
    }

    /**
     * Message sent when user subscribes.
     */
    public function withStartMessage(string $startMessage): self
    {
        $obj = clone $this;
        $obj['startMessage'] = $startMessage;

        return $obj;
    }

    /**
     * Message sent when user unsubscribes.
     */
    public function withStopMessage(string $stopMessage): self
    {
        $obj = clone $this;
        $obj['stopMessage'] = $stopMessage;

        return $obj;
    }
}
