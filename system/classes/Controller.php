<?php

namespace app\system\classes;

use app\system\Application;
use app\system\middlewares\BaseMiddleware;

class Controller
{
    public string $layout = 'main';
    public string $action = '';
    protected array $middlewares = [];
    public function setLayout($layout): void
    {
        $this->layout = $layout;
    }
    public function render($view, $params = []): array|false|string
    {
        return Application::$app->view->renderView($view, $params);
    }

    public function registerMiddleware(BaseMiddleware $middleware): void
    {
        $this->middlewares[] = $middleware;
    }

    /**
     * @return array
     */
    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }


}