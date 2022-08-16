<?php
require_once("model.php");
class TodoListService
{
    public $model;
    public $listArray;

    public function __construct()
    {
        $this->model = new Model;
        $this->listArray = [];
    }

    /**
     * 待辦事項頁頁面
     *
     * @param [type] $template
     * @return void
     */
    public function toDoListFrontEnd(&$template)
    {
        $this->listToDoList();
        $template->set('title', "待辦事項");
        $template->set('headerTitle', "待辦事項：");
        $template->set('newToDoListLinkTo', "/todoList");
        $template->set('newToDoListMethod', "post");
        $template->set('newToDoListName', "list");
        $template->set('deleteLinkTo', "/todoList");
        $template->set('deleteMethod', "post");
        $template->set('toDoListLinkTo', "/todoList");
        $template->set('toDoListMethod', "post");
        $template->set('logoutMethod', "post");
        $template->set('logoutLinkTo', "/logout");
        $template->set('resetHref', "/update");
        $template->set('list', $this->listArray);
    }

    /**
     * 將待辦事項每一列都推入listArray陣列
     *
     * @return void
     */
    public function listToDoList()
    {
        /** @var mysqli_result $result 資料庫連線型別*/
        $result = $this->model->toDoListData();
        while ($resultRows = mysqli_fetch_assoc($result)) {
            array_push($this->listArray, array($resultRows['id'], $resultRows['list'], $resultRows['id'], "updateName$resultRows[id]"));
        }
    }

    /**
     * 驗證寫入待辦事項資料
     *
     * @param [type] $newToDoList
     * @return void
     */
    public function checkInsertToDoList($newToDoList)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (!empty($newToDoList)) {
                if ($this->model->insertToDoList($newToDoList) != false) {
                    return true;
                } else {
                    return false;
                }
            }
            return false;
        }
        return false;
    }

    /**
     * 驗證刪除待辦事項資料
     *
     * @return void
     */
    public function checkDeleteToDoList($delId)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->model->deleteToDoList($delId);
        }
        die();
    }
}
