<?php
/**
 * @license BSD-3-Clause
 *
 * Modified by notification on 02-October-2024 using {@see https://github.com/BrianHenryIE/strauss}.
 */ declare(strict_types=1);

namespace BracketSpace\Notification\Signature\Dependencies\PhpParser\Node\Stmt;

use BracketSpace\Notification\Signature\Dependencies\PhpParser\Node;
use BracketSpace\Notification\Signature\Dependencies\PhpParser\Node\AttributeGroup;

class EnumCase extends Node\Stmt {
    /** @var Node\Identifier Enum case name */
    public Node\Identifier $name;
    /** @var Node\Expr|null Enum case expression */
    public ?Node\Expr $expr;
    /** @var Node\AttributeGroup[] PHP attribute groups */
    public array $attrGroups;

    /**
     * @param string|Node\Identifier $name Enum case name
     * @param Node\Expr|null $expr Enum case expression
     * @param list<AttributeGroup> $attrGroups PHP attribute groups
     * @param array<string, mixed> $attributes Additional attributes
     */
    public function __construct($name, ?Node\Expr $expr = null, array $attrGroups = [], array $attributes = []) {
        parent::__construct($attributes);
        $this->name = \is_string($name) ? new Node\Identifier($name) : $name;
        $this->expr = $expr;
        $this->attrGroups = $attrGroups;
    }

    public function getSubNodeNames(): array {
        return ['attrGroups', 'name', 'expr'];
    }

    public function getType(): string {
        return 'Stmt_EnumCase';
    }
}
