<?php

/* index/index.php */
class __TwigTemplate_73b7b53adac5709f5f4f3970455030781f0ca67b0f1695c60e823d614dda0b79 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->loadTemplate("header.php", "index/index.php", 1)->display($context);
        // line 2
        echo "    
    <!-- Основной блок -->
    <div class=\"main\">
    
    <!-- Левый блок -->
    <div class=\"left\">
        
        <!-- Меню -->
        
\t\t";
        // line 11
        $this->loadTemplate("menu.php", "index/index.php", 11)->display($context);
        // line 12
        echo "        
        
        <div class=\"open\">
        \t
            <p>now<br>is<br>open!</p>
        </div>
        
    </div>
        
    <!-- Правый блок -->
    <div class=\"right\">
    \t";
        // line 23
        $this->loadTemplate("bread_crumbs.php", "index/index.php", 23)->display($context);
        // line 24
        echo "
\t\t";
        // line 25
        $this->loadTemplate("new-product.php", "index/index.php", 25)->display($context);
        // line 26
        echo "        
\t\t";
        // line 27
        $this->loadTemplate("top-product.php", "index/index.php", 27)->display($context);
        // line 28
        echo "        
\t\t";
        // line 29
        $this->loadTemplate("sale-product.php", "index/index.php", 29)->display($context);
        // line 30
        echo "        
    </div>
        
    <!-- Нижняя часть главного блока -->
\t";
        // line 34
        $this->loadTemplate("brand.php", "index/index.php", 34)->display($context);
        // line 35
        echo "        
\t";
        // line 36
        $this->loadTemplate("instagram.php", "index/index.php", 36)->display($context);
        // line 37
        echo "    
     ";
        // line 38
        $this->loadTemplate("network.php", "index/index.php", 38)->display($context);
        // line 39
        echo "    
    </div>
    
\t\t";
        // line 42
        $this->loadTemplate("footer.php", "index/index.php", 42)->display($context);
        // line 43
        echo "</body>
    
</html>";
    }

    public function getTemplateName()
    {
        return "index/index.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 43,  91 => 42,  86 => 39,  84 => 38,  81 => 37,  79 => 36,  76 => 35,  74 => 34,  68 => 30,  66 => 29,  63 => 28,  61 => 27,  58 => 26,  56 => 25,  53 => 24,  51 => 23,  38 => 12,  36 => 11,  25 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "index/index.php", "C:\\Anor\\OSPanel\\domains\\geekPHP\\app\\view\\templates\\index\\index.php");
    }
}
