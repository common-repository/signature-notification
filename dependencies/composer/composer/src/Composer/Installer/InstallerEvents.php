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

namespace BracketSpace\Notification\Signature\Dependencies\Composer\Installer;

class InstallerEvents
{
    /**
     * The PRE_OPERATIONS_EXEC event occurs before the lock file gets
     * installed and operations are executed.
     *
     * The event listener method receives an Composer\Installer\InstallerEvent instance.
     *
     * @var string
     */
    public const PRE_OPERATIONS_EXEC = 'pre-operations-exec';
}
