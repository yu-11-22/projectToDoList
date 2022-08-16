<?php
require_once("model.php");
class LoginService
{
    public $model;

    public function __construct()
    {
        $this->model = new Model;
    }

    /**
     * 登入頁頁面
     *
     * @param [type] $template
     * @return void
     */
    public function loginFrontEnd(&$template)
    {
        $template->set('title', "首頁");
        $template->set('headerTitle', "會員登入");
        $template->set('linkTo', "/");
        $template->set('method', "post");
        $template->set('heading1', "");
        $template->set('heading2', "帳號");
        $template->set('heading3', "密碼");
        $template->set('type1', "account");
        $template->set('name1', "account");
        $template->set('placeholder1', "請輸入帳號");
        $template->set('type2', "password");
        $template->set('name2', "password");
        $template->set('placeholder2', "請輸入密碼");
        $template->set('resetButton', "註冊");
        $template->set('resetHref', "/register");
        $template->set('submitButton', "登入");
    }

    /**
     * 註冊頁頁面
     *
     * @param [type] $template
     * @return void
     */
    public function registerFrontEnd(&$template)
    {
        $template->set('title', "註冊頁");
        $template->set('headerTitle', "會員註冊");
        $template->set('linkTo', "/register");
        $template->set('method', "post");
        $template->set('heading1', "");
        $template->set('heading2', "帳號");
        $template->set('heading3', "密碼");
        $template->set('type1', "account");
        $template->set('name1', "account");
        $template->set('placeholder1', "請輸入帳號");
        $template->set('type2', "password");
        $template->set('name2', "password");
        $template->set('placeholder2', "請輸入密碼");
        $template->set('resetButton', "回首頁");
        $template->set('resetHref', "/");
        $template->set('submitButton', "註冊");
    }

    /**
     * 修改密碼頁頁面
     *
     * @param [type] $template
     * @return void
     */
    public function updateFrontEnd(&$template)
    {
        $template->set('title', "修改頁");
        $template->set('headerTitle', "修改密碼");
        $template->set('linkTo', "/update");
        $template->set('method', "post");
        $template->set('heading1', "帳號：$_SESSION[account]");
        $template->set('heading2', "修改密碼");
        $template->set('heading3', "確認密碼");
        $template->set('type1', "password");
        $template->set('name1', "password");
        $template->set('placeholder1', "請修改密碼");
        $template->set('type2', "password");
        $template->set('name2', "checkpassword");
        $template->set('placeholder2', "請再次確認密碼");
        $template->set('resetButton', "上一頁");
        $template->set('resetHref', "/todoList");
        $template->set('submitButton', "確認");
    }

    /**
     * 驗證登入
     *
     * @return boolean
     */
    public function checkLogin(array $array): bool
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (!empty($array['account']) && !empty($array['password'])) {
                /** @var mysqli_result $result 資料庫連線型別*/
                $result = $this->model->login($array['account']);
                if ($resultRows = mysqli_fetch_assoc($result)) {
                    if (password_verify($array['password'], $resultRows['password'])) {
                        $_SESSION['account'] = $array['account'];
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            }
        }
        return false;
    }

    /**
     * 驗證註冊
     *
     * @param array $array
     * @return boolean
     */
    public function checkRegister(array $array): bool
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (!empty($array['account']) && !empty($array['password'])) {
                $account = $array['account'];
                $password = password_hash($array['password'], PASSWORD_DEFAULT);
                if ($this->model->register($account, $password)) {
                    return true;
                } else {
                    return false;
                }
            }
            return false;
        }
        return false;
    }

    public function checkUpdate(array $array)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (!empty($array['password']) && !empty($array['checkpassword'])) {
                if ($array['password'] !== $array['checkpassword']) {
                    return false;
                } else {
                    $newPassword = password_hash($array['password'], PASSWORD_DEFAULT);
                    if ($this->model->updatePassword($array['account'], $newPassword)) {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
            return false;
        }
    }
}
