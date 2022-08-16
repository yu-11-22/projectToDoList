<?php
require_once("../controller/loginController.php");
require_once("../controller/registerController.php");
require_once("../controller/toDoListController.php");
require_once("../controller/updateController.php");

class Route
{
    public $controller;

    /**
     * URI 及請求方法對應 Controller
     */
    public function __construct()
    {
        switch ([$_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']]) {
            case ['GET', '/todoList']:
                $this->controller = new ToDoListController;
                $this->controller->index();
                break;
            case ['POST', '/todoList']:
                $this->controller = new ToDoListController;
                $this->controller->toDoList();
                break;
            case ['GET', '/update']:
                $this->controller = new UpdateController;
                $this->controller->index();
                break;
            case ['POST', '/update']:
                $this->controller = new UpdateController;
                $this->controller->update();
                break;
            case ['GET', '/register']:
                $this->controller = new RegisterController;
                $this->controller->index();
                break;
            case ['POST', '/register']:
                $this->controller = new RegisterController;
                $this->controller->register();
                break;
            case ['GET', '/']:
                $this->controller = new LoginController;
                $this->controller->index();
                break;
            case ['POST', '/']:
                $this->controller = new LoginController;
                $this->controller->login();
                break;
            case ['POST', '/logout']:
                $this->controller = new LoginController;
                $this->controller->logout();
                break;
            default:
                echo '<script>window.history.back()</script>';
                die();
        }
    }
}
