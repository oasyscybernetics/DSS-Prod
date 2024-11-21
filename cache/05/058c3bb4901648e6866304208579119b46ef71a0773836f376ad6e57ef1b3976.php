<?php

/* authed.twig */
class __TwigTemplate_152e340896bbcb0cc8bd0b144b526d69db370a602ff674b78606f9b7582d8d58 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.twig", "authed.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'actionMenu' => array($this, 'block_actionMenu'),
            'pageContent' => array($this, 'block_pageContent'),
            'pageFooter' => array($this, 'block_pageFooter'),
            'javaScriptTemplates' => array($this, 'block_javaScriptTemplates'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $context["hideNavigation"] = $this->getAttribute(($context["currentUser"] ?? null), "getOptionValue", array(0 => "hideNavigation", 1 => "0"), "method");
        // line 5
        echo "    <div ";
        if ((($context["hideNavigation"] ?? null) == "0")) {
            echo "id=\"page-wrapper\"";
        }
        echo " class=\"active\">

        ";
        // line 7
        if ((($context["hideNavigation"] ?? null) == "0")) {
            // line 8
            echo "        <div class=\"collapse navbar-collapse\" id=\"navbar-collapse-1\">
            ";
            // line 9
            $this->loadTemplate("authed-sidebar.twig", "authed.twig", 9)->display($context);
            // line 10
            echo "        </div>
        ";
        }
        // line 12
        echo "
        <div id=\"content-wrapper\">
            <div class=\"page-content\">
                <div class=\"row header\">
                    <div class=\"col-sm-12\">
                        <div class=\"meta pull-left\">
                            <div class=\"page\"><img class=\"xibo-logo\" src=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "img/logo.png"), "method"), "html", null, true);
        echo "\"></div>
                        </div>
                        <div class=\"user pull-right\">
                            <button type=\"button\"  class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar-collapse-1\">
                                <span class=\"sr-only\">Toggle navigation</span>
                                <span class=\"icon-bar\"></span>
                                <span class=\"icon-bar\"></span>
                                <span class=\"icon-bar\"></span>
                            </button>
                            <div class=\"item dropdown\">
                                <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                                    <img src=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "img/avatar.jpg"), "method"), "html", null, true);
        echo "\" />
                                </a>
                                <ul class=\"dropdown-menu dropdown-menu-right\">
                                    <li class=\"dropdown-header\">";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute(($context["currentUser"] ?? null), "userName", array()), "html", null, true);
        echo "<br/>
                                        <div id=\"XiboClock\">";
        // line 33
        echo twig_escape_filter($this->env, ($context["clock"] ?? null), "html", null, true);
        echo "</div>
                                    </li>
                                    <li class=\"divider\"></li>
                                    <li><a class=\"XiboFormButton\" href=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("user.change.password.form"), "html", null, true);
        echo "\" title=\"";
        echo __("Change Password");
        echo "\">";
        echo __("Change Password");
        echo "</a></li>

<!--
                                    <li><a id=\"reshowWelcomeMenuItem\" href=\"#\">";
        // line 39
        echo __("Reshow welcome");
        echo "</a></li>
                                    <li><a class=\"XiboHelpButton\" href=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute(($context["helpService"] ?? null), "link", array(), "method"), "html", null, true);
        echo "\">";
        echo __("Help");
        echo "</a></li>
