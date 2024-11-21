<?php

/* login.twig */
class __TwigTemplate_b9200a941894a42d40131bd648aa3f7ac971c7c1e5afd35357512c8bd8b04fe6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <title>";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "getThemeConfig", array(0 => "theme_title"), "method"), "html", null, true);
        echo "</title>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <meta name=\"token\" content=\"";
        // line 8
        echo twig_escape_filter($this->env, ($context["csrfToken"] ?? null), "html", null, true);
        echo "\"/>
    <link rel=\"shortcut icon\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "img/favicon.ico"), "method"), "html", null, true);
        echo "\" />

    <link href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/bootstrap/css/bootstrap.min.css"), "method"), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\">
    <link href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/bootstrap/css/bootstrap-theme.min.css"), "method"), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\">

    <style type=\"text/css\">
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            max-width: 300px;
            padding: 19px 29px 29px;
            margin: 0 auto 20px;
            background-color: #fff;
            border: 1px solid #e5e5e5;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
            -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
            box-shadow: 0 1px 2px rgba(0,0,0,.05);
        }
        .form-signin .form-signin-heading,
        .form-signin .checkbox {
            margin-bottom: 10px;
        }
        .form-signin input[type=\"text\"],
        .form-signin input[type=\"password\"] {
            font-size: 16px;
            height: auto;
            margin-bottom: 15px;
            padding: 7px 9px;
        }
        .login-logo {
            width: 200px;
        }

    </style>
</head>
<body>
    <div class=\"container\">
        <form id=\"login-form\" class=\"form-signin text-center\" action=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("login"), "html", null, true);
        echo "\" method=\"post\" autocomplete=\"off\">
            <input name=\"priorRoute\" type=\"hidden\" value=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->getAttribute(($context["flash"] ?? null), "priorRoute", array()), "html", null, true);
        echo "\" autocomplete=\"off\" />
            <input type=\"hidden\" name=\"";
        // line 55
        echo twig_escape_filter($this->env, ($context["csrfKey"] ?? null), "html", null, true);
        echo "\" value=\"";
        echo twig_escape_filter($this->env, ($context["csrfToken"] ?? null), "html", null, true);
        echo "\" autocomplete=\"off\" />
            <p style=\"margin-bottom:20px;\"><a href=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "getThemeConfig", array(0 => "theme_url"), "method"), "html", null, true);
        echo "\"><img class=\"login-logo\" src=\"";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "img/logo.png"), "method"), "html", null, true);
        echo "\"></a></p>

            <p>";
        // line 58
        echo __("Please provide your credentials");
        echo "</p>

            <input id=\"username\" class=\"form-control input-block-level\" name=\"username\" type=\"text\" placeholder=\"";
        // line 60
        echo __("User");
        echo "\" autofocus>
            <input id=\"password\" class=\"form-control input-block-level\" name=\"password\" type=\"password\" placeholder=\"";
        // line 61
        echo __("Password");
        echo "\" value=\"\" autocomplete=\"false\">

            ";
        // line 63
        if ($this->getAttribute(($context["flash"] ?? null), "login_message", array())) {
            // line 64
            echo "            <div class=\"alert alert-danger\">";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["flash"] ?? null), "login_message", array()), "html", null, true);
            echo "</div>
            ";
        }
        // line 66
        echo "
            <button class=\"btn btn-large btn-primary\" type=\"submit\">";
        // line 67
        echo __("Login");
        echo "</button>
\t    <p style=\"margin-top:15px; display:none;\"><a href=\"#\" id=\"reminder-form-toggle\">";
        // line 68
        echo __("Forgot your password?");
        echo "</a></p>
        </form>


\t<form id=\"reminder-form\" class=\"form-signin text-center hidden\" action=\"";
        // line 72
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("login.forgotten"), "html", null, true);
        echo "\" method=\"post\" autocomplete=\"off\">
