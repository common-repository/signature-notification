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
 * Thrown when a security problem, like a broken or missing signature
 *
 * @author Eric Daspet <edaspet@survol.fr>
 */
class RepositorySecurityException extends \Exception
{
}
