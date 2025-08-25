<?php

namespace Prelude\Core\Errors;

class PermissionDeniedError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'Prelude Permission Denied Error';
}
