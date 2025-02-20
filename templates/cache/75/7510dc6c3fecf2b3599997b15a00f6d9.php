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

/* base.html */
class __TwigTemplate_2966080026e6ef442ffbd08d218f9665 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'description' => [$this, 'block_description'],
            'title' => [$this, 'block_title'],
            'header' => [$this, 'block_header'],
            'bg' => [$this, 'block_bg'],
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
    <meta name=\"description\" content=\"";
        // line 6
        $this->displayBlock('description', $context, $blocks);
        echo "\">
    <title>";
        // line 7
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    <link rel=\"icon\" href=\"/img/favicon.webp\">
    <link defer rel=\"stylesheet\" href=\"/css/style.css\">
</head>
<body>
    <header>
    ";
        // line 13
        $this->displayBlock('header', $context, $blocks);
        // line 17
        echo "    </header>
    <main class=\"";
        // line 18
        $this->displayBlock('bg', $context, $blocks);
        echo "\">
        ";
        // line 19
        $this->displayBlock('content', $context, $blocks);
        // line 20
        echo "    </main>
    <footer>
    ";
        // line 22
        $this->displayBlock('footer', $context, $blocks);
        // line 25
        echo "    </footer>

<script src=\"/js/main.js\" ></script>

</body>
</html> 
";
    }

    // line 6
    public function block_description($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 7
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 13
    public function block_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 14
        echo "        <div class=\"logo\"><img src=\"/img/logo_new.webp\"  ></div>
        ";
        // line 15
        $this->loadTemplate("common/nav.html", "base.html", 15)->display($context);
        // line 16
        echo "    ";
    }

    // line 18
    public function block_bg($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "color-bg";
    }

    // line 19
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 22
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 23
        echo "         ";
        $this->loadTemplate("common/footer.html", "base.html", 23)->display($context);
        // line 24
        echo "    ";
    }

    public function getTemplateName()
    {
        return "base.html";
    }

    public function getDebugInfo()
    {
        return array (  135 => 24,  132 => 23,  128 => 22,  122 => 19,  115 => 18,  111 => 16,  109 => 15,  106 => 14,  102 => 13,  96 => 7,  90 => 6,  80 => 25,  78 => 22,  74 => 20,  72 => 19,  68 => 18,  65 => 17,  63 => 13,  54 => 7,  50 => 6,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "base.html", "/var/www/html/tipsday/templates/base.html");
    }
}
