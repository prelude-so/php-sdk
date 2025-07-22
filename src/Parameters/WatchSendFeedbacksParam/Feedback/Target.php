<?php

declare(strict_types=1);

namespace Prelude\Parameters\WatchSendFeedbacksParam\Feedback;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Parameters\WatchSendFeedbacksParam\Feedback\Target\Type;

/**
 * The feedback target. Only supports phone numbers for now.
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
    #[Api]
    public string $type;

    /**
     * An E.164 formatted phone number or an email address.
     */
    #[Api]
    public string $value;

    /**
     * You must use named parameters to construct this object.
     *
     * @param Type::* $type
     */
    final public function __construct(string $type, string $value)
    {
        self::introspect();

        $this->type = $type;
        $this->value = $value;
    }
}
