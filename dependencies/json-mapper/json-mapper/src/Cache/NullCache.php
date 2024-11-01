<?php
/**
 * @license MIT
 *
 * Modified by notification on 02-October-2024 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace BracketSpace\Notification\Signature\Dependencies\JsonMapper\Cache;

use BracketSpace\Notification\Signature\Dependencies\Psr\SimpleCache\CacheInterface;
use BracketSpace\Notification\Signature\Dependencies\Symfony\Component\Cache\Adapter\NullAdapter;
use BracketSpace\Notification\Signature\Dependencies\Symfony\Component\Cache\Psr16Cache;

class NullCache extends Psr16Cache implements CacheInterface
{

    public function __construct()
    {
        parent::__construct(new NullAdapter());
    }
}