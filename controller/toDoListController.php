<?php
require_once("../helper/template.php");
require_once("../serviceAndModel/toDoListService.php");
require_once("../serviceAndModel/model.php");

class ToDoListController
{
    public $template;
    public $service;
    public $model;
    public $delId;

    public function __construct()
    {
        $this->template = new Template();
        $this->service = new TodoListService();
        $this->model = new Model;
    }

    /**
     * 印出待辦事項頁
     *
     * @return void
     */
    public function index()
    {
        if ($_SESSION['account'] != null) {
            $this->service->toDoListFrontEnd($this->template);
            echo $this->template->fetch('../blade/toDoListBlade.php');
        } else {
            echo "<script>window.location.href='/'</script>";
        }
    }

    /**
     * 新增、刪除事項
     *
     * @return void
     */
    public function toDoList()
    {
        $this->newToDoList();
        $this->deleteToDoList();
    }

    /**
     * 新增事項
     *
     * @return void
     */
    public function newToDoList()
    {
        if (isset($_POST['list'])) {
            $newToDoList = $_POST['list'];
            if ($this->service->checkInsertToDoList($newToDoList) != false) {
                echo "<script>alert('新增完成!');</script>";
                echo "<script>window.location.href='/todoList'</script>";
            } else {
                echo "<script>alert('後台錯誤，無法新增!');</script>";
                echo "<script>window.location.href='/todoList'</script>";
            }
        }
    }

    /**
     * 刪除事項
     *
     * @return void
     */
    public function deleteToDoList()
    {
        /** @var mysqli_result $result 資料庫連線型別*/
        $result = $this->model->toDoListData();
        while ($resultRows = mysqli_fetch_assoc($result)) {
            if (isset($_POST["delete" . $resultRows['id']])) {
                $this->delId = $resultRows['id'];
                break;
            }
        }
        if ($this->model->deleteToDoList($this->delId) != false) {
            echo "<script>alert('已刪除!');</script>";
            echo "<script>window.location.href='/todoList'</script>";
        } else {
            echo "<script>alert('後台錯誤，無法刪除!');</script>";
            echo "<script>window.location.href='/todoList'</script>";
        }
    }

    public function updateToDoList()
    {
    }
}
