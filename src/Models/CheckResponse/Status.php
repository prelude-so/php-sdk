<?php

declare(strict_types=1);

namespace Prelude\Models\CheckResponse;

class Status
{
    final public const SUCCESS = 'success';

    final public const FAILURE = 'failure';

    final public const EXPIRED_OR_NOT_FOUND = 'expired_or_not_found';
}
