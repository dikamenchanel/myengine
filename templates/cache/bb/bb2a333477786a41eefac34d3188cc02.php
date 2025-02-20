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

/* service/login.html */
class __TwigTemplate_d304ae309eb918541c73fc7a9fecbf8e extends Template
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
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta name=\"description\" content=\"Authentication User on the cararac.com\">
    <title>";
        // line 7
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo "</title>
    <link rel=\"icon\" href=\"/img/favicon.ico\">
    <style>
        body{margin:0;padding:0;font-family: sans-serif;}
        header,footer{height: 7.5vh;background: #5a5858;color: white;display:flex;justify-content:center;align-items:center;}
        h1{color: white;}
        content{height:85vh;display:flex;justify-content:center;align-items:center;background: #f5eeeeef;flex-direction:column;}
        form{width:80%;display: flex;flex-direction:column;justify-content:center;align-items:center;}
        input{width:40%;box-sizing: border-box; margin:10px 0;padding:10px;border:none;outline:none;}
        a{margin:20px;}
        @media screen and (max-width:1024px){form{width:100%;}input{width:80%;}content{height:auto;}
        @media screen and (max-width:860px){input{width:auto;}}
    </style>
</head>
<body>
    <header><h1>Authentication</h1></header>
    <content>
        ";
        // line 24
        if (($context["Error"] ?? null)) {
            // line 25
            echo "            <span style=\"color:red\">";
            echo twig_escape_filter($this->env, ($context["Error"] ?? null), "html", null, true);
            echo "</span>
        ";
        }
        // line 27
        echo "        <form action=\"/login\" method=\"post\">
            <input type=\"hidden\" name=\"csrf\" value=\"";
        // line 28
        echo twig_escape_filter($this->env, ($context["_token"] ?? null), "html", null, true);
        echo "\">
            <input type=\"email\" name=\"mail\" id=\"mail\" placeholder=\"Your Email\" >
            <input type=\"password\" name=\"password\" id=\"password\" placeholder=\"Password\">
            <!-- <input type=\"checkbox\" name=\"remember\" id=\"remember\"><label for=\"remember\">Remember me</label> -->
            <input type=\"submit\" value=\"submit\">
        </form>
        <div>
            <a href=\"/registry\">Registry on the Tips-Day.com</a>
            <a href=\"/reset-password\">Foget Password</a>
        </div>

    </content>
    <footer>&copy;Dikamen 2023. All rights reseved.</footer>
</body>
</html> 
";
    }

    public function getTemplateName()
    {
        return "service/login.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 28,  73 => 27,  67 => 25,  65 => 24,  45 => 7,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "service/login.html", "/var/www/html/tipsday/templates/service/login.html");
    }
}
