<?php

declare(strict_types=1);

namespace Prelude\Watch;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Concerns\SdkParams;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Signals;
use Prelude\Target;

/**
 * **Beta.** The request and response shapes may still change, and flows and recipes are configured by Prelude on your behalf for now. Talk to us before you build against it.
 *
 * Score a target against the rules configured for one moment in your product — signup, checkout, password reset. The flow selects which recipes run; each recipe scores its rules against a threshold and returns its own verdict, and the evaluation answers with the most severe verdict and action across them. Where Predict returns a single model-derived outcome, Eval returns the full breakdown, so you can see which rules fired and which could not run. Scoring-only — it does not update counters by itself.
 *
 * @see Prelude\Services\WatchService::evaluate()
 *
 * @phpstan-import-type TargetShape from \Prelude\Target
 * @phpstan-import-type SignalsShape from \Prelude\Signals
 *
 * @phpstan-type WatchEvaluateParamsShape = array{
 *   flowID: string,
 *   target: Target|TargetShape,
 *   attributes?: array<string,string>|null,
 *   dispatchID?: string|null,
 *   signals?: null|Signals|SignalsShape,
 * }
 */
final class WatchEvaluateParams implements BaseModel
{
    /** @use SdkModel<WatchEvaluateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The flow to evaluate. A flow names the moment you are guarding and selects the recipes that run.
     */
    #[Required('flow_id')]
    public string $flowID;

    /**
     * The identifier to score — a phone number or email address.
     */
    #[Required]
    public Target $target;

    /**
     * Values for the attributes the flow's recipes declare, keyed without the `attr.` namespace a rule uses to reference them.
     *
     * An attribute a recipe declares and this request omits is treated as missing evidence, not as an empty value: the rules reading it report `NOT_EVALUATED` rather than being scored as though the condition were false. A key no recipe in the flow declares is ignored rather than rejected, so one payload can serve flows that read different attributes.
     *
     * @var array<string,string>|null $attributes
     */
    #[Optional(map: 'string')]
    public ?array $attributes;

    /**
     * The identifier of the dispatch that came from the front-end SDK. Signals it carries fill in anything the request did not state; the request wins where both supply a value.
     */
    #[Optional('dispatch_id')]
    public ?string $dispatchID;

    /**
     * The signals used for anti-fraud. For more details, refer to [Signals](/verify/v2/documentation/prevent-fraud#signals).
     */
    #[Optional]
    public ?Signals $signals;

    /**
     * `new WatchEvaluateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WatchEvaluateParams::with(flowID: ..., target: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WatchEvaluateParams)->withFlowID(...)->withTarget(...)
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
     * @param Target|TargetShape $target
     * @param array<string,string>|null $attributes
     * @param Signals|SignalsShape|null $signals
     */
    public static function with(
        string $flowID,
        Target|array $target,
        ?array $attributes = null,
        ?string $dispatchID = null,
        Signals|array|null $signals = null,
    ): self {
        $self = new self;

        $self['flowID'] = $flowID;
        $self['target'] = $target;

        null !== $attributes && $self['attributes'] = $attributes;
        null !== $dispatchID && $self['dispatchID'] = $dispatchID;
        null !== $signals && $self['signals'] = $signals;

        return $self;
    }

    /**
     * The flow to evaluate. A flow names the moment you are guarding and selects the recipes that run.
     */
    public function withFlowID(string $flowID): self
    {
        $self = clone $this;
        $self['flowID'] = $flowID;

        return $self;
    }

    /**
     * The identifier to score — a phone number or email address.
     *
     * @param Target|TargetShape $target
     */
    public function withTarget(Target|array $target): self
    {
        $self = clone $this;
        $self['target'] = $target;

        return $self;
    }

    /**
     * Values for the attributes the flow's recipes declare, keyed without the `attr.` namespace a rule uses to reference them.
     *
     * An attribute a recipe declares and this request omits is treated as missing evidence, not as an empty value: the rules reading it report `NOT_EVALUATED` rather than being scored as though the condition were false. A key no recipe in the flow declares is ignored rather than rejected, so one payload can serve flows that read different attributes.
     *
     * @param array<string,string> $attributes
     */
    public function withAttributes(array $attributes): self
    {
        $self = clone $this;
        $self['attributes'] = $attributes;

        return $self;
    }

    /**
     * The identifier of the dispatch that came from the front-end SDK. Signals it carries fill in anything the request did not state; the request wins where both supply a value.
     */
    public function withDispatchID(string $dispatchID): self
    {
        $self = clone $this;
        $self['dispatchID'] = $dispatchID;

        return $self;
    }

    /**
     * The signals used for anti-fraud. For more details, refer to [Signals](/verify/v2/documentation/prevent-fraud#signals).
     *
     * @param Signals|SignalsShape $signals
     */
    public function withSignals(Signals|array $signals): self
    {
        $self = clone $this;
        $self['signals'] = $signals;

        return $self;
    }
}
