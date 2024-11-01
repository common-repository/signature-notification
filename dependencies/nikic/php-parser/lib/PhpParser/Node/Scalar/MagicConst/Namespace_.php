<?php
/**
 * @license BSD-3-Clause
 *
 * Modified by notification on 02-October-2024 using {@see https://github.com/BrianHenryIE/strauss}.
 */ declare(strict_types=1);

namespace BracketSpace\Notification\Signature\Dependencies\PhpParser\Node\Scalar\MagicConst;

use BracketSpace\Notification\Signature\Dependencies\PhpParser\Node\Scalar\MagicConst;

class Namespace_ extends MagicConst {
    public function getName(): string {
        return '__NAMESPACE__';
    }

    public function getType(): string {
        return 'Scalar_MagicConst_Namespace';
    }
}
