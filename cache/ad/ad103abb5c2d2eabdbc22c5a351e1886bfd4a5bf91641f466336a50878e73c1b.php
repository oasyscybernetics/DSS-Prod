<?php

/* authed-sidebar.twig */
class __TwigTemplate_1d27bf9da56fd65b6794de4bf5f0405cde7d27055ebda2bbc09d428898e1fa39 extends Twig_Template
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
        echo "<div id=\"sidebar-wrapper\">
    <ul class=\"sidebar\">
        <li class=\"sidebar-main\"><a href=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("home"), "html", null, true);
        echo "\"><img class=\"logo\" src=\"";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "img/logo.png"), "method"), "html", null, true);
        echo "\" width=\"130\"></a></li>

\t\t\t\t<li class=\"sidebar-list\"><a href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("home"), "html", null, true);
        echo "\"><i class=\"fa fa-dashboard\"></i> ";
        echo __("Dashboard");
        echo "</a></li>

        ";
        // line 7
        if ($this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/schedule"), "method")) {
            // line 8
            echo "\t\t\t\t\t\t<li class=\"sidebar-title\"><a>";
            echo __("Calendar");
            echo "</a></li>
            <li class=\"sidebar-list\"><a href=\"";
            // line 9
            echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("schedule.view"), "html", null, true);
            echo "\"><i class=\"fa fa-calendar\"></i> ";
            echo __("Schedule");
            echo "</a></li>
        ";
        }
        // line 11
        echo "
        ";
        // line 12
        if ($this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/daypart"), "method")) {
            // line 13
            echo "           <!-- <li class=\"sidebar-list\"><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("daypart.view"), "html", null, true);
            echo "\"><i class=\"fa fa-calendar-check-o\"></i> ";
            echo __("Dayparting");
            echo "</a></li> -->
        ";
        }
        // line 15
        echo "
        ";
        // line 16
        if (((($this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/campaign"), "method") || $this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/layout"), "method")) || $this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/template"), "method")) || $this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/resolution"), "method"))) {
            // line 17
            echo "            <li class=\"sidebar-title\"><a>";
            echo __("Design");
            echo "</a></li>
            ";
            // line 18
            if ($this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/campaign"), "method")) {
                // line 19
                echo "                <li class=\"sidebar-list\"><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("campaign.view"), "html", null, true);
                echo "\"><i class=\"fa fa-archive\"></i> ";
                echo __("Campaigns");
                echo "</a></li>
            ";
            }
            // line 21
            echo "
            ";
            // line 22
            if ($this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/layout"), "method")) {
                // line 23
                echo "                <li class=\"sidebar-list\"><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("layout.view"), "html", null, true);
                echo "\"><i class=\"fa fa-newspaper-o\"></i> ";
                echo __("Layouts");
                echo "</a></li>
            ";
            }
            // line 25
            echo "
            ";
            // line 26
            if ($this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/template"), "method")) {
                // line 27
                echo "               <!-- <li class=\"sidebar-list\"><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("template.view"), "html", null, true);
                echo "\"><i class=\"fa fa-clone\"></i> ";
                echo __("Templates");
                echo "</a></li> -->
            ";
            }
            // line 29
            echo "
            ";
            // line 30
            if ($this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/resolution"), "method")) {
                // line 31
                echo "               <!-- <li class=\"sidebar-list\"><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("resolution.view"), "html", null, true);
                echo "\"><i class=\"fa fa-desktop\"></i> ";
                echo __("Resolutions");
                echo "</a></li> -->
            ";
            }
            // line 33
            echo "        ";
        }
        // line 34
        echo "
        ";
        // line 35
        if (($this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/library"), "method") || $this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/dataset"), "method"))) {
            // line 36
            echo "            <li class=\"sidebar-title\"><a>";
            echo __("Library");
            echo "</a></li>
            ";
            // line 37
            if ($this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/library"), "method")) {
                // line 38
                echo "                <li class=\"sidebar-list\"><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("library.view"), "html", null, true);
                echo "\"><i class=\"fa fa-picture-o\"></i> ";
                echo __("Media");
                echo "</a></li>
            ";
            }
            // line 40
            echo "
            ";
            // line 41
            if ($this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/dataset"), "method")) {
                // line 42
                echo "               <!-- <li class=\"sidebar-list\"><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("dataset.view"), "html", null, true);
                echo "\"><i class=\"fa fa-folder-open-o\"></i> ";
                echo __("DataSets");
                echo "</a></li> -->
            ";
            }
            // line 44
            echo "        ";
        }
        // line 45
        echo "
        ";
        // line 46
        if (((($this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/display"), "method") || $this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/displaygroup"), "method")) || $this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/stats"), "method")) || $this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/displayprofile"), "method"))) {
            // line 47
            echo "            <li class=\"sidebar-title\"><a>";
            echo __("Displays");
            echo "</a></li>
            ";
            // line 48
            if ($this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/display"), "method")) {
                // line 49
                echo "                <li class=\"sidebar-list\"><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("display.view"), "html", null, true);
                echo "\"><i class=\"fa fa-tv\"></i> ";
                echo __("Displays");
                echo "</a></li>
            ";
            }
            // line 51
            echo "
            ";
            // line 52
            if ($this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/displaygroup"), "method")) {
                // line 53
                echo "                <li class=\"sidebar-list\"><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("displaygroup.view"), "html", null, true);
                echo "\"><i class=\"fa fa-laptop\"></i> ";
                echo __("Display Groups");
                echo "</a></li>
            ";
            }
            // line 55
            echo "
            ";
            // line 56
            if ($this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/displayprofile"), "method")) {
                // line 57
                echo "                <!-- <li class=\"sidebar-list\"><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("displayprofile.view"), "html", null, true);
                echo "\"><i class=\"fa fa-sticky-note-o\"></i> ";
                echo __("Display Settings");
                echo "</a></li> -->
            ";
            }
            // line 59
            echo "
            ";
            // line 60
            if ($this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/command"), "method")) {
                // line 61
                echo "               <!-- <li class=\"sidebar-list\"><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("command.view"), "html", null, true);
                echo "\"><i class=\"fa fa-terminal\"></i> ";
                echo __("Commands");
                echo "</a></li> -->
            ";
            }
            // line 63
            echo "        ";
        }
        // line 64
        echo "
        ";
        // line 65
        if (($this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/user"), "method") && ($this->getAttribute(($context["currentUser"] ?? null), "isGroupAdmin", array(), "method") || $this->getAttribute(($context["currentUser"] ?? null), "isSuperAdmin", array(), "method")))) {
            // line 66
            echo "            ";
            $context["userMenuViewable"] = true;
            // line 67
            echo "        ";
        } else {
            // line 68
            echo "            ";
            $context["userMenuViewable"] = false;
            // line 69
            echo "        ";
        }
        // line 70
        echo "
        ";
        // line 71
        if ((((((($context["userMenuViewable"] ?? null) || $this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/usergroup"), "method")) || $this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/admin"), "method")) || $this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/application"), "method")) || $this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/module"), "method")) || $this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/transition"), "method"))) {
            // line 72
            echo "            <li class=\"sidebar-title\"><a>";
            echo __("Administration");
            echo "</a></li>

            ";
            // line 74
            if (($context["userMenuViewable"] ?? null)) {
                // line 75
                echo "                <li class=\"sidebar-list\"><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("user.view"), "html", null, true);
                echo "\"><i class=\"fa fa-user\"></i> ";
                echo __("Users");
                echo "</a></li>
            ";
            }
            // line 77
            echo "
            ";
            // line 78
            if ($this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/group"), "method")) {
                // line 79
                echo "                <li class=\"sidebar-list\"><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("group.view"), "html", null, true);
                echo "\"><i class=\"fa fa-users\"></i> ";
                echo __("User Groups");
                echo "</a></li>
            ";
            }
            // line 81
            echo "
            ";
            // line 82
            if ($this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/admin"), "method")) {
                // line 83
                echo "               <!-- <li class=\"sidebar-list\"><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("admin.view"), "html", null, true);
                echo "\"><i class=\"fa fa-gear\"></i> ";
                echo __("Settings");
                echo "</a></li> -->
            ";
            }
            // line 85
            echo "
            ";
            // line 86
            if ($this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/application"), "method")) {
                // line 87
                echo "               <!-- <li class=\"sidebar-list\"><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("application.view"), "html", null, true);
                echo "\"><i class=\"fa fa-hdd-o\"></i> ";
                echo __("Applications");
                echo "</a></li> -->
            ";
            }
            // line 89
            echo "
            ";
            // line 90
            if ($this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/module"), "method")) {
                // line 91
                echo "               <!-- <li class=\"sidebar-list\"><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("module.view"), "html", null, true);
                echo "\"><i class=\"fa fa-briefcase\"></i> ";
                echo __("Modules");
                echo "</a></li> -->
            ";
            }
            // line 93
            echo "
            ";
            // line 94
            if ($this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/transition"), "method")) {
                // line 95
                echo "               <!-- <li class=\"sidebar-list\"><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("transition.view"), "html", null, true);
                echo "\"><i class=\"fa fa-keyboard-o\"></i> ";
                echo __("Transitions");
                echo "</a></li> -->
            ";
            }
            // line 97
            echo "
            ";
            // line 98
            if ($this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/task"), "method")) {
                // line 99
                echo "                <!-- <li class=\"sidebar-list\"><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("task.view"), "html", null, true);
                echo "\"><i class=\"fa fa-cogs\"></i> ";
                echo __("Tasks");
                echo "</a></li> -->
            ";
            }
            // line 101
            echo "        ";
        }
        // line 102
        echo "

        ";
        // line 104
        if ($this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/stats"), "method")) {
            // line 105
            echo "
            <li class=\"sidebar-title\"><a>";
            // line 106
            echo __("Reporting");
            echo "</a></li>

            ";
            // line 108
            if ($this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/stats"), "method")) {
                // line 109
                echo "                <li class=\"sidebar-list\"><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("stats.view"), "html", null, true);
                echo "\"><i class=\"fa fa-bar-chart\"></i> ";
                echo __("Display Statistics");
                echo "</a></li>
            ";
            }
            // line 111
            echo "
            ";
            // line 112
            if ($this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/stats"), "method")) {
                // line 113
                echo "                <li class=\"sidebar-list\"><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("stats.proofofplay.view"), "html", null, true);
                echo "\"><i class=\"fa fa-building-o\"></i> ";
                echo __("Proof of Play");
                echo "</a></li>
            ";
            }
            // line 115
            echo "
            ";
            // line 116
            if ($this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/stats"), "method")) {
                // line 117
                echo "                <li class=\"sidebar-list\"><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("stats.library.view"), "html", null, true);
                echo "\"><i class=\"fa fa-database\"></i> ";
                echo __("Library Usage");
                echo "</a></li>
            ";
            }
            // line 119
            echo "        ";
        }
        // line 120
        echo "
        ";
        // line 121
        if ((((($this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/log"), "method") || $this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/sessions"), "method")) || $this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/auditlog"), "method")) || $this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/fault"), "method")) || $this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/help"), "method"))) {
            // line 122
            echo "            <li class=\"sidebar-title\"><a>";
            echo __("Advanced");
            echo "</a></li>
            ";
            // line 123
            if ($this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/log"), "method")) {
                // line 124
                echo "                <li class=\"sidebar-list\"><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("log.view"), "html", null, true);
                echo "\"><i class=\"fa fa-edit\"></i> ";
                echo __("Log");
                echo "</a></li>
            ";
            }
            // line 126
            echo "
            ";
            // line 127
            if ($this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/sessions"), "method")) {
                // line 128
                echo "                <li class=\"sidebar-list\"><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("sessions.view"), "html", null, true);
                echo "\"><i class=\"fa fa-eye\"></i> ";
                echo __("Sessions");
                echo "</a></li>
            ";
            }
            // line 130
            echo "
            ";
            // line 131
            if ($this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/auditlog"), "method")) {
                // line 132
                echo "                <li class=\"sidebar-list\"><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("auditlog.view"), "html", null, true);
                echo "\"><i class=\"fa fa-exclamation-triangle\"></i> ";
                echo __("Audit Trail");
                echo "</a></li>
            ";
            }
            // line 134
            echo "
            ";
            // line 135
            if ($this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/fault"), "method")) {
                // line 136
                echo "               <!-- <li class=\"sidebar-list\"><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("fault.view"), "html", null, true);
                echo "\"><i class=\"fa fa-exclamation-circle\"></i> ";
                echo __("Report Fault");
                echo "</a></li>-->
            ";
            }
            // line 138
            echo "
            ";
            // line 139
            if ($this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/help"), "method")) {
                // line 140
                echo "               <!-- <li class=\"sidebar-list\"><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("help.view"), "html", null, true);
                echo "\"><i class=\"fa fa-question-circle-o\"></i> ";
                echo __("Help Links");
                echo "</a></li> -->
            ";
            }
            // line 142
            echo "        ";
        }
        // line 143
        echo "    </ul>

