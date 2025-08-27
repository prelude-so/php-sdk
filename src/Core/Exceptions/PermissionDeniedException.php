<?php

namespace Prelude\Core\Exceptions;

class PermissionDeniedException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Prelude Permission Denied Exception';
}
