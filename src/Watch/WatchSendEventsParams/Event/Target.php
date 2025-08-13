<?php

declare(strict_types=1);

namespace Prelude\Watch\WatchSendEventsParams\Event;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Watch\WatchSendEventsParams\Event\Target\Type;

/**
 * The event target. Only supports phone numbers for now.
 *
 * @phpstan-type target_alias = array{type: Type::*, value: string}
 */
final class Target implements BaseModel
{
    use Model;

    /**
     * The type of the target. Either "phone_number" or "email_address".
     *
     * @var Type::* $type
     */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * An E.164 formatted phone number or an email address.
     */
    #[Api]
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
        self::introspect();
        $this->unsetOptionalProperties();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Type::* $type
     */
    public static function with(string $type, string $value): self
    {
        $obj = new self;

        $obj->type = $type;
        $obj->value = $value;

        return $obj;
    }

    /**
     * The type of the target. Either "phone_number" or "email_address".
     *
     * @param Type::* $type
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }

    /**
     * An E.164 formatted phone number or an email address.
     */
    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }
}
