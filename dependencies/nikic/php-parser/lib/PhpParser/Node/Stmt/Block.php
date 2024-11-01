<?php
/**
 * @license BSD-3-Clause
 *
 * Modified by notification on 02-October-2024 using {@see https://github.com/BrianHenryIE/strauss}.
 */ declare(strict_types=1);

namespace BracketSpace\Notification\Signature\Dependencies\PhpParser\Node\Stmt;

use BracketSpace\Notification\Signature\Dependencies\PhpParser\Node\Stmt;

class Block extends Stmt {
    /** @var Stmt[] Statements */
    public array $stmts;

    /**
     * A block of statements.
     *
     * @param Stmt[] $stmts Statements
     * @param array<string, mixed> $attributes Additional attributes
     */
    public function __construct(array $stmts, array $attributes = []) {
        $this->attributes = $attributes;
        $this->stmts = $stmts;
    }

    public function getType(): string {
        return 'Stmt_Block';
    }

    public function getSubNodeNames(): array {
        return ['stmts'];
    }
}
