<?php

declare(strict_types=1);

namespace Prelude\Watch\WatchEvaluateResponse;

/**
 * The evaluation-level verdict, being the most severe verdict across the recipes that ran.
 *  * `PASS` - No recipe flagged.
 *  * `FLAG` - At least one recipe flagged.
 */
enum Verdict: string
{
    case PASS = 'PASS';

    case FLAG = 'FLAG';
}
