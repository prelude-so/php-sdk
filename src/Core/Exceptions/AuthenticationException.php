<?php

namespace Prelude\Core\Exceptions;

class AuthenticationException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Prelude Authentication Exception';
}
