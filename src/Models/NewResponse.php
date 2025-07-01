<?php

declare(strict_types=1);

namespace Prelude\Models;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\None;
use Prelude\Core\Serde\ListOf;

class NewResponse implements BaseModel
{
    use Model;

    #[Api]
    public string $id;

    #[Api]
    public string $method;

    #[Api]
    public string $status;

    /**
     * @var list<string> $channels
     */
    #[Api(type: new ListOf('string'), optional: true)]
    public array $channels;

    /**
     * @var array{correlationID?: string} $metadata
     */
    #[Api(optional: true)]
    public array $metadata;

    #[Api(optional: true)]
    public string $reason;

    #[Api('request_id', optional: true)]
    public string $requestID;

    /**
     * @var array{requestURL?: string} $silent
     */
    #[Api(optional: true)]
    public array $silent;

    /**
     * @param list<string>                  $channels
     * @param array{correlationID?: string} $metadata
     * @param string                        $reason
     * @param string                        $requestID
     * @param array{requestURL?: string}    $silent
     */
    final public function __construct(
        string $id,
        string $method,
        string $status,
        array|None $channels = None::NOT_SET,
        array|None $metadata = None::NOT_SET,
        None|string $reason = None::NOT_SET,
        None|string $requestID = None::NOT_SET,
        array|None $silent = None::NOT_SET
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

NewResponse::_loadMetadata();
