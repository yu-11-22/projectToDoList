<?php
require_once("crudModel.php");

class Model
{
    public $crud;

    public function __construct()
    {
        $this->crud = new CRUD;
    }

    /**
     * 查找對應帳號的資料
     *
     * @param [type] $account
     * @return void
     */
    public function login($account)
    {
        $result = $this->crud->select("*", "vincent.member WHERE member.account='$account'");
        return $result;
    }

    /**
     * 將註冊的帳密寫入資料庫
     *
     * @param [type] $account
     * @param [type] $password
     * @return boolean
     */
    public function register($account, $password): bool
    {
        if ($this->crud->insert("vincent.member", "account, password", "$account','$password")) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 查找待辦事項資料表
     *
     * @return void
     */
    public function toDoListData()
    {
        $result = $this->crud->select("*", "vincent.tasks");
        return $result;
    }

    /**
     * 將新的待辦事項寫入資料庫
     *
     * @param [type] $newToDoList
     * @return boolean
     */
    public function insertToDoList($newToDoList): bool
    {
        if ($this->crud->insert("vincent.tasks", "list", $newToDoList)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 對應id刪除待辦事項
     *
     * @param [type] $delId
     * @return boolean
     */
    public function deleteToDoList($delId): bool
    {
        if ($this->crud->delete("vincent.tasks", "id", $delId)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 修改密碼寫入資料庫
     *
     * @param [type] $sessionAccount
     * @param [type] $newPassword
     * @return boolean
     */
    public function updatePassword($sessionAccount, $newPassword): bool
    {
        if ($this->crud->update("vincent.member", "member.password", $newPassword, "account", "'$sessionAccount'")) {
            return true;
        } else {
            return false;
        }
    }
}
