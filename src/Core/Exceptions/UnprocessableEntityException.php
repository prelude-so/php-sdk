<?php

namespace Prelude\Core\Exceptions;

class UnprocessableEntityException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Prelude Unprocessable Entity Exception';
}
