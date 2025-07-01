<?php

declare(strict_types=1);

namespace Prelude\Models;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\None;
use Prelude\Core\Serde\MapOf;

class SendResponse implements BaseModel
{
    use Model;

    #[Api]
    public string $id;

    #[Api('created_at')]
    public mixed $createdAt;

    #[Api('expires_at')]
    public mixed $expiresAt;

    #[Api('template_id')]
    public string $templateID;

    #[Api]
    public string $to;

    /**
     * @var array<string, string> $variables
     */
    #[Api(type: new MapOf('string'))]
    public array $variables;

    #[Api('callback_url', optional: true)]
    public string $callbackURL;

    #[Api('correlation_id', optional: true)]
    public string $correlationID;

    #[Api(optional: true)]
    public string $from;

    /**
     * @param array<string, string> $variables
     * @param string                $callbackURL
     * @param string                $correlationID
     * @param string                $from
     */
    final public function __construct(
        string $id,
        mixed $createdAt,
        mixed $expiresAt,
        string $templateID,
        string $to,
        array $variables,
        None|string $callbackURL = None::NOT_SET,
        None|string $correlationID = None::NOT_SET,
        None|string $from = None::NOT_SET
    ) {
        $args = func_get_args();

        $data = [];
        for ($i = 0; $i < count($args); ++$i) {
            if (None::NOT_SET !== $args[$i]) {
                $data[self::$_constructorArgNames[$i]] = $args[$i] ?? null;
            }
        }

        $this->__unserialize($data);
    }
}

SendResponse::_loadMetadata();
