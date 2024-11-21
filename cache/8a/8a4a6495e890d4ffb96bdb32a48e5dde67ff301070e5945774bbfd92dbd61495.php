<?php

/* error.twig */
class __TwigTemplate_019050c878921eb1b3b565451a67bdf423b4e6a60fd02f2e3897d44cd4eb4656 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 8
        $this->parent = $this->loadTemplate("non-authed.twig", "error.twig", 8);
        $this->blocks = array(
            'pageContent' => array($this, 'block_pageContent'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "non-authed.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 10
    public function block_pageContent($context, array $blocks = array())
    {
        // line 11
        echo "    <div class=\"widget\">
        <div class=\"widget-title\">";
        // line 12
        echo __("Error");
        echo "</div>
        <div class=\"widget-body\">
            <div class=\"row\">
                <div class=\"col-md-12\">
                    ";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute(($context["flash"] ?? null), "globalError", array()), "html", null, true);
        echo "
                    ";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute(($context["flash"] ?? null), "message", array()), "html", null, true);
        echo "
                </div>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "error.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 17,  41 => 16,  34 => 12,  31 => 11,  28 => 10,  11 => 8,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{#
/*
 * Spring Signage Ltd - http://www.springsignage.com
 * Copyright (C) 2015 Spring Signage Ltd
 * (\${FILE_NAME})
 */
#}
{% extends \"non-authed.twig\" %}

{% block pageContent %}
    <div class=\"widget\">
        <div class=\"widget-title\">{% trans \"Error\" %}</div>
        <div class=\"widget-body\">
            <div class=\"row\">
                <div class=\"col-md-12\">
                    {{ flash.globalError }}
                    {{ flash.message }}
                </div>
            </div>
        </div>
    </div>
{% endblock %}", "error.twig", "/opt/lampp/htdocs/UBI/views/error.twig");
    }
}
