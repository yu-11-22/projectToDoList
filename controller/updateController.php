<?php
require_once("../helper/template.php");
require_once("../serviceAndModel/loginService.php");

class UpdateController
{
    public $template;
    public $service;

    public function __construct()
    {
        $this->template = new Template();
        $this->service = new LoginService();
    }

    /**
     * 印出修改頁
     *
     * @return void
     */
    public function index()
    {
        $this->service->updateFrontEnd($this->template);
        echo $this->template->fetch('../blade/blade.php');
    }

    public function update()
    {
        $array = [
            'account' => $_SESSION['account'],
            'password' => $_POST['password'],
            'checkpassword' => $_POST['checkpassword'],
        ];
        if ($this->service->checkUpdate($array) != true) {
            echo "<script>alert('兩次密碼不一致!');</script>";
            echo "<script>window.location.href='/update'</script>";
            die();
        } else {
            echo "<script>alert('修改完成!');</script>";
            echo "<script>window.location.href='/todoList'</script>";
            die();
        }
    }
}
