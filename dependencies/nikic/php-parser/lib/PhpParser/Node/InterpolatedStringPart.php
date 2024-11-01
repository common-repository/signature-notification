<?php
/**
 * @license BSD-3-Clause
 *
 * Modified by notification on 02-October-2024 using {@see https://github.com/BrianHenryIE/strauss}.
 */ declare(strict_types=1);

namespace BracketSpace\Notification\Signature\Dependencies\PhpParser\Node;

use BracketSpace\Notification\Signature\Dependencies\PhpParser\NodeAbstract;

class InterpolatedStringPart extends NodeAbstract {
    /** @var string String value */
    public string $value;

    /**
     * Constructs a node representing a string part of an interpolated string.
     *
     * @param string $value String value
     * @param array<string, mixed> $attributes Additional attributes
     */
    public function __construct(string $value, array $attributes = []) {
        $this->attributes = $attributes;
        $this->value = $value;
    }

    public function getSubNodeNames(): array {
        return ['value'];
    }

    public function getType(): string {
        return 'InterpolatedStringPart';
    }
}

// @deprecated compatibility alias
class_alias(InterpolatedStringPart::class, Scalar\EncapsedStringPart::class);
