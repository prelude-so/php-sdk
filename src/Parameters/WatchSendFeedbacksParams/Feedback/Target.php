<?php

declare(strict_types=1);

namespace Prelude\Parameters\WatchSendFeedbacksParams\Feedback;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Parameters\WatchSendFeedbacksParams\Feedback\Target\Type as Type1;

/**
 * The feedback target. Only supports phone numbers for now.
 *
 * @phpstan-type target_alias = array{type: Type1::*, value: string}
 */
final class Target implements BaseModel
{
    use Model;

    /**
     * The type of the target. Either "phone_number" or "email_address".
     *
     * @var Type1::* $type
     */
    #[Api(enum: Type1::class)]
    public string $type;

    /**
     * An E.164 formatted phone number or an email address.
     */
    #[Api]
    public string $value;

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
     * @param Type1::* $type
     */
    public static function new(string $type, string $value): self
    {
        $obj = new self;

        $obj->type = $type;
        $obj->value = $value;

        return $obj;
    }

    /**
     * The type of the target. Either "phone_number" or "email_address".
     *
     * @param Type1::* $type
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * An E.164 formatted phone number or an email address.
     */
    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }
}
