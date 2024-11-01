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

use BracketSpace\Notification\Signature\Dependencies\Composer\Repository\InstalledRepositoryInterface;
use BracketSpace\Notification\Signature\Dependencies\Composer\Package\PackageInterface;
use BracketSpace\Notification\Signature\Dependencies\Composer\IO\IOInterface;
use BracketSpace\Notification\Signature\Dependencies\Composer\DependencyResolver\Operation\UpdateOperation;
use BracketSpace\Notification\Signature\Dependencies\Composer\DependencyResolver\Operation\InstallOperation;
use BracketSpace\Notification\Signature\Dependencies\Composer\DependencyResolver\Operation\UninstallOperation;

/**
 * Metapackage installation manager.
 *
 * @author Martin Hasoň <martin.hason@gmail.com>
 */
class MetapackageInstaller implements InstallerInterface
{
    /** @var IOInterface */
    private $io;

    public function __construct(IOInterface $io)
    {
        $this->io = $io;
    }

    /**
     * @inheritDoc
     */
    public function supports(string $packageType)
    {
        return $packageType === 'metapackage';
    }

    /**
     * @inheritDoc
     */
    public function isInstalled(InstalledRepositoryInterface $repo, PackageInterface $package)
    {
        return $repo->hasPackage($package);
    }

    /**
     * @inheritDoc
     */
    public function download(PackageInterface $package, ?PackageInterface $prevPackage = null)
    {
        // noop
        return \BracketSpace\Notification\Signature\Dependencies\React\Promise\resolve(null);
    }

    /**
     * @inheritDoc
     */
    public function prepare($type, PackageInterface $package, ?PackageInterface $prevPackage = null)
    {
        // noop
        return \BracketSpace\Notification\Signature\Dependencies\React\Promise\resolve(null);
    }

    /**
     * @inheritDoc
     */
    public function cleanup($type, PackageInterface $package, ?PackageInterface $prevPackage = null)
    {
        // noop
        return \BracketSpace\Notification\Signature\Dependencies\React\Promise\resolve(null);
    }

    /**
     * @inheritDoc
     */
    public function install(InstalledRepositoryInterface $repo, PackageInterface $package)
    {
        $this->io->writeError("  - " . InstallOperation::format($package));

        $repo->addPackage(clone $package);

        return \BracketSpace\Notification\Signature\Dependencies\React\Promise\resolve(null);
    }

    /**
     * @inheritDoc
     */
    public function update(InstalledRepositoryInterface $repo, PackageInterface $initial, PackageInterface $target)
    {
        if (!$repo->hasPackage($initial)) {
            throw new \InvalidArgumentException('Package is not installed: '.$initial);
        }

        $this->io->writeError("  - " . UpdateOperation::format($initial, $target));

        $repo->removePackage($initial);
        $repo->addPackage(clone $target);

        return \BracketSpace\Notification\Signature\Dependencies\React\Promise\resolve(null);
    }

    /**
     * @inheritDoc
     */
    public function uninstall(InstalledRepositoryInterface $repo, PackageInterface $package)
    {
        if (!$repo->hasPackage($package)) {
            throw new \InvalidArgumentException('Package is not installed: '.$package);
        }

        $this->io->writeError("  - " . UninstallOperation::format($package));

        $repo->removePackage($package);

        return \BracketSpace\Notification\Signature\Dependencies\React\Promise\resolve(null);
    }

    /**
     * @inheritDoc
     *
     * @return null
     */
    public function getInstallPath(PackageInterface $package)
    {
        return null;
    }
}
