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

/* default/index.html */
class __TwigTemplate_1583304a604b691915eff571df87bb81 extends Template
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
        $this->parent = $this->loadTemplate("base.html", "default/index.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_description($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["mainPage"] ?? null), "description", [], "any", false, false, false, 3), "html", null, true);
        echo "
";
    }

    // line 6
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["mainPage"] ?? null), "title", [], "any", false, false, false, 7), "html", null, true);
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
        // line 16
        echo "   <div class=\"conteiner\">
      
      <div class=\"trending-day\">
            
            <div class=\"main-banner\">
                ";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["TrandingDay"] ?? null));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 22
            echo "                <a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, false, 22), "html", null, true);
            echo "\" 
                class=\"";
            // line 23
            if ((twig_get_attribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 23) == 0)) {
                echo "active";
            }
            echo "\"
                style=\"background-image:linear-gradient(120deg, rgba(241, 250, 255, 0.1), rgb(255, 255, 255)), url('/img/blog/";
            // line 24
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "avatar", [], "any", false, false, false, 24), "html", null, true);
            echo "')\">
                    <h2>";
            // line 25
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, false, 25), "html", null, true);
            echo "</h2>
                    <p>";
            // line 26
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "description", [], "any", false, false, false, 26), "html", null, true);
            echo "</p>
                </a>
                ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "            </div>
            <div class=\"preview\">
                ";
        // line 31
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["TrandingDay"] ?? null));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["preview"]) {
            // line 32
            echo "                <img src=\"/img/blog/small/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["preview"], "avatar", [], "any", false, false, false, 32), "html", null, true);
            echo "\" class=\"";
            if ((twig_get_attribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 32) == 0)) {
                echo "active-preview";
            }
            echo "\" width=\"75\" alt=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["preview"], "avatar", [], "any", false, false, false, 32), "html", null, true);
            echo "\" >
                ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['preview'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "            </div>
      </div>

<hr>
      <div class=\"block-articles\"> 
        <div class=\"main-block\">
            ";
        // line 40
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["articles"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 41
            echo "            <div>
                <h3>";
            // line 42
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, false, 42), "html", null, true);
            echo "</h3>
                <img src=\"/img/blog/small/";
            // line 43
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "avatar", [], "any", false, false, false, 43), "html", null, true);
            echo "\" width=\"250\">
                <p>";
            // line 44
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "description", [], "any", false, false, false, 44), "html", null, true);
            echo "</p>
                <a href=\"";
            // line 45
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, false, 45), "html", null, true);
            echo "\">Read More ...</a>
                <span></span>
                <div class=\"category\">
                    <a href=\"";
            // line 48
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "category_url", [], "any", false, false, false, 48), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "category_title", [], "any", false, false, false, 48), "html", null, true);
            echo "</a>
                    <div>
                        <b>&nbsp;&#9787;&nbsp;";
            // line 50
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "views", [], "any", false, false, false, 50), "html", null, true);
            echo "</b>
                        <b>&nbsp;&#10084;&nbsp;";
            // line 51
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "liked", [], "any", false, false, false, 51), "html", null, true);
            echo "</b>
                    </div>

                </div>
            </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 57
        echo "        </div>
        <div class=\"aside\">
       
       </div>
      </div>
   </div>
";
    }

    public function getTemplateName()
    {
        return "default/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  245 => 57,  233 => 51,  229 => 50,  222 => 48,  216 => 45,  212 => 44,  208 => 43,  204 => 42,  201 => 41,  197 => 40,  189 => 34,  166 => 32,  149 => 31,  145 => 29,  128 => 26,  124 => 25,  120 => 24,  114 => 23,  109 => 22,  92 => 21,  85 => 16,  81 => 15,  75 => 12,  69 => 11,  63 => 7,  59 => 6,  53 => 3,  49 => 2,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/index.html", "/var/www/html/tipsday/templates/default/index.html");
    }
}
