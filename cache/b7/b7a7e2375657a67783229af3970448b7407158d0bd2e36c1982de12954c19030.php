<?php

/* display-page-manage.twig */
class __TwigTemplate_c2663c39c570fc5c1e63f1a0a4f3abd813fca9101ecee4fe8f94f8e173251af6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 9
        $this->parent = $this->loadTemplate("authed.twig", "display-page-manage.twig", 9);
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
        // line 10
        $context["inline"] = $this->loadTemplate("inline.twig", "display-page-manage.twig", 10);
        // line 9
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 13
    public function block_pageContent($context, array $blocks = array())
    {
        // line 14
        echo "    ";
        $context["displayName"] = $this->getAttribute(($context["display"] ?? null), "display", array());
        // line 15
        echo "    ";
        $context["displayLastAccessed"] = $this->getAttribute(($context["display"] ?? null), "lastAccessed", array());
        // line 16
        echo "    ";
        if (($this->getAttribute(($context["display"] ?? null), "loggedIn", array()) == 1)) {
            // line 17
            echo "        ";
            ob_start();
            /* xgettext:no-php-format */            echo strtr(__("Display %displayName% is currently logged-in, seen %timeAgo%."), array("%displayName%" => ($context["displayName"] ?? null), "%timeAgo%" => ($context["timeAgo"] ?? null), ));
            $context["title"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 18
            echo "    ";
        } else {
            // line 19
            echo "        ";
            ob_start();
            /* xgettext:no-php-format */            echo strtr(__("Display %displayName% is not logged in at the moment and last accessed at <span class=\"unixDate\">%displayLastAccessed%</span>"), array("%displayName%" => ($context["displayName"] ?? null), "%displayLastAccessed%" => ($context["displayLastAccessed"] ?? null), ));
            $context["title"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 20
            echo "    ";
        }
        // line 21
        echo "    <h1 class=\"text-center\">";
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo "</h1>
    ";
        // line 22
        if (($this->getAttribute(($context["display"] ?? null), "mediaInventoryStatus", array()) == 3)) {
            // line 23
            echo "    <p class=\"text-center\">";
            echo __("This Display hasn't connected since updates have been made in the CMS. The below information will be updated when it has.");
            echo "</p>
    ";
        }
        // line 25
        echo "    <div class=\"row\">
        <div class=\"col-lg-6\">
            <div class=\"widget\">
                <div class=\"widget-title\">";
        // line 28
        echo __("File Status - Count of Files");
        echo "</div>
                <div class=\"widget-body\">
                    <canvas id=\"downloadedCountPie\" style=\"clear:both; margin-top:25px;\" width=\"230\"></canvas>
                </div>
            </div>
        </div>
        <div class=\"col-lg-6\">
            <div class=\"widget\">
                <div class=\"widget-title\">";
        // line 36
        echo __("File Status - Size of Files");
        echo "</div>
                <div class=\"widget-body\">
                    <canvas id=\"downloadedSizePie\" style=\"clear:both; margin-top:25px;\" width=\"230\"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class=\"row\">
        <div class=\"col-lg-6\">
            <div class=\"widget\">
                <div class=\"widget-title\">
                    <button id=\"refreshLog\" class=\"btn btn-sm pull-right\"><span class=\"fa fa-refresh\"></span></button>
                    ";
        // line 48
        echo __("Errors in the Last 12 hours");
        // line 49
        echo "                </div>
                <div class=\"widget-body medium no-padding\">
                    <table id=\"logs\" class=\"table table-striped\">
                        <thead>
                        <tr>
                            <th>";
        // line 54
        echo __("ID");
        echo "</th>
                            <th>";
        // line 55
        echo __("Date");
        echo "</th>
                            <th>";
        // line 56
        echo __("Message");
        echo "</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class=\"col-lg-6\">
            <div class=\"widget\">
                <div class=\"widget-title\">";
        // line 68
        echo __("Layouts");
        echo "</div>
                <div class=\"widget-body medium no-padding\">
                    <table class=\"table table-striped\">
                        <thead>
                        <tr>
                            <th>";
        // line 73
        echo __("ID");
        echo "</th>
                            <th>";
        // line 74
        echo __("Name");
        echo "</th>
                            <th>";
        // line 75
        echo __("Size");
        echo "</th>
                            <th>";
        // line 76
        echo __("Complete");
        echo "</th>
                            <th>";
        // line 77
        echo __("Downloaded");
        echo "</th>
                        </tr>
                        </thead>
                        <tbody>
                            ";
        // line 81
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["inventory"] ?? null), "layouts", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 82
            echo "                                <tr>
                                    <td>";
            // line 83
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "itemId", array()), "html", null, true);
            echo "</td>
                                    <td>";
            // line 84
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "layout", array()), "html", null, true);
            echo "</td>
                                    <td>";
            // line 85
            echo twig_escape_filter($this->env, $this->env->getExtension('Xibo\Twig\ByteFormatterTwigExtension')->byteFormat($this->getAttribute($context["item"], "size", array())), "html", null, true);
            echo "</td>
                                    <td>
                                        <span class=\"fa ";
            // line 87
            if (($this->getAttribute($context["item"], "complete", array()) == 1)) {
                echo "fa-check";
            } else {
                echo "fa-download";
            }
            echo "\"></span>
                                    </td>
                                    <td>";
            // line 89
            echo twig_escape_filter($this->env, $this->env->getExtension('Xibo\Twig\ByteFormatterTwigExtension')->byteFormat($this->getAttribute($context["item"], "bytesRequested", array())), "html", null, true);
            echo "</td>
                                </tr>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 92
        echo "                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class=\"row\">
        <div class=\"col-lg-6\">
            <div class=\"widget\">
                <div class=\"widget-title\">
                    ";
        // line 102
        echo __("Media");
        // line 103
        echo "                </div>
                <div class=\"widget-body medium no-padding\">
                    <table class=\"table table-striped\">
                        <thead>
                        <tr>
                            <th>";
        // line 108
        echo __("ID");
        echo "</th>
                            <th>";
        // line 109
        echo __("Name");
        echo "</th>
                            <th>";
        // line 110
        echo __("Type");
        echo "</th>
                            <th>";
        // line 111
        echo __("File Name");
        echo "</th>
                            <th>";
        // line 112
        echo __("Size");
        echo "</th>
                            <th>";
        // line 113
        echo __("Complete");
        echo "</th>
                            <th>";
        // line 114
        echo __("Downloaded");
        echo "</th>
                        </tr>
                        </thead>
                        <tbody>
                            ";
        // line 118
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["inventory"] ?? null), "media", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 119
            echo "                                <tr>
                                    <td>";
            // line 120
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "itemId", array()), "html", null, true);
            echo "</td>
                                    <td>";
            // line 121
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
            echo "</td>
                                    <td>";
            // line 122
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "type", array()), "html", null, true);
            echo "</td>
                                    <td>";
            // line 123
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "storedAs", array()), "html", null, true);
            echo "</td>
                                    <td>";
            // line 124
            echo twig_escape_filter($this->env, $this->env->getExtension('Xibo\Twig\ByteFormatterTwigExtension')->byteFormat($this->getAttribute($context["item"], "size", array())), "html", null, true);
            echo "</td>
                                    <td title=\"";
            // line 125
            if (($this->getAttribute($context["item"], "lastUsed", array()) == 0)) {
                echo twig_escape_filter($this->env, ($context["nonceNotUsed"] ?? null), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, ($context["nonceUsed"] ?? null), "html", null, true);
            }
            echo "\">
                                        <span class=\"fa ";
            // line 126
            if (($this->getAttribute($context["item"], "complete", array()) == 1)) {
                echo "fa-check";
            } else {
                echo "fa-download";
            }
            echo "\"></span>
                                    </td>
                                    <td>";
            // line 128
            echo twig_escape_filter($this->env, $this->env->getExtension('Xibo\Twig\ByteFormatterTwigExtension')->byteFormat($this->getAttribute($context["item"], "bytesRequested", array())), "html", null, true);
            echo "</td>
                                </tr>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 131
        echo "                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class=\"col-lg-6\">
            <div class=\"widget\">
                <div class=\"widget-title\">";
        // line 138
        echo __("Widgets");
        echo "</div>
                <div class=\"widget-body medium no-padding\">
                    <table class=\"table table-striped\">
                        <thead>
                        <tr>
                            <th>";
        // line 143
        echo __("ID");
        echo "</th>
                            <th>";
        // line 144
        echo __("Name");
        echo "</th>
                            <th>";
        // line 145
        echo __("Type");
        echo "</th>
                            <th>";
        // line 146
        echo __("Complete");
        echo "</th>
                            <th>";
        // line 147
        echo __("Downloaded");
        echo "</th>
                        </tr>
                        </thead>
                        <tbody>
                            ";
        // line 151
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["inventory"] ?? null), "widgets", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 152
            echo "                                <tr>
                                    <td>";
            // line 153
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "itemId", array()), "html", null, true);
            echo "</td>
                                    <td>";
            // line 154
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "widgetName", array()), "html", null, true);
            echo "</td>
                                    <td>";
            // line 155
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "type", array()), "html", null, true);
            echo "</td>
                                    <td title=\"";
            // line 156
            if (($this->getAttribute($context["item"], "lastUsed", array()) == 0)) {
                echo twig_escape_filter($this->env, ($context["nonceNotUsed"] ?? null), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, ($context["nonceUsed"] ?? null), "html", null, true);
            }
            echo "\">
                                        <span class=\"fa ";
            // line 157
            if (($this->getAttribute($context["item"], "complete", array()) == 1)) {
                echo "fa-check";
            } else {
                echo "fa-download";
            }
            echo "\"></span>
                                    </td>
                                    <td>";
            // line 159
            echo twig_escape_filter($this->env, $this->env->getExtension('Xibo\Twig\ByteFormatterTwigExtension')->byteFormat($this->getAttribute($context["item"], "bytesRequested", array())), "html", null, true);
            echo "</td>
                                </tr>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 162
        echo "                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    ";
        // line 168
        if ($this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/stats"), "method")) {
            // line 169
            echo "    <div class=\"row\">
        <div class=\"col-lg-12\">
            <div class=\"widget\">
                <div class=\"widget-title\">";
            // line 172
            echo __("Bandwidth");
            echo "</div>
                <div class=\"widget-body\">
                    <div class=\"XiboGrid\" id=\"";
            // line 174
            echo twig_escape_filter($this->env, twig_random($this->env), "html", null, true);
            echo "\">
                        <div class=\"XiboFilter\">
                            <div class=\"FilterDiv\" id=\"bandwidthFilter\">
                                <form class=\"form-inline\">
                                    ";
            // line 178
            echo $context["inline"]->getdate("fromDt", "From Date", $this->getAttribute(($context["defaults"] ?? null), "fromDate", array()), "", "", "", "");
            echo "
                                    ";
            // line 179
            echo $context["inline"]->getdate("toDt", "To Date", $this->getAttribute(($context["defaults"] ?? null), "toDate", array()), "", "", "", "");
            echo "
                                    ";
            // line 180
            echo $context["inline"]->gethidden("displayId", $this->getAttribute(($context["display"] ?? null), "displayId", array()));
            echo "
                                </form>
                            </div>
                        </div>
                        <div class=\"XiboData\">
                            <canvas id=\"bandwidthChart\" style=\"clear:both; margin-top:25px;\" height=\"330\"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    ";
        }
    }

    // line 195
    public function block_javaScript($context, array $blocks = array())
    {
        // line 196
        echo "    <script type=\"text/javascript\">

        \$(document).ready(function() {
            var table = \$(\"#logs\").DataTable({
                \"language\": dataTablesLanguage,
                serverSide: true, stateSave: true, stateDuration: 0,
                filter: false,
                searchDelay: 3000,
                \"order\": [[0, \"desc\"]],
                ajax: {
                    url: \"";
        // line 206
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("log.search"), "html", null, true);
        echo "?";
        echo ($context["errorSearch"] ?? null);
        echo "\",
                },
                \"columns\": [
                    {\"data\": \"logId\"},
                    {\"data\": \"logDate\", \"render\": dataTableDateFromIso},
                    {\"data\": \"message\"}
                ]
            });

            table.on('draw', dataTableDraw);
            table.on('processing.dt', dataTableProcessing);

            \$(\"#refreshLog\").click(function () {
                table.ajax.reload();
            });
        });

        var bandwidthChart = null;

        function setBandwidthChart() {
            \$.ajax({
                type: \"get\",
                url: \"";
        // line 228
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("stats.bandwidth.data"), "html", null, true);
        echo "\",
                cache: false,
                dataType: \"json\",
                data: \$(\"#bandwidthFilter\").find(\"form\").serialize(),
                success: function(response) {
                    if (bandwidthChart !== undefined && bandwidthChart !== null) {
                        console.log('Destroying Chart');
                        bandwidthChart.destroy();
                    }

                    if (response.extra.data.length <= 0) {
                        return;
                    }

                    // Create our chart
                    bandwidthChart = new Chart(\$(\"#bandwidthChart\"), {
                        type: \"bar\",
                        data: {
                            labels: response.extra.labels,
                            datasets: [{
                                label: \"";
        // line 248
        echo __("Bandwidth");
        echo "\",
                                backgroundColor: \"rgb(11, 98, 164)\",
                                data: response.extra.data
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    scaleLabel: {
                                        display: true,
                                        labelString: response.extra.postUnits,
                                    }
                                }]
                            },
                            legend: {
                                display: false
                            },
                            maintainAspectRatio: false,
                        }
                    });
                }
            });
        }

        \$(document).ready(function() {

            ";
        // line 274
        if ($this->getAttribute(($context["currentUser"] ?? null), "routeViewable", array(0 => "/stats"), "method")) {
            // line 275
            echo "            setBandwidthChart();

            // Bind to form change
            \$(\"#bandwidthFilter input, #bandwidthFilter select\").change(function() {
                setBandwidthChart();
            });
            ";
        }
        // line 282
        echo "
            // Find all Unix Dates and sort them out
            \$(\"span.unixDate\").each(function() {
                \$(this).html(moment(\$(this).html(), \"X\").format(jsDateFormat));
            });

            // Find all ISO Dates and sort them out
            \$(\"span.isoDate\").each(function() {
                \$(this).html(moment(\$(this).html()).format(jsDateFormat));
            });

            // Handle the Pie chart for download status
            var downloadedCountPie = new Chart(\$(\"#downloadedCountPie\"), {
                type: 'pie',
                data: {
                    datasets: [{
                        data: [";
        // line 298
        echo twig_escape_filter($this->env, $this->getAttribute(($context["status"] ?? null), "countComplete", array()), "html", null, true);
        echo ", ";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["status"] ?? null), "countRemaining", array()), "html", null, true);
        echo "],
                        backgroundColor: [\"#00CC00\", \"#FF0000\"]
                    }],
                    labels: [
                        \"";
        // line 302
        echo __("Downloaded");
        echo "\", \"";
        echo __("Pending");
        echo "\"
                    ]
                }
            });

            var downloadedSizePie = new Chart(\$(\"#downloadedSizePie\"), {
                type: 'pie',
                data: {
                    datasets: [{
                        data: [";
        // line 311
        echo twig_escape_filter($this->env, $this->getAttribute(($context["status"] ?? null), "sizeComplete", array()), "html", null, true);
        echo ", ";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["status"] ?? null), "sizeRemaining", array()), "html", null, true);
        echo "],
                        backgroundColor: [\"#00CC00\", \"#FF0000\"]
                    }],
                    labels: [
                        \"";
        // line 315
        echo __("Downloaded");
        echo "\" + \" ";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["status"] ?? null), "units", array()), "html", null, true);
        echo "\", \"";
        echo __("Pending");
        echo "\" + \" ";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["status"] ?? null), "units", array()), "html", null, true);
        echo "\"
                    ]
                },
            });
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "display-page-manage.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  603 => 315,  594 => 311,  580 => 302,  571 => 298,  553 => 282,  544 => 275,  542 => 274,  513 => 248,  490 => 228,  463 => 206,  451 => 196,  448 => 195,  430 => 180,  426 => 179,  422 => 178,  415 => 174,  410 => 172,  405 => 169,  403 => 168,  395 => 162,  386 => 159,  377 => 157,  369 => 156,  365 => 155,  361 => 154,  357 => 153,  354 => 152,  350 => 151,  343 => 147,  339 => 146,  335 => 145,  331 => 144,  327 => 143,  319 => 138,  310 => 131,  301 => 128,  292 => 126,  284 => 125,  280 => 124,  276 => 123,  272 => 122,  268 => 121,  264 => 120,  261 => 119,  257 => 118,  250 => 114,  246 => 113,  242 => 112,  238 => 111,  234 => 110,  230 => 109,  226 => 108,  219 => 103,  217 => 102,  205 => 92,  196 => 89,  187 => 87,  182 => 85,  178 => 84,  174 => 83,  171 => 82,  167 => 81,  160 => 77,  156 => 76,  152 => 75,  148 => 74,  144 => 73,  136 => 68,  121 => 56,  117 => 55,  113 => 54,  106 => 49,  104 => 48,  89 => 36,  78 => 28,  73 => 25,  67 => 23,  65 => 22,  60 => 21,  57 => 20,  52 => 19,  49 => 18,  44 => 17,  41 => 16,  38 => 15,  35 => 14,  32 => 13,  28 => 9,  26 => 10,  11 => 9,);
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
{% extends \"authed.twig\" %}
{% import \"inline.twig\" as inline %}


{% block pageContent %}
    {% set displayName = display.display %}
    {% set displayLastAccessed = display.lastAccessed %}
    {% if display.loggedIn == 1 %}
        {% set title %}{% trans %}Display {{ displayName }} is currently logged-in, seen {{ timeAgo }}.{% endtrans %}{% endset %}
    {% else %}
        {% set title %}{% trans %}Display {{ displayName }} is not logged in at the moment and last accessed at <span class=\"unixDate\">{{ displayLastAccessed }}</span>{% endtrans %}{% endset %}
    {% endif %}
    <h1 class=\"text-center\">{{ title }}</h1>
    {% if display.mediaInventoryStatus == 3 %}
    <p class=\"text-center\">{% trans \"This Display hasn't connected since updates have been made in the CMS. The below information will be updated when it has.\" %}</p>
    {% endif %}
    <div class=\"row\">
        <div class=\"col-lg-6\">
            <div class=\"widget\">
                <div class=\"widget-title\">{% trans \"File Status - Count of Files\" %}</div>
                <div class=\"widget-body\">
                    <canvas id=\"downloadedCountPie\" style=\"clear:both; margin-top:25px;\" width=\"230\"></canvas>
                </div>
            </div>
        </div>
        <div class=\"col-lg-6\">
            <div class=\"widget\">
                <div class=\"widget-title\">{% trans \"File Status - Size of Files\" %}</div>
                <div class=\"widget-body\">
                    <canvas id=\"downloadedSizePie\" style=\"clear:both; margin-top:25px;\" width=\"230\"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class=\"row\">
        <div class=\"col-lg-6\">
            <div class=\"widget\">
                <div class=\"widget-title\">
                    <button id=\"refreshLog\" class=\"btn btn-sm pull-right\"><span class=\"fa fa-refresh\"></span></button>
                    {% trans \"Errors in the Last 12 hours\" %}
                </div>
                <div class=\"widget-body medium no-padding\">
                    <table id=\"logs\" class=\"table table-striped\">
                        <thead>
                        <tr>
                            <th>{% trans \"ID\" %}</th>
                            <th>{% trans \"Date\" %}</th>
                            <th>{% trans \"Message\" %}</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class=\"col-lg-6\">
            <div class=\"widget\">
                <div class=\"widget-title\">{% trans \"Layouts\" %}</div>
                <div class=\"widget-body medium no-padding\">
                    <table class=\"table table-striped\">
                        <thead>
                        <tr>
                            <th>{% trans \"ID\" %}</th>
                            <th>{% trans \"Name\" %}</th>
                            <th>{% trans \"Size\" %}</th>
                            <th>{% trans \"Complete\" %}</th>
                            <th>{% trans \"Downloaded\" %}</th>
                        </tr>
                        </thead>
                        <tbody>
                            {% for item in inventory.layouts %}
                                <tr>
                                    <td>{{ item.itemId }}</td>
                                    <td>{{ item.layout }}</td>
                                    <td>{{ item.size|byteFormat }}</td>
                                    <td>
                                        <span class=\"fa {% if item.complete == 1 %}fa-check{% else %}fa-download{% endif %}\"></span>
                                    </td>
                                    <td>{{ item.bytesRequested|byteFormat }}</td>
                                </tr>
                            {% endfor %}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class=\"row\">
        <div class=\"col-lg-6\">
            <div class=\"widget\">
                <div class=\"widget-title\">
                    {% trans \"Media\" %}
                </div>
                <div class=\"widget-body medium no-padding\">
                    <table class=\"table table-striped\">
                        <thead>
                        <tr>
                            <th>{% trans \"ID\" %}</th>
                            <th>{% trans \"Name\" %}</th>
                            <th>{% trans \"Type\" %}</th>
                            <th>{% trans \"File Name\" %}</th>
                            <th>{% trans \"Size\" %}</th>
                            <th>{% trans \"Complete\" %}</th>
                            <th>{% trans \"Downloaded\" %}</th>
                        </tr>
                        </thead>
                        <tbody>
                            {% for item in inventory.media %}
                                <tr>
                                    <td>{{ item.itemId }}</td>
                                    <td>{{ item.name }}</td>
                                    <td>{{ item.type }}</td>
                                    <td>{{ item.storedAs }}</td>
                                    <td>{{ item.size|byteFormat }}</td>
                                    <td title=\"{% if item.lastUsed == 0 %}{{ nonceNotUsed }}{% else %}{{ nonceUsed }}{% endif %}\">
                                        <span class=\"fa {% if item.complete == 1 %}fa-check{% else %}fa-download{% endif %}\"></span>
                                    </td>
                                    <td>{{ item.bytesRequested|byteFormat }}</td>
                                </tr>
                            {% endfor %}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class=\"col-lg-6\">
            <div class=\"widget\">
                <div class=\"widget-title\">{% trans \"Widgets\" %}</div>
                <div class=\"widget-body medium no-padding\">
                    <table class=\"table table-striped\">
                        <thead>
                        <tr>
                            <th>{% trans \"ID\" %}</th>
                            <th>{% trans \"Name\" %}</th>
                            <th>{% trans \"Type\" %}</th>
                            <th>{% trans \"Complete\" %}</th>
                            <th>{% trans \"Downloaded\" %}</th>
                        </tr>
                        </thead>
                        <tbody>
                            {% for item in inventory.widgets %}
                                <tr>
                                    <td>{{ item.itemId }}</td>
                                    <td>{{ item.widgetName }}</td>
                                    <td>{{ item.type }}</td>
                                    <td title=\"{% if item.lastUsed == 0 %}{{ nonceNotUsed }}{% else %}{{ nonceUsed }}{% endif %}\">
                                        <span class=\"fa {% if item.complete == 1 %}fa-check{% else %}fa-download{% endif %}\"></span>
                                    </td>
                                    <td>{{ item.bytesRequested|byteFormat }}</td>
                                </tr>
                            {% endfor %}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {% if currentUser.routeViewable(\"/stats\") %}
    <div class=\"row\">
        <div class=\"col-lg-12\">
            <div class=\"widget\">
                <div class=\"widget-title\">{% trans \"Bandwidth\" %}</div>
                <div class=\"widget-body\">
                    <div class=\"XiboGrid\" id=\"{{ random() }}\">
                        <div class=\"XiboFilter\">
                            <div class=\"FilterDiv\" id=\"bandwidthFilter\">
                                <form class=\"form-inline\">
                                    {{ inline.date(\"fromDt\", \"From Date\", defaults.fromDate, \"\", \"\", \"\", \"\") }}
                                    {{ inline.date(\"toDt\", \"To Date\", defaults.toDate, \"\", \"\", \"\", \"\") }}
                                    {{ inline.hidden(\"displayId\", display.displayId) }}
                                </form>
                            </div>
                        </div>
                        <div class=\"XiboData\">
                            <canvas id=\"bandwidthChart\" style=\"clear:both; margin-top:25px;\" height=\"330\"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {% endif %}
{% endblock %}

{% block javaScript %}
    <script type=\"text/javascript\">

        \$(document).ready(function() {
            var table = \$(\"#logs\").DataTable({
                \"language\": dataTablesLanguage,
                serverSide: true, stateSave: true, stateDuration: 0,
                filter: false,
                searchDelay: 3000,
                \"order\": [[0, \"desc\"]],
                ajax: {
                    url: \"{{ urlFor(\"log.search\") }}?{{ errorSearch|raw }}\",
                },
                \"columns\": [
                    {\"data\": \"logId\"},
                    {\"data\": \"logDate\", \"render\": dataTableDateFromIso},
                    {\"data\": \"message\"}
                ]
            });

            table.on('draw', dataTableDraw);
            table.on('processing.dt', dataTableProcessing);

            \$(\"#refreshLog\").click(function () {
                table.ajax.reload();
            });
        });

        var bandwidthChart = null;

        function setBandwidthChart() {
            \$.ajax({
                type: \"get\",
                url: \"{{ urlFor(\"stats.bandwidth.data\") }}\",
                cache: false,
                dataType: \"json\",
                data: \$(\"#bandwidthFilter\").find(\"form\").serialize(),
                success: function(response) {
                    if (bandwidthChart !== undefined && bandwidthChart !== null) {
                        console.log('Destroying Chart');
                        bandwidthChart.destroy();
                    }

                    if (response.extra.data.length <= 0) {
                        return;
                    }

                    // Create our chart
                    bandwidthChart = new Chart(\$(\"#bandwidthChart\"), {
                        type: \"bar\",
                        data: {
                            labels: response.extra.labels,
                            datasets: [{
                                label: \"{% trans \"Bandwidth\" %}\",
                                backgroundColor: \"rgb(11, 98, 164)\",
                                data: response.extra.data
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    scaleLabel: {
                                        display: true,
                                        labelString: response.extra.postUnits,
                                    }
                                }]
                            },
                            legend: {
                                display: false
                            },
                            maintainAspectRatio: false,
                        }
                    });
                }
            });
        }

        \$(document).ready(function() {

            {% if currentUser.routeViewable(\"/stats\") %}
            setBandwidthChart();

            // Bind to form change
            \$(\"#bandwidthFilter input, #bandwidthFilter select\").change(function() {
                setBandwidthChart();
            });
            {% endif %}

            // Find all Unix Dates and sort them out
            \$(\"span.unixDate\").each(function() {
                \$(this).html(moment(\$(this).html(), \"X\").format(jsDateFormat));
            });

            // Find all ISO Dates and sort them out
            \$(\"span.isoDate\").each(function() {
                \$(this).html(moment(\$(this).html()).format(jsDateFormat));
            });

            // Handle the Pie chart for download status
            var downloadedCountPie = new Chart(\$(\"#downloadedCountPie\"), {
                type: 'pie',
                data: {
                    datasets: [{
                        data: [{{ status.countComplete }}, {{ status.countRemaining }}],
                        backgroundColor: [\"#00CC00\", \"#FF0000\"]
                    }],
                    labels: [
                        \"{% trans \"Downloaded\" %}\", \"{% trans \"Pending\" %}\"
                    ]
                }
            });

            var downloadedSizePie = new Chart(\$(\"#downloadedSizePie\"), {
                type: 'pie',
                data: {
                    datasets: [{
                        data: [{{ status.sizeComplete }}, {{ status.sizeRemaining }}],
                        backgroundColor: [\"#00CC00\", \"#FF0000\"]
                    }],
                    labels: [
                        \"{% trans \"Downloaded\" %}\" + \" {{ status.units }}\", \"{% trans \"Pending\" %}\" + \" {{ status.units }}\"
                    ]
                },
            });
        });
    </script>
{% endblock %}", "display-page-manage.twig", "/opt/lampp/htdocs/UBI/views/display-page-manage.twig");
    }
}
