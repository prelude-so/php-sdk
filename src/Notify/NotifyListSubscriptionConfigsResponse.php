<?php

declare(strict_types=1);

namespace Prelude\Notify;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Notify\NotifyListSubscriptionConfigsResponse\Config;
use Prelude\Notify\NotifyListSubscriptionConfigsResponse\Config\Messages;
use Prelude\Notify\NotifyListSubscriptionConfigsResponse\Config\MoPhoneNumber;

/**
 * @phpstan-type NotifyListSubscriptionConfigsResponseShape = array{
 *   configs: list<Config>, next_cursor?: string|null
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
    #[Api(list: Config::class)]
    public array $configs;

    /**
     * Pagination cursor for the next page of results. Omitted if there are no more pages.
     */
    #[Api(optional: true)]
    public ?string $next_cursor;

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
     * @param list<Config|array{
     *   id: string,
     *   callback_url: string,
     *   created_at: \DateTimeInterface,
     *   messages: Messages,
     *   name: string,
     *   updated_at: \DateTimeInterface,
     *   mo_phone_numbers?: list<MoPhoneNumber>|null,
     * }> $configs
     */
    public static function with(
        array $configs,
        ?string $next_cursor = null
    ): self {
        $obj = new self;

        $obj['configs'] = $configs;

        null !== $next_cursor && $obj['next_cursor'] = $next_cursor;

        return $obj;
    }

    /**
     * A list of subscription management configurations.
     *
     * @param list<Config|array{
     *   id: string,
     *   callback_url: string,
     *   created_at: \DateTimeInterface,
     *   messages: Messages,
     *   name: string,
     *   updated_at: \DateTimeInterface,
     *   mo_phone_numbers?: list<MoPhoneNumber>|null,
     * }> $configs
     */
    public function withConfigs(array $configs): self
    {
        $obj = clone $this;
        $obj['configs'] = $configs;

        return $obj;
    }

    /**
     * Pagination cursor for the next page of results. Omitted if there are no more pages.
     */
    public function withNextCursor(string $nextCursor): self
    {
        $obj = clone $this;
        $obj['next_cursor'] = $nextCursor;

        return $obj;
    }
}