\t  <p style=\"margin-bottom:20px;\"><a href=\"";
        // line 73
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "getThemeConfig", array(0 => "theme_url"), "method"), "html", null, true);
        echo "\"><img class=\"login-logo\" src=\"";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "img/logo.png"), "method"), "html", null, true);
        echo "\"></a></p>

\t  <input type=\"hidden\" name=\"";
        // line 75
        echo twig_escape_filter($this->env, ($context["csrfKey"] ?? null), "html", null, true);
        echo "\" value=\"";
        echo twig_escape_filter($this->env, ($context["csrfToken"] ?? null), "html", null, true);
        echo "\" />

\t  <p>";
        // line 77
        echo __("Please provide your user name");
        echo "</p>
\t  <input id=\"username\" class=\"form-control input-block-level\" name=\"username\" type=\"text\" placeholder=\"";
        // line 78
        echo __("User");
        echo "\">

\t  ";
        // line 80
        if ($this->getAttribute(($context["flash"] ?? null), "login_message", array())) {
            // line 81
            echo "\t\t<div class=\"alert alert-danger\">";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["flash"] ?? null), "login_message", array()), "html", null, true);
            echo "</div>
    \t  ";
        }
        // line 83
        echo "
\t  <p><button class=\"btn btn-large btn-primary\" type=\"submit\">";
        // line 84
        echo __("Send Reset");
        echo "</button></p>

\t  <p><a href=\"#\" id=\"login-form-toggle\">";
        // line 86
        echo __("Login instead?");
        echo "</a></p>
\t</form>


    </div> <!-- /container -->
    <script src=\"";
        // line 91
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/jquery/jquery-1.11.1.min.js"), "method"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 92
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/bootstrap/js/bootstrap.min.js"), "method"), "html", null, true);
        echo "\"></script>

    <script type=\"text/javascript\">
