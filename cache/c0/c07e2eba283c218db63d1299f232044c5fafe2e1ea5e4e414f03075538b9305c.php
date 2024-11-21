<?php

/* base.twig */
class __TwigTemplate_d1b4a322ab2f299e3b5c6fb10cb65ce2f5697b24a73461f7cc3aadce0843587a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'headContent' => array($this, 'block_headContent'),
            'content' => array($this, 'block_content'),
            'javaScriptTemplates' => array($this, 'block_javaScriptTemplates'),
            'javaScript' => array($this, 'block_javaScript'),
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
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\">
        <link href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/font-awesome/css/font-awesome.min.css"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/select2/css/select2.min.css"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/select2/css/select2-bootstrap.min.css"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/jquery-timepicker/jquery.timepicker.css"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/bootstrap-slider-master/bootstrap-slider.min.css"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/bootstrap-ekko-lightbox/ekko-lightbox.min.css"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/bootstrap-switch/bootstrap-switch.min.css"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/bootstrap-tagsinput-master/bootstrap-tagsinput.css"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/calendar/css/calendar.css"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/morrisjs/morris.css"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/datatables/dataTables.bootstrap.css"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/datatables/buttons.dataTables.min.css"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/jquery/jquery-ui/css/ui-lightness/jquery-ui-1.10.2.custom.min.css"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/jquery-file-upload/css/jquery.fileupload.css"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/jquery-file-upload/css/jquery.fileupload-ui.css"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/toastr/toastr.min.css"), "method"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/bootstrap-tour/bootstrap-tour.min.css"), "method"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "css/dashboard.css"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\">
        <link href=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "css/timeline.css"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\">
        <link href=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "css/xibo.css"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\">
        <link href=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "css/calendar.css"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\">
        <link href=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "css/override.css"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\">
        <link href=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("library.font.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        
        ";
        // line 38
        $this->displayBlock('headContent', $context, $blocks);
        // line 39
        echo "    </head>
    <body>
        ";
        // line 41
        $this->displayBlock('content', $context, $blocks);
        // line 42
        echo "
        <script src=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/jquery/jquery-1.11.1.min.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/jquery/jquery.validate.min.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/jquery/additional-methods.min.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/bootstrap/js/bootstrap.min.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/bootstrap/js/bootbox.min.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/bootstrap-switch/bootstrap-switch.min.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>

        ";
        // line 51
        echo "        <script src=\"";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/datatables/jquery.dataTables.min.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/datatables/dataTables.bootstrap.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/datatables/dataTables.buttons.min.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/datatables/buttons.colVis.min.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/datatables/buttons.print.min.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/datatables/buttons.html5.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/datatables/buttons.flash.min.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>

        <script src=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/jquery/jquery-ui/jquery-ui-1.10.2.custom.min.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>

        <script src=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/select2/js/select2.full.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>

        <script src=\"";
        // line 64
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/bootstrap-ekko-lightbox/ekko-lightbox.min.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 65
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/underscore/underscore-min.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/jstimezonedetect/jstz.min.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 67
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/ckeditor/ckeditor.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/bootstrap/js/bootstrap-ckeditor-fix.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 69
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/jquery-file-upload/js/tmpl.min.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 70
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/jquery-load-image/load-image.all.min.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 71
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/jquery-file-upload/js/jquery.iframe-transport.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 72
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/jquery-file-upload/js/jquery.fileupload.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 73
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/jquery-file-upload/js/jquery.fileupload-process.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 74
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/jquery-file-upload/js/jquery.fileupload-resize.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 75
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/jquery-file-upload/js/jquery.fileupload-validate.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 76
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/jquery-file-upload/js/jquery.fileupload-ui.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 77
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/jquery-file-upload/js/jquery.fileupload-image.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 78
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/jquery-file-upload/js/jquery.fileupload-video.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 79
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/jquery-file-upload/js/jquery.fileupload-audio.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 80
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/jquery-message-queuing/jquery.ba-jqmq.min.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 81
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/jquery-throttle-debounce/jquery.ba-throttle-debounce.min.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 82
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/toastr/toastr.min.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 83
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/bootstrap-tour/bootstrap-tour.min.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 84
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/date-time-format.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 85
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/momentjs/moment.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 86
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/momentjs/moment-timezone.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 87
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/morrisjs/raphael.min.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 88
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/morrisjs/morris.min.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 89
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/chartjs/Chart.min.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 90
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/colors/colors.min.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>

        <script src=\"";
        // line 92
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "js/xibo-cms.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 93
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "js/xibo-forms.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 94
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "js/xibo-preview-timeline.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 95
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "js/xibo-calendar.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 96
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "js/xibo-datasets.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 97
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/handlebars/handlebars-v3.0.0.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 98
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/jquery-serialize-object/jquery.serialize-object.min.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 99
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/bootstrap-tagsinput-master/bootstrap-tagsinput.min.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 100
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/jquery-timepicker/jquery.timepicker.min.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 101
        echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/bootstrap-slider-master/bootstrap-slider.min.js"), "method"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\"></script>

        ";
        // line 104
        echo "        ";
        if (($this->getAttribute(($context["settings"] ?? null), "CALENDAR_TYPE", array()) == "Jalali")) {
            // line 105
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/bootstrap-datetimepicker/js/jalali-date.js"), "method"), "html", null, true);
            echo "?";
            echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
            echo "\"></script>
            <script src=\"";
            // line 106
            echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/bootstrap-datetimepicker/js/bootstrap-datetimepicker-jalali.min.js"), "method"), "html", null, true);
            echo "?";
            echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
            echo "\"></script>
            <script src=\"";
            // line 107
            echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/calendar/js/calendar-jalali.js"), "method"), "html", null, true);
            echo "?";
            echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
            echo "\"></script>
            <script src=\"";
            // line 108
            echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/momentjs/moment-jalali.js"), "method"), "html", null, true);
            echo "?";
            echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
            echo "\"></script>
            <script type=\"text/javascript\">
                moment.loadPersian();
            </script>
        ";
        } else {
            // line 113
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"), "method"), "html", null, true);
            echo "?";
            echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
            echo "\"></script>
            <script src=\"";
            // line 114
            echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => "libraries/calendar/js/calendar.js"), "method"), "html", null, true);
            echo "?";
            echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
            echo "\"></script>
        ";
        }
        // line 116
        echo "
        ";
        // line 118
        echo "        ";
        ob_start();
        echo "libraries/calendar/js/language/";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["translate"] ?? null), "jsShortLocale", array()), "html", null, true);
        echo ".js";
        $context["calendarTranslation"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 119
        echo "        ";
        if ($this->getAttribute(($context["theme"] ?? null), "fileExists", array(0 => ($context["calendarTranslation"] ?? null)), "method")) {
            // line 120
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => ($context["calendarTranslation"] ?? null)), "method"), "html", null, true);
            echo "\"></script>
        ";
        }
        // line 122
        echo "
        ";
        // line 123
        ob_start();
        echo "libraries/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["translate"] ?? null), "jsShortLocale", array()), "html", null, true);
        echo ".js";
        $context["datePickerTranslation"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 124
        echo "        ";
        if ($this->getAttribute(($context["theme"] ?? null), "fileExists", array(0 => ($context["datePickerTranslation"] ?? null)), "method")) {
            // line 125
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => ($context["datePickerTranslation"] ?? null)), "method"), "html", null, true);
            echo "\"></script>
        ";
        }
        // line 127
        echo "
        ";
        // line 128
        ob_start();
        echo "libraries/select2/js/i18n/";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["translate"] ?? null), "jsShortLocale", array()), "html", null, true);
        echo ".js";
        $context["selectPickerTranslation"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 129
        echo "        ";
        if ($this->getAttribute(($context["theme"] ?? null), "fileExists", array(0 => ($context["selectPickerTranslation"] ?? null)), "method")) {
            // line 130
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "uri", array(0 => ($context["selectPickerTranslation"] ?? null)), "method"), "html", null, true);
            echo "\"></script>
        ";
        }
        // line 132
        echo "
        <script type=\"text/javascript\">
            // Default theme for select2
            \$.fn.select2.defaults.set( \"theme\", \"bootstrap\" );

            var translations = ";
        // line 137
        echo ($context["translations"] ?? null);
        echo ";
            // Translations we want always available
            ";
        // line 140
        echo "            translations.withselected = \"";
        echo twig_escape_filter($this->env, __("With Selected"), "js", null, true);
        echo "\";
            translations.selectAll = \"";
        // line 141
        echo twig_escape_filter($this->env, __("Select All"), "js", null, true);
        echo "\";
            translations.multiselect = \"";
        // line 142
        echo twig_escape_filter($this->env, __("Multiple Items Selected"), "js", null, true);
        echo "\";
            translations.multiselectNoItemsMessage = \"";
        // line 143
        echo twig_escape_filter($this->env, __("Sorry, no items have been selected."), "js", null, true);
        echo "\";
            translations.multiselectMessage = \"";
        // line 144
        echo twig_escape_filter($this->env, __("Caution, you have selected %1 items. Clicking save will run the %2 transaction on all these items."), "js", null, true);
        echo "\";
            translations.save = \"";
        // line 145
        echo twig_escape_filter($this->env, __("Save"), "js", null, true);
        echo "\";
            translations.cancel = \"";
        // line 146
        echo twig_escape_filter($this->env, __("Cancel"), "js", null, true);
        echo "\";
            translations.close = \"";
        // line 147
        echo twig_escape_filter($this->env, __("Close"), "js", null, true);
        echo "\";
            translations.success = \"";
        // line 148
        echo twig_escape_filter($this->env, __("Success"), "js", null, true);
        echo "\";
            translations.failure = \"";
        // line 149
        echo twig_escape_filter($this->env, __("Failure"), "js", null, true);
        echo "\";
            translations.enterText = \"";
        // line 150
        echo twig_escape_filter($this->env, __("Enter text..."), "js", null, true);
        echo "\";
            translations.noDataMessage = \"";
        // line 151
        echo twig_escape_filter($this->env, __("No Data returned from the source"), "js", null, true);
        echo "\";
            translations.statusPending = \"";
        // line 152
        echo twig_escape_filter($this->env, __("Status Pending"), "js", null, true);
        echo "\";
            translations.duplicate = \"";
        // line 153
        echo twig_escape_filter($this->env, __("Duplicate"), "js", null, true);
        echo "\";
            translations.spacesWarning = \"";
        // line 154
        echo twig_escape_filter($this->env, __("Warning - starts with or ends with a space, or contains double spaces"), "js", null, true);
        echo "\";
            ";
        // line 156
        echo "
            var language = \"";
        // line 157
        echo twig_escape_filter($this->env, $this->getAttribute(($context["translate"] ?? null), "jsLocale", array()), "html", null, true);
        echo "\";
            var timezone = \"";
        // line 158
        echo twig_escape_filter($this->env, $this->getAttribute(($context["settings"] ?? null), "defaultTimezone", array()), "html", null, true);
        echo "\";
            var dateFormat = \"";
        // line 159
        echo twig_escape_filter($this->env, $this->getAttribute(($context["settings"] ?? null), "DATE_FORMAT", array()), "html", null, true);
        echo "\";
            var jsDateFormat = \"";
        // line 160
        echo twig_escape_filter($this->env, $this->getAttribute(($context["settings"] ?? null), "DATE_FORMAT_JS", array()), "html", null, true);
        echo "\";
            var timeFormat = \"";
        // line 161
        echo twig_escape_filter($this->env, $this->getAttribute(($context["settings"] ?? null), "TIME_FORMAT", array()), "html", null, true);
        echo "\";
            var jsTimeFormat = \"";
        // line 162
        echo twig_escape_filter($this->env, $this->getAttribute(($context["settings"] ?? null), "TIME_FORMAT_JS", array()), "html", null, true);
        echo "\";
            var systemDateFormat = \"";
        // line 163
        echo twig_escape_filter($this->env, $this->getAttribute(($context["settings"] ?? null), "systemDateFormat", array()), "html", null, true);
        echo "\";
            var systemTimeFormat = \"";
        // line 164
        echo twig_escape_filter($this->env, $this->getAttribute(($context["settings"] ?? null), "systemTimeFormat", array()), "html", null, true);
        echo "\";
            var bootstrapDateFormat = \"";
        // line 165
        echo twig_escape_filter($this->env, $this->getAttribute(($context["settings"] ?? null), "DATE_FORMAT_BOOTSTRAP", array()), "html", null, true);
        echo "\";
            var bootstrapDateFormatDateOnly = \"";
        // line 166
        echo twig_escape_filter($this->env, $this->getAttribute(($context["settings"] ?? null), "DATE_FORMAT_BOOTSTRAP_DATEONLY", array()), "html", null, true);
        echo "\";
            var calendarType = \"";
        // line 167
        echo twig_escape_filter($this->env, $this->getAttribute(($context["settings"] ?? null), "CALENDAR_TYPE", array()), "html", null, true);
        echo "\";
            var clockUrl = \"";
        // line 168
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("clock"), "html", null, true);
        echo "\";
            var calendarLanguage = \"";
        // line 169
        echo twig_escape_filter($this->env, $this->getAttribute(($context["translate"] ?? null), "jsShortLocale", array()), "html", null, true);
        echo "\";
            var pingUrl = \"";
        // line 170
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("ping"), "html", null, true);
        echo "\";
            ";
        // line 172
        echo "            var dataTablesLanguage = {
                \"decimal\":        \"\",
                \"emptyTable\":     \"";
        // line 174
        echo twig_escape_filter($this->env, __("No data available in table"), "js", null, true);
        echo "\",
                \"info\":           \"";
        // line 175
        echo twig_escape_filter($this->env, __("Showing _START_ to _END_ of _TOTAL_ entries"), "js", null, true);
        echo "\",
                \"infoEmpty\":      \"";
        // line 176
        echo twig_escape_filter($this->env, __("Showing 0 to 0 of 0 entries"), "js", null, true);
        echo "\",
                \"infoFiltered\":   \"";
        // line 177
        echo twig_escape_filter($this->env, __("(filtered from _MAX_ total entries)"), "js", null, true);
        echo "\",
                \"infoPostFix\":    \"\",
                \"thousands\":      \",\",
                \"lengthMenu\":     \"";
        // line 180
        echo twig_escape_filter($this->env, __("Show _MENU_ entries"), "js", null, true);
        echo "\",
                \"loadingRecords\": \"";
        // line 181
        echo twig_escape_filter($this->env, __("Loading..."), "js", null, true);
        echo "\",
                \"processing\":     \"";
        // line 182
        echo twig_escape_filter($this->env, __("Processing..."), "js", null, true);
        echo "\",
                \"search\":         \"";
        // line 183
        echo twig_escape_filter($this->env, __("Search:"), "js", null, true);
        echo "\",
                \"zeroRecords\":    \"";
        // line 184
        echo twig_escape_filter($this->env, __("No matching records found"), "js", null, true);
        echo "\",
                \"paginate\": {
                    \"first\":      \"";
        // line 186
        echo twig_escape_filter($this->env, __("First"), "js", null, true);
        echo "\",
                    \"last\":       \"";
        // line 187
        echo twig_escape_filter($this->env, __("Last"), "js", null, true);
        echo "\",
                    \"next\":       \"";
        // line 188
        echo twig_escape_filter($this->env, __("Next"), "js", null, true);
        echo "\",
                    \"previous\":   \"";
        // line 189
        echo twig_escape_filter($this->env, __("Previous"), "js", null, true);
        echo "\"
                },
                \"aria\": {
                    \"sortAscending\":  \"";
        // line 192
        echo twig_escape_filter($this->env, __(": activate to sort column ascending"), "js", null, true);
        echo "\",
                    \"sortDescending\": \"";
        // line 193
        echo twig_escape_filter($this->env, __(": activate to sort column descending"), "js", null, true);
        echo "\"
                }
            };
            ";
        // line 197
        echo "
            moment.locale(\"";
        // line 198
        echo twig_escape_filter($this->env, $this->getAttribute(($context["translate"] ?? null), "jsLocale", array()), "html", null, true);
        echo "\");

            \$(function() {
                var csrf_token = \$('meta[name=\"token\"]').attr('content');
                \$.ajaxSetup({
                    headers: {
                        'X-XSRF-TOKEN': csrf_token
                    }
                });
            });

            toastr.options.positionClass = \"toast-bottom-center\";

            // CKEditor default config
            var CKEDITOR_DEFAULT_CONFIG = {
                contentsCss: [ CKEDITOR.getUrl('contents.css'), \"";
        // line 213
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("library.font.css"), "html", null, true);
        echo "\" ],
                font_names: '";
        // line 214
        echo twig_escape_filter($this->env, ($context["ckeditorConfig"] ?? null), "html", null, true);
        echo "' + CKEDITOR.config.font_names,
                imageDownloadUrl: \"";
        // line 215
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->urlFor("library.download"), "html", null, true);
        echo "?preview=1\"
            }

        </script>

        ";
        // line 220
        $this->displayBlock('javaScriptTemplates', $context, $blocks);
        // line 221
        echo "        ";
        $this->displayBlock('javaScript', $context, $blocks);
        // line 222
        echo "
        ";
        // line 223
        $this->loadTemplate("user-welcome.twig", "base.twig", 223)->display($context);
        // line 224
        echo "
    </body>
