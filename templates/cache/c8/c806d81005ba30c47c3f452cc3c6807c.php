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

/* service/error.html */
class __TwigTemplate_def906a8994d23362e96b017099dcc66 extends Template
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
    <title style=\"color:red;\">Error: Not Found</title>
    <link rel=\"icon\" href=\"/img/favicon.ico\">
    <style>
        body{margin:0;padding:0;font-family: sans-serif;}
        header,footer{height: 7.5vh;background: #5a5858;color: white;display:flex;justify-content:center;align-items:center;}
        .container{height:85vh;background: #f5eeeeef;display:flex;justify-content:center;align-items:center;flex-direction:column;} 
    </style>
</head>
<body>
    <header><h1>404</h1></header>
    <div class=\"container\">
        <center><h1 style=\"color:grey;font-size: 4rem;\">Page not Found </h1></center>
        <center>
            <p style=\"font-size:1.5rem;width:400px\">
                It seems like something went wrong! The page you are requesting does not exist, it may have been deleted, or you entered the wrong address.
            </p>
        </center>
        <center>
            <a href=\"/\">Go to Main page</a>
        </center>
    </div>
    <footer>&copy;Dikamen 2023. All rights reseved.</footer>
</body>
</html>  
";
    }

    public function getTemplateName()
    {
        return "service/error.html";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "service/error.html", "/var/www/html/tipsday/templates/service/error.html");
    }
}