\t\$(function() {
    \t  \$(\"#reminder-form-toggle\").on(\"click\", function (e) {
            e.preventDefault();

            \$(\"#login-form\").addClass(\"hidden\");
            \$(\"#reminder-form\").removeClass(\"hidden\");
          });

          \$(\"#login-form-toggle\").on(\"click\", function (e) {
            e.preventDefault();

            \$(\"#login-form\").removeClass(\"hidden\");
            \$(\"#reminder-form\").addClass(\"hidden\");
          });
        });
    </script>

</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "login.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  200 => 92,  196 => 91,  188 => 86,  183 => 84,  180 => 83,  174 => 81,  172 => 80,  167 => 78,  163 => 77,  156 => 75,  149 => 73,  145 => 72,  138 => 68,  134 => 67,  131 => 66,  125 => 64,  123 => 63,  118 => 61,  114 => 60,  109 => 58,  102 => 56,  96 => 55,  92 => 54,  88 => 53,  44 => 12,  40 => 11,  35 => 9,  31 => 8,  24 => 4,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <title>{{ theme.getThemeConfig(\"theme_title\") }}</title>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <meta name=\"token\" content=\"{{ csrfToken }}\"/>
    <link rel=\"shortcut icon\" href=\"{{ theme.uri(\"img/favicon.ico\") }}\" />

    <link href=\"{{ theme.uri(\"libraries/bootstrap/css/bootstrap.min.css\") }}\" rel=\"stylesheet\" media=\"screen\">
    <link href=\"{{ theme.uri(\"libraries/bootstrap/css/bootstrap-theme.min.css\") }}\" rel=\"stylesheet\" media=\"screen\">

    <style type=\"text/css\">
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            max-width: 300px;
            padding: 19px 29px 29px;
            margin: 0 auto 20px;
            background-color: #fff;
            border: 1px solid #e5e5e5;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
            -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
            box-shadow: 0 1px 2px rgba(0,0,0,.05);
        }
        .form-signin .form-signin-heading,
        .form-signin .checkbox {
            margin-bottom: 10px;
        }
        .form-signin input[type=\"text\"],
        .form-signin input[type=\"password\"] {
            font-size: 16px;
            height: auto;
            margin-bottom: 15px;
            padding: 7px 9px;
        }
        .login-logo {
            width: 200px;
        }

    </style>
</head>
<body>
    <div class=\"container\">
        <form id=\"login-form\" class=\"form-signin text-center\" action=\"{{ urlFor(\"login\") }}\" method=\"post\" autocomplete=\"off\">
            <input name=\"priorRoute\" type=\"hidden\" value=\"{{ flash.priorRoute }}\" autocomplete=\"off\" />
            <input type=\"hidden\" name=\"{{ csrfKey }}\" value=\"{{ csrfToken }}\" autocomplete=\"off\" />
            <p style=\"margin-bottom:20px;\"><a href=\"{{ theme.getThemeConfig(\"theme_url\") }}\"><img class=\"login-logo\" src=\"{{ theme.uri(\"img/logo.png\") }}\"></a></p>

            <p>{% trans \"Please provide your credentials\" %}</p>

            <input id=\"username\" class=\"form-control input-block-level\" name=\"username\" type=\"text\" placeholder=\"{% trans \"User\" %}\" autofocus>
            <input id=\"password\" class=\"form-control input-block-level\" name=\"password\" type=\"password\" placeholder=\"{% trans \"Password\" %}\" value=\"\" autocomplete=\"false\">

            {% if flash.login_message %}
            <div class=\"alert alert-danger\">{{ flash.login_message }}</div>
            {% endif %}

            <button class=\"btn btn-large btn-primary\" type=\"submit\">{% trans \"Login\" %}</button>
\t    <p style=\"margin-top:15px; display:none;\"><a href=\"#\" id=\"reminder-form-toggle\">{% trans \"Forgot your password?\" %}</a></p>
        </form>


\t<form id=\"reminder-form\" class=\"form-signin text-center hidden\" action=\"{{ urlFor(\"login.forgotten\") }}\" method=\"post\" autocomplete=\"off\">
\t  <p style=\"margin-bottom:20px;\"><a href=\"{{ theme.getThemeConfig(\"theme_url\") }}\"><img class=\"login-logo\" src=\"{{ theme.uri(\"img/logo.png\") }}\"></a></p>

\t  <input type=\"hidden\" name=\"{{ csrfKey }}\" value=\"{{ csrfToken }}\" />

\t  <p>{% trans \"Please provide your user name\" %}</p>
\t  <input id=\"username\" class=\"form-control input-block-level\" name=\"username\" type=\"text\" placeholder=\"{% trans \"User\" %}\">

\t  {% if flash.login_message %}
\t\t<div class=\"alert alert-danger\">{{ flash.login_message }}</div>
    \t  {% endif %}

\t  <p><button class=\"btn btn-large btn-primary\" type=\"submit\">{% trans \"Send Reset\" %}</button></p>

\t  <p><a href=\"#\" id=\"login-form-toggle\">{% trans \"Login instead?\" %}</a></p>
\t</form>


    </div> <!-- /container -->
    <script src=\"{{ theme.uri(\"libraries/jquery/jquery-1.11.1.min.js\") }}\"></script>
    <script src=\"{{ theme.uri(\"libraries/bootstrap/js/bootstrap.min.js\") }}\"></script>

    <script type=\"text/javascript\">
\t\$(function() {
    \t  \$(\"#reminder-form-toggle\").on(\"click\", function (e) {
            e.preventDefault();

            \$(\"#login-form\").addClass(\"hidden\");
            \$(\"#reminder-form\").removeClass(\"hidden\");
          });

          \$(\"#login-form-toggle\").on(\"click\", function (e) {
            e.preventDefault();

            \$(\"#login-form\").removeClass(\"hidden\");
            \$(\"#reminder-form\").addClass(\"hidden\");
          });
        });
    </script>

</body>
</html>
", "login.twig", "/opt/lampp/htdocs/UBI/views/login.twig");
    }
}
