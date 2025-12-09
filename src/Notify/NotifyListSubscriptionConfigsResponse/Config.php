<?php

declare(strict_types=1);

namespace Prelude\Notify\NotifyListSubscriptionConfigsResponse;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Notify\NotifyListSubscriptionConfigsResponse\Config\Messages;
use Prelude\Notify\NotifyListSubscriptionConfigsResponse\Config\MoPhoneNumber;

/**
 * @phpstan-type ConfigShape = array{
 *   id: string,
 *   callbackURL: string,
 *   createdAt: \DateTimeInterface,
 *   messages: Messages,
 *   name: string,
 *   updatedAt: \DateTimeInterface,
 *   moPhoneNumbers?: list<MoPhoneNumber>|null,
 * }
 */
final class Config implements BaseModel
{
    /** @use SdkModel<ConfigShape> */
    use SdkModel;

    /**
     * The subscription configuration ID.
     */
    #[Required]
    public string $id;

    /**
     * The URL to call when subscription status changes.
     */
    #[Required('callback_url')]
    public string $callbackURL;

    /**
     * The date and time when the configuration was created.
     */
    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    /**
     * The subscription messages configuration.
     */
    #[Required]
    public Messages $messages;

    /**
     * The human-readable name for the subscription configuration.
     */
    #[Required]
    public string $name;

    /**
     * The date and time when the configuration was last updated.
     */
    #[Required('updated_at')]
    public \DateTimeInterface $updatedAt;

    /**
     * A list of phone numbers for receiving inbound messages.
     *
     * @var list<MoPhoneNumber>|null $moPhoneNumbers
     */
    #[Optional('mo_phone_numbers', list: MoPhoneNumber::class)]
    public ?array $moPhoneNumbers;

    /**
     * `new Config()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Config::with(
     *   id: ...,
     *   callbackURL: ...,
     *   createdAt: ...,
     *   messages: ...,
     *   name: ...,
     *   updatedAt: ...,
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
     *   helpMessage?: string|null,
     *   startMessage?: string|null,
     *   stopMessage?: string|null,
     * } $messages
     * @param list<MoPhoneNumber|array{
     *   countryCode: string, phoneNumber: string
     * }> $moPhoneNumbers
     */
    public static function with(
        string $id,
        string $callbackURL,
        \DateTimeInterface $createdAt,
        Messages|array $messages,
        string $name,
        \DateTimeInterface $updatedAt,
        ?array $moPhoneNumbers = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['callbackURL'] = $callbackURL;
        $obj['createdAt'] = $createdAt;
        $obj['messages'] = $messages;
        $obj['name'] = $name;
        $obj['updatedAt'] = $updatedAt;

        null !== $moPhoneNumbers && $obj['moPhoneNumbers'] = $moPhoneNumbers;

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
        $obj['callbackURL'] = $callbackURL;

        return $obj;
    }

    /**
     * The date and time when the configuration was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * The subscription messages configuration.
     *
     * @param Messages|array{
     *   helpMessage?: string|null,
     *   startMessage?: string|null,
     *   stopMessage?: string|null,
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
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * A list of phone numbers for receiving inbound messages.
     *
     * @param list<MoPhoneNumber|array{
     *   countryCode: string, phoneNumber: string
     * }> $moPhoneNumbers
     */
    public function withMoPhoneNumbers(array $moPhoneNumbers): self
    {
        $obj = clone $this;
        $obj['moPhoneNumbers'] = $moPhoneNumbers;

        return $obj;
    }
}