</html>
";
    }

    // line 38
    public function block_headContent($context, array $blocks = array())
    {
    }

    // line 41
    public function block_content($context, array $blocks = array())
    {
    }

    // line 220
    public function block_javaScriptTemplates($context, array $blocks = array())
    {
    }

    // line 221
    public function block_javaScript($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "base.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  904 => 221,  899 => 220,  894 => 41,  889 => 38,  882 => 224,  880 => 223,  877 => 222,  874 => 221,  872 => 220,  864 => 215,  860 => 214,  856 => 213,  838 => 198,  835 => 197,  829 => 193,  825 => 192,  819 => 189,  815 => 188,  811 => 187,  807 => 186,  802 => 184,  798 => 183,  794 => 182,  790 => 181,  786 => 180,  780 => 177,  776 => 176,  772 => 175,  768 => 174,  764 => 172,  760 => 170,  756 => 169,  752 => 168,  748 => 167,  744 => 166,  740 => 165,  736 => 164,  732 => 163,  728 => 162,  724 => 161,  720 => 160,  716 => 159,  712 => 158,  708 => 157,  705 => 156,  701 => 154,  697 => 153,  693 => 152,  689 => 151,  685 => 150,  681 => 149,  677 => 148,  673 => 147,  669 => 146,  665 => 145,  661 => 144,  657 => 143,  653 => 142,  649 => 141,  644 => 140,  639 => 137,  632 => 132,  626 => 130,  623 => 129,  617 => 128,  614 => 127,  608 => 125,  605 => 124,  599 => 123,  596 => 122,  590 => 120,  587 => 119,  580 => 118,  577 => 116,  570 => 114,  563 => 113,  553 => 108,  547 => 107,  541 => 106,  534 => 105,  531 => 104,  524 => 101,  518 => 100,  512 => 99,  506 => 98,  500 => 97,  494 => 96,  488 => 95,  482 => 94,  476 => 93,  470 => 92,  463 => 90,  457 => 89,  451 => 88,  445 => 87,  439 => 86,  433 => 85,  427 => 84,  421 => 83,  415 => 82,  409 => 81,  403 => 80,  397 => 79,  391 => 78,  385 => 77,  379 => 76,  373 => 75,  367 => 74,  361 => 73,  355 => 72,  349 => 71,  343 => 70,  337 => 69,  331 => 68,  325 => 67,  319 => 66,  313 => 65,  307 => 64,  300 => 62,  293 => 60,  287 => 59,  280 => 57,  274 => 56,  268 => 55,  262 => 54,  256 => 53,  250 => 52,  243 => 51,  236 => 48,  230 => 47,  224 => 46,  218 => 45,  212 => 44,  206 => 43,  203 => 42,  201 => 41,  197 => 39,  195 => 38,  190 => 36,  184 => 35,  178 => 34,  172 => 33,  166 => 32,  160 => 31,  156 => 30,  152 => 29,  146 => 28,  140 => 27,  134 => 26,  128 => 25,  122 => 24,  116 => 23,  110 => 22,  104 => 21,  98 => 20,  92 => 19,  86 => 18,  80 => 17,  74 => 16,  68 => 15,  62 => 14,  56 => 13,  50 => 12,  44 => 11,  39 => 9,  35 => 8,  28 => 4,  23 => 1,);
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

        <link href=\"{{ theme.uri(\"libraries/bootstrap/css/bootstrap.min.css\") }}?{{ version }}\" rel=\"stylesheet\" media=\"screen\">
        <link href=\"{{ theme.uri(\"libraries/font-awesome/css/font-awesome.min.css\") }}?{{ version }}\" rel=\"stylesheet\">
        <link href=\"{{ theme.uri(\"libraries/select2/css/select2.min.css\") }}?{{ version }}\" rel=\"stylesheet\">
        <link href=\"{{ theme.uri(\"libraries/select2/css/select2-bootstrap.min.css\") }}?{{ version }}\" rel=\"stylesheet\">
        <link href=\"{{ theme.uri(\"libraries/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css\") }}?{{ version }}\" rel=\"stylesheet\">
        <link href=\"{{ theme.uri(\"libraries/jquery-timepicker/jquery.timepicker.css\") }}?{{ version }}\" rel=\"stylesheet\">
        <link href=\"{{ theme.uri(\"libraries/bootstrap-slider-master/bootstrap-slider.min.css\") }}?{{ version }}\" rel=\"stylesheet\">
        <link href=\"{{ theme.uri(\"libraries/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css\") }}?{{ version }}\" rel=\"stylesheet\">
        <link href=\"{{ theme.uri(\"libraries/bootstrap-ekko-lightbox/ekko-lightbox.min.css\") }}?{{ version }}\" rel=\"stylesheet\">
        <link href=\"{{ theme.uri(\"libraries/bootstrap-switch/bootstrap-switch.min.css\") }}?{{ version }}\" rel=\"stylesheet\">
        <link href=\"{{ theme.uri(\"libraries/bootstrap-tagsinput-master/bootstrap-tagsinput.css\") }}?{{ version }}\" rel=\"stylesheet\">
        <link href=\"{{ theme.uri(\"libraries/calendar/css/calendar.css\") }}?{{ version }}\" rel=\"stylesheet\">
        <link href=\"{{ theme.uri(\"libraries/morrisjs/morris.css\") }}?{{ version }}\" rel=\"stylesheet\">
        <link href=\"{{ theme.uri(\"libraries/datatables/dataTables.bootstrap.css\") }}?{{ version }}\" rel=\"stylesheet\">
        <link href=\"{{ theme.uri(\"libraries/datatables/buttons.dataTables.min.css\") }}?{{ version }}\" rel=\"stylesheet\">
        <link href=\"{{ theme.uri(\"libraries/jquery/jquery-ui/css/ui-lightness/jquery-ui-1.10.2.custom.min.css\") }}?{{ version }}\" rel=\"stylesheet\">
        <link href=\"{{ theme.uri(\"libraries/jquery-file-upload/css/jquery.fileupload.css\") }}?{{ version }}\" rel=\"stylesheet\">
        <link href=\"{{ theme.uri(\"libraries/jquery-file-upload/css/jquery.fileupload-ui.css\") }}?{{ version }}\" rel=\"stylesheet\">
        <link href=\"{{ theme.uri(\"libraries/toastr/toastr.min.css\") }}\" rel=\"stylesheet\">
        <link href=\"{{ theme.uri(\"libraries/bootstrap-tour/bootstrap-tour.min.css\") }}\" rel=\"stylesheet\">
        <link href=\"{{ theme.uri(\"css/dashboard.css\") }}?{{ version }}\" rel=\"stylesheet\" media=\"screen\">
        <link href=\"{{ theme.uri(\"css/timeline.css\") }}?{{ version }}\" rel=\"stylesheet\" media=\"screen\">
        <link href=\"{{ theme.uri(\"css/xibo.css\") }}?{{ version }}\" rel=\"stylesheet\" media=\"screen\">
        <link href=\"{{ theme.uri(\"css/calendar.css\") }}?{{ version }}\" rel=\"stylesheet\" media=\"screen\">
        <link href=\"{{ theme.uri(\"css/override.css\") }}?{{ version }}\" rel=\"stylesheet\" media=\"screen\">
        <link href=\"{{ urlFor(\"library.font.css\") }}\" rel=\"stylesheet\">
        
        {% block headContent %}{% endblock %}
    </head>
    <body>
        {% block content %}{% endblock %}

        <script src=\"{{ theme.uri(\"libraries/jquery/jquery-1.11.1.min.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/jquery/jquery.validate.min.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/jquery/additional-methods.min.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/bootstrap/js/bootstrap.min.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/bootstrap/js/bootbox.min.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/bootstrap-switch/bootstrap-switch.min.js\") }}?{{ version }}\"></script>

        {# Datatables #}
        <script src=\"{{ theme.uri(\"libraries/datatables/jquery.dataTables.min.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/datatables/dataTables.bootstrap.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/datatables/dataTables.buttons.min.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/datatables/buttons.colVis.min.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/datatables/buttons.print.min.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/datatables/buttons.html5.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/datatables/buttons.flash.min.js\") }}?{{ version }}\"></script>

        <script src=\"{{ theme.uri(\"libraries/jquery/jquery-ui/jquery-ui-1.10.2.custom.min.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js\") }}?{{ version }}\"></script>

        <script src=\"{{ theme.uri(\"libraries/select2/js/select2.full.js\") }}?{{ version }}\"></script>

        <script src=\"{{ theme.uri(\"libraries/bootstrap-ekko-lightbox/ekko-lightbox.min.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/underscore/underscore-min.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/jstimezonedetect/jstz.min.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/ckeditor/ckeditor.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/bootstrap/js/bootstrap-ckeditor-fix.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/jquery-file-upload/js/tmpl.min.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/jquery-load-image/load-image.all.min.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/jquery-file-upload/js/jquery.iframe-transport.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/jquery-file-upload/js/jquery.fileupload.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/jquery-file-upload/js/jquery.fileupload-process.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/jquery-file-upload/js/jquery.fileupload-resize.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/jquery-file-upload/js/jquery.fileupload-validate.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/jquery-file-upload/js/jquery.fileupload-ui.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/jquery-file-upload/js/jquery.fileupload-image.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/jquery-file-upload/js/jquery.fileupload-video.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/jquery-file-upload/js/jquery.fileupload-audio.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/jquery-message-queuing/jquery.ba-jqmq.min.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/jquery-throttle-debounce/jquery.ba-throttle-debounce.min.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/toastr/toastr.min.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/bootstrap-tour/bootstrap-tour.min.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/date-time-format.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/momentjs/moment.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/momentjs/moment-timezone.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/morrisjs/raphael.min.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/morrisjs/morris.min.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/chartjs/Chart.min.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/colors/colors.min.js\") }}?{{ version }}\"></script>

        <script src=\"{{ theme.uri(\"js/xibo-cms.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"js/xibo-forms.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"js/xibo-preview-timeline.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"js/xibo-calendar.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"js/xibo-datasets.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/handlebars/handlebars-v3.0.0.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/jquery-serialize-object/jquery.serialize-object.min.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/bootstrap-tagsinput-master/bootstrap-tagsinput.min.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/jquery-timepicker/jquery.timepicker.min.js\") }}?{{ version }}\"></script>
        <script src=\"{{ theme.uri(\"libraries/bootstrap-slider-master/bootstrap-slider.min.js\") }}?{{ version }}\"></script>

        {# Dates #}
        {% if settings.CALENDAR_TYPE == \"Jalali\" %}
            <script src=\"{{ theme.uri(\"libraries/bootstrap-datetimepicker/js/jalali-date.js\") }}?{{ version }}\"></script>
            <script src=\"{{ theme.uri(\"libraries/bootstrap-datetimepicker/js/bootstrap-datetimepicker-jalali.min.js\") }}?{{ version }}\"></script>
            <script src=\"{{ theme.uri(\"libraries/calendar/js/calendar-jalali.js\") }}?{{ version }}\"></script>
            <script src=\"{{ theme.uri(\"libraries/momentjs/moment-jalali.js\") }}?{{ version }}\"></script>
            <script type=\"text/javascript\">
                moment.loadPersian();
            </script>
        {% else %}
            <script src=\"{{ theme.uri(\"libraries/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js\") }}?{{ version }}\"></script>
            <script src=\"{{ theme.uri(\"libraries/calendar/js/calendar.js\") }}?{{ version }}\"></script>
        {% endif %}

        {# Handle the inclusion of i18n #}
        {% set calendarTranslation %}libraries/calendar/js/language/{{ translate.jsShortLocale }}.js{% endset %}
        {% if theme.fileExists(calendarTranslation) %}
            <script src=\"{{ theme.uri(calendarTranslation) }}\"></script>
        {% endif %}

        {% set datePickerTranslation %}libraries/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.{{ translate.jsShortLocale }}.js{% endset %}
        {% if theme.fileExists(datePickerTranslation) %}
            <script src=\"{{ theme.uri(datePickerTranslation) }}\"></script>
        {% endif %}

        {% set selectPickerTranslation %}libraries/select2/js/i18n/{{ translate.jsShortLocale }}.js{% endset %}
        {% if theme.fileExists(selectPickerTranslation) %}
            <script src=\"{{ theme.uri(selectPickerTranslation) }}\"></script>
        {% endif %}

        <script type=\"text/javascript\">
            // Default theme for select2
            \$.fn.select2.defaults.set( \"theme\", \"bootstrap\" );

            var translations = {{ translations|raw }};
            // Translations we want always available
            {% autoescape \"js\" %}
            translations.withselected = \"{{ \"With Selected\"|trans }}\";
            translations.selectAll = \"{{ \"Select All\"|trans }}\";
            translations.multiselect = \"{{ \"Multiple Items Selected\"|trans }}\";
            translations.multiselectNoItemsMessage = \"{{ \"Sorry, no items have been selected.\"|trans }}\";
            translations.multiselectMessage = \"{{ \"Caution, you have selected %1 items. Clicking save will run the %2 transaction on all these items.\"|trans }}\";
            translations.save = \"{{ \"Save\"|trans }}\";
            translations.cancel = \"{{ \"Cancel\"|trans }}\";
            translations.close = \"{{ \"Close\"|trans }}\";
            translations.success = \"{{ \"Success\"|trans }}\";
            translations.failure = \"{{ \"Failure\"|trans }}\";
            translations.enterText = \"{{ \"Enter text...\"|trans }}\";
            translations.noDataMessage = \"{{ \"No Data returned from the source\"|trans }}\";
            translations.statusPending = \"{{ \"Status Pending\"|trans }}\";
            translations.duplicate = \"{{ \"Duplicate\"|trans }}\";
            translations.spacesWarning = \"{{ \"Warning - starts with or ends with a space, or contains double spaces\"|trans }}\";
            {% endautoescape %}

            var language = \"{{ translate.jsLocale }}\";
            var timezone = \"{{ settings.defaultTimezone }}\";
            var dateFormat = \"{{ settings.DATE_FORMAT }}\";
            var jsDateFormat = \"{{ settings.DATE_FORMAT_JS }}\";
            var timeFormat = \"{{ settings.TIME_FORMAT }}\";
            var jsTimeFormat = \"{{ settings.TIME_FORMAT_JS }}\";
            var systemDateFormat = \"{{ settings.systemDateFormat }}\";
            var systemTimeFormat = \"{{ settings.systemTimeFormat }}\";
            var bootstrapDateFormat = \"{{ settings.DATE_FORMAT_BOOTSTRAP }}\";
            var bootstrapDateFormatDateOnly = \"{{ settings.DATE_FORMAT_BOOTSTRAP_DATEONLY }}\";
            var calendarType = \"{{ settings.CALENDAR_TYPE }}\";
            var clockUrl = \"{{ urlFor(\"clock\") }}\";
            var calendarLanguage = \"{{ translate.jsShortLocale }}\";
            var pingUrl = \"{{ urlFor(\"ping\") }}\";
            {% autoescape \"js\" %}
            var dataTablesLanguage = {
                \"decimal\":        \"\",
                \"emptyTable\":     \"{{ \"No data available in table\"|trans }}\",
                \"info\":           \"{{ \"Showing _START_ to _END_ of _TOTAL_ entries\"|trans }}\",
                \"infoEmpty\":      \"{{ \"Showing 0 to 0 of 0 entries\"|trans }}\",
                \"infoFiltered\":   \"{{ \"(filtered from _MAX_ total entries)\"|trans }}\",
                \"infoPostFix\":    \"\",
                \"thousands\":      \",\",
                \"lengthMenu\":     \"{{ \"Show _MENU_ entries\"|trans }}\",
                \"loadingRecords\": \"{{ \"Loading...\"|trans }}\",
                \"processing\":     \"{{ \"Processing...\"|trans }}\",
                \"search\":         \"{{ \"Search:\"|trans }}\",
                \"zeroRecords\":    \"{{ \"No matching records found\"|trans }}\",
                \"paginate\": {
                    \"first\":      \"{{ \"First\"|trans }}\",
                    \"last\":       \"{{ \"Last\"|trans }}\",
                    \"next\":       \"{{ \"Next\"|trans }}\",
                    \"previous\":   \"{{ \"Previous\"|trans }}\"
                },
                \"aria\": {
                    \"sortAscending\":  \"{{ \": activate to sort column ascending\"|trans }}\",
                    \"sortDescending\": \"{{ \": activate to sort column descending\"|trans }}\"
                }
            };
            {% endautoescape %}

            moment.locale(\"{{ translate.jsLocale }}\");

            \$(function() {
                var csrf_token = \$('meta[name=\"token\"]').attr('content');
                \$.ajaxSetup({
                    headers: {
                        'X-XSRF-TOKEN': csrf_token
                    }
                });
            });

            toastr.options.positionClass = \"toast-bottom-center\";

            // CKEditor default config
            var CKEDITOR_DEFAULT_CONFIG = {
                contentsCss: [ CKEDITOR.getUrl('contents.css'), \"{{ urlFor(\"library.font.css\") }}\" ],
                font_names: '{{ ckeditorConfig }}' + CKEDITOR.config.font_names,
                imageDownloadUrl: \"{{ urlFor(\"library.download\") }}?preview=1\"
            }

        </script>

        {% block javaScriptTemplates %}{% endblock %}
        {% block javaScript %}{% endblock %}

        {% include \"user-welcome.twig\" %}

    </body>
</html>
", "base.twig", "/opt/lampp/htdocs/UBI/views/base.twig");
    }
}
