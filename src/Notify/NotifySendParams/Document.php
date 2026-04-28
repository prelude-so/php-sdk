<?php

declare(strict_types=1);

namespace Prelude\Notify\NotifySendParams;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;

/**
 * A media attachment to include in the message header. Supported on
 * WhatsApp templates registered with a `DOCUMENT`, `IMAGE`, or
 * `VIDEO` header. The media type is determined by the template's
 * registered header format; send the matching file type for each.
 *
 * - `DOCUMENT` headers accept PDF and other document formats; `filename` is required and displayed to the recipient.
 * - `IMAGE` headers accept `.png`, `.jpg`, `.jpeg`, and `.webp` URLs; `filename` is ignored.
 * - `VIDEO` headers accept `.mp4` and `.3gp` URLs; `filename` is ignored.
 *
 * @phpstan-type DocumentShape = array{url: string, filename?: string|null}
 */
final class Document implements BaseModel
{
    /** @use SdkModel<DocumentShape> */
    use SdkModel;

    /**
     * HTTPS URL of the media file. The file extension must match the template's registered header format (PDF for DOCUMENT; PNG/JPG/JPEG/WEBP for IMAGE; MP4/3GP for VIDEO).
     */
    #[Required]
    public string $url;

    /**
     * Filename displayed to the recipient. Required for templates with a `DOCUMENT` header; ignored for `IMAGE` and `VIDEO` headers.
     */
    #[Optional]
    public ?string $filename;

    /**
     * `new Document()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Document::with(url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Document)->withURL(...)
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
    public static function with(string $url, ?string $filename = null): self
    {
        $self = new self;

        $self['url'] = $url;

        null !== $filename && $self['filename'] = $filename;

        return $self;
    }

    /**
     * HTTPS URL of the media file. The file extension must match the template's registered header format (PDF for DOCUMENT; PNG/JPG/JPEG/WEBP for IMAGE; MP4/3GP for VIDEO).
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    /**
     * Filename displayed to the recipient. Required for templates with a `DOCUMENT` header; ignored for `IMAGE` and `VIDEO` headers.
     */
    public function withFilename(string $filename): self
    {
        $self = clone $this;
        $self['filename'] = $filename;

        return $self;
    }
}
