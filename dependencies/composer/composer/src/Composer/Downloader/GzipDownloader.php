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

namespace BracketSpace\Notification\Signature\Dependencies\Composer\Downloader;

use BracketSpace\Notification\Signature\Dependencies\React\Promise\PromiseInterface;
use BracketSpace\Notification\Signature\Dependencies\Composer\Package\PackageInterface;
use BracketSpace\Notification\Signature\Dependencies\Composer\Util\Platform;
use BracketSpace\Notification\Signature\Dependencies\Composer\Util\ProcessExecutor;

/**
 * GZip archive downloader.
 *
 * @author Pavel Puchkin <i@neoascetic.me>
 */
class GzipDownloader extends ArchiveDownloader
{
    protected function extract(PackageInterface $package, string $file, string $path): PromiseInterface
    {
        $filename = pathinfo(parse_url(strtr((string) $package->getDistUrl(), '\\', '/'), PHP_URL_PATH), PATHINFO_FILENAME);
        $targetFilepath = $path . DIRECTORY_SEPARATOR . $filename;

        // Try to use gunzip on *nix
        if (!Platform::isWindows()) {
            $command = 'gzip -cd -- ' . ProcessExecutor::escape($file) . ' > ' . ProcessExecutor::escape($targetFilepath);

            if (0 === $this->process->execute($command, $ignoredOutput)) {
                return \BracketSpace\Notification\Signature\Dependencies\React\Promise\resolve(null);
            }

            if (extension_loaded('zlib')) {
                // Fallback to using the PHP extension.
                $this->extractUsingExt($file, $targetFilepath);

                return \BracketSpace\Notification\Signature\Dependencies\React\Promise\resolve(null);
            }

            $processError = 'Failed to execute ' . $command . "\n\n" . $this->process->getErrorOutput();
            throw new \RuntimeException($processError);
        }

        // Windows version of PHP has built-in support of gzip functions
        $this->extractUsingExt($file, $targetFilepath);

        return \BracketSpace\Notification\Signature\Dependencies\React\Promise\resolve(null);
    }

    private function extractUsingExt(string $file, string $targetFilepath): void
    {
        $archiveFile = gzopen($file, 'rb');
        $targetFile = fopen($targetFilepath, 'wb');
        while ($string = gzread($archiveFile, 4096)) {
            fwrite($targetFile, $string, Platform::strlen($string));
        }
        gzclose($archiveFile);
        fclose($targetFile);
    }
}
