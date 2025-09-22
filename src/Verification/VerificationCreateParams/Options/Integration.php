<?php

declare(strict_types=1);

namespace Prelude\Verification\VerificationCreateParams\Options;

/**
 * The integration that triggered the verification.
 */
enum Integration: string
{
    case AUTH0 = 'auth0';

    case SUPABASE = 'supabase';
}
