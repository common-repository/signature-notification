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

final class UnableToDeleteFile extends RuntimeException implements FilesystemOperationFailed
{
    /**
     * @var string
     */
    private $location = '';

    /**
     * @var string
     */
    private $reason;

    public static function atLocation(string $location, string $reason = '', Throwable $previous = null): UnableToDeleteFile
    {
        $e = new static(rtrim("Unable to delete file located at: {$location}. {$reason}"), 0, $previous);
        $e->location = $location;
        $e->reason = $reason;

        return $e;
    }

    public function operation(): string
    {
        return FilesystemOperationFailed::OPERATION_DELETE;
    }

    public function reason(): string
    {
        return $this->reason;
    }

    public function location(): string
    {
        return $this->location;
    }
}