-->


                                    <li class=\"divider\"></li>
                                    <li><a title=\"";
        // line 45
        echo __("Logout");
        echo "\" href=\"";
        echo twig_escape_filter($this->env, ($context["logoutUrl"] ?? null), "html", null, true);
        echo "\">";
        echo __("Logout");
        echo "</a></li>
                                </ul>
                            </div>
                        </div>
                        ";
        // line 49
        if ($this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/drawer"), "method")) {
            // line 50
            echo "                        <div class=\"user pull-right\">
                            <div class=\"item dropdown\">
                                <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                                    <i class=\"fa fa-bell\"></i> ";
            // line 53
            if ((($context["notificationCount"] ?? null) > 0)) {
                echo "<span class=\"badge red\">";
                echo twig_escape_filter($this->env, ($context["notificationCount"] ?? null), "html", null, true);
                echo "</span>";
            }
            // line 54
            echo "                                </a>
                                <ul class=\"dropdown-menu dropdown-menu-right notification-drawer\">
                                    <li class=\"dropdown-header\">";
            // line 56
            echo __("Notifications");
            echo "<br/>

                                    </li>
                                    ";
            // line 59
            if ((twig_length_filter($this->env, ($context["notifications"] ?? null)) > 0)) {
                // line 60
                echo "                                    <li class=\"divider\"></li>
                                    ";
            }
            // line 62
            echo "                                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["notifications"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["notification"]) {
                // line 63
                echo "                                    <li>
                                        <div class=\"notification\">
                                            ";
                // line 65
                if ($this->getAttribute($context["notification"], "notificationId", array())) {
                    // line 66
                    echo "                                            <a class=\"XiboFormButton\" href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("notification.show", array("id" => $this->getAttribute($context["notification"], "notificationId", array()))), "html", null, true);
                    echo "\"><span class=\"";
                    if ($this->getAttribute($context["notification"], "read", array())) {
                        echo "notification-unread";
                    } else {
                        echo "notification-read";
                    }
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["notification"], "subject", array()), "html", null, true);
                    echo " - <span class=\"notification-date\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["notification"], "releaseDt", array()), "html", null, true);
                    echo "</span></span></a>
                                            ";
                } else {
                    // line 68
                    echo "                                            <span class=\"fa fa-exclamation-circle\"></span> ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["notification"], "subject", array()), "html", null, true);
                    echo " - <span class=\"notification-date\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["notification"], "releaseDt", array()), "html", null, true);
                    echo "</span>
                                            ";
                }
                // line 70
                echo "                                        </div>
                                    </li>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['notification'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 73
            echo "
                                    ";
            // line 74
            if ($this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/notification"), "method")) {
                // line 75
                echo "                                    <li class=\"divider\"></li>

                                    <li><a href=\"";
                // line 77
                echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("notification.view"), "html", null, true);
                echo "\">";
                echo __("Notification Centre");
                echo "</a></li>
                                    ";
            }
            // line 79
            echo "                                </ul>
                            </div>
                        </div>
                        ";
        }
        // line 83
        echo "                    </div>
                </div>
                <div class=\"row\">
                    <div class=\"col-sm-12\">
                        ";
        // line 87
        $this->displayBlock('actionMenu', $context, $blocks);
        // line 88
        echo "                        ";
        $this->displayBlock('pageContent', $context, $blocks);
        // line 89
        echo "                    </div>
                </div>
                <div class=\"row\">
                    <div class=\"col-sm-12\">
                        ";
        // line 93
        $this->displayBlock('pageFooter', $context, $blocks);
        // line 94
        echo "                    </div>
                </div>
            </div>
        </div>
    </div>
