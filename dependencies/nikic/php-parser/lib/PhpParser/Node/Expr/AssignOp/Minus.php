<?php
/**
 * @license BSD-3-Clause
 *
 * Modified by notification on 02-October-2024 using {@see https://github.com/BrianHenryIE/strauss}.
 */ declare(strict_types=1);

namespace BracketSpace\Notification\Signature\Dependencies\PhpParser\Node\Expr\AssignOp;

use BracketSpace\Notification\Signature\Dependencies\PhpParser\Node\Expr\AssignOp;

class Minus extends AssignOp {
    public function getType(): string {
        return 'Expr_AssignOp_Minus';
    }
}
