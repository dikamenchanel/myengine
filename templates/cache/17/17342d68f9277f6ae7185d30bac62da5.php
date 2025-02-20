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

/* admin/index.html */
class __TwigTemplate_8f35826962cf19eaf093a2e3acc06c58 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "admin/admin.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("admin/admin.html", "admin/index.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 6
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo " 
";
        // line 7
        $this->displayParentBlock("content", $context, $blocks);
        echo "
<div class=\"conteiner\">

";
        // line 10
        if (($context["addUrl"] ?? null)) {
            // line 11
            echo "    <a style=\"margin:30px;position:fixed;z-index:10000;text-decoration:none;background:#fff;\" href=\"";
            echo twig_escape_filter($this->env, ($context["addUrl"] ?? null), "html", null, true);
            echo "\"><i class=\"";
            echo twig_escape_filter($this->env, ($context["addIcon"] ?? null), "html", null, true);
            echo "\"></i>&nbsp;&nbsp;Добавить</a>
";
        }
        // line 13
        if (($context["backUrl"] ?? null)) {
            // line 14
            echo "    <a style=\"margin:30px;position:fixed;z-index:10000;text-decoration:none;background:#fff;\" href=\"";
            echo twig_escape_filter($this->env, ($context["backUrl"] ?? null), "html", null, true);
            echo "\"><i class=\"fa-solid fa-arrow-left fa-2xl\"></i>&nbsp;&nbsp;Назад</a>
";
        }
        // line 16
        echo "
";
        // line 17
        if (($context["Table"] ?? null)) {
            // line 18
            echo "    ";
            $this->loadTemplate("admin/Table.html", "admin/index.html", 18)->display($context);
        }
        // line 20
        echo "
";
        // line 21
        if (($context["Form"] ?? null)) {
            // line 22
            echo "    ";
            $this->loadTemplate("admin/Form.html", "admin/index.html", 22)->display($context);
        }
        // line 24
        echo "
";
        // line 25
        if (($context["deleteData"] ?? null)) {
            // line 26
            echo "    ";
            $this->loadTemplate("admin/delete.html", "admin/index.html", 26)->display($context);
        }
        // line 28
        echo "
";
        // line 29
        if (($context["Pagination"] ?? null)) {
            // line 30
            echo "    ";
            $this->loadTemplate("common/pagination.html", "admin/index.html", 30)->display($context);
        }
        // line 32
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "admin/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 32,  108 => 30,  106 => 29,  103 => 28,  99 => 26,  97 => 25,  94 => 24,  90 => 22,  88 => 21,  85 => 20,  81 => 18,  79 => 17,  76 => 16,  70 => 14,  68 => 13,  60 => 11,  58 => 10,  52 => 7,  46 => 6,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/index.html", "/var/www/html/tipsday/templates/admin/index.html");
    }
}
