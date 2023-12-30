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

/* admin/delete.html */
class __TwigTemplate_df8c7eed45b12c63c62e521bc3ec1cdb extends Template
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
        if (($context["ErrorDelete"] ?? null)) {
            // line 2
            echo "<div class=\"error-status\">
    <p> * ";
            // line 3
            echo twig_escape_filter($this->env, ($context["ErrorDelete"] ?? null), "html", null, true);
            echo "</p>
</div>
";
        }
        // line 6
        echo "
<form id=\"form_delete\" action=\"";
        // line 7
        echo twig_escape_filter($this->env, ($context["deleteUrl"] ?? null), "html", null, true);
        echo "\" method=\"post\"> 

<input type=\"hidden\" name=\"csrf\" value=\"";
        // line 9
        echo twig_escape_filter($this->env, ($context["_token"] ?? null), "html", null, true);
        echo "\">
<input type=\"hidden\" name=\"";
        // line 10
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["deleteData"] ?? null), "keys", [], "any", false, false, false, 10), 0, [], "any", false, false, false, 10), "html", null, true);
        echo "\" value=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["deleteData"] ?? null), "values", [], "any", false, false, false, 10), 0, [], "any", false, false, false, 10), "html", null, true);
        echo "\">
<p class=\"question\">Вы действительно хотите удалить этот элемент `";
        // line 11
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["deleteData"] ?? null), "values", [], "any", false, false, false, 11), 1, [], "any", false, false, false, 11), "html", null, true);
        echo "`? Вы серьезно подумали?</p>
<button type=\"submit\"><i class=\"fa-solid fa-thumbs-down fa-xl\"></i>&nbsp;&nbsp;&nbsp;Подтвердить</button>
<a href=\"";
        // line 13
        echo twig_escape_filter($this->env, ($context["editUrl"] ?? null), "html", null, true);
        echo "\"><i class=\"fa-solid fa-newspaper fa-xl\"></i>&nbsp;&nbsp;&nbsp;Посмотреть на статтью</button>
</form> 
";
    }

    public function getTemplateName()
    {
        return "admin/delete.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 13,  66 => 11,  60 => 10,  56 => 9,  51 => 7,  48 => 6,  42 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/delete.html", "/var/www/html/tipsday/templates/admin/delete.html");
    }
}
