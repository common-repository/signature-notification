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

use BracketSpace\Notification\Signature\Dependencies\Composer\Package\PackageInterface;
use BracketSpace\Notification\Signature\Dependencies\Composer\Installer\InstallationManager;

/**
 * Writable repository interface.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
interface WritableRepositoryInterface extends RepositoryInterface
{
    /**
     * Writes repository (f.e. to the disc).
     *
     * @param bool $devMode Whether dev requirements were included or not in this installation
     * @return void
     */
    public function write(bool $devMode, InstallationManager $installationManager);

    /**
     * Adds package to the repository.
     *
     * @param PackageInterface $package package instance
     * @return void
     */
    public function addPackage(PackageInterface $package);

    /**
     * Removes package from the repository.
     *
     * @param PackageInterface $package package instance
     * @return void
     */
    public function removePackage(PackageInterface $package);

    /**
     * Get unique packages (at most one package of each name), with aliases resolved and removed.
     *
     * @return PackageInterface[]
     */
    public function getCanonicalPackages();

    /**
     * Forces a reload of all packages.
     *
     * @return void
     */
    public function reload();

    /**
     * @param string[] $devPackageNames
     * @return void
     */
    public function setDevPackageNames(array $devPackageNames);

    /**
     * @return string[] Names of dependencies installed through require-dev
     */
    public function getDevPackageNames();
}
