<?php
/**
 * @license BSD-3-Clause
 *
 * Modified by notification on 02-October-2024 using {@see https://github.com/BrianHenryIE/strauss}.
 */ declare(strict_types=1);

namespace BracketSpace\Notification\Signature\Dependencies\PhpParser\Node\Expr;

use BracketSpace\Notification\Signature\Dependencies\PhpParser\Node\Expr;

class Variable extends Expr {
    /** @var string|Expr Name */
    public $name;

    /**
     * Constructs a variable node.
     *
     * @param string|Expr $name Name
     * @param array<string, mixed> $attributes Additional attributes
     */
    public function __construct($name, array $attributes = []) {
        $this->attributes = $attributes;
        $this->name = $name;
    }

    public function getSubNodeNames(): array {
        return ['name'];
    }

    public function getType(): string {
        return 'Expr_Variable';
    }
}
