<?php
/**
 * @license BSD-3-Clause
 *
 * Modified by notification on 02-October-2024 using {@see https://github.com/BrianHenryIE/strauss}.
 */ declare(strict_types=1);

namespace BracketSpace\Notification\Signature\Dependencies\PhpParser\Builder;

use BracketSpace\Notification\Signature\Dependencies\PhpParser;
use BracketSpace\Notification\Signature\Dependencies\PhpParser\BuilderHelpers;
use BracketSpace\Notification\Signature\Dependencies\PhpParser\Node;
use BracketSpace\Notification\Signature\Dependencies\PhpParser\Node\Name;
use BracketSpace\Notification\Signature\Dependencies\PhpParser\Node\Stmt;

class Interface_ extends Declaration {
    protected string $name;
    /** @var list<Name> */
    protected array $extends = [];
    /** @var list<Stmt\ClassConst> */
    protected array $constants = [];
    /** @var list<Stmt\ClassMethod> */
    protected array $methods = [];
    /** @var list<Node\AttributeGroup> */
    protected array $attributeGroups = [];

    /**
     * Creates an interface builder.
     *
     * @param string $name Name of the interface
     */
    public function __construct(string $name) {
        $this->name = $name;
    }

    /**
     * Extends one or more interfaces.
     *
     * @param Name|string ...$interfaces Names of interfaces to extend
     *
     * @return $this The builder instance (for fluid interface)
     */
    public function extend(...$interfaces) {
        foreach ($interfaces as $interface) {
            $this->extends[] = BuilderHelpers::normalizeName($interface);
        }

        return $this;
    }

    /**
     * Adds a statement.
     *
     * @param Stmt|BracketSpace\Notification\Signature\Dependencies\PhpParser\Builder $stmt The statement to add
     *
     * @return $this The builder instance (for fluid interface)
     */
    public function addStmt($stmt) {
        $stmt = BuilderHelpers::normalizeNode($stmt);

        if ($stmt instanceof Stmt\ClassConst) {
            $this->constants[] = $stmt;
        } elseif ($stmt instanceof Stmt\ClassMethod) {
            // we erase all statements in the body of an interface method
            $stmt->stmts = null;
            $this->methods[] = $stmt;
        } else {
            throw new \LogicException(sprintf('Unexpected node of type "%s"', $stmt->getType()));
        }

        return $this;
    }

    /**
     * Adds an attribute group.
     *
     * @param Node\Attribute|Node\AttributeGroup $attribute
     *
     * @return $this The builder instance (for fluid interface)
     */
    public function addAttribute($attribute) {
        $this->attributeGroups[] = BuilderHelpers::normalizeAttribute($attribute);

        return $this;
    }

    /**
     * Returns the built interface node.
     *
     * @return Stmt\Interface_ The built interface node
     */
    public function getNode(): BracketSpace\Notification\Signature\Dependencies\PhpParser\Node {
        return new Stmt\Interface_($this->name, [
            'extends' => $this->extends,
            'stmts' => array_merge($this->constants, $this->methods),
            'attrGroups' => $this->attributeGroups,
        ], $this->attributes);
    }
}
