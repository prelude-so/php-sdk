<?php

namespace Prelude\Core\Errors;

class AuthenticationError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'Prelude Authentication Error';
}
