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
use Prelude\Verification\VerificationCreateParams\Options\AppRealm;
use Prelude\Verification\VerificationCreateParams\Options\Integration;
use Prelude\Verification\VerificationCreateParams\Options\Method;
use Prelude\Verification\VerificationCreateParams\Options\PreferredChannel;
use Prelude\Verification\VerificationCreateParams\Signals;
use Prelude\Verification\VerificationCreateParams\Signals\DevicePlatform;
use Prelude\Verification\VerificationCreateParams\Target;
use Prelude\Verification\VerificationCreateParams\Target\Type;

/**
 * Create a new verification for a specific phone number. If another non-expired verification exists (the request is performed within the verification window), this endpoint will perform a retry instead.
 *
 * @see Prelude\Services\VerificationService::create()
 *
 * @phpstan-type VerificationCreateParamsShape = array{
 *   target: Target|array{type: value-of<Type>, value: string},
 *   dispatch_id?: string,
 *   metadata?: Metadata|array{correlation_id?: string|null},
 *   options?: Options|array{
 *     app_realm?: AppRealm|null,
 *     callback_url?: string|null,
 *     code_size?: int|null,
 *     custom_code?: string|null,
 *     integration?: value-of<Integration>|null,
 *     locale?: string|null,
 *     method?: value-of<Method>|null,
 *     preferred_channel?: value-of<PreferredChannel>|null,
 *     sender_id?: string|null,
 *     template_id?: string|null,
 *     variables?: array<string,string>|null,
 *   },
 *   signals?: Signals|array{
 *     app_version?: string|null,
 *     device_id?: string|null,
 *     device_model?: string|null,
 *     device_platform?: value-of<DevicePlatform>|null,
 *     ip?: string|null,
 *     is_trusted_user?: bool|null,
 *     ja4_fingerprint?: string|null,
 *     os_version?: string|null,
 *     user_agent?: string|null,
 *   },
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
    #[Optional]
    public ?string $dispatch_id;

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
     * @param Target|array{type: value-of<Type>, value: string} $target
     * @param Metadata|array{correlation_id?: string|null} $metadata
     * @param Options|array{
     *   app_realm?: AppRealm|null,
     *   callback_url?: string|null,
     *   code_size?: int|null,
     *   custom_code?: string|null,
     *   integration?: value-of<Integration>|null,
     *   locale?: string|null,
     *   method?: value-of<Method>|null,
     *   preferred_channel?: value-of<PreferredChannel>|null,
     *   sender_id?: string|null,
     *   template_id?: string|null,
     *   variables?: array<string,string>|null,
     * } $options
     * @param Signals|array{
     *   app_version?: string|null,
     *   device_id?: string|null,
     *   device_model?: string|null,
     *   device_platform?: value-of<DevicePlatform>|null,
     *   ip?: string|null,
     *   is_trusted_user?: bool|null,
     *   ja4_fingerprint?: string|null,
     *   os_version?: string|null,
     *   user_agent?: string|null,
     * } $signals
     */
    public static function with(
        Target|array $target,
        ?string $dispatch_id = null,
        Metadata|array|null $metadata = null,
        Options|array|null $options = null,
        Signals|array|null $signals = null,
    ): self {
        $obj = new self;

        $obj['target'] = $target;

        null !== $dispatch_id && $obj['dispatch_id'] = $dispatch_id;
        null !== $metadata && $obj['metadata'] = $metadata;
        null !== $options && $obj['options'] = $options;
        null !== $signals && $obj['signals'] = $signals;

        return $obj;
    }

    /**
     * The verification target. Either a phone number or an email address. To use the email verification feature contact us to discuss your use case.
     *
     * @param Target|array{type: value-of<Type>, value: string} $target
     */
    public function withTarget(Target|array $target): self
    {
        $obj = clone $this;
        $obj['target'] = $target;

        return $obj;
    }

    /**
     * The identifier of the dispatch that came from the front-end SDK.
     */
    public function withDispatchID(string $dispatchID): self
    {
        $obj = clone $this;
        $obj['dispatch_id'] = $dispatchID;

        return $obj;
    }

    /**
     * The metadata for this verification. This object will be returned with every response or webhook sent that refers to this verification.
     *
     * @param Metadata|array{correlation_id?: string|null} $metadata
     */
    public function withMetadata(Metadata|array $metadata): self
    {
        $obj = clone $this;
        $obj['metadata'] = $metadata;

        return $obj;
    }

    /**
     * Verification options.
     *
     * @param Options|array{
     *   app_realm?: AppRealm|null,
     *   callback_url?: string|null,
     *   code_size?: int|null,
     *   custom_code?: string|null,
     *   integration?: value-of<Integration>|null,
     *   locale?: string|null,
     *   method?: value-of<Method>|null,
     *   preferred_channel?: value-of<PreferredChannel>|null,
     *   sender_id?: string|null,
     *   template_id?: string|null,
     *   variables?: array<string,string>|null,
     * } $options
     */
    public function withOptions(Options|array $options): self
    {
        $obj = clone $this;
        $obj['options'] = $options;

        return $obj;
    }

    /**
     * The signals used for anti-fraud. For more details, refer to [Signals](/verify/v2/documentation/prevent-fraud#signals).
     *
     * @param Signals|array{
     *   app_version?: string|null,
     *   device_id?: string|null,
     *   device_model?: string|null,
     *   device_platform?: value-of<DevicePlatform>|null,
     *   ip?: string|null,
     *   is_trusted_user?: bool|null,
     *   ja4_fingerprint?: string|null,
     *   os_version?: string|null,
     *   user_agent?: string|null,
     * } $signals
     */
    public function withSignals(Signals|array $signals): self
    {
        $obj = clone $this;
        $obj['signals'] = $signals;

        return $obj;
    }
}
