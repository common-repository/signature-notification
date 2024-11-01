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

namespace BracketSpace\Notification\Signature\Dependencies\Composer\DependencyResolver\Operation;

/**
 * Abstract operation class.
 *
 * @author Aleksandr Bezpiatov <aleksandr.bezpiatov@spryker.com>
 */
abstract class SolverOperation implements OperationInterface
{
    /**
     * @abstract must be redefined by extending classes
     */
    protected const TYPE = '';

    /**
     * Returns operation type.
     */
    public function getOperationType(): string
    {
        return static::TYPE;
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return $this->show(false);
    }
}
