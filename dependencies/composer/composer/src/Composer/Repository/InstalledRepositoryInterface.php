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

namespace BracketSpace\Notification\Signature\Dependencies\Composer\Repository;

/**
 * Installable repository interface.
 *
 * Just used to tag installed repositories so the base classes can act differently on Alias packages
 *
 * @author Jordi Boggiano <j.boggiano@seld.be>
 */
interface InstalledRepositoryInterface extends WritableRepositoryInterface
{
    /**
     * @return bool|null true if dev requirements were installed, false if --no-dev was used, null if yet unknown
     */
    public function getDevMode();

    /**
     * @return bool true if packages were never installed in this repository
     */
    public function isFresh();
}
