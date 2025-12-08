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
 *   help_message?: string|null,
 *   start_message?: string|null,
 *   stop_message?: string|null,
 * }
 */
final class Messages implements BaseModel
{
    /** @use SdkModel<MessagesShape> */
    use SdkModel;

    /**
     * Message sent when user requests help.
     */
    #[Optional]
    public ?string $help_message;

    /**
     * Message sent when user subscribes.
     */
    #[Optional]
    public ?string $start_message;

    /**
     * Message sent when user unsubscribes.
     */
    #[Optional]
    public ?string $stop_message;

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
        ?string $help_message = null,
        ?string $start_message = null,
        ?string $stop_message = null,
    ): self {
        $obj = new self;

        null !== $help_message && $obj['help_message'] = $help_message;
        null !== $start_message && $obj['start_message'] = $start_message;
        null !== $stop_message && $obj['stop_message'] = $stop_message;

        return $obj;
    }

    /**
     * Message sent when user requests help.
     */
    public function withHelpMessage(string $helpMessage): self
    {
        $obj = clone $this;
        $obj['help_message'] = $helpMessage;

        return $obj;
    }

    /**
     * Message sent when user subscribes.
     */
    public function withStartMessage(string $startMessage): self
    {
        $obj = clone $this;
        $obj['start_message'] = $startMessage;

        return $obj;
    }

    /**
     * Message sent when user unsubscribes.
     */
    public function withStopMessage(string $stopMessage): self
    {
        $obj = clone $this;
        $obj['stop_message'] = $stopMessage;

        return $obj;
    }
}
