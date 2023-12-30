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

/* service/registry.html */
class __TwigTemplate_3cfdd72a0b0e2804c0aff6fc11dbaec6 extends Template
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
    <meta name=\"description\" content=\"Registry User on the cararac.com\">
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
        input{width:90%; box-sizing: border-box; margin:10px;padding:10px;border:none;outline:none;}
        input[type='submit']{width:60%;}
        ul,ol{width:60%;font-size:.8rem;box-sizing: border-box;}
        ol{list-style: none;}
        a{margin:20px;}
        .flex{display: flex;width:60%;}
        @media screen and (max-width:1024px){form{width:100%;}.flex{width:80%;}input[type='submit']{width:80%;}ul,ol{width:80%;}content{height:auto;}
        @media screen and (max-width:860px){.flex{width:95%;flex-direction:column;}input{width:auto;}ul,ol{width:90%;}}
    </style>
</head>
<body>
    <header><h1>Registration</h1></header>
    <content>
        ";
        // line 28
        if (($context["Error"] ?? null)) {
            // line 29
            echo "            <span style=\"color:red\">";
            echo twig_escape_filter($this->env, ($context["Error"] ?? null), "html", null, true);
            echo "</span>
        ";
        }
        // line 31
        echo "        <form action=\"/registry\" method=\"post\">
            <input type=\"hidden\" name=\"csrf\" value=\"";
        // line 32
        echo twig_escape_filter($this->env, ($context["_token"] ?? null), "html", null, true);
        echo "\">
            <div class=\"flex\">
                <input type=\"text\" name=\"fname\" id=\"fname\" placeholder=\"Your First Name\" >
                <input type=\"text\" name=\"lname\" id=\"lname\" placeholder=\"Your Last Name\" >
            </div>
            <div class=\"flex\">
                <input type=\"email\" name=\"mail\" id=\"mail\" placeholder=\"Your Email\" >
                <input type=\"text\" name=\"nikname\" id=\"nikname\" placeholder=\"Your NikName\">
            </div>
            <div class=\"flex\">
                <input type=\"password\" name=\"password\" id=\"password\" placeholder=\"Password\">
                <input type=\"password\" name=\"password_repeat\" id=\"password_repeat\" placeholder=\"Repeat Password\">
            </div>
            <ol id=\"password-check\">
                <li>To create a secure password on the site, it is recommended to follow the following criteria:</li>
                <li>
                    <ul>
                        <li><b>Length:</b> The password must be long enough, usually at least 12 characters.</li>
                        <li><b>Case:</b> Use letters in different cases (lowercase and uppercase).</li>
                        <li><b>Numbers:</b> Include at least one number.</li>
                        <li><b>Uniqueness:</b> Each account must have a unique password. Do not use the same password for different accounts.</li>
                        <li><b>Avoid predictable words: </b> Avoid using common words or phrases such as \"password\", \"admin\", \"123456\", etc.</li>
                        <li><b>Avoid Personal Information:</b> Do not use personal information such as names, dates of birth, etc. <br> Example of a secure password: P@ssw0rd!123</li> 
                    </ul>
                </li>
                <li>Please remember that the security of your password is critical to protecting your accounts and personal information. Never use easy-to-guess passwords, and change the passwords on your accounts regularly to increase their security.</li> 
            </ol>
            <!-- <input type=\"checkbox\" name=\"remember\" id=\"remember\"><label for=\"remember\">Remember me</label> -->
            <input type=\"submit\" value=\"submit\">
        </form>
        <a href=\"/login\">Login on the Tips-Day.com</a>
    </content>
    <footer>&copy;Dikamen 2023. All rights reseved.</footer>
</body>
</html> 
";
    }

    public function getTemplateName()
    {
        return "service/registry.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 32,  77 => 31,  71 => 29,  69 => 28,  45 => 7,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "service/registry.html", "/var/www/html/tipsday/templates/service/registry.html");
    }
}
