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

/* default/pages.html */
class __TwigTemplate_3a069808b4edf0382a3824612248e959 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'description' => [$this, 'block_description'],
            'title' => [$this, 'block_title'],
            'header' => [$this, 'block_header'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("base.html", "default/pages.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_description($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "description", [], "any", false, false, false, 3), "html", null, true);
        echo "
";
    }

    // line 6
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "title", [], "any", false, false, false, 7), "html", null, true);
        echo "
";
    }

    // line 10
    public function block_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo " 
   ";
        // line 11
        $this->displayParentBlock("header", $context, $blocks);
        echo "
";
    }

    // line 14
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 15
        echo "   <div class=\"conteiner\">

        ";
        // line 17
        echo twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "content", [], "any", false, false, false, 17);
        echo "      

   </div>
";
    }

    public function getTemplateName()
    {
        return "default/pages.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 17,  85 => 15,  81 => 14,  75 => 11,  69 => 10,  63 => 7,  59 => 6,  53 => 3,  49 => 2,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/pages.html", "/var/www/html/tipsday/templates/default/pages.html");
    }
}
