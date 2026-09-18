<?php

declare(strict_types=1);

namespace Prelude\Verification\Phone\History;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;

/**
 * The end user's mobile network.
 *
 * @phpstan-type PhoneVerificationCarrierShape = array{
 *   mccmnc: string, name?: string|null
 * }
 */
final class PhoneVerificationCarrier implements BaseModel
{
    /** @use SdkModel<PhoneVerificationCarrierShape> */
    use SdkModel;

    #[Required]
    public string $mccmnc;

    #[Optional]
    public ?string $name;

    /**
     * `new PhoneVerificationCarrier()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneVerificationCarrier::with(mccmnc: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PhoneVerificationCarrier)->withMccmnc(...)
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
    public static function with(string $mccmnc, ?string $name = null): self
    {
        $self = new self;

        $self['mccmnc'] = $mccmnc;

        null !== $name && $self['name'] = $name;

        return $self;
    }

    public function withMccmnc(string $mccmnc): self
    {
        $self = clone $this;
        $self['mccmnc'] = $mccmnc;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
