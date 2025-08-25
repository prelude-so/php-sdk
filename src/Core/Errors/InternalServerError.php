<?php

namespace Prelude\Core\Errors;

class InternalServerError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'Prelude Internal Server Error';
}