</div>
";
    }

    public function getTemplateName()
    {
        return "authed-sidebar.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  471 => 143,  468 => 142,  460 => 140,  458 => 139,  455 => 138,  447 => 136,  445 => 135,  442 => 134,  434 => 132,  432 => 131,  429 => 130,  421 => 128,  419 => 127,  416 => 126,  408 => 124,  406 => 123,  401 => 122,  399 => 121,  396 => 120,  393 => 119,  385 => 117,  383 => 116,  380 => 115,  372 => 113,  370 => 112,  367 => 111,  359 => 109,  357 => 108,  352 => 106,  349 => 105,  347 => 104,  343 => 102,  340 => 101,  332 => 99,  330 => 98,  327 => 97,  319 => 95,  317 => 94,  314 => 93,  306 => 91,  304 => 90,  301 => 89,  293 => 87,  291 => 86,  288 => 85,  280 => 83,  278 => 82,  275 => 81,  267 => 79,  265 => 78,  262 => 77,  254 => 75,  252 => 74,  246 => 72,  244 => 71,  241 => 70,  238 => 69,  235 => 68,  232 => 67,  229 => 66,  227 => 65,  224 => 64,  221 => 63,  213 => 61,  211 => 60,  208 => 59,  200 => 57,  198 => 56,  195 => 55,  187 => 53,  185 => 52,  182 => 51,  174 => 49,  172 => 48,  167 => 47,  165 => 46,  162 => 45,  159 => 44,  151 => 42,  149 => 41,  146 => 40,  138 => 38,  136 => 37,  131 => 36,  129 => 35,  126 => 34,  123 => 33,  115 => 31,  113 => 30,  110 => 29,  102 => 27,  100 => 26,  97 => 25,  89 => 23,  87 => 22,  84 => 21,  76 => 19,  74 => 18,  69 => 17,  67 => 16,  64 => 15,  56 => 13,  54 => 12,  51 => 11,  44 => 9,  39 => 8,  37 => 7,  30 => 5,  23 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div id=\"sidebar-wrapper\">
    <ul class=\"sidebar\">
        <li class=\"sidebar-main\"><a href=\"{{ urlFor(\"home\") }}\"><img class=\"logo\" src=\"{{ theme.uri(\"img/logo.png\") }}\" width=\"130\"></a></li>

\t\t\t\t<li class=\"sidebar-list\"><a href=\"{{ urlFor(\"home\") }}\"><i class=\"fa fa-dashboard\"></i> {% trans \"Dashboard\" %}</a></li>

        {% if currentUser.routeViewable(\"/schedule\") %}
\t\t\t\t\t\t<li class=\"sidebar-title\"><a>{% trans \"Calendar\" %}</a></li>
            <li class=\"sidebar-list\"><a href=\"{{ urlFor(\"schedule.view\") }}\"><i class=\"fa fa-calendar\"></i> {% trans \"Schedule\" %}</a></li>
        {% endif %}

        {% if currentUser.routeViewable(\"/daypart\") %}
           <!-- <li class=\"sidebar-list\"><a href=\"{{ urlFor(\"daypart.view\") }}\"><i class=\"fa fa-calendar-check-o\"></i> {% trans \"Dayparting\" %}</a></li> -->
        {% endif %}

        {% if currentUser.routeViewable(\"/campaign\") or currentUser.routeViewable(\"/layout\") or currentUser.routeViewable(\"/template\") or currentUser.routeViewable(\"/resolution\") %}
            <li class=\"sidebar-title\"><a>{% trans \"Design\" %}</a></li>
            {% if currentUser.routeViewable(\"/campaign\") %}
                <li class=\"sidebar-list\"><a href=\"{{ urlFor(\"campaign.view\") }}\"><i class=\"fa fa-archive\"></i> {% trans \"Campaigns\" %}</a></li>
            {% endif %}

            {% if currentUser.routeViewable(\"/layout\") %}
                <li class=\"sidebar-list\"><a href=\"{{ urlFor(\"layout.view\") }}\"><i class=\"fa fa-newspaper-o\"></i> {% trans \"Layouts\" %}</a></li>
            {% endif %}

            {% if currentUser.routeViewable(\"/template\") %}
               <!-- <li class=\"sidebar-list\"><a href=\"{{ urlFor(\"template.view\") }}\"><i class=\"fa fa-clone\"></i> {% trans \"Templates\" %}</a></li> -->
            {% endif %}

            {% if currentUser.routeViewable(\"/resolution\") %}
               <!-- <li class=\"sidebar-list\"><a href=\"{{ urlFor(\"resolution.view\") }}\"><i class=\"fa fa-desktop\"></i> {% trans \"Resolutions\" %}</a></li> -->
            {% endif %}
        {% endif %}

        {% if currentUser.routeViewable(\"/library\") or currentUser.routeViewable(\"/dataset\") %}
            <li class=\"sidebar-title\"><a>{% trans \"Library\" %}</a></li>
            {% if currentUser.routeViewable(\"/library\") %}
                <li class=\"sidebar-list\"><a href=\"{{ urlFor(\"library.view\") }}\"><i class=\"fa fa-picture-o\"></i> {% trans \"Media\" %}</a></li>
            {% endif %}

            {% if currentUser.routeViewable(\"/dataset\") %}
               <!-- <li class=\"sidebar-list\"><a href=\"{{ urlFor(\"dataset.view\") }}\"><i class=\"fa fa-folder-open-o\"></i> {% trans \"DataSets\" %}</a></li> -->
            {% endif %}
        {% endif %}

        {% if currentUser.routeViewable(\"/display\") or currentUser.routeViewable(\"/displaygroup\") or currentUser.routeViewable(\"/stats\") or currentUser.routeViewable(\"/displayprofile\") %}
            <li class=\"sidebar-title\"><a>{% trans \"Displays\" %}</a></li>
            {% if currentUser.routeViewable(\"/display\") %}
                <li class=\"sidebar-list\"><a href=\"{{ urlFor(\"display.view\") }}\"><i class=\"fa fa-tv\"></i> {% trans \"Displays\" %}</a></li>
            {% endif %}

            {% if currentUser.routeViewable(\"/displaygroup\") %}
                <li class=\"sidebar-list\"><a href=\"{{ urlFor(\"displaygroup.view\") }}\"><i class=\"fa fa-laptop\"></i> {% trans \"Display Groups\" %}</a></li>
            {% endif %}

            {% if currentUser.routeViewable(\"/displayprofile\") %}
                <!-- <li class=\"sidebar-list\"><a href=\"{{ urlFor(\"displayprofile.view\") }}\"><i class=\"fa fa-sticky-note-o\"></i> {% trans \"Display Settings\" %}</a></li> -->
            {% endif %}

            {% if currentUser.routeViewable(\"/command\") %}
               <!-- <li class=\"sidebar-list\"><a href=\"{{ urlFor(\"command.view\") }}\"><i class=\"fa fa-terminal\"></i> {% trans \"Commands\" %}</a></li> -->
            {% endif %}
        {% endif %}

        {% if currentUser.routeViewable(\"/user\") and (currentUser.isGroupAdmin() or currentUser.isSuperAdmin()) %}
            {% set userMenuViewable = true %}
        {% else %}
            {% set userMenuViewable = false %}
        {% endif %}

        {% if userMenuViewable or currentUser.routeViewable(\"/usergroup\") or currentUser.routeViewable(\"/admin\") or currentUser.routeViewable(\"/application\") or currentUser.routeViewable(\"/module\") or currentUser.routeViewable(\"/transition\") %}
            <li class=\"sidebar-title\"><a>{% trans \"Administration\" %}</a></li>

            {% if userMenuViewable %}
                <li class=\"sidebar-list\"><a href=\"{{ urlFor(\"user.view\") }}\"><i class=\"fa fa-user\"></i> {% trans \"Users\" %}</a></li>
            {% endif %}

            {% if currentUser.routeViewable(\"/group\") %}
                <li class=\"sidebar-list\"><a href=\"{{ urlFor(\"group.view\") }}\"><i class=\"fa fa-users\"></i> {% trans \"User Groups\" %}</a></li>
            {% endif %}

            {% if currentUser.routeViewable(\"/admin\") %}
               <!-- <li class=\"sidebar-list\"><a href=\"{{ urlFor(\"admin.view\") }}\"><i class=\"fa fa-gear\"></i> {% trans \"Settings\" %}</a></li> -->
            {% endif %}

            {% if currentUser.routeViewable(\"/application\") %}
               <!-- <li class=\"sidebar-list\"><a href=\"{{ urlFor(\"application.view\") }}\"><i class=\"fa fa-hdd-o\"></i> {% trans \"Applications\" %}</a></li> -->
            {% endif %}

            {% if currentUser.routeViewable(\"/module\") %}
               <!-- <li class=\"sidebar-list\"><a href=\"{{ urlFor(\"module.view\") }}\"><i class=\"fa fa-briefcase\"></i> {% trans \"Modules\" %}</a></li> -->
            {% endif %}

            {% if currentUser.routeViewable(\"/transition\") %}
               <!-- <li class=\"sidebar-list\"><a href=\"{{ urlFor(\"transition.view\") }}\"><i class=\"fa fa-keyboard-o\"></i> {% trans \"Transitions\" %}</a></li> -->
            {% endif %}

            {% if currentUser.routeViewable(\"/task\") %}
                <!-- <li class=\"sidebar-list\"><a href=\"{{ urlFor(\"task.view\") }}\"><i class=\"fa fa-cogs\"></i> {% trans \"Tasks\" %}</a></li> -->
            {% endif %}
        {% endif %}


        {% if currentUser.routeViewable(\"/stats\") %}

            <li class=\"sidebar-title\"><a>{% trans \"Reporting\" %}</a></li>

            {% if currentUser.routeViewable(\"/stats\") %}
                <li class=\"sidebar-list\"><a href=\"{{ urlFor(\"stats.view\") }}\"><i class=\"fa fa-bar-chart\"></i> {% trans \"Display Statistics\" %}</a></li>
            {% endif %}

            {% if currentUser.routeViewable(\"/stats\") %}
                <li class=\"sidebar-list\"><a href=\"{{ urlFor(\"stats.proofofplay.view\") }}\"><i class=\"fa fa-building-o\"></i> {% trans \"Proof of Play\" %}</a></li>
            {% endif %}

            {% if currentUser.routeViewable(\"/stats\") %}
                <li class=\"sidebar-list\"><a href=\"{{ urlFor(\"stats.library.view\") }}\"><i class=\"fa fa-database\"></i> {% trans \"Library Usage\" %}</a></li>
            {% endif %}
        {% endif %}

        {% if currentUser.routeViewable(\"/log\") or currentUser.routeViewable(\"/sessions\") or currentUser.routeViewable(\"/auditlog\") or currentUser.routeViewable(\"/fault\") or currentUser.routeViewable(\"/help\") %}
            <li class=\"sidebar-title\"><a>{% trans \"Advanced\" %}</a></li>
            {% if currentUser.routeViewable(\"/log\") %}
                <li class=\"sidebar-list\"><a href=\"{{ urlFor(\"log.view\") }}\"><i class=\"fa fa-edit\"></i> {% trans \"Log\" %}</a></li>
            {% endif %}

            {% if currentUser.routeViewable(\"/sessions\") %}
                <li class=\"sidebar-list\"><a href=\"{{ urlFor(\"sessions.view\") }}\"><i class=\"fa fa-eye\"></i> {% trans \"Sessions\" %}</a></li>
            {% endif %}

            {% if currentUser.routeViewable(\"/auditlog\") %}
                <li class=\"sidebar-list\"><a href=\"{{ urlFor(\"auditlog.view\") }}\"><i class=\"fa fa-exclamation-triangle\"></i> {% trans \"Audit Trail\" %}</a></li>
            {% endif %}

            {% if currentUser.routeViewable(\"/fault\") %}
               <!-- <li class=\"sidebar-list\"><a href=\"{{ urlFor(\"fault.view\") }}\"><i class=\"fa fa-exclamation-circle\"></i> {% trans \"Report Fault\" %}</a></li>-->
            {% endif %}

            {% if currentUser.routeViewable(\"/help\") %}
               <!-- <li class=\"sidebar-list\"><a href=\"{{ urlFor(\"help.view\") }}\"><i class=\"fa fa-question-circle-o\"></i> {% trans \"Help Links\" %}</a></li> -->
            {% endif %}
        {% endif %}
    </ul>

</div>
", "authed-sidebar.twig", "/opt/lampp/htdocs/UBI/views/authed-sidebar.twig");
    }
}
