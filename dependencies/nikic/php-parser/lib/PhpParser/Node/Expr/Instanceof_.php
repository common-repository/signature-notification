<?php
/**
 * @license BSD-3-Clause
 *
 * Modified by notification on 02-October-2024 using {@see https://github.com/BrianHenryIE/strauss}.
 */ declare(strict_types=1);

namespace BracketSpace\Notification\Signature\Dependencies\PhpParser\Node\Expr;

use BracketSpace\Notification\Signature\Dependencies\PhpParser\Node;
use BracketSpace\Notification\Signature\Dependencies\PhpParser\Node\Expr;
use BracketSpace\Notification\Signature\Dependencies\PhpParser\Node\Name;

class Instanceof_ extends Expr {
    /** @var Expr Expression */
    public Expr $expr;
    /** @var Name|Expr Class name */
    public Node $class;

    /**
     * Constructs an instanceof check node.
     *
     * @param Expr $expr Expression
     * @param Name|Expr $class Class name
     * @param array<string, mixed> $attributes Additional attributes
     */
    public function __construct(Expr $expr, Node $class, array $attributes = []) {
        $this->attributes = $attributes;
        $this->expr = $expr;
        $this->class = $class;
    }

    public function getSubNodeNames(): array {
        return ['expr', 'class'];
    }

    public function getType(): string {
        return 'Expr_Instanceof';
    }
}
