<?php

namespace Prelude\Errors;

class BadRequestError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'Prelude Bad Request Error';
}
