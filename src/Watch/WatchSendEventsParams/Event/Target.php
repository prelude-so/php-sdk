<?php

declare(strict_types=1);

namespace Prelude\Watch\WatchSendEventsParams\Event;

use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Watch\WatchSendEventsParams\Event\Target\Type;

/**
 * The event target. Only supports phone numbers for now.
 *
 * @phpstan-type TargetShape = array{type: value-of<Type>, value: string}
 */
final class Target implements BaseModel
{
    /** @use SdkModel<TargetShape> */
    use SdkModel;

    /**
     * The type of the target. Either "phone_number" or "email_address".
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * An E.164 formatted phone number or an email address.
     */
    #[Required]
    public string $value;

    /**
     * `new Target()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Target::with(type: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Target)->withType(...)->withValue(...)
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
     */
    public static function with(Type|string $type, string $value): self
    {
        $self = new self;

        $self['type'] = $type;
        $self['value'] = $value;

        return $self;
    }

    /**
     * The type of the target. Either "phone_number" or "email_address".
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * An E.164 formatted phone number or an email address.
     */
    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
