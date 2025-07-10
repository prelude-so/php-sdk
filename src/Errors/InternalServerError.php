<?php

namespace Prelude\Errors;

class InternalServerError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'Prelude Internal Server Error';
}
