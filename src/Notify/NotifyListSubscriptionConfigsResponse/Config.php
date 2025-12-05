<?php

declare(strict_types=1);

namespace Prelude\Notify\NotifyListSubscriptionConfigsResponse;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Notify\NotifyListSubscriptionConfigsResponse\Config\Messages;
use Prelude\Notify\NotifyListSubscriptionConfigsResponse\Config\MoPhoneNumber;

/**
 * @phpstan-type ConfigShape = array{
 *   id: string,
 *   callback_url: string,
 *   created_at: \DateTimeInterface,
 *   messages: Messages,
 *   name: string,
 *   updated_at: \DateTimeInterface,
 *   mo_phone_numbers?: list<MoPhoneNumber>|null,
 * }
 */
final class Config implements BaseModel
{
    /** @use SdkModel<ConfigShape> */
    use SdkModel;

    /**
     * The subscription configuration ID.
     */
    #[Api]
    public string $id;

    /**
     * The URL to call when subscription status changes.
     */
    #[Api]
    public string $callback_url;

    /**
     * The date and time when the configuration was created.
     */
    #[Api]
    public \DateTimeInterface $created_at;

    /**
     * The subscription messages configuration.
     */
    #[Api]
    public Messages $messages;

    /**
     * The human-readable name for the subscription configuration.
     */
    #[Api]
    public string $name;

    /**
     * The date and time when the configuration was last updated.
     */
    #[Api]
    public \DateTimeInterface $updated_at;

    /**
     * A list of phone numbers for receiving inbound messages.
     *
     * @var list<MoPhoneNumber>|null $mo_phone_numbers
     */
    #[Api(list: MoPhoneNumber::class, optional: true)]
    public ?array $mo_phone_numbers;

    /**
     * `new Config()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Config::with(
     *   id: ...,
     *   callback_url: ...,
     *   created_at: ...,
     *   messages: ...,
     *   name: ...,
     *   updated_at: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Config)
     *   ->withID(...)
     *   ->withCallbackURL(...)
     *   ->withCreatedAt(...)
     *   ->withMessages(...)
     *   ->withName(...)
     *   ->withUpdatedAt(...)
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
     * @param Messages|array{
     *   help_message?: string|null,
     *   start_message?: string|null,
     *   stop_message?: string|null,
     * } $messages
     * @param list<MoPhoneNumber|array{
     *   country_code: string, phone_number: string
     * }> $mo_phone_numbers
     */
    public static function with(
        string $id,
        string $callback_url,
        \DateTimeInterface $created_at,
        Messages|array $messages,
        string $name,
        \DateTimeInterface $updated_at,
        ?array $mo_phone_numbers = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['callback_url'] = $callback_url;
        $obj['created_at'] = $created_at;
        $obj['messages'] = $messages;
        $obj['name'] = $name;
        $obj['updated_at'] = $updated_at;

        null !== $mo_phone_numbers && $obj['mo_phone_numbers'] = $mo_phone_numbers;

        return $obj;
    }

    /**
     * The subscription configuration ID.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The URL to call when subscription status changes.
     */
    public function withCallbackURL(string $callbackURL): self
    {
        $obj = clone $this;
        $obj['callback_url'] = $callbackURL;

        return $obj;
    }

    /**
     * The date and time when the configuration was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * The subscription messages configuration.
     *
     * @param Messages|array{
     *   help_message?: string|null,
     *   start_message?: string|null,
     *   stop_message?: string|null,
     * } $messages
     */
    public function withMessages(Messages|array $messages): self
    {
        $obj = clone $this;
        $obj['messages'] = $messages;

        return $obj;
    }

    /**
     * The human-readable name for the subscription configuration.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * The date and time when the configuration was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }

    /**
     * A list of phone numbers for receiving inbound messages.
     *
     * @param list<MoPhoneNumber|array{
     *   country_code: string, phone_number: string
     * }> $moPhoneNumbers
     */
    public function withMoPhoneNumbers(array $moPhoneNumbers): self
    {
        $obj = clone $this;
        $obj['mo_phone_numbers'] = $moPhoneNumbers;

        return $obj;
    }
}
