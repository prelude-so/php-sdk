<?php

namespace Prelude\Core\Errors;

class UnprocessableEntityError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'Prelude Unprocessable Entity Error';
}
