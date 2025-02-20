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

/* admin/admin_menu.html */
class __TwigTemplate_4a86135ed98ca778da2257041e158b65 extends Template
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
        echo "<nav>
    <ul>
        <li>
            <a href=\"/admin/settings\"><i class=\"fa-solid fa-gear\"></i></a>
            <a href=\"/admin/settings\">Settings</a>
        </li>
        <li>
            <a href=\"/admin/users\"><i class=\"fa-solid fa-users\"></i></a>
            <a href=\"/admin/users\">Users</a>
        </li>
        <li>
            <a href=\"/admin/pages\"><i class=\"fa-solid fa-images\"></i></a>
            <a href=\"/admin/pages\">Pages</a>
        </li>
        <li>
            <a href=\"/admin/categories\"><i class=\"fa-solid fa-list-ul\"></i></a>
            <a href=\"/admin/categories\">Categories</a>
        </li>
        <li>
            <a href=\"/admin/authors\"><i class=\"fa-solid fa-users-viewfinder\"></i></a>
            <a href=\"/admin/authors\">Authors</a>
        </li>
        <li>
            <a href=\"/admin/articles\"><i class=\"fa-solid fa-newspaper\"></i></a>
            <a href=\"/admin/articles\">Articles</a>
        </li>
        <li>
            <a href=\"/admin/comments\"><i class=\"fa-solid fa-comments\"></i></a>
            <a href=\"/admin/comments\">Comments</a>
        </li>
</nav> 
";
    }

    public function getTemplateName()
    {
        return "admin/admin_menu.html";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/admin_menu.html", "/var/www/html/tipsday/templates/admin/admin_menu.html");
    }
}
