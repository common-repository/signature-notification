<?php
/**
 * @license BSD-3-Clause
 *
 * Modified by notification on 02-October-2024 using {@see https://github.com/BrianHenryIE/strauss}.
 */ declare(strict_types=1);

namespace BracketSpace\Notification\Signature\Dependencies\PhpParser\Node\Expr;

use BracketSpace\Notification\Signature\Dependencies\PhpParser\Node;
use BracketSpace\Notification\Signature\Dependencies\PhpParser\Node\Arg;
use BracketSpace\Notification\Signature\Dependencies\PhpParser\Node\Expr;
use BracketSpace\Notification\Signature\Dependencies\PhpParser\Node\Identifier;
use BracketSpace\Notification\Signature\Dependencies\PhpParser\Node\VariadicPlaceholder;

class MethodCall extends CallLike {
    /** @var Expr Variable holding object */
    public Expr $var;
    /** @var Identifier|Expr Method name */
    public Node $name;
    /** @var array<Arg|VariadicPlaceholder> Arguments */
    public array $args;

    /**
     * Constructs a function call node.
     *
     * @param Expr $var Variable holding object
     * @param string|Identifier|Expr $name Method name
     * @param array<Arg|VariadicPlaceholder> $args Arguments
     * @param array<string, mixed> $attributes Additional attributes
     */
    public function __construct(Expr $var, $name, array $args = [], array $attributes = []) {
        $this->attributes = $attributes;
        $this->var = $var;
        $this->name = \is_string($name) ? new Identifier($name) : $name;
        $this->args = $args;
    }

    public function getSubNodeNames(): array {
        return ['var', 'name', 'args'];
    }

    public function getType(): string {
        return 'Expr_MethodCall';
    }

    public function getRawArgs(): array {
        return $this->args;
    }
}
