<?php
/**
 * @license MIT
 *
 * Modified by notification on 02-October-2024 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace BracketSpace\Notification\Signature\Dependencies\League\Flysystem;

use RuntimeException;

use Throwable;

use function rtrim;

final class UnableToSetVisibility extends RuntimeException implements FilesystemOperationFailed
{
    /**
     * @var string
     */
    private $location;

    /**
     * @var string
     */
    private $reason;

    public function reason(): string
    {
        return $this->reason;
    }

    public static function atLocation(string $filename, string $extraMessage = '', Throwable $previous = null): self
    {
        $message = "Unable to set visibility for file {$filename}. $extraMessage";
        $e = new static(rtrim($message), 0, $previous);
        $e->reason = $extraMessage;
        $e->location = $filename;

        return $e;
    }

    public function operation(): string
    {
        return FilesystemOperationFailed::OPERATION_SET_VISIBILITY;
    }

    public function location(): string
    {
        return $this->location;
    }
}
