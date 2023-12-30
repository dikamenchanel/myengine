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

/* common/footer.html */
class __TwigTemplate_68793fea44ada603d62d8988ba657f7d extends Template
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
        echo "<div class=\"conteiner\">
<ul>
    <li class=\"footer-item\"><a href=\"/term-use\" >Terms of use</a><span></span></li>
    <li class=\"footer-item\"><a href=\"/private-policy\" >Private Policy</a><span></span></li>
    <li class=\"footer-item\"><a href=\"/cookie-policy\" >Cookie Policy</a><span></span></li>
    <li class=\"footer-item\"><a href=\"/contactus\" >Contact Us</a><span></span></li>
</ul>
<p>&copy; Dikamen 2023. All rights reserved</p>
</div>
";
    }

    public function getTemplateName()
    {
        return "common/footer.html";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "common/footer.html", "/var/www/html/tipsday/templates/common/footer.html");
    }
}
