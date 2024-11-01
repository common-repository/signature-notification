<?php
/**
 * @license MIT
 *
 * Modified by notification on 02-October-2024 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace BracketSpace\Notification\Signature\Dependencies\JsonMapper\Helpers;

use BracketSpace\Notification\Signature\Dependencies\JsonMapper\Enums\ScalarType;
use ReflectionClass;

class ClassHelper
{
    public static function isBuiltin(string $type): bool
    {
        if ($type === 'mixed' || ScalarType::isValid($type) || ! \class_exists($type)) {
            return false;
        }

        $reflection = new ReflectionClass($type);
        return $reflection->isInternal();
    }

    public static function isCustom(string $type): bool
    {
        if ($type === 'mixed' || ScalarType::isValid($type) || ! \class_exists($type)) {
            return false;
        }

        $reflection = new ReflectionClass($type);
        return !$reflection->isInternal();
    }
}
