<?php

/*
 * This file is part of Twig.
 *
 * (c) Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace lib\Twig\TokenParser;

use lib\Twig\Node\FlushNode;
use lib\Twig\Node\Node;
use lib\Twig\Token;

/**
 * Flushes the output to the client.
 *
 * @see flush()
 *
 * @internal
 */
final class FlushTokenParser extends AbstractTokenParser
{
    public function parse(Token $token): Node
    {
        $this->parser->getStream()->expect(/* Token::BLOCK_END_TYPE */ 3);

        return new FlushNode($token->getLine(), $this->getTag());
    }

    public function getTag(): string
    {
        return 'flush';
    }
}
