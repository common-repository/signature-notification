<?php
/**
 * @license MIT
 *
 * Modified by notification on 02-October-2024 using {@see https://github.com/BrianHenryIE/strauss}.
 */
declare(strict_types=1);

namespace BracketSpace\Notification\Signature\Dependencies\League\MimeTypeDetection;

interface ExtensionLookup
{
    public function lookupExtension(string $mimetype): ?string;

    /**
     * @return string[]
     */
    public function lookupAllExtensions(string $mimetype): array;
}
