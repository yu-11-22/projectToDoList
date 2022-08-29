<?php
require_once("../helper/template.php");
require_once("../serviceAndModel/loginService.php");

class LoginController
{
    public $template;
    public $service;

    public function __construct()
    {
        $_SESSION['account'] = null;
        $this->template = new Template();
        $this->service = new LoginService();
    }

    /**
     * 印出登入頁
     *
     * @return void
     */
    public function index()
    {
        $this->service->loginFrontEnd($this->template);
        echo $this->template->fetch('../blade/blade.php');
    }

    /**
     * 登入成功或失敗的跳轉
     *
     * @return void
     */
    public function login()
    {
        $array = [
            'account' => $_POST['account'],
            'password' => $_POST['password'],
        ];

        if ($this->service->checkLogin($array) != true) {
            echo "<script>alert('帳號或密碼錯誤!');</script>";
            echo "<script>window.location.href='/'</script>";
            die();
        } else {
            echo "<script>alert('登入成功!');</script>";
            echo "<script>window.location.href='/todoList'</script>";
            die();
        }
    }

    /**
     * 清空session導回登入頁
     *
     * @return void
     */
    public function logout()
    {
        $_SESSION['account'] = null;
        echo "<script>window.location.href='/'</script>";
    }
}
