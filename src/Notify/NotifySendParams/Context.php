<?php

declare(strict_types=1);

namespace Prelude\Notify\NotifySendParams;

use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;

/**
 * Context for replying to an inbound message. When provided, the message is sent as a WhatsApp reply within the 24-hour conversation window.
 *
 * @phpstan-type ContextShape = array{replyTo: string}
 */
final class Context implements BaseModel
{
    /** @use SdkModel<ContextShape> */
    use SdkModel;

    /**
     * The inbound message ID (prefixed with `im_`) to reply to. This ID is provided in the `inbound.message.received` webhook event.
     */
    #[Required('reply_to')]
    public string $replyTo;

    /**
     * `new Context()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Context::with(replyTo: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Context)->withReplyTo(...)
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
     */
    public static function with(string $replyTo): self
    {
        $self = new self;

        $self['replyTo'] = $replyTo;

        return $self;
    }

    /**
     * The inbound message ID (prefixed with `im_`) to reply to. This ID is provided in the `inbound.message.received` webhook event.
     */
    public function withReplyTo(string $replyTo): self
    {
        $self = clone $this;
        $self['replyTo'] = $replyTo;

        return $self;
    }
}
