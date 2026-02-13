<?php

declare(strict_types=1);

namespace Prelude\Notify\NotifySendBatchParams;

use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;

/**
 * A document to attach to the message. Only supported on WhatsApp templates that have a document header.
 *
 * @phpstan-type DocumentShape = array{filename: string, url: string}
 */
final class Document implements BaseModel
{
    /** @use SdkModel<DocumentShape> */
    use SdkModel;

    /**
     * The filename to display for the document.
     */
    #[Required]
    public string $filename;

    /**
     * The URL of the document to attach. Must be a valid HTTP or HTTPS URL.
     */
    #[Required]
    public string $url;

    /**
     * `new Document()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Document::with(filename: ..., url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Document)->withFilename(...)->withURL(...)
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
    public static function with(string $filename, string $url): self
    {
        $self = new self;

        $self['filename'] = $filename;
        $self['url'] = $url;

        return $self;
    }

    /**
     * The filename to display for the document.
     */
    public function withFilename(string $filename): self
    {
        $self = clone $this;
        $self['filename'] = $filename;

        return $self;
    }

    /**
     * The URL of the document to attach. Must be a valid HTTP or HTTPS URL.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
