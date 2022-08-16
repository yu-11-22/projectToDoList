<?php
require_once("../helper/template.php");
require_once("../serviceAndModel/loginService.php");

class RegisterController
{
    public $template;
    public $service;

    public function __construct()
    {
        $this->template = new Template();
        $this->service = new LoginService();
    }

    /**
     * 印出註冊頁
     *
     * @return void
     */
    public function index()
    {
        $this->service->registerFrontEnd($this->template);
        echo $this->template->fetch('../blade/blade.php');
    }

    /**
     * 註冊成功或失敗的跳轉
     *
     * @return void
     */
    public function register()
    {
        $array = [
            'account' => $_POST['account'],
            'password' => $_POST['password'],
        ];

        if ($this->service->checkRegister($array) != true) {
            echo "<script>alert('帳號已被註冊!');</script>";
            echo "<script>window.location.href='/register'</script>";
            die();
        } else {
            echo "<script>alert('註冊成功，即將進入登入頁!');</script>";
            echo "<script>window.location.href='/'</script>";
            die();
        }
    }
}
