<?php

declare(strict_types=1);

namespace Prelude\Verification;

use Prelude\Core\Attributes\Api;
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
 * @see Prelude\Verification->create
 *
 * @phpstan-type VerificationCreateParamsShape = array{
 *   target: Target,
 *   dispatch_id?: string,
 *   metadata?: Metadata,
 *   options?: Options,
 *   signals?: Signals,
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
    #[Api]
    public Target $target;

    /**
     * The identifier of the dispatch that came from the front-end SDK.
     */
    #[Api(optional: true)]
    public ?string $dispatch_id;

    /**
     * The metadata for this verification. This object will be returned with every response or webhook sent that refers to this verification.
     */
    #[Api(optional: true)]
    public ?Metadata $metadata;

    /**
     * Verification options.
     */
    #[Api(optional: true)]
    public ?Options $options;

    /**
     * The signals used for anti-fraud. For more details, refer to [Signals](/verify/v2/documentation/prevent-fraud#signals).
     */
    #[Api(optional: true)]
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
     */
    public static function with(
        Target $target,
        ?string $dispatch_id = null,
        ?Metadata $metadata = null,
        ?Options $options = null,
        ?Signals $signals = null,
    ): self {
        $obj = new self;

        $obj->target = $target;

        null !== $dispatch_id && $obj->dispatch_id = $dispatch_id;
        null !== $metadata && $obj->metadata = $metadata;
        null !== $options && $obj->options = $options;
        null !== $signals && $obj->signals = $signals;

        return $obj;
    }

    /**
     * The verification target. Either a phone number or an email address. To use the email verification feature contact us to discuss your use case.
     */
    public function withTarget(Target $target): self
    {
        $obj = clone $this;
        $obj->target = $target;

        return $obj;
    }

    /**
     * The identifier of the dispatch that came from the front-end SDK.
     */
    public function withDispatchID(string $dispatchID): self
    {
        $obj = clone $this;
        $obj->dispatch_id = $dispatchID;

        return $obj;
    }

    /**
     * The metadata for this verification. This object will be returned with every response or webhook sent that refers to this verification.
     */
    public function withMetadata(Metadata $metadata): self
    {
        $obj = clone $this;
        $obj->metadata = $metadata;

        return $obj;
    }

    /**
     * Verification options.
     */
    public function withOptions(Options $options): self
    {
        $obj = clone $this;
        $obj->options = $options;

        return $obj;
    }

    /**
     * The signals used for anti-fraud. For more details, refer to [Signals](/verify/v2/documentation/prevent-fraud#signals).
     */
    public function withSignals(Signals $signals): self
    {
        $obj = clone $this;
        $obj->signals = $signals;

        return $obj;
    }
}
