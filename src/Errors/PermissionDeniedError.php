<?php

namespace Prelude\Errors;

class PermissionDeniedError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'Prelude Permission Denied Error';
}
