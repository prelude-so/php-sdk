<?php

declare(strict_types=1);

namespace Prelude\Parameters\VerificationCreateParam;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\Serde\MapOf;
use Prelude\Parameters\VerificationCreateParam\Options\AppRealm;
use Prelude\Parameters\VerificationCreateParam\Options\Method;
use Prelude\Parameters\VerificationCreateParam\Options\PreferredChannel;

final class Options implements BaseModel
{
    use Model;

    #[Api('app_realm', optional: true)]
    public ?AppRealm $appRealm;

    #[Api('callback_url', optional: true)]
    public ?string $callbackURL;

    #[Api('code_size', optional: true)]
    public ?int $codeSize;

    #[Api('custom_code', optional: true)]
    public ?string $customCode;

    #[Api(optional: true)]
    public ?string $locale;

    /** @var null|Method::* $method */
    #[Api(optional: true)]
    public ?string $method = 'auto';

    /** @var null|PreferredChannel::* $preferredChannel */
    #[Api('preferred_channel', optional: true)]
    public ?string $preferredChannel;

    #[Api('sender_id', optional: true)]
    public ?string $senderID;

    #[Api('template_id', optional: true)]
    public ?string $templateID;

    /** @var null|array<string, string> $variables */
    #[Api(type: new MapOf('string'), optional: true)]
    public ?array $variables;

    /**
     * You must use named parameters to construct this object.
     *
     * @param null|Method::*             $method
     * @param null|PreferredChannel::*   $preferredChannel
     * @param null|array<string, string> $variables
     */
    final public function __construct(
        ?AppRealm $appRealm = null,
        ?string $callbackURL = null,
        ?int $codeSize = null,
        ?string $customCode = null,
        ?string $locale = null,
        ?string $method = null,
        ?string $preferredChannel = null,
        ?string $senderID = null,
        ?string $templateID = null,
        ?array $variables = null,
    ) {
        $this->appRealm = $appRealm;
        $this->callbackURL = $callbackURL;
        $this->codeSize = $codeSize;
        $this->customCode = $customCode;
        $this->locale = $locale;
        $this->method = $method;
        $this->preferredChannel = $preferredChannel;
        $this->senderID = $senderID;
        $this->templateID = $templateID;
        $this->variables = $variables;
    }
}

Options::__introspect();
