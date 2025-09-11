<?php

declare(strict_types=1);

namespace Prelude\Lookup\LookupLookupResponse;

enum Flag: string
{
    case PORTED = 'ported';

    case TEMPORARY = 'temporary';
}
