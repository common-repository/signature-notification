<?php
/**
 * @license BSD-3-Clause
 *
 * Modified by notification on 02-October-2024 using {@see https://github.com/BrianHenryIE/strauss}.
 */ declare(strict_types=1);

namespace BracketSpace\Notification\Signature\Dependencies\PhpParser\Node\Scalar;

use BracketSpace\Notification\Signature\Dependencies\PhpParser\Node\Scalar;

abstract class MagicConst extends Scalar {
    /**
     * Constructs a magic constant node.
     *
     * @param array<string, mixed> $attributes Additional attributes
     */
    public function __construct(array $attributes = []) {
        $this->attributes = $attributes;
    }

    public function getSubNodeNames(): array {
        return [];
    }

    /**
     * Get name of magic constant.
     *
     * @return string Name of magic constant
     */
    abstract public function getName(): string;
}
