<?php
/**
 * @license BSD-3-Clause
 *
 * Modified by notification on 02-October-2024 using {@see https://github.com/BrianHenryIE/strauss}.
 */ declare(strict_types=1);

namespace BracketSpace\Notification\Signature\Dependencies\PhpParser\Node;

use BracketSpace\Notification\Signature\Dependencies\PhpParser\Node;
use BracketSpace\Notification\Signature\Dependencies\PhpParser\NodeAbstract;

class PropertyItem extends NodeAbstract {
    /** @var Node\VarLikeIdentifier Name */
    public VarLikeIdentifier $name;
    /** @var null|Node\Expr Default */
    public ?Expr $default;

    /**
     * Constructs a class property item node.
     *
     * @param string|Node\VarLikeIdentifier $name Name
     * @param null|Node\Expr $default Default value
     * @param array<string, mixed> $attributes Additional attributes
     */
    public function __construct($name, ?Node\Expr $default = null, array $attributes = []) {
        $this->attributes = $attributes;
        $this->name = \is_string($name) ? new Node\VarLikeIdentifier($name) : $name;
        $this->default = $default;
    }

    public function getSubNodeNames(): array {
        return ['name', 'default'];
    }

    public function getType(): string {
        return 'PropertyItem';
    }
}

// @deprecated compatibility alias
class_alias(PropertyItem::class, Stmt\PropertyProperty::class);
