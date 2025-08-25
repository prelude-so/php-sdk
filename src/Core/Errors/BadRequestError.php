<?php

namespace Prelude\Core\Errors;

class BadRequestError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'Prelude Bad Request Error';
}
