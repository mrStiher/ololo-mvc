<?php

namespace OloloCms;

use OloloCms\Core\Network\Request;
use Twig_Environment;
use Twig_Loader_Filesystem;
use Exception;

/**
 * Главный класс приложения
 */
class Application
{
    public $twig;
    public $request;

    public function __construct()
    {
        $loader = new Twig_Loader_Filesystem(__DIR__ . '/../src/Views');
        $this->twig = new Twig_Environment($loader, array(
            'cache' => __DIR__ . '/../cache',
        ));
    }

    public function run()
    {
        $this->request = new Request();
        list($controller, $method) = $this->handleRoutes();
        $controllerInstance = new $controller($this->request,$this->twig);
        if (method_exists($controllerInstance, $method)) {
        	return $controllerInstance->$method();
        } else {
        	throw new Exception('Метод контроллера не существует');
        }
    }

    public function handleRoutes()
    {
        $url = $this->request->getUrl();

        switch ($url) {
        	case '/':
            	$controller = \OloloCms\Controllers\IndexController::class;
            	$action = 'index';
                break;

            case '/about':
            	$controller = \OloloCms\Controllers\IndexController::class;
            	$action = 'about';
                break;

            default:
                $controller = \OloloCms\Controllers\IndexController::class;
            	$action = 'notFound';
                break;
        }

        return [
            $controller,
            $action,
        ];;
    }
}
