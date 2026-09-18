<?php

declare(strict_types=1);

namespace Prelude\Watch;

use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Watch\WatchEvaluateResponse\Action;
use Prelude\Watch\WatchEvaluateResponse\Recipe;
use Prelude\Watch\WatchEvaluateResponse\Verdict;

/**
 * @phpstan-import-type RecipeShape from \Prelude\Watch\WatchEvaluateResponse\Recipe
 *
 * @phpstan-type WatchEvaluateResponseShape = array{
 *   id: string,
 *   action: Action|value-of<Action>,
 *   recipes: list<Recipe|RecipeShape>,
 *   verdict: Verdict|value-of<Verdict>,
 * }
 */
final class WatchEvaluateResponse implements BaseModel
{
    /** @use SdkModel<WatchEvaluateResponseShape> */
    use SdkModel;

    /**
     * The evaluation identifier.
     */
    #[Required]
    public string $id;

    /**
     * What the evaluation suggests you do, being the most severe action across the recipes that ran. Advisory: enforcement is yours.
     *  * `ALLOW` - Let the request through.
     *  * `BLOCK` - Refuse the request.
     *  * `CHALLENGE` - Let the request through behind an additional check.
     *
     * @var value-of<Action> $action
     */
    #[Required(enum: Action::class)]
    public string $action;

    /**
     * One result per recipe that ran. A recipe the flow names but that is not in service is absent rather than reported as having passed.
     *
     * @var list<Recipe> $recipes
     */
    #[Required(list: Recipe::class)]
    public array $recipes;

    /**
     * The evaluation-level verdict, being the most severe verdict across the recipes that ran.
     *  * `PASS` - No recipe flagged.
     *  * `FLAG` - At least one recipe flagged.
     *
     * @var value-of<Verdict> $verdict
     */
    #[Required(enum: Verdict::class)]
    public string $verdict;

    /**
     * `new WatchEvaluateResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WatchEvaluateResponse::with(id: ..., action: ..., recipes: ..., verdict: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WatchEvaluateResponse)
     *   ->withID(...)
     *   ->withAction(...)
     *   ->withRecipes(...)
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
     * @param Action|value-of<Action> $action
     * @param list<Recipe|RecipeShape> $recipes
     * @param Verdict|value-of<Verdict> $verdict
     */
    public static function with(
        string $id,
        Action|string $action,
        array $recipes,
        Verdict|string $verdict
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['action'] = $action;
        $self['recipes'] = $recipes;
        $self['verdict'] = $verdict;

        return $self;
    }

    /**
     * The evaluation identifier.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * What the evaluation suggests you do, being the most severe action across the recipes that ran. Advisory: enforcement is yours.
     *  * `ALLOW` - Let the request through.
     *  * `BLOCK` - Refuse the request.
     *  * `CHALLENGE` - Let the request through behind an additional check.
     *
     * @param Action|value-of<Action> $action
     */
    public function withAction(Action|string $action): self
    {
        $self = clone $this;
        $self['action'] = $action;

        return $self;
    }

    /**
     * One result per recipe that ran. A recipe the flow names but that is not in service is absent rather than reported as having passed.
     *
     * @param list<Recipe|RecipeShape> $recipes
     */
    public function withRecipes(array $recipes): self
    {
        $self = clone $this;
        $self['recipes'] = $recipes;

        return $self;
    }

    /**
     * The evaluation-level verdict, being the most severe verdict across the recipes that ran.
     *  * `PASS` - No recipe flagged.
     *  * `FLAG` - At least one recipe flagged.
     *
     * @param Verdict|value-of<Verdict> $verdict
     */
    public function withVerdict(Verdict|string $verdict): self
    {
        $self = clone $this;
        $self['verdict'] = $verdict;

        return $self;
    }
}
