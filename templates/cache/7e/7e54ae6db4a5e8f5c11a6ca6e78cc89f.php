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

/* default/category.html */
class __TwigTemplate_50d6ad404af6a840ecc7c3ec114f00ec extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'desciption' => [$this, 'block_desciption'],
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
        $this->parent = $this->loadTemplate("base.html", "default/category.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_desciption($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Category"] ?? null), "description", [], "any", false, false, false, 3), "html", null, true);
        echo "
";
    }

    // line 6
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Category"] ?? null), "title", [], "any", false, false, false, 7), "html", null, true);
        echo "
";
    }

    // line 11
    public function block_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo " 
   ";
        // line 12
        $this->displayParentBlock("header", $context, $blocks);
        echo "
";
    }

    // line 15
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo " 
    <div class=\"conteiner\">
      <div class=\"block-articles\"> 
        <div class=\"main-block\">
            ";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["popularCategory"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 20
            echo "            <div>
                <h3>";
            // line 21
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, false, 21), "html", null, true);
            echo "</h3>
                <img src=\"/img/blog/small/";
            // line 22
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "avatar", [], "any", false, false, false, 22), "html", null, true);
            echo "\" width=\"250\">
                <p>";
            // line 23
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "description", [], "any", false, false, false, 23), "html", null, true);
            echo "</p>
                <a href=\"";
            // line 24
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, false, 24), "html", null, true);
            echo "\">Read More ...</a>
                <span></span>
            </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "        </div>
        <div class=\"aside\">
       
       </div>
      </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "default/category.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 28,  109 => 24,  105 => 23,  101 => 22,  97 => 21,  94 => 20,  90 => 19,  81 => 15,  75 => 12,  69 => 11,  63 => 7,  59 => 6,  53 => 3,  49 => 2,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/category.html", "/var/www/html/tipsday/templates/default/category.html");
    }
}
