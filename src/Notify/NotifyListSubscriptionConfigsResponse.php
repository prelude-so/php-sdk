<?php

declare(strict_types=1);

namespace Prelude\Notify;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Notify\NotifyListSubscriptionConfigsResponse\Config;

/**
 * @phpstan-import-type ConfigShape from \Prelude\Notify\NotifyListSubscriptionConfigsResponse\Config
 *
 * @phpstan-type NotifyListSubscriptionConfigsResponseShape = array{
 *   configs: list<Config|ConfigShape>, nextCursor?: string|null
 * }
 */
final class NotifyListSubscriptionConfigsResponse implements BaseModel
{
    /** @use SdkModel<NotifyListSubscriptionConfigsResponseShape> */
    use SdkModel;

    /**
     * A list of subscription management configurations.
     *
     * @var list<Config> $configs
     */
    #[Required(list: Config::class)]
    public array $configs;

    /**
     * Pagination cursor for the next page of results. Omitted if there are no more pages.
     */
    #[Optional('next_cursor')]
    public ?string $nextCursor;

    /**
     * `new NotifyListSubscriptionConfigsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NotifyListSubscriptionConfigsResponse::with(configs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NotifyListSubscriptionConfigsResponse)->withConfigs(...)
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
     * @param list<Config|ConfigShape> $configs
     */
    public static function with(array $configs, ?string $nextCursor = null): self
    {
        $self = new self;

        $self['configs'] = $configs;

        null !== $nextCursor && $self['nextCursor'] = $nextCursor;

        return $self;
    }

    /**
     * A list of subscription management configurations.
     *
     * @param list<Config|ConfigShape> $configs
     */
    public function withConfigs(array $configs): self
    {
        $self = clone $this;
        $self['configs'] = $configs;

        return $self;
    }

    /**
     * Pagination cursor for the next page of results. Omitted if there are no more pages.
     */
    public function withNextCursor(string $nextCursor): self
    {
        $self = clone $this;
        $self['nextCursor'] = $nextCursor;

        return $self;
    }
}
