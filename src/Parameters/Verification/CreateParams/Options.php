<?php

declare(strict_types=1);

namespace Prelude\Parameters\Verification\CreateParams;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\None;
use Prelude\Core\Serde\MapOf;
use Prelude\Parameters\Verification\CreateParams\Options\AppRealm;

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

    #[Api(optional: true)]
    public ?string $method = 'auto';

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
     * You must use named parameters to construct this object. If an named argument is not
     * given, it will not be included during JSON serialization. The arguments are untyped
     * so you can pass any JSON serializable value, but the API expects the types to match
     * the PHPDoc types.
     *
     * @param null|AppRealm              $appRealm
     * @param null|string                $callbackURL
     * @param null|int                   $codeSize
     * @param null|string                $customCode
     * @param null|string                $locale
     * @param null|string                $method
     * @param null|string                $preferredChannel
     * @param null|string                $senderID
     * @param null|string                $templateID
     * @param null|array<string, string> $variables
     */
    final public function __construct(
        $appRealm = None::NOT_GIVEN,
        $callbackURL = None::NOT_GIVEN,
        $codeSize = None::NOT_GIVEN,
        $customCode = None::NOT_GIVEN,
        $locale = None::NOT_GIVEN,
        $method = None::NOT_GIVEN,
        $preferredChannel = None::NOT_GIVEN,
        $senderID = None::NOT_GIVEN,
        $templateID = None::NOT_GIVEN,
        $variables = None::NOT_GIVEN,
    ) {
        $this->constructFromArgs(func_get_args());
    }
}

Options::_loadMetadata();
