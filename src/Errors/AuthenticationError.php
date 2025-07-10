<?php

namespace Prelude\Errors;

class AuthenticationError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'Prelude Authentication Error';
}
