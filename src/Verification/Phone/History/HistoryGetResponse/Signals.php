<?php

declare(strict_types=1);

namespace Prelude\Verification\Phone\History\HistoryGetResponse;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;

/**
 * The anti-fraud signals you forwarded when creating the verification.
 *
 * @phpstan-type SignalsShape = array{
 *   isTrustedUser: bool,
 *   deviceID?: string|null,
 *   ja4Fingerprint?: string|null,
 *   osVersion?: string|null,
 *   userAgent?: string|null,
 * }
 */
final class Signals implements BaseModel
{
    /** @use SdkModel<SignalsShape> */
    use SdkModel;

    /**
     * Whether you flagged this end user as trusted when creating the verification. Declared by you, not computed by Prelude.
     */
    #[Required('is_trusted_user')]
    public bool $isTrustedUser;

    /**
     * End-user device identifier you forwarded.
     */
    #[Optional('device_id')]
    public ?string $deviceID;

    /**
     * TLS fingerprint you forwarded.
     */
    #[Optional('ja4_fingerprint')]
    public ?string $ja4Fingerprint;

    #[Optional('os_version')]
    public ?string $osVersion;

    #[Optional('user_agent')]
    public ?string $userAgent;

    /**
     * `new Signals()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Signals::with(isTrustedUser: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Signals)->withIsTrustedUser(...)
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
        bool $isTrustedUser,
        ?string $deviceID = null,
        ?string $ja4Fingerprint = null,
        ?string $osVersion = null,
        ?string $userAgent = null,
    ): self {
        $self = new self;

        $self['isTrustedUser'] = $isTrustedUser;

        null !== $deviceID && $self['deviceID'] = $deviceID;
        null !== $ja4Fingerprint && $self['ja4Fingerprint'] = $ja4Fingerprint;
        null !== $osVersion && $self['osVersion'] = $osVersion;
        null !== $userAgent && $self['userAgent'] = $userAgent;

        return $self;
    }

    /**
     * Whether you flagged this end user as trusted when creating the verification. Declared by you, not computed by Prelude.
     */
    public function withIsTrustedUser(bool $isTrustedUser): self
    {
        $self = clone $this;
        $self['isTrustedUser'] = $isTrustedUser;

        return $self;
    }

    /**
     * End-user device identifier you forwarded.
     */
    public function withDeviceID(string $deviceID): self
    {
        $self = clone $this;
        $self['deviceID'] = $deviceID;

        return $self;
    }

    /**
     * TLS fingerprint you forwarded.
     */
    public function withJa4Fingerprint(string $ja4Fingerprint): self
    {
        $self = clone $this;
        $self['ja4Fingerprint'] = $ja4Fingerprint;

        return $self;
    }

    public function withOsVersion(string $osVersion): self
    {
        $self = clone $this;
        $self['osVersion'] = $osVersion;

        return $self;
    }

    public function withUserAgent(string $userAgent): self
    {
        $self = clone $this;
        $self['userAgent'] = $userAgent;

        return $self;
    }
}
