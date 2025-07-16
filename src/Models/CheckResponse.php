<?php

declare(strict_types=1);

namespace Prelude\Models;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Models\CheckResponse\Metadata;
use Prelude\Models\CheckResponse\Status;

final class CheckResponse implements BaseModel
{
    use Model;

    /** @var Status::* $status */
    #[Api]
    public string $status;

    #[Api(optional: true)]
    public ?string $id;

    #[Api(optional: true)]
    public ?Metadata $metadata;

    #[Api('request_id', optional: true)]
    public ?string $requestID;

    /**
     * You must use named parameters to construct this object.
     *
     * @param Status::* $status
     */
    final public function __construct(
        string $status,
        ?string $id = null,
        ?Metadata $metadata = null,
        ?string $requestID = null,
    ) {
        $this->status = $status;

        self::_introspect();
        $this->unsetOptionalProperties();

        null != $id && $this->id = $id;
        null != $metadata && $this->metadata = $metadata;
        null != $requestID && $this->requestID = $requestID;
    }
}
