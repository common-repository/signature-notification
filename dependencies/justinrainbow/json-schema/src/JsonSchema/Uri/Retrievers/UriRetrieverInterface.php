<?php

/*
 * This file is part of the JsonSchema package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Modified by notification on 02-October-2024 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace BracketSpace\Notification\Signature\Dependencies\JsonSchema\Uri\Retrievers;

/**
 * Interface for URI retrievers
 *
 * @author Sander Coolen <sander@jibber.nl>
 */
interface UriRetrieverInterface
{
    /**
     * Retrieve a schema from the specified URI
     *
     * @param string $uri URI that resolves to a JSON schema
     *
     * @throws \BracketSpace\Notification\Signature\Dependencies\JsonSchema\Exception\ResourceNotFoundException
     *
     * @return mixed string|null
     */
    public function retrieve($uri);

    /**
     * Get media content type
     *
     * @return string
     */
    public function getContentType();
}
