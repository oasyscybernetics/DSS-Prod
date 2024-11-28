<?php

$conn = oci_connect("xvsfdn", "5dabd9138980946ccb4b6d4ce316ee27", "10.128.230.243:9027/ubinedu");

if(!$conn) {
  echo "Failed to connect to Oracle";
  exit();
}


header("Cache-Control: no-cache, no-store, pre-check=0, post-check=0, max-age=0, s-maxage=0, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); //HTTP 1.0.
header("Expires: 0"); //Proxies
header("X-XSS-Protection: 1");


use Xibo\Service\ConfigService;

DEFINE('XIBO', true);
define('PROJECT_ROOT', realpath(__DIR__ . '/..'));

error_reporting(0);
ini_set('display_errors', 0);

require PROJECT_ROOT . '/vendor/autoload.php';

if (!file_exists('settings.php')) {
    if (file_exists(PROJECT_ROOT . '/web/install/index.php')) {
        header('Location: install/');
        exit();
    }
    else {
        die('Not configured');
    }
}

// Create a logger
$logger = new \Xibo\Helper\AccessibleMonologWriter(array(
    'name' => 'WEB',
    'handlers' => [
        new \Xibo\Helper\DatabaseLogHandler()
    ],
    'processors' => array(
        new \Xibo\Helper\LogProcessor(),
        new \Monolog\Processor\UidProcessor(7)
    )
), false);

// Slim Application
$app = new \RKA\Slim(array(
    'debug' => false,
    'log.writer' => $logger
));
$app->setName('web');

// Twig templates
$twig = new \Slim\Views\Twig();
$twig->parserOptions = array(
    'debug' => true,
    'cache' => PROJECT_ROOT . '/cache'
);
$twig->parserExtensions = array(
    new \Slim\Views\TwigExtension(),
    new \Xibo\Twig\TransExtension(),
    new \Xibo\Twig\ByteFormatterTwigExtension(),
    new \Xibo\Twig\UrlDecodeTwigExtension(),
    new \Xibo\Twig\DateFormatTwigExtension()
);

// Configure the template folder
$twig->twigTemplateDirs = [PROJECT_ROOT . '/views'];

$app->view($twig);

// Config
$app->configService = ConfigService::Load(PROJECT_ROOT . '/web/settings.php');

//
// Middleware (onion, outside inwards and then out again - i.e. the last one is first and last);
//
$app->add(new \Xibo\Middleware\Actions());

// Theme Middleware
$app->add(new \Xibo\Middleware\Theme());

// Authentication middleware
if ($app->configService->authentication != null && $app->configService->authentication instanceof \Slim\Middleware)
    $app->add($app->configService->authentication);
else
    $app->add(new \Xibo\Middleware\WebAuthentication());

// Standard Xibo middleware
$app->add(new \Xibo\Middleware\CsrfGuard());
$app->add(new \Xibo\Middleware\State());
$app->add(new \Xibo\Middleware\Storage());
$app->add(new \Xibo\Middleware\Xmr());

// Handle additional Middleware
\Xibo\Middleware\State::setMiddleWare($app);
//
// End Middleware
//

// Configure the Slim error handler
$app->error(function (\Exception $e) use ($app) {
    $app->container->get('\Xibo\Controller\Error')->handler($e);
});

// Configure a not found handler
$app->notFound(function () use ($app) {
    $app->container->get('\Xibo\Controller\Error')->notFound();
});

// All application routes
require PROJECT_ROOT . '/lib/routes-web.php';
require PROJECT_ROOT . '/lib/routes.php';

// Run App
try {
    $app->run();
}
catch (Exception $e) {
    echo 'Fatal Error - sorry this shouldn\'t happen. ';
    echo $e->getMessage();
}
