<?php

/* dashboard-status-page.twig */
class __TwigTemplate_4b44437a46969dd48b0fd136fd85e0330b992d56d3f01240212e9195c598be65 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("authed.twig", "dashboard-status-page.twig", 1);
        $this->blocks = array(
            'pageContent' => array($this, 'block_pageContent'),
            'javaScript' => array($this, 'block_javaScript'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "authed.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $context["inline"] = $this->loadTemplate("inline.twig", "dashboard-status-page.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function block_pageContent($context, array $blocks = array())
    {
        // line 2
        echo "    <div class=\"row\">
        <div class=\"col-lg-3 col-md-6 col-xs-12\">
            <div class=\"widget\">
                <div class=\"widget-body\">
                    <div class=\"widget-icon orange pull-left\">
                        <i class=\"fa fa-desktop\"></i>
                    </div>
                    <div class=\"widget-content pull-left\">
                        <div class=\"title displays-count\">0</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"comment displays-comment\" data-title=\"";
        // line 11
        echo __("Total Display");
        echo "\" data-title-plural=\"";
        echo __("Total Displays");
        // line 12
        echo "\"></div>
                    </div>
                    <div class=\"clearfix\"></div>
                </div>
            </div>
        </div>
        <div class=\"col-lg-3 col-md-6 col-xs-12\">
            <div class=\"widget\">
                <div class=\"widget-body\">
                    <div class=\"widget-icon red pull-left\">
                        <i class=\"fa fa-tasks\"></i>
                    </div>
                    <div class=\"widget-content pull-left\">
                        <div class=\"title\">";
        // line 25
        echo twig_escape_filter($this->env, ($context["librarySize"] ?? null), "html", null, true);
        echo "</div>
                        <div class=\"comment\">";
        // line 26
        echo __("Library Size");
        echo "</div>
                    </div>
                    <div class=\"clearfix\"></div>
                </div>
            </div>
        </div>
        <div class=\"col-lg-3 col-md-6 col-xs-12\">
            <div class=\"widget\">
                <div class=\"widget-body\">
                    <div class=\"widget-icon green pull-left\">
                        <i class=\"fa fa-users\"></i>
                    </div>
                    <div class=\"widget-content pull-left\">
                        <div class=\"title\">";
        // line 39
        echo twig_escape_filter($this->env, ($context["countUsers"] ?? null), "html", null, true);
        echo "</div>
                        <div class=\"comment\">";
        // line 40
        if ((($context["countUsers"] ?? null) == 1)) {
            echo __("User");
        } else {
            echo __("Users");
        }
        echo "</div>
                    </div>
                    <div class=\"clearfix\"></div>
                </div>
            </div>
        </div>
        <div class=\"col-lg-3 col-md-6 col-xs-12\">
            <div class=\"widget\">
                <div class=\"widget-body\">
                    <div class=\"widget-icon blue pull-left\">
                        <i class=\"fa fa-cogs\"></i>
                    </div>
                    <div class=\"widget-content pull-left\">
                        ";
        // line 53
        if ((($context["embeddedWidget"] ?? null) != "")) {
            // line 54
            echo "                            ";
            echo ($context["embeddedWidget"] ?? null);
            echo "
                        ";
        } else {
            // line 56
            echo "                            <div class=\"title\">";
            echo twig_escape_filter($this->env, ($context["nowShowing"] ?? null), "html", null, true);
            echo "</div>
                            <div class=\"comment\">";
            // line 57
            echo __("Now Showing");
            echo "</div>
                        ";
        }
        // line 59
        echo "                    </div>
                    <div class=\"clearfix\"></div>
                </div>
            </div>
        </div>
    </div>
\t
\t<div class=\"row\" style=\"border-top:1px solid #ddd; margin:20px 0 30px 0;\"></div>
\t
\t<div class=\"row\">
        <div class=\"col-lg-3 col-md-6 col-xs-12\">
            <div class=\"widget\">
                <div class=\"widget-body\">
                    <div class=\"widget-icon blue pull-left\">
                        <i class=\"fa fa-desktop\"></i>
                    </div>
                    <div class=\"widget-content pull-left\">
                        <div class=\"title\">";
        // line 76
        echo twig_escape_filter($this->env, ($context["connectedToday"] ?? null), "html", null, true);
        echo "</div>
                        <div class=\"comment\">";
        // line 77
        echo __("Connected Today");
        echo "</div>
                    </div>
                    <div class=\"clearfix\"></div>
                </div>
            </div>
        </div>

<!--\t\t
        <div class=\"col-lg-3 col-md-6 col-xs-12\">
            <div class=\"widget\">
                <div class=\"widget-body\">
                    <div class=\"widget-icon green pull-left\">
                        <i class=\"fa fa-desktop\"></i>
                    </div>
                    <div class=\"widget-content pull-left\">
                        <div class=\"title\">";
        // line 92
        echo twig_escape_filter($this->env, ($context["activeDisplay"] ?? null), "html", null, true);
        echo "</div>
                        <div class=\"comment\">";
        // line 93
        echo __("Displays up to date");
        echo "</div>
                    </div>
                    <div class=\"clearfix\"></div>
                </div>
            </div>
        </div>
\t\t
        <div class=\"col-lg-3 col-md-6 col-xs-12\">
            <div class=\"widget\">
                <div class=\"widget-body\">
                    <div class=\"widget-icon orange pull-left\">
                        <i class=\"fa fa-desktop\"></i>
                    </div>
                    <div class=\"widget-content pull-left\">
                        <div class=\"title\">";
        // line 107
        echo twig_escape_filter($this->env, ($context["downloadDisplay"] ?? null), "html", null, true);
        echo "</div>
                        <div class=\"comment\">";
        // line 108
        echo __("Download In Progress");
        echo "</div>
                    </div>
                    <div class=\"clearfix\"></div>
                </div>
            </div>
        </div>
-->
\t\t
        <div class=\"col-lg-3 col-md-6 col-xs-12\">
            <div class=\"widget\">
                <div class=\"widget-body\">
                    <div class=\"widget-icon red pull-left\">
                        <i class=\"fa fa-desktop\"></i>
                    </div>
                    <div class=\"widget-content pull-left\">
                        <div class=\"title\">";
        // line 123
        echo twig_escape_filter($this->env, ($context["inactiveDisplay"] ?? null), "html", null, true);
        echo "</div>
                        <div class=\"comment\">";
        // line 124
        echo __("Inactive Displays");
        echo "</div>
                    </div>
                    <div class=\"clearfix\"></div>
                </div>
            </div>
        </div>
\t</div>
\t
\t<div class=\"row\" style=\"border-top:1px solid #ddd; margin:20px 0 30px 0;\"></div>
\t
\t<div class=\"row\">
        <div class=\"col-lg-3 col-md-6 col-xs-12\">
            <div class=\"widget\">
                <div class=\"widget-body\">
                    <div class=\"widget-icon green pull-left\">
                        <i class=\"fa fa-desktop\"></i>
                    </div>
                    <div class=\"widget-content pull-left\">
                        <div class=\"title\">";
        // line 142
        echo twig_escape_filter($this->env, ($context["authDisplays"] ?? null), "html", null, true);
        echo "</div>
                        <div class=\"comment\">";
        // line 143
        echo __("Authorized Displays");
        echo "</div>
                    </div>
                    <div class=\"clearfix\"></div>
                </div>
            </div>
        </div>
\t\t
        <div class=\"col-lg-3 col-md-6 col-xs-12\">
            <div class=\"widget\">
                <div class=\"widget-body\">
                    <div class=\"widget-icon red pull-left\">
                        <i class=\"fa fa-desktop\"></i>
                    </div>
                    <div class=\"widget-content pull-left\">
                        <div class=\"title\">";
        // line 157
        echo twig_escape_filter($this->env, ($context["unauthDisplays"] ?? null), "html", null, true);
        echo "</div>
                        <div class=\"comment\">";
        // line 158
        echo __("Unauthorized Displays");
        echo "</div>
                    </div>
                    <div class=\"clearfix\"></div>
                </div>
            </div>
        </div>
\t</div>
\t
\t<div class=\"row\" style=\"border-top:1px solid #ddd; margin:20px 0 30px 0;\"></div>
\t
    <div class=\"row\">
        <div class=\"col-lg-6\">
            <div class=\"widget\">
                <div class=\"widget-title\">
                    <i class=\"fa fa-desktop\"></i>
                    ";
        // line 173
        echo __("Display Activity");
        // line 174
        echo "                    <div class=\"clearfix\"></div>
                </div>
                <div class=\"widget-body medium no-padding\">
                    <div class=\"table-responsive\">
                        <table id=\"displays\" class=\"table\">
                            <thead>
                            <tr>
                                <th>";
        // line 181
        echo __("Display");
        echo "</th>
                                <th>";
        // line 182
        echo __("Logged In");
        echo "</th>
                                <th>";
        // line 183
        echo __("Authorised");
        echo "</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
\t\t</div>
\t\t\t
        <div class=\"col-lg-6\">
            <div class=\"widget\">
                <div class=\"widget-title\">
                    <i class=\"fa fa-tasks\"></i>
                    ";
        // line 198
        echo __("Display Groups");
        // line 199
        echo "                    <div class=\"clearfix\"></div>
                </div>
                <div class=\"widget-body medium no-padding\">
                    <div class=\"table-responsive\">
                        <table id=\"displays\" class=\"table\">
                            <thead>
                            <tr>
                                <th>";
        // line 206
        echo __("Display Group");
        echo "</th>
                                <th>";
        // line 207
        echo __("Total No. ");
        echo "</th>
\t\t\t\t\t\t\t\t<th>";
        // line 208
        echo __("Connected Today ");
        echo "</th>
                            </tr>
                            </thead>
                            <tbody>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
        // line 213
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["displayGroups"] ?? null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["dg"]) {
            // line 214
            echo "\t\t\t\t\t\t\t\t  <tr>
\t\t\t\t\t\t\t\t\t   <td>
\t\t\t\t\t\t\t\t\t\t   ";
            // line 216
            echo twig_escape_filter($this->env, $this->getAttribute($context["dg"], "DisplayGroupID", array(), "array"), "html", null, true);
            echo " - ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["dg"], "DisplayGroup", array(), "array"), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t\t   </td>
\t\t\t\t\t\t\t\t\t   <td>
\t\t\t\t\t\t\t\t\t\t  ";
            // line 219
            echo twig_escape_filter($this->env, $this->getAttribute(($context["dgTotalCount"] ?? null), $this->getAttribute($context["loop"], "index0", array()), array(), "array"), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t\t   </td>
\t\t\t\t\t\t\t\t\t   <td>
\t\t\t\t\t\t\t\t\t\t  ";
            // line 222
            echo twig_escape_filter($this->env, $this->getAttribute(($context["tc"] ?? null), $this->getAttribute($context["loop"], "index0", array()), array(), "array"), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t\t   </td>
\t\t\t\t\t\t\t\t  </tr>
\t\t\t\t\t\t\t\t  
\t\t\t\t\t\t\t\t";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['dg'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 227
        echo "\t\t\t\t\t\t\t\t
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
\t
\t
\t
\t<div class=\"row\" style=\"border-top:1px solid #ddd; margin:20px 0 30px 0;\"></div>
\t
    <div class=\"row\">
        <div class=\"col-lg-6\">
            <div class=\"widget\">
                <div class=\"widget-title\">
                    <i class=\"fa fa-cloud-download\"></i>
                    ";
        // line 246
        if ((($context["xmdsLimit"] ?? null) != "")) {
            // line 247
            echo "                        ";
            /* xgettext:no-php-format */            echo strtr(__("Bandwidth Usage. Limit %xmdsLimit%"), array("%xmdsLimit%" => ($context["xmdsLimit"] ?? null), ));
            // line 248
            echo "                    ";
        } else {
            // line 249
            echo "                        ";
            /* xgettext:no-php-format */            echo strtr(__("Bandwidth Usage (%bandwidthSuffix%)"), array("%bandwidthSuffix%" => ($context["bandwidthSuffix"] ?? null), ));
            // line 250
            echo "                    ";
        }
        // line 251
        echo "                    ";
        if ($this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/stats"), "method")) {
            // line 252
            echo "                    <a class=\"pull-right\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("stats.view"), "html", null, true);
            echo "\">";
            echo __("More Statistics");
            echo "</a>
                    ";
        }
        // line 254
        echo "                    <div class=\"clearfix\"></div>
                </div>
                <div class=\"widget-body medium no-padding\">
                    <canvas id=\"bandwidthChart\" style=\"clear:both;\" height=\"230\"></canvas>
                </div>
            </div>
        </div>
        <div class=\"col-lg-6\">
            <div class=\"widget\">
                <div class=\"widget-title\">
                    <i class=\"fa fa-tasks\"></i>
                    ";
        // line 265
        if ((($context["libraryLimitSet"] ?? null) != "")) {
            // line 266
            echo "                        ";
            /* xgettext:no-php-format */            echo strtr(__("Library Usage. Limit %libraryLimit%"), array("%libraryLimit%" => ($context["libraryLimit"] ?? null), ));
            // line 267
            echo "                    ";
        } else {
            // line 268
            echo "                        ";
            echo __("Library Usage");
            // line 269
            echo "                    ";
        }
        // line 270
        echo "                    <div class=\"clearfix\"></div>
                </div>
                <div class=\"widget-body medium no-padding\">
                    <canvas id=\"libraryChart\" style=\"clear:both;\" width=\"350\" height=\"220\"></canvas>
                </div>
            </div>
        </div>
    </div>
\t
";
    }

    // line 281
    public function block_javaScript($context, array $blocks = array())
    {
        // line 282
        echo "    <script type=\"text/javascript\">
        // Create our chart
        var bandwidthChart = new Chart(\$(\"#bandwidthChart\"), {
            type: \"bar\",
            data: ";
        // line 286
        echo ($context["bandwidthWidget"] ?? null);
        echo ",
            options: {
                scales: {
                    xAxes: [{
                        stacked: ";
        // line 290
        if (($context["xmdsLimit"] ?? null)) {
            echo "true";
        } else {
            echo "false";
        }
        // line 291
        echo "                    }],
                    yAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: \"";
        // line 295
        echo twig_escape_filter($this->env, ($context["bandwidthSuffix"] ?? null), "html", null, true);
        echo "\",
                        },
                        stacked: ";
        // line 297
        if (($context["xmdsLimit"] ?? null)) {
            echo "true";
        } else {
            echo "false";
        }
        // line 298
        echo "                    }]
                },
                legend: {
                    display: false
                },
                maintainAspectRatio: false,
            }
        });
\t\t
        var libraryData = ";
        // line 307
        echo ($context["libraryWidgetData"] ?? null);
        echo ";
        var colours = new Array();
        for(var i = 0; i < libraryData.length; i++) {
            colours.push(\$c.rand());
        }
        var libraryChart = new Chart(\$(\"#libraryChart\"), {
            type: 'pie',
            data: {
                datasets: [{
                    data: libraryData,
                    backgroundColor: colours
                }],
                labels: ";
        // line 319
        echo ($context["libraryWidgetLabels"] ?? null);
        echo "
            },
            options: {
                maintainAspectRatio: false
            }
        });
        \$(\".article_date\").each(function(index, element) {
            if(\$(\".article_date\").length > 1){
                // Replace the ISO date with a nice formatted date \"for humans\"
                \$(this).html(moment(\$(this).html(), systemDateFormat).fromNow());
            }
        });
        var table = \$(\"#displays\").DataTable({
            \"language\": dataTablesLanguage,
            serverSide: true,
            stateSave: true,
            stateDuration: 0,
            stateLoadCallback: function (settings, callback) {
                var data = {};
                \$.ajax({
                    type: \"GET\",
                    async: false,
                    url: \"";
        // line 341
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("user.pref"), "html", null, true);
        echo "?preference=statusDashboardDisplays\",
                    dataType: 'json',
                    success: function (json) {
                        try {
                            if (json.success) {
                                data = JSON.parse(json.data.value);
                            }
                        } catch (e) {
                            // Do nothing
                        }
                    }
                });
                return data;
            },
            stateSaveCallback: function (settings, data) {
                \$.ajax({
                    type: \"POST\",
                    url: \"";
        // line 358
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("user.pref"), "html", null, true);
        echo "\",
                    data: {
                        preference: [{
                            option: \"statusDashboardDisplays\",
                            value: JSON.stringify(data)
                        }]
                    }
                });
            },
            filter: false,
            searchDelay: 3000,
            order: [[0, \"asc\"]],
            ajax: {
                \"url\": \"";
        // line 371
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("statusdashboard.displays"), "html", null, true);
        echo "\",
                \"data\": function (dataToSend) {
                    //make a new object so as not to destroy the input.
                    var data = {};
                    data.draw = dataToSend.draw;
                    data.length = dataToSend.length;
                    data.start = dataToSend.start;
                    data.order = dataToSend.order;
                    data.columns = [];
                    \$.each(dataToSend.columns, function (index, e) {
                        var col = {};
                        col.data = e.data;
                        if (e.name != null && e.name !== \"\")
                            col.name = e.name;
                        data.columns.push(col);
                    });
                    \$.extend(data, \$(\"#displays\").closest(\".XiboGrid\").find(\".FilterDiv form\").serializeObject());
                    return data;
                }
            },
            createdRow: function (row, data, index) {
                if (data.mediaInventoryStatus === 1) {
                    \$(row).addClass('success');
                } else if (data.mediaInventoryStatus === 1) {
                    \$(row).addClass('danger');
                } else {
                    \$(row).addClass('warning');
                }
            },
            lengthChange: false,
            \"columns\": [
                {\"data\": \"display\"},
                {\"data\": \"loggedIn\", \"render\": dataTableTickCrossColumn},
                {\"data\": \"licensed\", \"render\": dataTableTickCrossColumn}
            ]
        });
        table.on('processing.dt', dataTableProcessing);
\t\t\t\ttable.on('draw', function(e, settings) {
\t\t\t\t    var \$displaysComment = \$(\".displays-comment\");
            var total = table.page.info().recordsTotal;
            \$(\".displays-count\").html(total);
            \$displaysComment.html((total > 0) ? \$displaysComment.data().titlePlural : \$displaysComment.data().title)
\t\t\t\t});
    </script>
";
    }

    public function getTemplateName()
    {
        return "dashboard-status-page.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  606 => 371,  590 => 358,  570 => 341,  545 => 319,  530 => 307,  519 => 298,  513 => 297,  508 => 295,  502 => 291,  496 => 290,  489 => 286,  483 => 282,  480 => 281,  467 => 270,  464 => 269,  461 => 268,  458 => 267,  455 => 266,  453 => 265,  440 => 254,  432 => 252,  429 => 251,  426 => 250,  423 => 249,  420 => 248,  417 => 247,  415 => 246,  394 => 227,  375 => 222,  369 => 219,  361 => 216,  357 => 214,  340 => 213,  332 => 208,  328 => 207,  324 => 206,  315 => 199,  313 => 198,  295 => 183,  291 => 182,  287 => 181,  278 => 174,  276 => 173,  258 => 158,  254 => 157,  237 => 143,  233 => 142,  212 => 124,  208 => 123,  190 => 108,  186 => 107,  169 => 93,  165 => 92,  147 => 77,  143 => 76,  124 => 59,  119 => 57,  114 => 56,  108 => 54,  106 => 53,  86 => 40,  82 => 39,  66 => 26,  62 => 25,  47 => 12,  43 => 11,  32 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"authed.twig\" %} {% import \"inline.twig\" as inline %} {% block pageContent %}
    <div class=\"row\">
        <div class=\"col-lg-3 col-md-6 col-xs-12\">
            <div class=\"widget\">
                <div class=\"widget-body\">
                    <div class=\"widget-icon orange pull-left\">
                        <i class=\"fa fa-desktop\"></i>
                    </div>
                    <div class=\"widget-content pull-left\">
                        <div class=\"title displays-count\">0</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"comment displays-comment\" data-title=\"{% trans \"Total Display\" %}\" data-title-plural=\"{% trans \"Total Displays\" 
%}\"></div>
                    </div>
                    <div class=\"clearfix\"></div>
                </div>
            </div>
        </div>
        <div class=\"col-lg-3 col-md-6 col-xs-12\">
            <div class=\"widget\">
                <div class=\"widget-body\">
                    <div class=\"widget-icon red pull-left\">
                        <i class=\"fa fa-tasks\"></i>
                    </div>
                    <div class=\"widget-content pull-left\">
                        <div class=\"title\">{{ librarySize }}</div>
                        <div class=\"comment\">{% trans \"Library Size\" %}</div>
                    </div>
                    <div class=\"clearfix\"></div>
                </div>
            </div>
        </div>
        <div class=\"col-lg-3 col-md-6 col-xs-12\">
            <div class=\"widget\">
                <div class=\"widget-body\">
                    <div class=\"widget-icon green pull-left\">
                        <i class=\"fa fa-users\"></i>
                    </div>
                    <div class=\"widget-content pull-left\">
                        <div class=\"title\">{{ countUsers }}</div>
                        <div class=\"comment\">{% if countUsers == 1 %}{% trans \"User\" %}{% else %}{% trans \"Users\" %}{% endif %}</div>
                    </div>
                    <div class=\"clearfix\"></div>
                </div>
            </div>
        </div>
        <div class=\"col-lg-3 col-md-6 col-xs-12\">
            <div class=\"widget\">
                <div class=\"widget-body\">
                    <div class=\"widget-icon blue pull-left\">
                        <i class=\"fa fa-cogs\"></i>
                    </div>
                    <div class=\"widget-content pull-left\">
                        {% if embeddedWidget != \"\" %}
                            {{ embeddedWidget|raw }}
                        {% else %}
                            <div class=\"title\">{{ nowShowing }}</div>
                            <div class=\"comment\">{% trans \"Now Showing\" %}</div>
                        {% endif %}
                    </div>
                    <div class=\"clearfix\"></div>
                </div>
            </div>
        </div>
    </div>
\t
\t<div class=\"row\" style=\"border-top:1px solid #ddd; margin:20px 0 30px 0;\"></div>
\t
\t<div class=\"row\">
        <div class=\"col-lg-3 col-md-6 col-xs-12\">
            <div class=\"widget\">
                <div class=\"widget-body\">
                    <div class=\"widget-icon blue pull-left\">
                        <i class=\"fa fa-desktop\"></i>
                    </div>
                    <div class=\"widget-content pull-left\">
                        <div class=\"title\">{{ connectedToday }}</div>
                        <div class=\"comment\">{% trans \"Connected Today\" %}</div>
                    </div>
                    <div class=\"clearfix\"></div>
                </div>
            </div>
        </div>

<!--\t\t
        <div class=\"col-lg-3 col-md-6 col-xs-12\">
            <div class=\"widget\">
                <div class=\"widget-body\">
                    <div class=\"widget-icon green pull-left\">
                        <i class=\"fa fa-desktop\"></i>
                    </div>
                    <div class=\"widget-content pull-left\">
                        <div class=\"title\">{{ activeDisplay }}</div>
                        <div class=\"comment\">{% trans \"Displays up to date\" %}</div>
                    </div>
                    <div class=\"clearfix\"></div>
                </div>
            </div>
        </div>
\t\t
        <div class=\"col-lg-3 col-md-6 col-xs-12\">
            <div class=\"widget\">
                <div class=\"widget-body\">
                    <div class=\"widget-icon orange pull-left\">
                        <i class=\"fa fa-desktop\"></i>
                    </div>
                    <div class=\"widget-content pull-left\">
                        <div class=\"title\">{{ downloadDisplay }}</div>
                        <div class=\"comment\">{% trans \"Download In Progress\" %}</div>
                    </div>
                    <div class=\"clearfix\"></div>
                </div>
            </div>
        </div>
-->
\t\t
        <div class=\"col-lg-3 col-md-6 col-xs-12\">
            <div class=\"widget\">
                <div class=\"widget-body\">
                    <div class=\"widget-icon red pull-left\">
                        <i class=\"fa fa-desktop\"></i>
                    </div>
                    <div class=\"widget-content pull-left\">
                        <div class=\"title\">{{ inactiveDisplay }}</div>
                        <div class=\"comment\">{% trans \"Inactive Displays\" %}</div>
                    </div>
                    <div class=\"clearfix\"></div>
                </div>
            </div>
        </div>
\t</div>
\t
\t<div class=\"row\" style=\"border-top:1px solid #ddd; margin:20px 0 30px 0;\"></div>
\t
\t<div class=\"row\">
        <div class=\"col-lg-3 col-md-6 col-xs-12\">
            <div class=\"widget\">
                <div class=\"widget-body\">
                    <div class=\"widget-icon green pull-left\">
                        <i class=\"fa fa-desktop\"></i>
                    </div>
                    <div class=\"widget-content pull-left\">
                        <div class=\"title\">{{ authDisplays }}</div>
                        <div class=\"comment\">{% trans \"Authorized Displays\" %}</div>
                    </div>
                    <div class=\"clearfix\"></div>
                </div>
            </div>
        </div>
\t\t
        <div class=\"col-lg-3 col-md-6 col-xs-12\">
            <div class=\"widget\">
                <div class=\"widget-body\">
                    <div class=\"widget-icon red pull-left\">
                        <i class=\"fa fa-desktop\"></i>
                    </div>
                    <div class=\"widget-content pull-left\">
                        <div class=\"title\">{{ unauthDisplays }}</div>
                        <div class=\"comment\">{% trans \"Unauthorized Displays\" %}</div>
                    </div>
                    <div class=\"clearfix\"></div>
                </div>
            </div>
        </div>
\t</div>
\t
\t<div class=\"row\" style=\"border-top:1px solid #ddd; margin:20px 0 30px 0;\"></div>
\t
    <div class=\"row\">
        <div class=\"col-lg-6\">
            <div class=\"widget\">
                <div class=\"widget-title\">
                    <i class=\"fa fa-desktop\"></i>
                    {% trans \"Display Activity\" %}
                    <div class=\"clearfix\"></div>
                </div>
                <div class=\"widget-body medium no-padding\">
                    <div class=\"table-responsive\">
                        <table id=\"displays\" class=\"table\">
                            <thead>
                            <tr>
                                <th>{% trans \"Display\" %}</th>
                                <th>{% trans \"Logged In\" %}</th>
                                <th>{% trans \"Authorised\" %}</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
\t\t</div>
\t\t\t
        <div class=\"col-lg-6\">
            <div class=\"widget\">
                <div class=\"widget-title\">
                    <i class=\"fa fa-tasks\"></i>
                    {% trans \"Display Groups\" %}
                    <div class=\"clearfix\"></div>
                </div>
                <div class=\"widget-body medium no-padding\">
                    <div class=\"table-responsive\">
                        <table id=\"displays\" class=\"table\">
                            <thead>
                            <tr>
                                <th>{% trans \"Display Group\" %}</th>
                                <th>{% trans \"Total No. \" %}</th>
\t\t\t\t\t\t\t\t<th>{% trans \"Connected Today \" %}</th>
                            </tr>
                            </thead>
                            <tbody>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t{% for dg in displayGroups %}
\t\t\t\t\t\t\t\t  <tr>
\t\t\t\t\t\t\t\t\t   <td>
\t\t\t\t\t\t\t\t\t\t   {{ dg['DisplayGroupID'] }} - {{ dg['DisplayGroup'] }}
\t\t\t\t\t\t\t\t\t   </td>
\t\t\t\t\t\t\t\t\t   <td>
\t\t\t\t\t\t\t\t\t\t  {{ dgTotalCount[loop.index0] }}
\t\t\t\t\t\t\t\t\t   </td>
\t\t\t\t\t\t\t\t\t   <td>
\t\t\t\t\t\t\t\t\t\t  {{ tc[loop.index0] }}
\t\t\t\t\t\t\t\t\t   </td>
\t\t\t\t\t\t\t\t  </tr>
\t\t\t\t\t\t\t\t  
\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
\t
\t
\t
\t<div class=\"row\" style=\"border-top:1px solid #ddd; margin:20px 0 30px 0;\"></div>
\t
    <div class=\"row\">
        <div class=\"col-lg-6\">
            <div class=\"widget\">
                <div class=\"widget-title\">
                    <i class=\"fa fa-cloud-download\"></i>
                    {% if xmdsLimit != \"\" %}
                        {% trans %}Bandwidth Usage. Limit {{ xmdsLimit }}{% endtrans %}
                    {% else %}
                        {% trans %}Bandwidth Usage ({{ bandwidthSuffix }}){% endtrans %}
                    {% endif %}
                    {% if currentUser.routeViewable(\"/stats\") %}
                    <a class=\"pull-right\" href=\"{{ urlFor(\"stats.view\") }}\">{% trans \"More Statistics\" %}</a>
                    {% endif %}
                    <div class=\"clearfix\"></div>
                </div>
                <div class=\"widget-body medium no-padding\">
                    <canvas id=\"bandwidthChart\" style=\"clear:both;\" height=\"230\"></canvas>
                </div>
            </div>
        </div>
        <div class=\"col-lg-6\">
            <div class=\"widget\">
                <div class=\"widget-title\">
                    <i class=\"fa fa-tasks\"></i>
                    {% if libraryLimitSet != \"\" %}
                        {% trans %}Library Usage. Limit {{ libraryLimit }}{% endtrans %}
                    {% else %}
                        {% trans \"Library Usage\" %}
                    {% endif %}
                    <div class=\"clearfix\"></div>
                </div>
                <div class=\"widget-body medium no-padding\">
                    <canvas id=\"libraryChart\" style=\"clear:both;\" width=\"350\" height=\"220\"></canvas>
                </div>
            </div>
        </div>
    </div>
\t
{% endblock %}
\t
{% block javaScript %}
    <script type=\"text/javascript\">
        // Create our chart
        var bandwidthChart = new Chart(\$(\"#bandwidthChart\"), {
            type: \"bar\",
            data: {{ bandwidthWidget|raw }},
            options: {
                scales: {
                    xAxes: [{
                        stacked: {% if xmdsLimit %}true{% else %}false{% endif %}
                    }],
                    yAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: \"{{ bandwidthSuffix }}\",
                        },
                        stacked: {% if xmdsLimit %}true{% else %}false{% endif %}
                    }]
                },
                legend: {
                    display: false
                },
                maintainAspectRatio: false,
            }
        });
\t\t
        var libraryData = {{ libraryWidgetData|raw }};
        var colours = new Array();
        for(var i = 0; i < libraryData.length; i++) {
            colours.push(\$c.rand());
        }
        var libraryChart = new Chart(\$(\"#libraryChart\"), {
            type: 'pie',
            data: {
                datasets: [{
                    data: libraryData,
                    backgroundColor: colours
                }],
                labels: {{ libraryWidgetLabels|raw }}
            },
            options: {
                maintainAspectRatio: false
            }
        });
        \$(\".article_date\").each(function(index, element) {
            if(\$(\".article_date\").length > 1){
                // Replace the ISO date with a nice formatted date \"for humans\"
                \$(this).html(moment(\$(this).html(), systemDateFormat).fromNow());
            }
        });
        var table = \$(\"#displays\").DataTable({
            \"language\": dataTablesLanguage,
            serverSide: true,
            stateSave: true,
            stateDuration: 0,
            stateLoadCallback: function (settings, callback) {
                var data = {};
                \$.ajax({
                    type: \"GET\",
                    async: false,
                    url: \"{{ urlFor(\"user.pref\") }}?preference=statusDashboardDisplays\",
                    dataType: 'json',
                    success: function (json) {
                        try {
                            if (json.success) {
                                data = JSON.parse(json.data.value);
                            }
                        } catch (e) {
                            // Do nothing
                        }
                    }
                });
                return data;
            },
            stateSaveCallback: function (settings, data) {
                \$.ajax({
                    type: \"POST\",
                    url: \"{{ urlFor(\"user.pref\") }}\",
                    data: {
                        preference: [{
                            option: \"statusDashboardDisplays\",
                            value: JSON.stringify(data)
                        }]
                    }
                });
            },
            filter: false,
            searchDelay: 3000,
            order: [[0, \"asc\"]],
            ajax: {
                \"url\": \"{{ urlFor(\"statusdashboard.displays\") }}\",
                \"data\": function (dataToSend) {
                    //make a new object so as not to destroy the input.
                    var data = {};
                    data.draw = dataToSend.draw;
                    data.length = dataToSend.length;
                    data.start = dataToSend.start;
                    data.order = dataToSend.order;
                    data.columns = [];
                    \$.each(dataToSend.columns, function (index, e) {
                        var col = {};
                        col.data = e.data;
                        if (e.name != null && e.name !== \"\")
                            col.name = e.name;
                        data.columns.push(col);
                    });
                    \$.extend(data, \$(\"#displays\").closest(\".XiboGrid\").find(\".FilterDiv form\").serializeObject());
                    return data;
                }
            },
            createdRow: function (row, data, index) {
                if (data.mediaInventoryStatus === 1) {
                    \$(row).addClass('success');
                } else if (data.mediaInventoryStatus === 1) {
                    \$(row).addClass('danger');
                } else {
                    \$(row).addClass('warning');
                }
            },
            lengthChange: false,
            \"columns\": [
                {\"data\": \"display\"},
                {\"data\": \"loggedIn\", \"render\": dataTableTickCrossColumn},
                {\"data\": \"licensed\", \"render\": dataTableTickCrossColumn}
            ]
        });
        table.on('processing.dt', dataTableProcessing);
\t\t\t\ttable.on('draw', function(e, settings) {
\t\t\t\t    var \$displaysComment = \$(\".displays-comment\");
            var total = table.page.info().recordsTotal;
            \$(\".displays-count\").html(total);
            \$displaysComment.html((total > 0) ? \$displaysComment.data().titlePlural : \$displaysComment.data().title)
\t\t\t\t});
    </script>
{% endblock %}
", "dashboard-status-page.twig", "/opt/lampp/htdocs/UBI/views/dashboard-status-page.twig");
    }
}
