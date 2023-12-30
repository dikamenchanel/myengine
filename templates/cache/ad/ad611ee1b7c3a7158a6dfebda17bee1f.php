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

/* admin/admin.html */
class __TwigTemplate_7629ecc0b1b0eb912aadddd58054212b extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'header' => [$this, 'block_header'],
            'content' => [$this, 'block_content'],
            'footer' => [$this, 'block_footer'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

    <link rel=\"icon\" href=\"/img/favicon.webp\">
    <link rel=\"stylesheet\" href=\"/css/admin.css\">

    <link rel=\"reload\" as=\"style\" type=\"text/css\" href=\"/css/font-awesome-6.4.2.css\" crossorigin >
    <link rel=\"stylesheet\" href=\"/css/font-awesome-6.4.2.css\" >
    <script src=\"/js/tinymce/tinymce.min.js\"></script>
    
</head>
<body>
    ";
        // line 17
        $this->displayBlock('header', $context, $blocks);
        // line 27
        echo "
    <content>
    ";
        // line 29
        $this->displayBlock('content', $context, $blocks);
        // line 32
        echo "    </content>

    ";
        // line 34
        $this->displayBlock('footer', $context, $blocks);
        // line 37
        echo "    <script  src=\"/js/tmce.js\"></script>
    <script  src=\"/js/admin.js\"></script>
</body>
</html> 
";
    }

    // line 6
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
    }

    // line 17
    public function block_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo " 
    <header>
        <center><h1>";
        // line 19
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo "</h1></center>
        <form action=\"/logout\" method=\"post\"> 
            <i class=\"fa-solid fa-user-tie fa-lg\">&nbsp;&nbsp;&nbsp;";
        // line 21
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "user_name", [], "any", false, false, false, 21), "html", null, true);
        echo "&nbsp;&nbsp;&nbsp;</i>
            <input type=\"hidden\" name=\"csrf\" value=\"";
        // line 22
        echo twig_escape_filter($this->env, ($context["_token"] ?? null), "html", null, true);
        echo "\">
            <button type=\"submit\" ><i class=\"fa-solid fa-right-from-bracket\"></i></button>
        </form>
    </header>
    ";
    }

    // line 29
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo " 
    ";
        // line 30
        $this->loadTemplate("admin/admin_menu.html", "admin/admin.html", 30)->display($context);
        echo " 
    ";
    }

    // line 34
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo " 
    <footer>&copy;Dikamen 2023. All rights reseved.</footer>
    ";
    }

    public function getTemplateName()
    {
        return "admin/admin.html";
    }

    public function getDebugInfo()
    {
        return array (  128 => 34,  122 => 30,  116 => 29,  107 => 22,  103 => 21,  98 => 19,  91 => 17,  84 => 6,  76 => 37,  74 => 34,  70 => 32,  68 => 29,  64 => 27,  62 => 17,  48 => 6,  41 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/admin.html", "/var/www/html/tipsday/templates/admin/admin.html");
    }
}
