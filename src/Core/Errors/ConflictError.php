<?php

namespace Prelude\Core\Errors;

class ConflictError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'Prelude Conflict Error';
}
