<?php

declare(strict_types=1);

namespace Prelude\Verification\Phone\History\HistoryListResponse\Verification;

use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Verification\Phone\History\HistoryListResponse\Verification\Channel1\Channel;

/**
 * @phpstan-type Channel1Shape = array{
 *   channel: Channel|value-of<Channel>, converted: bool
 * }
 */
final class Channel1 implements BaseModel
{
    /** @use SdkModel<Channel1Shape> */
    use SdkModel;

    /** @var value-of<Channel> $channel */
    #[Required(enum: Channel::class)]
    public string $channel;

    /**
     * Whether the end user submitted a valid code received through this channel.
     */
    #[Required]
    public bool $converted;

    /**
     * `new Channel1()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Channel1::with(channel: ..., converted: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Channel1)->withChannel(...)->withConverted(...)
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
     * @param Channel|value-of<Channel> $channel
     */
    public static function with(Channel|string $channel, bool $converted): self
    {
        $self = new self;

        $self['channel'] = $channel;
        $self['converted'] = $converted;

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
     * Whether the end user submitted a valid code received through this channel.
     */
    public function withConverted(bool $converted): self
    {
        $self = clone $this;
        $self['converted'] = $converted;

        return $self;
    }
}
