<?php

namespace Prelude\Core\Errors;

class NotFoundError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'Prelude Not Found Error';
}
