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

/* admin/Form.html */
class __TwigTemplate_c20d4b15681ed0ba3688fb094c2a53e4 extends Template
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
        if (twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "error", [], "any", false, false, false, 1)) {
            // line 2
            echo "<div class=\"error-status\">
    <p> * ";
            // line 3
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "error", [], "any", false, false, false, 3), "html", null, true);
            echo "</p>
</div>
";
        }
        // line 6
        echo "
<form id=\"form_action\" action=\"";
        // line 7
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "action", [], "any", false, false, false, 7), "html", null, true);
        echo "\" method=\"post\" enctype=\"multipart/form-data\"> 

<input type=\"hidden\" name=\"csrf\" value=\"";
        // line 9
        echo twig_escape_filter($this->env, ($context["_token"] ?? null), "html", null, true);
        echo "\">

";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "form", [], "any", false, false, false, 11));
        foreach ($context['_seq'] as $context["_key"] => $context["obj"]) {
            // line 12
            echo "    
    ";
            // line 14
            echo "    ";
            if ((twig_get_attribute($this->env, $this->source, $context["obj"], "tag", [], "any", false, false, false, 14) == "button")) {
                // line 15
                echo "        <button type=\"submit\" class=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["obj"], "class", [], "any", false, false, false, 15), "html", null, true);
                echo "\" id=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["obj"], "id", [], "any", false, false, false, 15), "html", null, true);
                echo "\"><i class=\"fa-solid fa-download fa-2xl\"></i>&nbsp;&nbsp;";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["obj"], "value", [], "any", false, false, false, 15), "html", null, true);
                echo "</button>
        ";
                // line 16
                if (($context["deleteUrl"] ?? null)) {
                    // line 17
                    echo "        <a href=\"";
                    echo twig_escape_filter($this->env, ($context["deleteUrl"] ?? null), "html", null, true);
                    echo "\"><i class=\"fa-solid fa-xmark fa-2xl\"></i>&nbsp;&nbsp;Удалить</a>
        ";
                }
                // line 19
                echo "    ";
            }
            // line 20
            echo "


    ";
            // line 24
            echo "    ";
            if ((twig_get_attribute($this->env, $this->source, $context["obj"], "tag", [], "any", false, false, false, 24) == "select")) {
                // line 25
                echo "            <div class=\"wrapper\">
                <label for=\"";
                // line 26
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["obj"], "id", [], "any", false, false, false, 26), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["obj"], "label", [], "any", false, false, false, 26), "html", null, true);
                echo "</label>
                
                <select name=\"";
                // line 28
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["obj"], "name", [], "any", false, false, false, 28), "html", null, true);
                echo "\" id=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["obj"], "id", [], "any", false, false, false, 28), "html", null, true);
                echo "\" class=\"";
                if (twig_get_attribute($this->env, $this->source, $context["obj"], "error", [], "any", false, false, false, 28)) {
                    echo "error_wrapper";
                }
                echo "\">
                    ";
                // line 29
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["obj"], "option", [], "any", false, false, false, 29));
                foreach ($context['_seq'] as $context["key"] => $context["item"]) {
                    // line 30
                    echo "                       ";
                    echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                    echo "
                       ";
                    // line 31
                    if ((twig_get_attribute($this->env, $this->source, $context["obj"], "selected", [], "any", false, false, false, 31) == twig_get_attribute($this->env, $this->source, $context["item"], 0, [], "any", false, false, false, 31))) {
                        // line 32
                        echo "                        <option selected value=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], 0, [], "any", false, false, false, 32), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], 1, [], "any", false, false, false, 32), "html", null, true);
                        echo "</option>
                        ";
                    } else {
                        // line 34
                        echo "                        <option value=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], 0, [], "any", false, false, false, 34), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], 1, [], "any", false, false, false, 34), "html", null, true);
                        echo "</option>
                        ";
                    }
                    // line 36
                    echo "                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 37
                echo "                </select>
                ";
                // line 38
                if (twig_get_attribute($this->env, $this->source, $context["obj"], "error", [], "any", false, false, false, 38)) {
                    // line 39
                    echo "                    <span class=\"error\">*&nbsp;";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["obj"], "errorMsg", [], "any", false, false, false, 39), "html", null, true);
                    echo "</span>
                ";
                }
                // line 41
                echo "            </div>
    ";
            }
            // line 43
            echo "


    ";
            // line 47
            echo "    ";
            if ((twig_get_attribute($this->env, $this->source, $context["obj"], "tag", [], "any", false, false, false, 47) == "input")) {
                // line 48
                echo "            <div class=\"wrapper\">
                <label for=\"";
                // line 49
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["obj"], "id", [], "any", false, false, false, 49), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["obj"], "label", [], "any", false, false, false, 49), "html", null, true);
                echo "</label>
                <input type=\"";
                // line 50
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["obj"], "type", [], "any", false, false, false, 50), "html", null, true);
                echo "\" name=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["obj"], "name", [], "any", false, false, false, 50), "html", null, true);
                echo "\" id=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["obj"], "id", [], "any", false, false, false, 50), "html", null, true);
                echo "\" class=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["obj"], "class", [], "any", false, false, false, 50), "html", null, true);
                echo " ";
                if (twig_get_attribute($this->env, $this->source, $context["obj"], "error", [], "any", false, false, false, 50)) {
                    echo "error_wrapper";
                }
                echo "\" value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["obj"], "value", [], "any", false, false, false, 50), "html", null, true);
                echo "\"  ";
                if (((twig_get_attribute($this->env, $this->source, $context["obj"], "type", [], "any", false, false, false, 50) == "checkbox") && twig_get_attribute($this->env, $this->source, $context["obj"], "value", [], "any", false, false, false, 50))) {
                    echo "checked";
                }
                echo ">
                ";
                // line 51
                if (twig_get_attribute($this->env, $this->source, $context["obj"], "error", [], "any", false, false, false, 51)) {
                    // line 52
                    echo "                    <span class=\"error\">*&nbsp;";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["obj"], "errorMsg", [], "any", false, false, false, 52), "html", null, true);
                    echo "</span>
                ";
                }
                // line 54
                echo "                ";
                if (((twig_get_attribute($this->env, $this->source, $context["obj"], "name", [], "any", false, false, false, 54) == "is_postponed") && twig_get_attribute($this->env, $this->source, $context["obj"], "value", [], "any", false, false, false, 54))) {
                    // line 55
                    echo "                <script>
                    var dataPostponed = ";
                    // line 56
                    echo json_encode(($context["dataPostponed"] ?? null));
                    echo ";
                </script>                
                ";
                }
                // line 59
                echo "                ";
                if ((twig_get_attribute($this->env, $this->source, $context["obj"], "type", [], "any", false, false, false, 59) == "file")) {
                    // line 60
                    echo "                    <span class=\"output\"><img id=\"image-preview\" src=\"";
                    if (twig_get_attribute($this->env, $this->source, $context["obj"], "value", [], "any", false, false, false, 60)) {
                        echo "/img/blog/small/";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["obj"], "value", [], "any", false, false, false, 60), "html", null, true);
                    } else {
                        echo "#";
                    }
                    echo "\" alt=\"Image Preview\" width=\"220\"></span>
                ";
                }
                // line 62
                echo "            </div>
    ";
            }
            // line 64
            echo "

    ";
            // line 67
            echo "    ";
            if ((twig_get_attribute($this->env, $this->source, $context["obj"], "tag", [], "any", false, false, false, 67) == "textarea")) {
                // line 68
                echo "            <div class=\"wrapper\">
                <label for=\"";
                // line 69
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["obj"], "id", [], "any", false, false, false, 69), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["obj"], "label", [], "any", false, false, false, 69), "html", null, true);
                echo "</label>
                <textarea name=\"";
                // line 70
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["obj"], "name", [], "any", false, false, false, 70), "html", null, true);
                echo "\" id=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["obj"], "id", [], "any", false, false, false, 70), "html", null, true);
                echo "\" cols=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["obj"], "cols", [], "any", false, false, false, 70), "html", null, true);
                echo "\" rows=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["obj"], "rows", [], "any", false, false, false, 70), "html", null, true);
                echo "\" class=\"";
                if (twig_get_attribute($this->env, $this->source, $context["obj"], "error", [], "any", false, false, false, 70)) {
                    echo "error_wrapper";
                }
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["obj"], "value", [], "any", false, false, false, 70), "html", null, true);
                echo "</textarea>
                ";
                // line 71
                if (twig_get_attribute($this->env, $this->source, $context["obj"], "error", [], "any", false, false, false, 71)) {
                    // line 72
                    echo "                    <span class=\"error\">*&nbsp;";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["obj"], "errorMsg", [], "any", false, false, false, 72), "html", null, true);
                    echo "</span>
                ";
                }
                // line 74
                echo "            </div>
    ";
            }
            // line 76
            echo "

    ";
            // line 79
            echo "    ";
            if ((twig_get_attribute($this->env, $this->source, $context["obj"], "tag", [], "any", false, false, false, 79) == "tinymce")) {
                // line 80
                echo "            <div class=\"wrapper textarea\">
                <label for=\"";
                // line 81
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["obj"], "id", [], "any", false, false, false, 81), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["obj"], "label", [], "any", false, false, false, 81), "html", null, true);
                echo "</label>
                <textarea name=\"";
                // line 82
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["obj"], "name", [], "any", false, false, false, 82), "html", null, true);
                echo "\" id=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["obj"], "id", [], "any", false, false, false, 82), "html", null, true);
                echo "\" class=\"";
                if (twig_get_attribute($this->env, $this->source, $context["obj"], "error", [], "any", false, false, false, 82)) {
                    echo "error_wrapper";
                }
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["obj"], "value", [], "any", false, false, false, 82), "html", null, true);
                echo "</textarea>
                ";
                // line 83
                if (twig_get_attribute($this->env, $this->source, $context["obj"], "error", [], "any", false, false, false, 83)) {
                    // line 84
                    echo "                    <span class=\"error\">*&nbsp;";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["obj"], "errorMsg", [], "any", false, false, false, 84), "html", null, true);
                    echo "</span>
                ";
                }
                // line 86
                echo "            </div>
    ";
            }
            // line 88
            echo "
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['obj'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 90
        echo "
</form> 
";
    }

    public function getTemplateName()
    {
        return "admin/Form.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  333 => 90,  326 => 88,  322 => 86,  316 => 84,  314 => 83,  302 => 82,  296 => 81,  293 => 80,  290 => 79,  286 => 76,  282 => 74,  276 => 72,  274 => 71,  258 => 70,  252 => 69,  249 => 68,  246 => 67,  242 => 64,  238 => 62,  227 => 60,  224 => 59,  218 => 56,  215 => 55,  212 => 54,  206 => 52,  204 => 51,  184 => 50,  178 => 49,  175 => 48,  172 => 47,  167 => 43,  163 => 41,  157 => 39,  155 => 38,  152 => 37,  146 => 36,  138 => 34,  130 => 32,  128 => 31,  123 => 30,  119 => 29,  109 => 28,  102 => 26,  99 => 25,  96 => 24,  91 => 20,  88 => 19,  82 => 17,  80 => 16,  71 => 15,  68 => 14,  65 => 12,  61 => 11,  56 => 9,  51 => 7,  48 => 6,  42 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/Form.html", "/var/www/html/tipsday/templates/admin/Form.html");
    }
}
