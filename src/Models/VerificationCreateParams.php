<?php

declare(strict_types=1);

namespace Prelude\Models;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Concerns\Params;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Models\VerificationCreateParams\Metadata;
use Prelude\Models\VerificationCreateParams\Options;
use Prelude\Models\VerificationCreateParams\Signals;
use Prelude\Models\VerificationCreateParams\Target;

/**
 * Create a new verification for a specific phone number. If another non-expired verification exists (the request is performed within the verification window), this endpoint will perform a retry instead.
 *
 * @phpstan-type create_params = array{
 *   target: Target,
 *   dispatchID?: string,
 *   metadata?: Metadata,
 *   options?: Options,
 *   signals?: Signals,
 * }
 */
final class VerificationCreateParams implements BaseModel
{
    use Model;
    use Params;

    /**
     * The verification target. Either a phone number or an email address. To use the email verification feature contact us to discuss your use case.
     */
    #[Api]
    public Target $target;

    /**
     * The identifier of the dispatch that came from the front-end SDK.
     */
    #[Api('dispatch_id', optional: true)]
    public ?string $dispatchID;

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

    public function __construct()
    {
        self::introspect();
        $this->unsetOptionalProperties();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function new(
        Target $target,
        ?string $dispatchID = null,
        ?Metadata $metadata = null,
        ?Options $options = null,
        ?Signals $signals = null,
    ): self {
        $obj = new self;

        $obj->target = $target;

        null !== $dispatchID && $obj->dispatchID = $dispatchID;
        null !== $metadata && $obj->metadata = $metadata;
        null !== $options && $obj->options = $options;
        null !== $signals && $obj->signals = $signals;

        return $obj;
    }
}
