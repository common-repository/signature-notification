<?php
/**
 * @license MIT
 *
 * Modified by notification on 02-October-2024 using {@see https://github.com/BrianHenryIE/strauss}.
 */ declare(strict_types=1);

/*
 * This file is part of Composer.
 *
 * (c) Nils Adermann <naderman@naderman.de>
 *     Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BracketSpace\Notification\Signature\Dependencies\Composer\Package\Version;

use BracketSpace\Notification\Signature\Dependencies\Composer\Package\BasePackage;

/**
 * @author Jordi Boggiano <j.boggiano@seld.be>
 */
class StabilityFilter
{
    /**
     * Checks if any of the provided package names in the given stability match the configured acceptable stability and flags
     *
     * @param int[] $acceptableStabilities array of stability => BasePackage::STABILITY_* value
     * @phpstan-param array<string, BasePackage::STABILITY_*> $acceptableStabilities
     * @param int[] $stabilityFlags an array of package name => BasePackage::STABILITY_* value
     * @phpstan-param array<string, BasePackage::STABILITY_*> $stabilityFlags
     * @param  string[] $names     The package name(s) to check for stability flags
     * @param  string   $stability one of 'stable', 'RC', 'beta', 'alpha' or 'dev'
     * @return bool     true if any package name is acceptable
     */
    public static function isPackageAcceptable(array $acceptableStabilities, array $stabilityFlags, array $names, string $stability): bool
    {
        foreach ($names as $name) {
            // allow if package matches the package-specific stability flag
            if (isset($stabilityFlags[$name])) {
                if (BasePackage::$stabilities[$stability] <= $stabilityFlags[$name]) {
                    return true;
                }
            } elseif (isset($acceptableStabilities[$stability])) {
                // allow if package matches the global stability requirement and has no exception
                return true;
            }
        }

        return false;
    }
}
