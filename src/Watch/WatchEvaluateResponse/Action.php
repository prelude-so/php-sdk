<?php

declare(strict_types=1);

namespace Prelude\Watch\WatchEvaluateResponse;

/**
 * What the evaluation suggests you do, being the most severe action across the recipes that ran. Advisory: enforcement is yours.
 *  * `ALLOW` - Let the request through.
 *  * `BLOCK` - Refuse the request.
 *  * `CHALLENGE` - Let the request through behind an additional check.
 */
enum Action: string
{
    case ALLOW = 'ALLOW';

    case BLOCK = 'BLOCK';

    case CHALLENGE = 'CHALLENGE';
}
