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

/* default/article.html */
class __TwigTemplate_c0d581abdeee15a1822da84e37681444 extends Template
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
            'bg' => [$this, 'block_bg'],
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
        $this->parent = $this->loadTemplate("base.html", "default/article.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_description($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Article"] ?? null), "description", [], "any", false, false, false, 3), "html", null, true);
        echo "
";
    }

    // line 6
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Article"] ?? null), "title", [], "any", false, false, false, 7), "html", null, true);
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
    public function block_bg($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 15
        echo "white
";
    }

    // line 17
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 18
        echo "      <div class=\"article_block\">
        <h1>";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Article"] ?? null), "title", [], "any", false, false, false, 19), "html", null, true);
        echo "</h1>

        ";
        // line 21
        echo twig_get_attribute($this->env, $this->source, ($context["Article"] ?? null), "content", [], "any", false, false, false, 21);
        echo "      

   </div>
";
    }

    public function getTemplateName()
    {
        return "default/article.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 21,  98 => 19,  95 => 18,  91 => 17,  86 => 15,  82 => 14,  76 => 11,  70 => 10,  64 => 7,  60 => 6,  54 => 3,  50 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/article.html", "/var/www/html/tipsday/templates/default/article.html");
    }
}
