<?php

namespace OloloCms;

use Exception;
use OloloCms\Core\Network\Request;
use Twig_Environment;
use Twig_Loader_Filesystem;
use Twig_SimpleFunction;

/**
 * Главный класс приложения
 */
class Application
{
    public $twig;
    public $request;

    protected $routingMap = [
        '/' => [
            'name' => 'index',
            'controller' => \OloloCms\Controllers\IndexController::class,
            'action' => 'index',
        ],
        '/about' => [
            'name' => 'about',
            'controller' => \OloloCms\Controllers\IndexController::class,
            'action' => 'about',
        ],
        '/tasks' => [
        	'name' => 'tasks',
            'controller' => \OloloCms\Controllers\TaskController::class,
            'action' => 'taskList',
        ],
        '/tasks/task1' => [
        	'name' => 'task1',
            'controller' => \OloloCms\Controllers\TaskController::class,
            'action' => 'task1',
        ],
        'notFound' => [
            'name' => 'notFound',
            'controller' => \OloloCms\Controllers\IndexController::class,
            'action' => 'notFound',
        ],
    ];

    public function __construct()
    {
        $loader = new Twig_Loader_Filesystem(__DIR__ . '/../src/Views');
        $this->twig = new Twig_Environment($loader, array(
            'cache' => __DIR__ . '/../cache',
            'auto_reload' => true,
        ));

        $varExportFunction = new Twig_SimpleFunction('var_export', 'var_export');
		$this->twig->addFunction($varExportFunction);
    }

    public function run()
    {
        $this->request = new Request();
        $this->twig->addGlobal('request', $this->request);

        list($controller, $method) = $this->handleRoutes();
        $controllerInstance = new $controller($this->request, $this->twig);
        if (method_exists($controllerInstance, $method)) {
            return $controllerInstance->$method();
        } else {
            throw new Exception('Метод контроллера не существует');
        }
    }

    public function handleRoutes()
    {
        $url = $this->request->getUrl();

        if (isset($this->routingMap[$url])) {
            $route = $this->routingMap[$url];
            $controller = $route['controller'];
            $action = $route['action'];
        } else {
            $route = $this->routingMap['notFound'];
            $controller = \OloloCms\Controllers\IndexController::class;
            $action = 'notFound';
        }

        $this->request->setRouteName($route['name']);

        return [
            $controller,
            $action,
        ];
    }
}
