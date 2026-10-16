<?php

declare(strict_types=1);

namespace Prelude\Watch\WatchEvaluateResponse\Recipe\Rule;

/**
 * Who authored the rule, which is what says how much of the rest of this result you get.
 *  * `MANAGED` - Prelude-owned, shared with customers: `name` and `version_id` are omitted, and `blocked_by` reports only `missing_data`.
 *  * `CUSTOM` - Yours: every field is returned.
 */
enum Type: string
{
    case MANAGED = 'MANAGED';

    case CUSTOM = 'CUSTOM';
}
