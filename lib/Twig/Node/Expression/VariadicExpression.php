<?php

/*
 * This file is part of Twig.
 *
 * (c) Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace lib\Twig\Node\Expression;

use lib\Twig\Compiler;

class VariadicExpression extends ArrayExpression
{
    public function compile(Compiler $compiler): void
    {
        $compiler->raw('...');

        parent::compile($compiler);
    }
}
