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

use lib\Twig\Node\Expression\AssignNameExpression;
use lib\Twig\Node\ImportNode;
use lib\Twig\Node\Node;
use lib\Twig\Token;

/**
 * Imports macros.
 *
 *   {% import 'forms.html' as forms %}
 *
 * @internal
 */
final class ImportTokenParser extends AbstractTokenParser
{
    public function parse(Token $token): Node
    {
        $macro = $this->parser->getExpressionParser()->parseExpression();
        $this->parser->getStream()->expect(/* Token::NAME_TYPE */ 5, 'as');
        $var = new AssignNameExpression($this->parser->getStream()->expect(/* Token::NAME_TYPE */ 5)->getValue(), $token->getLine());
        $this->parser->getStream()->expect(/* Token::BLOCK_END_TYPE */ 3);

        $this->parser->addImportedSymbol('template', $var->getAttribute('name'));

        return new ImportNode($macro, $var, $token->getLine(), $this->getTag(), $this->parser->isMainScope());
    }

    public function getTag(): string
    {
        return 'import';
    }
}
