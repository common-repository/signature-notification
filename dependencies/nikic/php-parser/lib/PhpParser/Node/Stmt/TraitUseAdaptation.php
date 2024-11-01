<?php
/**
 * @license BSD-3-Clause
 *
 * Modified by notification on 02-October-2024 using {@see https://github.com/BrianHenryIE/strauss}.
 */ declare(strict_types=1);

namespace BracketSpace\Notification\Signature\Dependencies\PhpParser\Node\Stmt;

use BracketSpace\Notification\Signature\Dependencies\PhpParser\Node;

abstract class TraitUseAdaptation extends Node\Stmt {
    /** @var Node\Name|null Trait name */
    public ?Node\Name $trait;
    /** @var Node\Identifier Method name */
    public Node\Identifier $method;
}
