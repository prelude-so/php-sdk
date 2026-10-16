<?php

declare(strict_types=1);

namespace Prelude\Watch\WatchEvaluateResponse\Recipe;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Watch\WatchEvaluateResponse\Recipe\Rule\Outcome;
use Prelude\Watch\WatchEvaluateResponse\Recipe\Rule\Type;

/**
 * @phpstan-type RuleShape = array{
 *   outcome: Outcome|value-of<Outcome>,
 *   ruleID: string,
 *   type: Type|value-of<Type>,
 *   weight: int,
 *   blockedBy?: string|null,
 *   name?: string|null,
 *   unavailable?: bool|null,
 *   versionID?: string|null,
 * }
 */
final class Rule implements BaseModel
{
    /** @use SdkModel<RuleShape> */
    use SdkModel;

    /**
     * What the rule concluded.
     *  * `TRIGGERED` - The condition held; `weight` was added to the score.
     *  * `NOT_TRIGGERED` - The condition did not hold.
     *  * `NOT_EVALUATED` - The rule could not run, because something it reads never arrived. This is not a quieter `NOT_TRIGGERED`: it contributed nothing either way, and it is why `partial_evidence` is set on the recipe.
     *  * `SKIPPED` - The rule was not run, because another rule had already determined the recipe's verdict — see `determined_by`. Nothing was missing and nothing failed, so `partial_evidence` is not set: `determined_by` is what accounts for the recipe's score resting on fewer rules.
     *
     * @var value-of<Outcome> $outcome
     */
    #[Required(enum: Outcome::class)]
    public string $outcome;

    /**
     * The rule that produced this result. Present whatever the rule's visibility, so a rule you cannot see the condition of is still one you can reweight, switch off, or ask us about.
     */
    #[Required('rule_id')]
    public string $ruleID;

    /**
     * Who authored the rule, which is what says how much of the rest of this result you get.
     *  * `MANAGED` - Prelude-owned, shared with customers: `name` and `version_id` are omitted, and `blocked_by` reports only `missing_data`.
     *  * `CUSTOM` - Yours: every field is returned.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * What this rule contributes to the recipe's score when it triggers.
     */
    #[Required]
    public int $weight;

    /**
     * Why the rule could not run, set only when `outcome` is `NOT_EVALUATED`.
     *
     * A rule you authored names the signal or attribute it waited on, since you wrote the expression that reads it. A Prelude-managed rule reports `missing_data` and nothing more: the signal it waited on is part of a condition that is not disclosed.
     */
    #[Optional('blocked_by')]
    public ?string $blockedBy;

    /**
     * The rule's name, present for a rule you authored and omitted for a Prelude-managed one. A managed rule's name describes what it looks for, which is as much of the condition as the expression is.
     */
    #[Optional]
    public ?string $name;

    /**
     * The rule could not run for a reason on our side rather than anything about your request. `outcome` is `NOT_EVALUATED` and the failure is ours to fix.
     */
    #[Optional]
    public ?bool $unavailable;

    /**
     * The version of the rule that scored — the one this recipe is pinned to, or the version current at evaluation time when it is not pinned. Present for a rule you authored, and omitted for a Prelude-managed one.
     */
    #[Optional('version_id')]
    public ?string $versionID;

    /**
     * `new Rule()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Rule::with(outcome: ..., ruleID: ..., type: ..., weight: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Rule)->withOutcome(...)->withRuleID(...)->withType(...)->withWeight(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Outcome|value-of<Outcome> $outcome
     * @param Type|value-of<Type> $type
     */
    public static function with(
        Outcome|string $outcome,
        string $ruleID,
        Type|string $type,
        int $weight,
        ?string $blockedBy = null,
        ?string $name = null,
        ?bool $unavailable = null,
        ?string $versionID = null,
    ): self {
        $self = new self;

        $self['outcome'] = $outcome;
        $self['ruleID'] = $ruleID;
        $self['type'] = $type;
        $self['weight'] = $weight;

        null !== $blockedBy && $self['blockedBy'] = $blockedBy;
        null !== $name && $self['name'] = $name;
        null !== $unavailable && $self['unavailable'] = $unavailable;
        null !== $versionID && $self['versionID'] = $versionID;

        return $self;
    }

    /**
     * What the rule concluded.
     *  * `TRIGGERED` - The condition held; `weight` was added to the score.
     *  * `NOT_TRIGGERED` - The condition did not hold.
     *  * `NOT_EVALUATED` - The rule could not run, because something it reads never arrived. This is not a quieter `NOT_TRIGGERED`: it contributed nothing either way, and it is why `partial_evidence` is set on the recipe.
     *  * `SKIPPED` - The rule was not run, because another rule had already determined the recipe's verdict — see `determined_by`. Nothing was missing and nothing failed, so `partial_evidence` is not set: `determined_by` is what accounts for the recipe's score resting on fewer rules.
     *
     * @param Outcome|value-of<Outcome> $outcome
     */
    public function withOutcome(Outcome|string $outcome): self
    {
        $self = clone $this;
        $self['outcome'] = $outcome;

        return $self;
    }

    /**
     * The rule that produced this result. Present whatever the rule's visibility, so a rule you cannot see the condition of is still one you can reweight, switch off, or ask us about.
     */
    public function withRuleID(string $ruleID): self
    {
        $self = clone $this;
        $self['ruleID'] = $ruleID;

        return $self;
    }

    /**
     * Who authored the rule, which is what says how much of the rest of this result you get.
     *  * `MANAGED` - Prelude-owned, shared with customers: `name` and `version_id` are omitted, and `blocked_by` reports only `missing_data`.
     *  * `CUSTOM` - Yours: every field is returned.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * What this rule contributes to the recipe's score when it triggers.
     */
    public function withWeight(int $weight): self
    {
        $self = clone $this;
        $self['weight'] = $weight;

        return $self;
    }

    /**
     * Why the rule could not run, set only when `outcome` is `NOT_EVALUATED`.
     *
     * A rule you authored names the signal or attribute it waited on, since you wrote the expression that reads it. A Prelude-managed rule reports `missing_data` and nothing more: the signal it waited on is part of a condition that is not disclosed.
     */
    public function withBlockedBy(string $blockedBy): self
    {
        $self = clone $this;
        $self['blockedBy'] = $blockedBy;

        return $self;
    }

    /**
     * The rule's name, present for a rule you authored and omitted for a Prelude-managed one. A managed rule's name describes what it looks for, which is as much of the condition as the expression is.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The rule could not run for a reason on our side rather than anything about your request. `outcome` is `NOT_EVALUATED` and the failure is ours to fix.
     */
    public function withUnavailable(bool $unavailable): self
    {
        $self = clone $this;
        $self['unavailable'] = $unavailable;

        return $self;
    }

    /**
     * The version of the rule that scored — the one this recipe is pinned to, or the version current at evaluation time when it is not pinned. Present for a rule you authored, and omitted for a Prelude-managed one.
     */
    public function withVersionID(string $versionID): self
    {
        $self = clone $this;
        $self['versionID'] = $versionID;

        return $self;
    }
}
