<?php

declare(strict_types=1);

namespace Prelude\Parameters\Verification\CreateParams;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\None;
use Prelude\Core\Serde\MapOf;

class Options implements BaseModel
{
    use Model;

    /**
     * @var array{platform?: string, value?: string} $appRealm
     */
    #[Api('app_realm', optional: true)]
    public array $appRealm;

    #[Api('callback_url', optional: true)]
    public string $callbackURL;

    #[Api('code_size', optional: true)]
    public int $codeSize;

    #[Api('custom_code', optional: true)]
    public string $customCode;

    #[Api(optional: true)]
    public string $locale;

    #[Api(optional: true)]
    public string $method;

    #[Api('preferred_channel', optional: true)]
    public string $preferredChannel;

    #[Api('sender_id', optional: true)]
    public string $senderID;

    #[Api('template_id', optional: true)]
    public string $templateID;

    /**
     * @var array<string, string> $variables
     */
    #[Api(type: new MapOf('string'), optional: true)]
    public array $variables;

    /**
     * @param array{platform?: string, value?: string} $appRealm
     * @param string                                   $callbackURL
     * @param int                                      $codeSize
     * @param string                                   $customCode
     * @param string                                   $locale
     * @param string                                   $method
     * @param string                                   $preferredChannel
     * @param string                                   $senderID
     * @param string                                   $templateID
     * @param array<string, string>                    $variables
     */
    final public function __construct(
        array|None $appRealm = None::NOT_SET,
        None|string $callbackURL = None::NOT_SET,
        int|None $codeSize = None::NOT_SET,
        None|string $customCode = None::NOT_SET,
        None|string $locale = None::NOT_SET,
        None|string $method = None::NOT_SET,
        None|string $preferredChannel = None::NOT_SET,
        None|string $senderID = None::NOT_SET,
        None|string $templateID = None::NOT_SET,
        array|None $variables = None::NOT_SET
    ) {
        $args = func_get_args();

        $data = [];
        for ($i = 0; $i < count($args); ++$i) {
            if (None::NOT_SET !== $args[$i]) {
                $data[self::$_constructorArgNames[$i]] = $args[$i] ?? null;
            }
        }

        $this->__unserialize($data);
    }
}

Options::_loadMetadata();
