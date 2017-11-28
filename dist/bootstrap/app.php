<?php

require __DIR__ . '/../vendor/autoload.php';

function snippet($snippet)
{
    include __DIR__ . '/../views/snippets/' . $snippet . '.php';
}

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true,
    ]
]);

$container = $app->getContainer();

$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(__DIR__ . '/../resources/views', [
        'cache' => false
    ]);

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

    return $view;
};

$menu = array (
    array('slug' => '/', 'title' => 'Home'),
    array('slug' => '/about', 'title' => 'About'),
    array('slug' => '/portfolio', 'title' => 'Portfolio'),
    array('slug' => '/contact', 'title' => 'Contact'),
);

$container->view->getEnvironment()->addGlobal('menu', $menu);

require __DIR__ . '/helpers.php';

require __DIR__ . '/../routes/web.php';
