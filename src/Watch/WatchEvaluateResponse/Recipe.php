<?php

declare(strict_types=1);

namespace Prelude\Watch\WatchEvaluateResponse;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Watch\WatchEvaluateResponse\Recipe\Rule;
use Prelude\Watch\WatchEvaluateResponse\Recipe\Verdict;

/**
 * @phpstan-import-type RuleShape from \Prelude\Watch\WatchEvaluateResponse\Recipe\Rule
 *
 * @phpstan-type RecipeShape = array{
 *   partialEvidence: bool,
 *   recipeID: string,
 *   rules: list<Rule|RuleShape>,
 *   score: int,
 *   threshold: int,
 *   verdict: \Prelude\Watch\WatchEvaluateResponse\Recipe\Verdict|value-of<\Prelude\Watch\WatchEvaluateResponse\Recipe\Verdict>,
 *   determinedBy?: string|null,
 * }
 */
final class Recipe implements BaseModel
{
    /** @use SdkModel<RecipeShape> */
    use SdkModel;

    /**
     * At least one rule could not be evaluated, so the score rests on less than the whole recipe. The score is still returned — a partial verdict is more useful than none — but it is labeled rather than passed off as whole.
     */
    #[Required('partial_evidence')]
    public bool $partialEvidence;

    /**
     * The recipe that produced this result.
     */
    #[Required('recipe_id')]
    public string $recipeID;

    /**
     * One result per rule in the recipe, in membership order. Every rule runs — a score is only meaningful when complete, so there is no short-circuit on the first trigger. The exception is a recipe whose verdict a preempting rule has already determined, where a rule that could no longer change it may report `SKIPPED` instead.
     *
     * @var list<Rule> $rules
     */
    #[Required(list: Rule::class)]
    public array $rules;

    /**
     * The sum of the weights of the rules that triggered, clamped to the range -100 to 100. Two scores at a bound are not comparable.
     */
    #[Required]
    public int $score;

    /**
     * The score at or above which this recipe flags.
     */
    #[Required]
    public int $threshold;

    /**
     * This recipe's own verdict. Normally the score against the threshold, unless a preempting rule fired — see `determined_by`.
     *
     * @var value-of<Verdict> $verdict
     */
    #[Required(enum: Verdict::class)]
    public string $verdict;

    /**
     * The preempting rule that set `verdict`, present only when a rule rather than the score decided it. Without it a recipe can report a score under its threshold and still flag, with nothing in the payload accounting for the difference.
     */
    #[Optional('determined_by')]
    public ?string $determinedBy;

    /**
     * `new Recipe()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Recipe::with(
     *   partialEvidence: ...,
     *   recipeID: ...,
     *   rules: ...,
     *   score: ...,
     *   threshold: ...,
     *   verdict: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Recipe)
     *   ->withPartialEvidence(...)
     *   ->withRecipeID(...)
     *   ->withRules(...)
     *   ->withScore(...)
     *   ->withThreshold(...)
     *   ->withVerdict(...)
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
     * @param list<Rule|RuleShape> $rules
     * @param Verdict|value-of<Verdict> $verdict
     */
    public static function with(
        bool $partialEvidence,
        string $recipeID,
        array $rules,
        int $score,
        int $threshold,
        Verdict|string $verdict,
        ?string $determinedBy = null,
    ): self {
        $self = new self;

        $self['partialEvidence'] = $partialEvidence;
        $self['recipeID'] = $recipeID;
        $self['rules'] = $rules;
        $self['score'] = $score;
        $self['threshold'] = $threshold;
        $self['verdict'] = $verdict;

        null !== $determinedBy && $self['determinedBy'] = $determinedBy;

        return $self;
    }

    /**
     * At least one rule could not be evaluated, so the score rests on less than the whole recipe. The score is still returned — a partial verdict is more useful than none — but it is labeled rather than passed off as whole.
     */
    public function withPartialEvidence(bool $partialEvidence): self
    {
        $self = clone $this;
        $self['partialEvidence'] = $partialEvidence;

        return $self;
    }

    /**
     * The recipe that produced this result.
     */
    public function withRecipeID(string $recipeID): self
    {
        $self = clone $this;
        $self['recipeID'] = $recipeID;

        return $self;
    }

    /**
     * One result per rule in the recipe, in membership order. Every rule runs — a score is only meaningful when complete, so there is no short-circuit on the first trigger. The exception is a recipe whose verdict a preempting rule has already determined, where a rule that could no longer change it may report `SKIPPED` instead.
     *
     * @param list<Rule|RuleShape> $rules
     */
    public function withRules(array $rules): self
    {
        $self = clone $this;
        $self['rules'] = $rules;

        return $self;
    }

    /**
     * The sum of the weights of the rules that triggered, clamped to the range -100 to 100. Two scores at a bound are not comparable.
     */
    public function withScore(int $score): self
    {
        $self = clone $this;
        $self['score'] = $score;

        return $self;
    }

    /**
     * The score at or above which this recipe flags.
     */
    public function withThreshold(int $threshold): self
    {
        $self = clone $this;
        $self['threshold'] = $threshold;

        return $self;
    }

    /**
     * This recipe's own verdict. Normally the score against the threshold, unless a preempting rule fired — see `determined_by`.
     *
     * @param Verdict|value-of<Verdict> $verdict
     */
    public function withVerdict(
        Verdict|string $verdict
    ): self {
        $self = clone $this;
        $self['verdict'] = $verdict;

        return $self;
    }

    /**
     * The preempting rule that set `verdict`, present only when a rule rather than the score decided it. Without it a recipe can report a score under its threshold and still flag, with nothing in the payload accounting for the difference.
     */
    public function withDeterminedBy(string $determinedBy): self
    {
        $self = clone $this;
        $self['determinedBy'] = $determinedBy;

        return $self;
    }
}