";
    }

    // line 87
    public function block_actionMenu($context, array $blocks = array())
    {
    }

    // line 88
    public function block_pageContent($context, array $blocks = array())
    {
    }

    // line 93
    public function block_pageFooter($context, array $blocks = array())
    {
    }

    // line 101
    public function block_javaScriptTemplates($context, array $blocks = array())
    {
        // line 102
        echo "
    <script type=\"text/javascript\">
        ";
        // line 104
        $context["userPreferences"] = $this->getAttribute(($context["currentUser"] ?? null), "getUserOptions", array(), "method");
        // line 105
        echo "        var userPreferences = ";
        echo twig_jsonencode_filter(($context["userPreferences"] ?? null));
        echo ";
        var userPreferencesUrl = \"";
        // line 106
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("user.pref"), "html", null, true);
        echo "\";
    </script>

    ";
        // line 277
        echo "
    <script type=\"text/x-handlebars-template\" id=\"buttons-template\">
        <div class=\"btn-group pull-right\">
            <button class=\"btn dropdown-toggle\" data-toggle=\"dropdown\">
                <span class=\"fa fa-caret-down\"></span>
            </button>
            <ul class=\"dropdown-menu\">
                {{#each buttons}}
                    {{#if divider}}
                    <li class=\"divider\"></li>
                    {{else}}
                        {{#if external}}
                        <li class=\"{{ id }}\"><a tabindex=\"-1\" target=\"{{ linkType }}\" href=\"{{ url }}\">{{ text }}</a></li>
                        {{/if}}

                        {{#unless external}}
                            <li {{#each dataAttributes}}
                                data-{{ name }}=\"{{ value }}\"
                                {{/each}}
                                class=\"{{#if class}}{{ class }}{{else}}XiboFormButton{{/if}} {{ id }}\" href=\"{{ url }}\"><a tabindex=\"-1\" href=\"#\">{{ text }}</a>
                            </li>
                        {{/unless}}
                    {{/if}}
                {{/each}}
            </ul>
        </div>
    </script>

    <script type=\"text/x-handlebars-template\" id=\"multiselect-button-template\">
        <div class=\"btn-group\">
            <button class=\"btn select-all\" data-toggle=\"selectAll\">
                {{ selectAll }}
            </button>
            <button class=\"btn btn-default dropdown-toggle\" data-toggle=\"dropdown\">
                <span class=\"fa fa-caret-down\"></span>
                {{ withSelected }}
            </button>
            <ul class=\"dropdown-menu\">
                {{#each buttons}}
                <li class=\"XiboMultiSelectFormButton\" data-button-id=\"{{ id }}\" data-grid-id=\"{{ gridId }}\"><a tabindex=\"-1\" href=\"#\">{{ text }}</a></li>
                {{/each}}
            </ul>
        </div>
    </script>

    <script type=\"text/x-handlebars-template\" id=\"template-file-upload\">
        <form method=\"post\" enctype=\"multipart/form-data\" data-max-file-size=\"{{ upload.maxSize }}\" data-accept-file-types=\"/(\\.|\\/){{ upload.validExt }}\$/i\">
            {{#if playlistId}}
                <input type=\"hidden\" name=\"playlistId\" value=\"{{ playlistId }}\" />
            {{/if}}
            {{#if widgetId}}
                <input type=\"hidden\" name=\"widgetId\" value=\"{{ widgetId }}\" />
            {{/if}}
            {{#if oldMediaId}}
                <input type=\"hidden\" name=\"oldMediaId\" value=\"{{ oldMediaId }}\" />
            {{/if}}
            <div class=\"row fileupload-buttonbar\">
                <div class=\"col-md-7\">
                    <div class=\"well\">
                        {{ upload.maxSizeMessage }}
                    </div>
                    <!-- The fileinput-button span is used to style the file input field as button -->
                    <span class=\"btn btn-success fileinput-button\">
                        <i class=\"glyphicon glyphicon-plus glyphicon glyphicon-white\"></i>
                        <span>{{ trans.addFiles }}</span>
                        {{#if oldMediaId }}
                        <input type=\"file\" name=\"files[]\">
                        {{else}}
                        <input type=\"file\" name=\"files[]\" multiple>
                        {{/if}}
                    </span>
                    <button type=\"submit\" class=\"btn btn-primary start\">
                        <i class=\"glyphicon glyphicon-upload glyphicon glyphicon-white\"></i>
                        <span>{{ trans.startUpload }}</span>
                    </button>
                    <button type=\"reset\" class=\"btn btn-warning cancel\">
                        <i class=\"glyphicon glyphicon-ban-circle glyphicon glyphicon-white\"></i>
                        <span>{{ trans.cancelUpload }}</span>
                    </button>
                    <!-- The loading indicator is shown during file processing -->
                    <span class=\"fileupload-loading\"></span>
                </div>
                <!-- The global progress information -->
                <div class=\"col-md-4 fileupload-progress fade\">
                    <!-- The global progress bar -->
                    <div class=\"progress\">
                        <div class=\"progress-bar progress-bar-success progress-bar-striped active\" role=\"progressbar\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:0%;\">
                            <div class=\"sr-only\"></div>
                        </div>
                    </div>
                    <!-- The extended global progress information -->
                    <div class=\"progress-extended\">&nbsp;</div>
                </div>
            </div>
            {{#if oldMediaId}}
            <div class=\"row\">
                <div class=\"col-md-6\">
                    <label for=\"updateInLayouts\" title=\"{{ trans.updateInLayouts.helpText }}\">
                        <input type=\"checkbox\" id=\"updateInLayouts\" name=\"updateInLayouts\" {{#if updateInAllChecked}}checked{{/if}}>
                        {{ trans.updateInLayouts.title }}
                    </label>
                </div>
                <div class=\"col-md-6\">
                    <label for=\"deleteOldRevisions\" title=\"{{ trans.deleteOldRevisions.helpText }}\">
                        <input type=\"checkbox\" id=\"deleteOldRevisions\" name=\"deleteOldRevisions\" {{#if deleteOldRevisionsChecked}}checked{{/if}}>
                        {{ trans.deleteOldRevisions.title }}
                    </label>
                </div>
            </div>
            {{/if}}
            <!-- The table listing the files available for upload/download -->
            <table role=\"presentation\" class=\"table table-striped\"><tbody class=\"files\"></tbody></table>
        </form>
    </script>

    <!-- The template to display files available for upload -->
    <script id=\"template-upload\" type=\"text/x-tmpl\">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class=\"template-upload fade\">
            <td>
                <span class=\"preview\"></span>
            </td>
            <td class=\"title\">
                <label for=\"name[]\"><input name=\"name[]\" type=\"text\" id=\"name\" value=\"\" /></label>
                <div><span class=\"error\"></span></div>
            </td>
            <td>
                <p class=\"size\">{%=o.formatFileSize(file.size)%}</p>
                    <div class=\"progress\">
                        <div class=\"progress-bar progress-bar-striped active\" role=\"progressbar\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:0%;\">
                            <div class=\"sr-only\"></div>
                        </div>
                    </div>
                </div>
            </td>
            <td>
                {% if (!i && !o.options.autoUpload) { %}
                    <button class=\"btn btn-primary start\" disabled>
                        <i class=\"glyphicon glyphicon-upload glyphicon glyphicon-white\"></i>
                    </button>
                {% } %}
                {% if (!i) { %}
                    <button class=\"btn btn-warning cancel\">
                        <i class=\"glyphicon glyphicon-ban-circle glyphicon glyphicon-white\"></i>
                    </button>
                {% } %}
            </td>
        </tr>
    {% } %}
    </script>
    <!-- The template to display files available for download -->
    <script id=\"template-download\" type=\"text/x-tmpl\">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class=\"template-download fade\">
           <td>
                <p class=\"name\" id=\"{%=file.storedas%}\" status=\"{% if (file.error) { %}error{% } %}\">
                    {%=file.name%}
                </p>
                {% if (file.error) { %}
                    <div><span class=\"label label-danger\">{%=file.error%}</span></div>
                {% } %}
            </td>
            <td>
                <span class=\"size\">{%=o.formatFileSize(file.size)%}</span>
            </td>
        </tr>
    {% } %}
    </script>
    ";
        echo "

    <script type=\"text/x-handlebars-template\" id=\"layout-background-image-upload-template\">
        <form method=\"post\" action=\"";
        // line 280
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("library.add"), "html", null, true);
        echo "\" enctype=\"multipart/form-data\" data-max-file-size=\"";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["libraryUpload"] ?? null), "maxSize", array()), "html", null, true);
        echo "\" data-accept-file-types=\"/(\\.|\\/)";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["libraryUpload"] ?? null), "validImageExt", array()), "html", null, true);
        echo "\$/i\">
            <div class=\"row\">
                <div class=\"col-md-4\">
                    <span class=\"btn btn-success fileinput-button\">
                        <i class=\"glyphicon glyphicon-plus glyphicon glyphicon-white\"></i>
                        <span>";
        // line 285
        echo __("Add a new background image?");
        echo "</span> <input type=\"file\" name=\"files[]\">
                    </span>
                </div>
                <div class=\"col-md-8\">
                    <span class=\"fileupload-loading\"></span>
                    <div class=\"fileupload-progress fade\">
                        <!-- The global progress bar -->
                        <div class=\"progress\">
                            <div class=\"progress-bar progress-bar-success progress-bar-striped active\" role=\"progressbar\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:0%;\">
                                <div class=\"sr-only\"></div>
                            </div>
                        </div>
                        <!-- The extended global progress information -->
                        <div class=\"progress-extended\">&nbsp;</div>
                    </div>
                </div>
            </div>
            <div class=\"row\">
                <div class=\"col-md-12\">
                    <!-- The table listing the files available for upload/download -->
                    <table role=\"presentation\" class=\"table table-striped\"><tbody class=\"files\"></tbody></table>
                </div>
            </div>
        </form>
    </script>

";
    }

    public function getTemplateName()
    {
        return "authed.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  473 => 285,  461 => 280,  287 => 277,  281 => 106,  276 => 105,  274 => 104,  270 => 102,  267 => 101,  262 => 93,  257 => 88,  252 => 87,  243 => 94,  241 => 93,  235 => 89,  232 => 88,  230 => 87,  224 => 83,  218 => 79,  211 => 77,  207 => 75,  205 => 74,  202 => 73,  194 => 70,  186 => 68,  170 => 66,  168 => 65,  164 => 63,  159 => 62,  155 => 60,  153 => 59,  147 => 56,  143 => 54,  137 => 53,  132 => 50,  130 => 49,  119 => 45,  109 => 40,  105 => 39,  95 => 36,  89 => 33,  85 => 32,  79 => 29,  65 => 18,  57 => 12,  53 => 10,  51 => 9,  48 => 8,  46 => 7,  38 => 5,  35 => 4,  32 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"base.twig\" %}

{% block content %}
    {% set hideNavigation = currentUser.getOptionValue(\"hideNavigation\", \"0\") %}
    <div {% if hideNavigation == \"0\" %}id=\"page-wrapper\"{% endif %} class=\"active\">

        {% if hideNavigation == \"0\" %}
        <div class=\"collapse navbar-collapse\" id=\"navbar-collapse-1\">
            {% include \"authed-sidebar.twig\" %}
        </div>
        {% endif %}

        <div id=\"content-wrapper\">
            <div class=\"page-content\">
                <div class=\"row header\">
                    <div class=\"col-sm-12\">
                        <div class=\"meta pull-left\">
                            <div class=\"page\"><img class=\"xibo-logo\" src=\"{{ theme.uri(\"img/logo.png\") }}\"></div>
                        </div>
                        <div class=\"user pull-right\">
                            <button type=\"button\"  class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar-collapse-1\">
                                <span class=\"sr-only\">Toggle navigation</span>
                                <span class=\"icon-bar\"></span>
                                <span class=\"icon-bar\"></span>
                                <span class=\"icon-bar\"></span>
                            </button>
                            <div class=\"item dropdown\">
                                <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                                    <img src=\"{{ theme.uri(\"img/avatar.jpg\") }}\" />
                                </a>
                                <ul class=\"dropdown-menu dropdown-menu-right\">
                                    <li class=\"dropdown-header\">{{ currentUser.userName }}<br/>
                                        <div id=\"XiboClock\">{{ clock }}</div>
                                    </li>
                                    <li class=\"divider\"></li>
                                    <li><a class=\"XiboFormButton\" href=\"{{ urlFor(\"user.change.password.form\") }}\" title=\"{% trans \"Change Password\" %}\">{% trans \"Change Password\" %}</a></li>

<!--
                                    <li><a id=\"reshowWelcomeMenuItem\" href=\"#\">{% trans \"Reshow welcome\" %}</a></li>
                                    <li><a class=\"XiboHelpButton\" href=\"{{ helpService.link() }}\">{% trans \"Help\" %}</a></li>
-->


                                    <li class=\"divider\"></li>
                                    <li><a title=\"{% trans \"Logout\" %}\" href=\"{{ logoutUrl }}\">{% trans \"Logout\" %}</a></li>
                                </ul>
                            </div>
                        </div>
                        {% if currentUser.routeViewable(\"/drawer\") %}
                        <div class=\"user pull-right\">
                            <div class=\"item dropdown\">
                                <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                                    <i class=\"fa fa-bell\"></i> {% if notificationCount > 0 %}<span class=\"badge red\">{{ notificationCount }}</span>{% endif %}
                                </a>
                                <ul class=\"dropdown-menu dropdown-menu-right notification-drawer\">
                                    <li class=\"dropdown-header\">{% trans \"Notifications\" %}<br/>

                                    </li>
                                    {% if notifications|length > 0 %}
                                    <li class=\"divider\"></li>
                                    {% endif %}
                                    {% for notification in notifications %}
                                    <li>
                                        <div class=\"notification\">
                                            {% if notification.notificationId %}
                                            <a class=\"XiboFormButton\" href=\"{{ urlFor(\"notification.show\", {id: notification.notificationId}) }}\"><span class=\"{% if notification.read %}notification-unread{% else %}notification-read{% endif %}\">{{ notification.subject }} - <span class=\"notification-date\">{{ notification.releaseDt }}</span></span></a>
                                            {% else %}
                                            <span class=\"fa fa-exclamation-circle\"></span> {{ notification.subject }} - <span class=\"notification-date\">{{ notification.releaseDt }}</span>
                                            {% endif %}
                                        </div>
                                    </li>
                                    {% endfor %}

                                    {% if currentUser.routeViewable(\"/notification\") %}
                                    <li class=\"divider\"></li>

                                    <li><a href=\"{{ urlFor(\"notification.view\") }}\">{% trans \"Notification Centre\" %}</a></li>
                                    {% endif %}
                                </ul>
                            </div>
                        </div>
                        {% endif %}
                    </div>
                </div>
                <div class=\"row\">
                    <div class=\"col-sm-12\">
                        {% block actionMenu %}{% endblock %}
                        {% block pageContent %}{% endblock %}
                    </div>
                </div>
                <div class=\"row\">
                    <div class=\"col-sm-12\">
                        {% block pageFooter %}{% endblock %}
                    </div>
                </div>
            </div>
        </div>
    </div>
{% endblock %}

{% block javaScriptTemplates %}

    <script type=\"text/javascript\">
        {% set userPreferences = currentUser.getUserOptions() %}
        var userPreferences = {{ userPreferences|json_encode|raw }};
        var userPreferencesUrl = \"{{ urlFor(\"user.pref\") }}\";
    </script>

    {% raw %}
    <script type=\"text/x-handlebars-template\" id=\"buttons-template\">
        <div class=\"btn-group pull-right\">
            <button class=\"btn dropdown-toggle\" data-toggle=\"dropdown\">
                <span class=\"fa fa-caret-down\"></span>
            </button>
            <ul class=\"dropdown-menu\">
                {{#each buttons}}
                    {{#if divider}}
                    <li class=\"divider\"></li>
                    {{else}}
                        {{#if external}}
                        <li class=\"{{ id }}\"><a tabindex=\"-1\" target=\"{{ linkType }}\" href=\"{{ url }}\">{{ text }}</a></li>
                        {{/if}}

                        {{#unless external}}
                            <li {{#each dataAttributes}}
                                data-{{ name }}=\"{{ value }}\"
                                {{/each}}
                                class=\"{{#if class}}{{ class }}{{else}}XiboFormButton{{/if}} {{ id }}\" href=\"{{ url }}\"><a tabindex=\"-1\" href=\"#\">{{ text }}</a>
                            </li>
                        {{/unless}}
                    {{/if}}
                {{/each}}
            </ul>
        </div>
    </script>

    <script type=\"text/x-handlebars-template\" id=\"multiselect-button-template\">
        <div class=\"btn-group\">
            <button class=\"btn select-all\" data-toggle=\"selectAll\">
                {{ selectAll }}
            </button>
            <button class=\"btn btn-default dropdown-toggle\" data-toggle=\"dropdown\">
                <span class=\"fa fa-caret-down\"></span>
                {{ withSelected }}
            </button>
            <ul class=\"dropdown-menu\">
                {{#each buttons}}
                <li class=\"XiboMultiSelectFormButton\" data-button-id=\"{{ id }}\" data-grid-id=\"{{ gridId }}\"><a tabindex=\"-1\" href=\"#\">{{ text }}</a></li>
                {{/each}}
            </ul>
        </div>
    </script>

    <script type=\"text/x-handlebars-template\" id=\"template-file-upload\">
        <form method=\"post\" enctype=\"multipart/form-data\" data-max-file-size=\"{{ upload.maxSize }}\" data-accept-file-types=\"/(\\.|\\/){{ upload.validExt }}\$/i\">
            {{#if playlistId}}
                <input type=\"hidden\" name=\"playlistId\" value=\"{{ playlistId }}\" />
            {{/if}}
            {{#if widgetId}}
                <input type=\"hidden\" name=\"widgetId\" value=\"{{ widgetId }}\" />
            {{/if}}
            {{#if oldMediaId}}
                <input type=\"hidden\" name=\"oldMediaId\" value=\"{{ oldMediaId }}\" />
            {{/if}}
            <div class=\"row fileupload-buttonbar\">
                <div class=\"col-md-7\">
                    <div class=\"well\">
                        {{ upload.maxSizeMessage }}
                    </div>
                    <!-- The fileinput-button span is used to style the file input field as button -->
                    <span class=\"btn btn-success fileinput-button\">
                        <i class=\"glyphicon glyphicon-plus glyphicon glyphicon-white\"></i>
                        <span>{{ trans.addFiles }}</span>
                        {{#if oldMediaId }}
                        <input type=\"file\" name=\"files[]\">
                        {{else}}
                        <input type=\"file\" name=\"files[]\" multiple>
                        {{/if}}
                    </span>
                    <button type=\"submit\" class=\"btn btn-primary start\">
                        <i class=\"glyphicon glyphicon-upload glyphicon glyphicon-white\"></i>
                        <span>{{ trans.startUpload }}</span>
                    </button>
                    <button type=\"reset\" class=\"btn btn-warning cancel\">
                        <i class=\"glyphicon glyphicon-ban-circle glyphicon glyphicon-white\"></i>
                        <span>{{ trans.cancelUpload }}</span>
                    </button>
                    <!-- The loading indicator is shown during file processing -->
                    <span class=\"fileupload-loading\"></span>
                </div>
                <!-- The global progress information -->
                <div class=\"col-md-4 fileupload-progress fade\">
                    <!-- The global progress bar -->
                    <div class=\"progress\">
                        <div class=\"progress-bar progress-bar-success progress-bar-striped active\" role=\"progressbar\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:0%;\">
                            <div class=\"sr-only\"></div>
                        </div>
                    </div>
                    <!-- The extended global progress information -->
                    <div class=\"progress-extended\">&nbsp;</div>
                </div>
            </div>
            {{#if oldMediaId}}
            <div class=\"row\">
                <div class=\"col-md-6\">
                    <label for=\"updateInLayouts\" title=\"{{ trans.updateInLayouts.helpText }}\">
                        <input type=\"checkbox\" id=\"updateInLayouts\" name=\"updateInLayouts\" {{#if updateInAllChecked}}checked{{/if}}>
                        {{ trans.updateInLayouts.title }}
                    </label>
                </div>
                <div class=\"col-md-6\">
                    <label for=\"deleteOldRevisions\" title=\"{{ trans.deleteOldRevisions.helpText }}\">
                        <input type=\"checkbox\" id=\"deleteOldRevisions\" name=\"deleteOldRevisions\" {{#if deleteOldRevisionsChecked}}checked{{/if}}>
                        {{ trans.deleteOldRevisions.title }}
                    </label>
                </div>
            </div>
            {{/if}}
            <!-- The table listing the files available for upload/download -->
            <table role=\"presentation\" class=\"table table-striped\"><tbody class=\"files\"></tbody></table>
        </form>
    </script>

    <!-- The template to display files available for upload -->
    <script id=\"template-upload\" type=\"text/x-tmpl\">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class=\"template-upload fade\">
            <td>
                <span class=\"preview\"></span>
            </td>
            <td class=\"title\">
                <label for=\"name[]\"><input name=\"name[]\" type=\"text\" id=\"name\" value=\"\" /></label>
                <div><span class=\"error\"></span></div>
            </td>
            <td>
                <p class=\"size\">{%=o.formatFileSize(file.size)%}</p>
                    <div class=\"progress\">
                        <div class=\"progress-bar progress-bar-striped active\" role=\"progressbar\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:0%;\">
                            <div class=\"sr-only\"></div>
                        </div>
                    </div>
                </div>
            </td>
            <td>
                {% if (!i && !o.options.autoUpload) { %}
                    <button class=\"btn btn-primary start\" disabled>
                        <i class=\"glyphicon glyphicon-upload glyphicon glyphicon-white\"></i>
                    </button>
                {% } %}
                {% if (!i) { %}
                    <button class=\"btn btn-warning cancel\">
                        <i class=\"glyphicon glyphicon-ban-circle glyphicon glyphicon-white\"></i>
                    </button>
                {% } %}
            </td>
        </tr>
    {% } %}
    </script>
    <!-- The template to display files available for download -->
    <script id=\"template-download\" type=\"text/x-tmpl\">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class=\"template-download fade\">
           <td>
                <p class=\"name\" id=\"{%=file.storedas%}\" status=\"{% if (file.error) { %}error{% } %}\">
                    {%=file.name%}
                </p>
                {% if (file.error) { %}
                    <div><span class=\"label label-danger\">{%=file.error%}</span></div>
                {% } %}
            </td>
            <td>
                <span class=\"size\">{%=o.formatFileSize(file.size)%}</span>
            </td>
        </tr>
    {% } %}
    </script>
    {% endraw %}

    <script type=\"text/x-handlebars-template\" id=\"layout-background-image-upload-template\">
        <form method=\"post\" action=\"{{ urlFor(\"library.add\") }}\" enctype=\"multipart/form-data\" data-max-file-size=\"{{ libraryUpload.maxSize }}\" data-accept-file-types=\"/(\\.|\\/){{ libraryUpload.validImageExt }}\$/i\">
            <div class=\"row\">
                <div class=\"col-md-4\">
                    <span class=\"btn btn-success fileinput-button\">
                        <i class=\"glyphicon glyphicon-plus glyphicon glyphicon-white\"></i>
                        <span>{% trans \"Add a new background image?\" %}</span> <input type=\"file\" name=\"files[]\">
                    </span>
                </div>
                <div class=\"col-md-8\">
                    <span class=\"fileupload-loading\"></span>
                    <div class=\"fileupload-progress fade\">
                        <!-- The global progress bar -->
                        <div class=\"progress\">
                            <div class=\"progress-bar progress-bar-success progress-bar-striped active\" role=\"progressbar\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:0%;\">
                                <div class=\"sr-only\"></div>
                            </div>
                        </div>
                        <!-- The extended global progress information -->
                        <div class=\"progress-extended\">&nbsp;</div>
                    </div>
                </div>
            </div>
            <div class=\"row\">
                <div class=\"col-md-12\">
                    <!-- The table listing the files available for upload/download -->
                    <table role=\"presentation\" class=\"table table-striped\"><tbody class=\"files\"></tbody></table>
                </div>
            </div>
        </form>
    </script>

{% endblock %}", "authed.twig", "/opt/lampp/htdocs/UBI/views/authed.twig");
    }
}
