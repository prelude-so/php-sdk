<?php

declare(strict_types=1);

namespace Prelude\Parameters;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Concerns\Params;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\Conversion\MapOf;

/**
 * Send a transactional message to your user.
 *
 * @phpstan-type send_params = array{
 *   templateID: string,
 *   to: string,
 *   callbackURL?: string,
 *   correlationID?: string,
 *   expiresAt?: string,
 *   from?: string,
 *   locale?: string,
 *   variables?: array<string, string>,
 * }
 */
final class TransactionalSendParams implements BaseModel
{
    use Model;
    use Params;

    /**
     * The template identifier.
     */
    #[Api('template_id')]
    public string $templateID;

    /**
     * The recipient's phone number.
     */
    #[Api]
    public string $to;

    /**
     * The callback URL.
     */
    #[Api('callback_url', optional: true)]
    public ?string $callbackURL;

    /**
     * A user-defined identifier to correlate this transactional message with. It is returned in the response and any webhook events that refer to this transactionalmessage.
     */
    #[Api('correlation_id', optional: true)]
    public ?string $correlationID;

    /**
     * The message expiration date.
     */
    #[Api('expires_at', optional: true)]
    public ?string $expiresAt;

    /**
     * The Sender ID.
     */
    #[Api(optional: true)]
    public ?string $from;

    /**
     * A BCP-47 formatted locale string with the language the text message will be sent to. If there's no locale set, the language will be determined by the country code of the phone number. If the language specified doesn't exist, the default set on the template will be used.
     */
    #[Api(optional: true)]
    public ?string $locale;

    /**
     * The variables to be replaced in the template.
     *
     * @var null|array<string, string> $variables
     */
    #[Api(type: new MapOf('string'), optional: true)]
    public ?array $variables;

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
     * @param null|array<string, string> $variables
     */
    public static function new(
        string $templateID,
        string $to,
        ?string $callbackURL = null,
        ?string $correlationID = null,
        ?string $expiresAt = null,
        ?string $from = null,
        ?string $locale = null,
        ?array $variables = null,
    ): self {
        $obj = new self;

        $obj->templateID = $templateID;
        $obj->to = $to;

        null !== $callbackURL && $obj->callbackURL = $callbackURL;
        null !== $correlationID && $obj->correlationID = $correlationID;
        null !== $expiresAt && $obj->expiresAt = $expiresAt;
        null !== $from && $obj->from = $from;
        null !== $locale && $obj->locale = $locale;
        null !== $variables && $obj->variables = $variables;

        return $obj;
    }
}
