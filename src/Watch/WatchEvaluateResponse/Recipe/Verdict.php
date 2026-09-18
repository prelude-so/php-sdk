<?php

declare(strict_types=1);

namespace Prelude\Watch\WatchEvaluateResponse\Recipe;

/**
 * This recipe's own verdict. Normally the score against the threshold, unless a preempting rule fired — see `determined_by`.
 */
enum Verdict: string
{
    case PASS = 'PASS';

    case FLAG = 'FLAG';
}
