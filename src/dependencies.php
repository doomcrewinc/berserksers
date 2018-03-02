<?php
// let's grab the app container
$container = $app->getContainer();

// flash messages
$container['flash'] = function () {
    return new \Slim\Flash\Messages();
};

// csrf protection
$container['csrf'] = function () {
    return new \Slim\Csrf\Guard();
};

// validator
$container['validator'] = function() {
    return new \App\Validation\Validator;
};

// twig
$container['view'] = function ($container) {
    $settings = $container->get('settings')['twig'];
    $view = new \Slim\Views\Twig($settings['path'], [
        'cache' => false
    ]);

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

    // add additional helper extensions
    $view->addExtension(new App\Views\CsrfExtension($container['csrf']));
    $view->addExtension(new App\Views\DebugExtension());
    $view->addExtension(new App\Views\CopyrightExtension());
    $view->addExtension(new App\Views\IpExtension());

    // make flash available to our views
    $view->getEnvironment()->addGlobal('flash', $container['flash']);

    return $view;
};

// monolog
$container['logger'] = function ($container) {
    $settings = $container->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));

    return $logger;
};

// error handling
$container['notFoundHandler'] = function ($container) {
    return new App\Handlers\NotFoundHandler($container['view']);
};