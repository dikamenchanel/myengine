 <?php

use lib\Twig\Environment;
use lib\Twig\Error\LoaderError;
use lib\Twig\Error\RuntimeError;
use lib\Twig\Extension\SandboxExtension;
use lib\Twig\Markup;
use lib\Twig\Sandbox\SecurityError;
use lib\Twig\Sandbox\SecurityNotAllowedTagError;
use lib\Twig\Sandbox\SecurityNotAllowedFilterError;
use lib\Twig\Sandbox\SecurityNotAllowedFunctionError;
use lib\Twig\Source;
use lib\Twig\Template;

/* admin/Table.html */
class __TwigTemplate_5064e417587abe47348f5bd3e68b99e8 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        if (($context["Access"] ?? null)) {
            // line 2
            echo "<div class=\"access\">
    <p>";
            // line 3
            echo twig_escape_filter($this->env, ($context["Access"] ?? null), "html", null, true);
            echo "</p>
</div>
";
        }
        // line 6
        echo "

<div class=\"table\">
    <ul class=\"table-title\">
    ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["Table"] ?? null), "titles", [], "any", false, false, false, 10));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["title"]) {
            // line 11
            echo "        ";
            if (($context["title"] == "actions")) {
                // line 12
                echo "            <li style=\"min-width:150px;width:150px;justify-content:space-around;";
                echo twig_escape_filter($this->env, (($__internal_compile_0 = twig_get_attribute($this->env, $this->source, ($context["Table"] ?? null), "style", [], "any", false, false, false, 12)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[twig_get_attribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 12)] ?? null) : null), "html", null, true);
                echo "\">
                ";
                // line 13
                echo twig_escape_filter($this->env, $context["title"], "html", null, true);
                echo "
            </li>
        ";
            } elseif ((            // line 15
$context["title"] == "link")) {
                // line 16
                echo "            <li style=\"min-width:50px;width:50px;justify-content:center;";
                echo twig_escape_filter($this->env, (($__internal_compile_1 = twig_get_attribute($this->env, $this->source, ($context["Table"] ?? null), "style", [], "any", false, false, false, 16)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[twig_get_attribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 16)] ?? null) : null), "html", null, true);
                echo "\">
                ";
                // line 17
                echo twig_escape_filter($this->env, $context["title"], "html", null, true);
                echo "
            </li>
        ";
            } elseif ((            // line 19
$context["title"] == "avatar")) {
                // line 20
                echo "            <li style=\"justify-content:center;";
                echo twig_escape_filter($this->env, (($__internal_compile_2 = twig_get_attribute($this->env, $this->source, ($context["Table"] ?? null), "style", [], "any", false, false, false, 20)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2[twig_get_attribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 20)] ?? null) : null), "html", null, true);
                echo "\">
                ";
                // line 21
                echo twig_escape_filter($this->env, $context["title"], "html", null, true);
                echo "
            </li>
        ";
            } else {
                // line 24
                echo "            <li style=\"";
                echo twig_escape_filter($this->env, (($__internal_compile_3 = twig_get_attribute($this->env, $this->source, ($context["Table"] ?? null), "style", [], "any", false, false, false, 24)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3[twig_get_attribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 24)] ?? null) : null), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $context["title"], "html", null, true);
                echo "</li>
        ";
            }
            // line 26
            echo "    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['title'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "    </ul>
    <ul class=\"table-body\">
        ";
        // line 29
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["Table"] ?? null), "data", [], "any", false, false, false, 29));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["items"]) {
            // line 30
            echo "            ";
            if (((twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 30) % 2) == 0)) {
                // line 31
                echo "                <li class=\"body-row bg\">
            ";
            } else {
                // line 33
                echo "                <li class=\"body-row\">
            ";
            }
            // line 35
            echo "                <ol>
                ";
            // line 36
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["items"]);
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["key"] => $context["item"]) {
                // line 37
                echo "                    ";
                if (($context["key"] == "urlAction")) {
                    // line 38
                    echo "                        <li class=\"row-item\" style=\"min-width:150px;width:150px;justify-content:space-around;";
                    echo twig_escape_filter($this->env, (($__internal_compile_4 = twig_get_attribute($this->env, $this->source, ($context["Table"] ?? null), "style", [], "any", false, false, false, 38)) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4[twig_get_attribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 38)] ?? null) : null), "html", null, true);
                    echo "\">
                            <a href=\"";
                    // line 39
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], 0, [], "any", false, false, false, 39), "html", null, true);
                    echo "\"><i class=\"fa-solid fa-pencil fa-xl\"></i></a>
                            <a href=\"";
                    // line 40
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], 1, [], "any", false, false, false, 40), "html", null, true);
                    echo "\"><i class=\"fa-solid fa-xmark fa-xl\"></i></a>
                            ";
                    // line 41
                    if (twig_get_attribute($this->env, $this->source, $context["item"], "input", [], "any", false, false, false, 41)) {
                        // line 42
                        echo "                                <input ";
                        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "input", [], "any", false, false, false, 42), "checked", [], "any", false, false, false, 42)) {
                            echo "checked";
                        }
                        echo " type=\"checkbox\" name=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "input", [], "any", false, false, false, 42), "name", [], "any", false, false, false, 42), "html", null, true);
                        echo "\" class=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "input", [], "any", false, false, false, 42), "name", [], "any", false, false, false, 42), "html", null, true);
                        echo "\" id=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "input", [], "any", false, false, false, 42), "name", [], "any", false, false, false, 42), "html", null, true);
                        echo "_";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 42), "html", null, true);
                        echo "\">
                            ";
                    }
                    // line 44
                    echo "                        </li>
                    ";
                } elseif ((                // line 45
$context["key"] == "urlLink")) {
                    // line 46
                    echo "                        <li class=\"row-item\" style=\"min-width:50px;width:50px;justify-content:center;";
                    echo twig_escape_filter($this->env, (($__internal_compile_5 = twig_get_attribute($this->env, $this->source, ($context["Table"] ?? null), "style", [], "any", false, false, false, 46)) && is_array($__internal_compile_5) || $__internal_compile_5 instanceof ArrayAccess ? ($__internal_compile_5[twig_get_attribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 46)] ?? null) : null), "html", null, true);
                    echo "\">
                            <a href=\"";
                    // line 47
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "href", [], "any", false, false, false, 47), "html", null, true);
                    echo "\" target=\"_blank\"><i class=\"fa-solid fa-square-up-right fa-xl\"></i>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "innerHTML", [], "any", false, false, false, 47), "html", null, true);
                    echo "</a>
                        </li>
                    ";
                } elseif ((                // line 49
$context["key"] == "urlAvatar")) {
                    // line 50
                    echo "                        <li class=\"row-item\" style=\"justify-content:center;";
                    echo twig_escape_filter($this->env, (($__internal_compile_6 = twig_get_attribute($this->env, $this->source, ($context["Table"] ?? null), "style", [], "any", false, false, false, 50)) && is_array($__internal_compile_6) || $__internal_compile_6 instanceof ArrayAccess ? ($__internal_compile_6[twig_get_attribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 50)] ?? null) : null), "html", null, true);
                    echo "\">
                            <img src=\"";
                    // line 51
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "src", [], "any", false, false, false, 51), "html", null, true);
                    echo "\" style=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "style", [], "any", false, false, false, 51), "html", null, true);
                    echo "\">
                        </li>
                    ";
                } else {
                    // line 54
                    echo "                        <li class=\"row-item\" style=\"";
                    echo twig_escape_filter($this->env, (($__internal_compile_7 = twig_get_attribute($this->env, $this->source, ($context["Table"] ?? null), "style", [], "any", false, false, false, 54)) && is_array($__internal_compile_7) || $__internal_compile_7 instanceof ArrayAccess ? ($__internal_compile_7[twig_get_attribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 54)] ?? null) : null), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $context["item"], "html", null, true);
                    echo "</li>
                    ";
                }
                // line 56
                echo "                ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 57
            echo "                </ol>
            </li>
        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['items'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
        echo "    </ul>
</div>
";
    }

    public function getTemplateName()
    {
        return "admin/Table.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  287 => 60,  271 => 57,  257 => 56,  249 => 54,  241 => 51,  236 => 50,  234 => 49,  227 => 47,  222 => 46,  220 => 45,  217 => 44,  201 => 42,  199 => 41,  195 => 40,  191 => 39,  186 => 38,  183 => 37,  166 => 36,  163 => 35,  159 => 33,  155 => 31,  152 => 30,  135 => 29,  131 => 27,  117 => 26,  109 => 24,  103 => 21,  98 => 20,  96 => 19,  91 => 17,  86 => 16,  84 => 15,  79 => 13,  74 => 12,  71 => 11,  54 => 10,  48 => 6,  42 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/Table.html", "/var/www/html/tipsday/templates/admin/Table.html");
    }
}
