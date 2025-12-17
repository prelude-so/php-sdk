<?php

declare(strict_types=1);

namespace Prelude\Verification;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Concerns\SdkParams;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Verification\VerificationCreateParams\Metadata;
use Prelude\Verification\VerificationCreateParams\Options;
use Prelude\Verification\VerificationCreateParams\Signals;
use Prelude\Verification\VerificationCreateParams\Target;

/**
 * Create a new verification for a specific phone number. If another non-expired verification exists (the request is performed within the verification window), this endpoint will perform a retry instead.
 *
 * @see Prelude\Services\VerificationService::create()
 *
 * @phpstan-import-type TargetShape from \Prelude\Verification\VerificationCreateParams\Target
 * @phpstan-import-type MetadataShape from \Prelude\Verification\VerificationCreateParams\Metadata
 * @phpstan-import-type OptionsShape from \Prelude\Verification\VerificationCreateParams\Options
 * @phpstan-import-type SignalsShape from \Prelude\Verification\VerificationCreateParams\Signals
 *
 * @phpstan-type VerificationCreateParamsShape = array{
 *   target: Target|TargetShape,
 *   dispatchID?: string|null,
 *   metadata?: null|Metadata|MetadataShape,
 *   options?: null|Options|OptionsShape,
 *   signals?: null|Signals|SignalsShape,
 * }
 */
final class VerificationCreateParams implements BaseModel
{
    /** @use SdkModel<VerificationCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The verification target. Either a phone number or an email address. To use the email verification feature contact us to discuss your use case.
     */
    #[Required]
    public Target $target;

    /**
     * The identifier of the dispatch that came from the front-end SDK.
     */
    #[Optional('dispatch_id')]
    public ?string $dispatchID;

    /**
     * The metadata for this verification. This object will be returned with every response or webhook sent that refers to this verification.
     */
    #[Optional]
    public ?Metadata $metadata;

    /**
     * Verification options.
     */
    #[Optional]
    public ?Options $options;

    /**
     * The signals used for anti-fraud. For more details, refer to [Signals](/verify/v2/documentation/prevent-fraud#signals).
     */
    #[Optional]
    public ?Signals $signals;

    /**
     * `new VerificationCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerificationCreateParams::with(target: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VerificationCreateParams)->withTarget(...)
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
     * @param Metadata|MetadataShape|null $metadata
     * @param Options|OptionsShape|null $options
     * @param Signals|SignalsShape|null $signals
     */
    public static function with(
        Target|array $target,
        ?string $dispatchID = null,
        Metadata|array|null $metadata = null,
        Options|array|null $options = null,
        Signals|array|null $signals = null,
    ): self {
        $self = new self;

        $self['target'] = $target;

        null !== $dispatchID && $self['dispatchID'] = $dispatchID;
        null !== $metadata && $self['metadata'] = $metadata;
        null !== $options && $self['options'] = $options;
        null !== $signals && $self['signals'] = $signals;

        return $self;
    }

    /**
     * The verification target. Either a phone number or an email address. To use the email verification feature contact us to discuss your use case.
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
     * The identifier of the dispatch that came from the front-end SDK.
     */
    public function withDispatchID(string $dispatchID): self
    {
        $self = clone $this;
        $self['dispatchID'] = $dispatchID;

        return $self;
    }

    /**
     * The metadata for this verification. This object will be returned with every response or webhook sent that refers to this verification.
     *
     * @param Metadata|MetadataShape $metadata
     */
    public function withMetadata(Metadata|array $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }

    /**
     * Verification options.
     *
     * @param Options|OptionsShape $options
     */
    public function withOptions(Options|array $options): self
    {
        $self = clone $this;
        $self['options'] = $options;

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
