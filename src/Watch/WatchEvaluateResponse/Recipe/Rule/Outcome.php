<?php

declare(strict_types=1);

namespace Prelude\Watch\WatchEvaluateResponse\Recipe\Rule;

/**
 * What the rule concluded.
 *  * `TRIGGERED` - The condition held; `weight` was added to the score.
 *  * `NOT_TRIGGERED` - The condition did not hold.
 *  * `NOT_EVALUATED` - The rule could not run, because something it reads never arrived. This is not a quieter `NOT_TRIGGERED`: it contributed nothing either way, and it is why `partial_evidence` is set on the recipe.
 */
enum Outcome: string
{
    case TRIGGERED = 'TRIGGERED';

    case NOT_TRIGGERED = 'NOT_TRIGGERED';

    case NOT_EVALUATED = 'NOT_EVALUATED';
}
