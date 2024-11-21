<?php

/* display-page.twig */
class __TwigTemplate_6dce05ce2a899809d70738460580dff7147fdafaef29e83d543706e9647914aa extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 9
        $this->parent = $this->loadTemplate("authed.twig", "display-page.twig", 9);
        $this->blocks = array(
            'actionMenu' => array($this, 'block_actionMenu'),
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
        $context["inline"] = $this->loadTemplate("inline.twig", "display-page.twig", 10);
        // line 9
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 12
    public function block_actionMenu($context, array $blocks = array())
    {
        // line 13
        echo "    <ul class=\"nav nav-pills pull-right\">
        <li class=\"btn btn-success btn-xs\"><a class=\"btns\" id=\"refreshGrid\" title=\"";
        // line 14
        echo __("Refresh the Table");
        echo "\" href=\"#\"><i class=\"fa fa-refresh\" aria-hidden=\"true\"></i> ";
        echo __("Refresh");
        echo "</a></li>
    </ul>
";
    }

    // line 18
    public function block_pageContent($context, array $blocks = array())
    {
        // line 19
        echo "    <div class=\"widget\">
        <div class=\"widget-title\">";
        // line 20
        echo __("Displays");
        echo "</div>
        <div class=\"widget-body\">
            <div class=\"XiboGrid\" id=\"";
        // line 22
        echo twig_escape_filter($this->env, twig_random($this->env), "html", null, true);
        echo "\" data-grid-name=\"displayView\">
                <div class=\"XiboFilter well\">
                    <div class=\"FilterDiv\" id=\"Filter\">
                        <form class=\"form-inline\">

                            ";
        // line 27
        ob_start();
        echo __("Name");
        $context["title"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 28
        echo "                            ";
        echo $context["inline"]->getinput("display", ($context["title"] ?? null));
        echo "

                            ";
        // line 30
        ob_start();
        echo __("Mac Address");
        $context["title"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 31
        echo "                            ";
        echo $context["inline"]->getinput("macAddress", ($context["title"] ?? null));
        echo "

                            ";
        // line 33
        ob_start();
        echo __("Display Group");
        $context["title"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 34
        echo "                            ";
        echo $context["inline"]->getdropdown("displayGroupId", "single", ($context["title"] ?? null), "", twig_array_merge(array(0 => array("displayGroupId" => null, "displayGroup" => "")), ($context["displayGroups"] ?? null)), "displayGroupId", "displayGroup");
        echo "

                            ";
        // line 36
        ob_start();
        echo __("Display Profile");
        $context["title"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 37
        echo "                            ";
        echo $context["inline"]->getdropdown("displayProfileId", "single", ($context["title"] ?? null), "", twig_array_merge(array(0 => array("displayProfileId" => null, "name" => "")), ($context["displayProfiles"] ?? null)), "displayProfileId", "name");
        echo "

                            ";
        // line 39
        ob_start();
        echo __("Authorised?");
        $context["title"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 40
        echo "                            ";
        ob_start();
        echo __("Yes");
        $context["yesOption"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 41
        echo "                            ";
        ob_start();
        echo __("No");
        $context["noOption"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 42
        echo "                            ";
        $context["options"] = array(0 => array("optionid" => "", "option" => ""), 1 => array("optionid" => "1", "option" =>         // line 44
($context["yesOption"] ?? null)), 2 => array("optionid" => "0", "option" =>         // line 45
($context["noOption"] ?? null)));
        // line 47
        echo "                            ";
        echo $context["inline"]->getdropdown("authorised", "single", ($context["title"] ?? null), "", ($context["options"] ?? null), "optionid", "option");
        echo "



                            ";
        // line 51
        ob_start();
        echo __("Display Status");
        $context["title"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 52
        echo "                            ";
        ob_start();
        echo __("Active Displays");
        $context["activeOption"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 53
        echo "                            ";
        ob_start();
        echo __("Download in progress");
        $context["downloadOption"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 54
        echo "\t\t\t\t\t\t\t";
        ob_start();
        echo __("Inactive Displays");
        $context["inactiveOption"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 55
        echo "                            ";
        $context["options"] = array(0 => array("optionid" => "", "option" => ""), 1 => array("optionid" => "1", "option" =>         // line 57
($context["activeOption"] ?? null)), 2 => array("optionid" => "2", "option" =>         // line 58
($context["downloadOption"] ?? null)), 3 => array("optionid" => "3", "option" =>         // line 59
($context["inactiveOption"] ?? null)));
        // line 61
        echo "                            ";
        echo $context["inline"]->getdropdown("mediaInventoryStatus", "single", ($context["title"] ?? null), "", ($context["options"] ?? null), "optionid", "option");
        echo "




                            ";
        // line 66
        ob_start();
        echo __("Tags");
        $context["title"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 67
        echo "                            ";
        ob_start();
        echo __("A comma separated list of tags to filter by. Enter --no-tag to see items without tags.");
        $context["helpText"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 68
        echo "                            ";
        echo $context["inline"]->getinputWithTags("tags", ($context["title"] ?? null), null, ($context["helpText"] ?? null));
        echo "

                            ";
        // line 70
        ob_start();
        echo __("IP Address");
        $context["title"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 71
        echo "                            ";
        echo $context["inline"]->getinput("clientAddress", ($context["title"] ?? null));
        echo "
                        </form>
                    </div>
                </div>
                <div class=\"XiboData\">
                    <table id=\"displays\" class=\"table table-striped\">
                        <thead>
                            <tr>
                                <th>";
        // line 79
        echo __("ID");
        echo "</th>
                                <th>";
        // line 80
        echo __("Display");
        echo "</th>
                                <th>";
        // line 81
        echo __("Status");
        echo "</th>
                                <th>";
        // line 82
        echo __("Authorised?");
        echo "</th>
                                <th>";
        // line 83
        echo __("Current Layout");
        echo "</th>
                                <th>";
        // line 84
        echo __("Storage Available");
        echo "</th>
                                <th>";
        // line 85
        echo __("Storage Total");
        echo "</th>
                                <th>";
        // line 86
        echo __("Storage Free %");
        echo "</th>
                                <th>";
        // line 87
        echo __("Description");
        echo "</th>
                                <th>";
        // line 88
        echo __("Tags");
        echo "</th>
                                <th>";
        // line 89
        echo __("Default Layout");
        echo "</th>
                                <th>";
        // line 90
        echo __("Interleave Default");
        echo "</th>
                                <th>";
        // line 91
        echo __("Email Alert");
        echo "</th>
                                <th>";
        // line 92
        echo __("Logged In");
        echo "</th>
                                <th>";
        // line 93
        echo __("Last Accessed");
        echo "</th>
                                <th>";
        // line 94
        echo __("Display Profile");
        echo "</th>
                                <th>";
        // line 95
        echo __("Version");
        echo "</th>
                                <th>";
        // line 96
        echo __("Device Name");
        echo "</th>
                                <th>";
        // line 97
        echo __("IP Address");
        echo "</th>
                                <th>";
        // line 98
        echo __("Mac Address");
        echo "</th>
                                <th>";
        // line 99
        echo __("Timezone");
        echo "</th>
                                <th>";
        // line 100
        echo __("Screen shot?");
        echo "</th>
                                <th>";
        // line 101
        echo __("Thumbnail");
        echo "</th>
                                <th>";
        // line 102
        echo __("Last Command");
        echo "</th>
                                <th>";
        // line 103
        echo __("XMR Registered");
        echo "</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
";
    }

    // line 117
    public function block_javaScript($context, array $blocks = array())
    {
        // line 118
        echo "    <script type=\"text/javascript\">
        \$(document).ready(function() {
            var table = \$(\"#displays\").DataTable({
                \"language\": dataTablesLanguage,
                serverSide: true,
                stateSave: true, stateDuration: 0,
                stateLoadCallback: function (settings, callback) {
                    var data = {};
                    \$.ajax({
                        type: \"GET\",
                        async: false,
                        url: \"";
        // line 129
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("user.pref"), "html", null, true);
        echo "?preference=displayGrid\",
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
        // line 146
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("user.pref"), "html", null, true);
        echo "\",
                        data: {
                            preference: [{
                                option: \"displayGrid\",
                                value: JSON.stringify(data)
                            }]
                        }
                    });
                },
                filter: false,
                searchDelay: 3000,
                order: [[1, \"asc\"]],
                ajax: {
                    \"url\": \"";
        // line 159
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("display.search"), "html", null, true);
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
                            if (e.name != null && e.name != \"\")
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
                \"columns\": [
                    {\"data\": \"displayId\"},
                    {
                        \"name\": \"display\",
                        \"data\": function (data, type) {
                            if (type != \"display\")
                                return data.display;

                            if (\"";
        // line 199
        echo twig_escape_filter($this->env, $this->getAttribute(($context["settings"] ?? null), "SHOW_DISPLAY_AS_VNCLINK", array()), "html", null, true);
        echo "\" != \"\" && data.clientAddress != null && data.clientAddress != \"\") {
                                var link = \"";
        // line 200
        echo twig_escape_filter($this->env, $this->getAttribute(($context["settings"] ?? null), "SHOW_DISPLAY_AS_VNCLINK", array()), "html", null, true);
        echo "\".replace('%s', data.clientAddress);
                                return '<a href=\"' + link + '\" title=\"";
        // line 201
        echo __("VNC to this Display");
        echo "\" target=\"";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["settings"] ?? null), "SHOW_DISPLAY_AS_VNC_TGT", array()), "html", null, true);
        echo "\">' + data.display + '</a>';
                            }
                            else {
                                return data.display;
                            }
                        }
                    },
                    {
                        \"data\": \"mediaInventoryStatus\",
                        \"render\": function (data, type, row) {
                            if (type != \"display\")
                                return data;

                            var icon = \"\";
                            if (data == 1)
                                icon = \"fa-check\";
                            else if (data == 2)
                                icon = \"fa-times\";
                            else
                                icon = \"fa-cloud-download\";

                            return \"<span class='fa \" + icon + \"'></span>\";
                        }
                    },
                    {\"data\": \"licensed\", \"render\": dataTableTickCrossColumn},
                    {\"data\": \"currentLayout\", \"visible\": false, \"sortable\": false},
                    {
                        \"data\": \"storageAvailableSpace\",
                        \"visible\": false,
                        \"render\": function (data, type, row) {
                            if (type != \"display\")
                                return data;

                            return row.storageAvailableSpaceFormatted;
                        }
                    },
                    {
                        \"data\": \"storageTotalSpace\",
                        \"visible\": false,
                        \"render\": function (data, type, row) {
                            if (type != \"display\")
                                return data;

                            return row.storageTotalSpaceFormatted;
                        }
                    },
                    {\"data\": \"storagePercentage\", \"visible\": false, \"sortable\": false},
                    {\"data\": \"description\", \"visible\": false},
                    {
                        \"name\": \"tags\",
                        \"sortable\": false,
                        \"visible\": false,
                        \"data\": dataTableCreateTags
                    },
                    {\"data\": \"defaultLayout\", \"visible\": false},
                    {\"data\": \"incSchedule\", \"render\": dataTableTickCrossColumn, \"visible\": false},
                    {\"data\": \"emailAlert\", \"render\": dataTableTickCrossColumn, \"visible\": false},
                    {\"data\": \"loggedIn\", \"render\": dataTableTickCrossColumn},
                    {\"data\": \"lastAccessed\", \"render\": dataTableDateFromUnix},
                    {
                        \"name\": \"displayProfileId\",
                        \"data\": function (data, type) {
                            return data.displayProfile;
                        },
                        \"visible\": false
                    },
                    {
                        \"name\": \"clientSort\",
                        \"data\": function (data) {
                            return data.clientType + ' ' + data.clientVersion + '-' + data.clientCode;
                        },
                        \"visible\": false
                    },
                    {\"data\": \"deviceName\", \"visible\": false},
                    {\"data\": \"clientAddress\", \"visible\": false},
                    {\"data\": \"macAddress\"},
                    {\"data\": \"timeZone\", \"visible\": false},
                    {\"data\": \"screenShotRequested\", \"render\": dataTableTickCrossColumn, \"visible\": false},
                    {
                        \"orderable\": false,
                        \"data\": function (data, type) {
                            if (type != \"display\")
                                return data.thumbnail;

                            if (data.thumbnail != \"\") {
                                return '<a data-toggle=\"lightbox\" data-type=\"image\" href=\"' + data.thumbnail + '\"><img class=\"display-screenshot\" src=\"' + data.thumbnail + '\" /></a>';
                            }
                            else {
                                return \"\";
                            }
                        },
                        \"visible\": false
                    },
                    {
                        \"data\": \"lastCommandSuccess\",
                        \"render\": function (data, type, row) {
                            if (type != \"display\")
                                return data;

                            var icon = \"\";
                            if (data == 1)
                                icon = \"fa-check\";
                            else if (data == 0)
                                icon = \"fa-times\";
                            else
                                icon = \"fa-question\";

                            return \"<span class='fa \" + icon + \"'></span>\";
                        },
                        \"visible\": false
                    },
                    {
                        \"data\": \"xmrChannel\",
                        \"render\": function (data, type, row) {
                            if (type === \"export\") {
                                return (data !== null && data !== \"\") ? 1 : 0;
                            }

                            if (type != \"display\")
                                return data;

                            var icon = \"\";
                            if (data != null && data != \"\")
                                icon = \"fa-check\";
                            else
                                icon = \"fa-times\";

                            return \"<span class='fa \" + icon + \"'></span>\";
                        },
                        \"visible\": false
                    },
                    {
                        \"orderable\": false,
                        \"data\": dataTableButtonsColumn
                    }
                ]
            });

            table.on('draw', dataTableDraw);
            table.on('draw', { form: \$(\"#displays\").closest(\".XiboGrid\").find(\".FilterDiv form\") }, dataTableCreateTagEvents);
            table.on('processing.dt', dataTableProcessing);
            dataTableAddButtons(table, \$('#displays_wrapper').find('.col-sm-6').eq(1));

            \$(\"#refreshGrid\").click(function () {
                table.ajax.reload();
            });

            var list = \$(\".dataTables_length select\");
            list.append(new Option(\"500\", 500));
            list.append(new Option(\"2500\", 2500));
            list.append(new Option(\"5000\", 5000));
            //list.append(new Option(\"6500\", 6500);

        });

        function setDefaultMultiSelectFormOpen(dialog) {
            console.log('Multi-select form opened for default layout');

            // Inject a list of layouts into the form, in a drop down.
            var \$select = \$('<select name=\"layoutId\" class=\"form-control\" data-search-url=\"";
        // line 360
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("layout.search"), "html", null, true);
        echo "\" data-search-term=\"layout\" data-id-property=\"layoutId\" data-text-property=\"layout\">');
            \$select.on('change', function() {
                console.log('Setting commit data to ' + \$(this).val());
                dialog.data().commitData = {layoutId: \$(this).val()};
            });

            // Add the list to the body.
            \$(dialog).find('.modal-body').append(\$select);

            makePagedSelect(\$select, dialog);
        }
    </script>
";
    }

    public function getTemplateName()
    {
        return "display-page.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  579 => 360,  415 => 201,  411 => 200,  407 => 199,  364 => 159,  348 => 146,  328 => 129,  315 => 118,  312 => 117,  295 => 103,  291 => 102,  287 => 101,  283 => 100,  279 => 99,  275 => 98,  271 => 97,  267 => 96,  263 => 95,  259 => 94,  255 => 93,  251 => 92,  247 => 91,  243 => 90,  239 => 89,  235 => 88,  231 => 87,  227 => 86,  223 => 85,  219 => 84,  215 => 83,  211 => 82,  207 => 81,  203 => 80,  199 => 79,  187 => 71,  183 => 70,  177 => 68,  172 => 67,  168 => 66,  159 => 61,  157 => 59,  156 => 58,  155 => 57,  153 => 55,  148 => 54,  143 => 53,  138 => 52,  134 => 51,  126 => 47,  124 => 45,  123 => 44,  121 => 42,  116 => 41,  111 => 40,  107 => 39,  101 => 37,  97 => 36,  91 => 34,  87 => 33,  81 => 31,  77 => 30,  71 => 28,  67 => 27,  59 => 22,  54 => 20,  51 => 19,  48 => 18,  39 => 14,  36 => 13,  33 => 12,  29 => 9,  27 => 10,  11 => 9,);
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

{% block actionMenu %}
    <ul class=\"nav nav-pills pull-right\">
        <li class=\"btn btn-success btn-xs\"><a class=\"btns\" id=\"refreshGrid\" title=\"{% trans \"Refresh the Table\" %}\" href=\"#\"><i class=\"fa fa-refresh\" aria-hidden=\"true\"></i> {% trans \"Refresh\" %}</a></li>
    </ul>
{% endblock %}

{% block pageContent %}
    <div class=\"widget\">
        <div class=\"widget-title\">{% trans \"Displays\" %}</div>
        <div class=\"widget-body\">
            <div class=\"XiboGrid\" id=\"{{ random() }}\" data-grid-name=\"displayView\">
                <div class=\"XiboFilter well\">
                    <div class=\"FilterDiv\" id=\"Filter\">
                        <form class=\"form-inline\">

                            {% set title %}{% trans \"Name\" %}{% endset %}
                            {{ inline.input(\"display\", title) }}

                            {% set title %}{% trans \"Mac Address\" %}{% endset %}
                            {{ inline.input(\"macAddress\", title) }}

                            {% set title %}{% trans \"Display Group\" %}{% endset %}
                            {{ inline.dropdown(\"displayGroupId\", \"single\", title, \"\", [{displayGroupId:null, displayGroup:\"\"}]|merge(displayGroups), \"displayGroupId\", \"displayGroup\") }}

                            {% set title %}{% trans \"Display Profile\" %}{% endset %}
                            {{ inline.dropdown(\"displayProfileId\", \"single\", title, \"\", [{displayProfileId:null, name:\"\"}]|merge(displayProfiles), \"displayProfileId\", \"name\") }}

                            {% set title %}{% trans \"Authorised?\" %}{% endset %}
                            {% set yesOption %}{% trans \"Yes\" %}{% endset %}
                            {% set noOption %}{% trans \"No\" %}{% endset %}
                            {% set options = [
                            { optionid: \"\", option: \"\" },
                            { optionid: \"1\", option: yesOption },
                            { optionid: \"0\", option: noOption},
                            ] %}
                            {{ inline.dropdown(\"authorised\", \"single\", title, \"\", options, \"optionid\", \"option\") }}



                            {% set title %}{% trans \"Display Status\" %}{% endset %}
                            {% set activeOption %}{% trans \"Active Displays\" %}{% endset %}
                            {% set downloadOption %}{% trans \"Download in progress\" %}{% endset %}
\t\t\t\t\t\t\t{% set inactiveOption %}{% trans \"Inactive Displays\" %}{% endset %}
                            {% set options = [
                            { optionid: \"\", option: \"\" },
                            { optionid: \"1\", option: activeOption },
                            { optionid: \"2\", option: downloadOption},
\t\t\t\t\t\t\t{ optionid: \"3\", option: inactiveOption},
                            ] %}
                            {{ inline.dropdown(\"mediaInventoryStatus\", \"single\", title, \"\", options, \"optionid\", \"option\") }}




                            {% set title %}{% trans \"Tags\" %}{% endset %}
                            {% set helpText %}{% trans \"A comma separated list of tags to filter by. Enter --no-tag to see items without tags.\" %}{% endset %}
                            {{ inline.inputWithTags(\"tags\", title, null, helpText) }}

                            {% set title %}{% trans \"IP Address\" %}{% endset %}
                            {{ inline.input(\"clientAddress\", title) }}
                        </form>
                    </div>
                </div>
                <div class=\"XiboData\">
                    <table id=\"displays\" class=\"table table-striped\">
                        <thead>
                            <tr>
                                <th>{% trans \"ID\" %}</th>
                                <th>{% trans \"Display\" %}</th>
                                <th>{% trans \"Status\" %}</th>
                                <th>{% trans \"Authorised?\" %}</th>
                                <th>{% trans \"Current Layout\" %}</th>
                                <th>{% trans \"Storage Available\" %}</th>
                                <th>{% trans \"Storage Total\" %}</th>
                                <th>{% trans \"Storage Free %\" %}</th>
                                <th>{% trans \"Description\" %}</th>
                                <th>{% trans \"Tags\" %}</th>
                                <th>{% trans \"Default Layout\" %}</th>
                                <th>{% trans \"Interleave Default\" %}</th>
                                <th>{% trans \"Email Alert\" %}</th>
                                <th>{% trans \"Logged In\" %}</th>
                                <th>{% trans \"Last Accessed\" %}</th>
                                <th>{% trans \"Display Profile\" %}</th>
                                <th>{% trans \"Version\" %}</th>
                                <th>{% trans \"Device Name\" %}</th>
                                <th>{% trans \"IP Address\" %}</th>
                                <th>{% trans \"Mac Address\" %}</th>
                                <th>{% trans \"Timezone\" %}</th>
                                <th>{% trans \"Screen shot?\" %}</th>
                                <th>{% trans \"Thumbnail\" %}</th>
                                <th>{% trans \"Last Command\" %}</th>
                                <th>{% trans \"XMR Registered\" %}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
{% endblock %}

{% block javaScript %}
    <script type=\"text/javascript\">
        \$(document).ready(function() {
            var table = \$(\"#displays\").DataTable({
                \"language\": dataTablesLanguage,
                serverSide: true,
                stateSave: true, stateDuration: 0,
                stateLoadCallback: function (settings, callback) {
                    var data = {};
                    \$.ajax({
                        type: \"GET\",
                        async: false,
                        url: \"{{ urlFor(\"user.pref\") }}?preference=displayGrid\",
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
                                option: \"displayGrid\",
                                value: JSON.stringify(data)
                            }]
                        }
                    });
                },
                filter: false,
                searchDelay: 3000,
                order: [[1, \"asc\"]],
                ajax: {
                    \"url\": \"{{ urlFor(\"display.search\") }}\",
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
                            if (e.name != null && e.name != \"\")
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
                \"columns\": [
                    {\"data\": \"displayId\"},
                    {
                        \"name\": \"display\",
                        \"data\": function (data, type) {
                            if (type != \"display\")
                                return data.display;

                            if (\"{{ settings.SHOW_DISPLAY_AS_VNCLINK }}\" != \"\" && data.clientAddress != null && data.clientAddress != \"\") {
                                var link = \"{{ settings.SHOW_DISPLAY_AS_VNCLINK }}\".replace('%s', data.clientAddress);
                                return '<a href=\"' + link + '\" title=\"{% trans \"VNC to this Display\" %}\" target=\"{{ settings.SHOW_DISPLAY_AS_VNC_TGT }}\">' + data.display + '</a>';
                            }
                            else {
                                return data.display;
                            }
                        }
                    },
                    {
                        \"data\": \"mediaInventoryStatus\",
                        \"render\": function (data, type, row) {
                            if (type != \"display\")
                                return data;

                            var icon = \"\";
                            if (data == 1)
                                icon = \"fa-check\";
                            else if (data == 2)
                                icon = \"fa-times\";
                            else
                                icon = \"fa-cloud-download\";

                            return \"<span class='fa \" + icon + \"'></span>\";
                        }
                    },
                    {\"data\": \"licensed\", \"render\": dataTableTickCrossColumn},
                    {\"data\": \"currentLayout\", \"visible\": false, \"sortable\": false},
                    {
                        \"data\": \"storageAvailableSpace\",
                        \"visible\": false,
                        \"render\": function (data, type, row) {
                            if (type != \"display\")
                                return data;

                            return row.storageAvailableSpaceFormatted;
                        }
                    },
                    {
                        \"data\": \"storageTotalSpace\",
                        \"visible\": false,
                        \"render\": function (data, type, row) {
                            if (type != \"display\")
                                return data;

                            return row.storageTotalSpaceFormatted;
                        }
                    },
                    {\"data\": \"storagePercentage\", \"visible\": false, \"sortable\": false},
                    {\"data\": \"description\", \"visible\": false},
                    {
                        \"name\": \"tags\",
                        \"sortable\": false,
                        \"visible\": false,
                        \"data\": dataTableCreateTags
                    },
                    {\"data\": \"defaultLayout\", \"visible\": false},
                    {\"data\": \"incSchedule\", \"render\": dataTableTickCrossColumn, \"visible\": false},
                    {\"data\": \"emailAlert\", \"render\": dataTableTickCrossColumn, \"visible\": false},
                    {\"data\": \"loggedIn\", \"render\": dataTableTickCrossColumn},
                    {\"data\": \"lastAccessed\", \"render\": dataTableDateFromUnix},
                    {
                        \"name\": \"displayProfileId\",
                        \"data\": function (data, type) {
                            return data.displayProfile;
                        },
                        \"visible\": false
                    },
                    {
                        \"name\": \"clientSort\",
                        \"data\": function (data) {
                            return data.clientType + ' ' + data.clientVersion + '-' + data.clientCode;
                        },
                        \"visible\": false
                    },
                    {\"data\": \"deviceName\", \"visible\": false},
                    {\"data\": \"clientAddress\", \"visible\": false},
                    {\"data\": \"macAddress\"},
                    {\"data\": \"timeZone\", \"visible\": false},
                    {\"data\": \"screenShotRequested\", \"render\": dataTableTickCrossColumn, \"visible\": false},
                    {
                        \"orderable\": false,
                        \"data\": function (data, type) {
                            if (type != \"display\")
                                return data.thumbnail;

                            if (data.thumbnail != \"\") {
                                return '<a data-toggle=\"lightbox\" data-type=\"image\" href=\"' + data.thumbnail + '\"><img class=\"display-screenshot\" src=\"' + data.thumbnail + '\" /></a>';
                            }
                            else {
                                return \"\";
                            }
                        },
                        \"visible\": false
                    },
                    {
                        \"data\": \"lastCommandSuccess\",
                        \"render\": function (data, type, row) {
                            if (type != \"display\")
                                return data;

                            var icon = \"\";
                            if (data == 1)
                                icon = \"fa-check\";
                            else if (data == 0)
                                icon = \"fa-times\";
                            else
                                icon = \"fa-question\";

                            return \"<span class='fa \" + icon + \"'></span>\";
                        },
                        \"visible\": false
                    },
                    {
                        \"data\": \"xmrChannel\",
                        \"render\": function (data, type, row) {
                            if (type === \"export\") {
                                return (data !== null && data !== \"\") ? 1 : 0;
                            }

                            if (type != \"display\")
                                return data;

                            var icon = \"\";
                            if (data != null && data != \"\")
                                icon = \"fa-check\";
                            else
                                icon = \"fa-times\";

                            return \"<span class='fa \" + icon + \"'></span>\";
                        },
                        \"visible\": false
                    },
                    {
                        \"orderable\": false,
                        \"data\": dataTableButtonsColumn
                    }
                ]
            });

            table.on('draw', dataTableDraw);
            table.on('draw', { form: \$(\"#displays\").closest(\".XiboGrid\").find(\".FilterDiv form\") }, dataTableCreateTagEvents);
            table.on('processing.dt', dataTableProcessing);
            dataTableAddButtons(table, \$('#displays_wrapper').find('.col-sm-6').eq(1));

            \$(\"#refreshGrid\").click(function () {
                table.ajax.reload();
            });

            var list = \$(\".dataTables_length select\");
            list.append(new Option(\"500\", 500));
            list.append(new Option(\"2500\", 2500));
            list.append(new Option(\"5000\", 5000));
            //list.append(new Option(\"6500\", 6500);

        });

        function setDefaultMultiSelectFormOpen(dialog) {
            console.log('Multi-select form opened for default layout');

            // Inject a list of layouts into the form, in a drop down.
            var \$select = \$('<select name=\"layoutId\" class=\"form-control\" data-search-url=\"{{ urlFor(\"layout.search\") }}\" data-search-term=\"layout\" data-id-property=\"layoutId\" data-text-property=\"layout\">');
            \$select.on('change', function() {
                console.log('Setting commit data to ' + \$(this).val());
                dialog.data().commitData = {layoutId: \$(this).val()};
            });

            // Add the list to the body.
            \$(dialog).find('.modal-body').append(\$select);

            makePagedSelect(\$select, dialog);
        }
    </script>
{% endblock %}
", "display-page.twig", "/opt/lampp/htdocs/UBI/views/display-page.twig");
    }
}
