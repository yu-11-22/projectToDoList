<?php
class CRUD
{
    /**
     * 查詢資料
     *
     * @param [type] $tableColumn 資料欄位
     * @param [type] $dataTable 資料表
     * @return void
     */
    function select($tableColumn, $dataTable)
    {
        global $link;
        $sqlString = "SELECT $tableColumn FROM $dataTable";
        $result = mysqli_query($link, $sqlString);
        return $result;
    }

    /**
     * 寫入資料
     *
     * @param [type] $dataTable 資料表
     * @param [type] $tableColumn 資料欄位
     * @param [type] $newTableContent 新資料內容
     * @return void
     */
    function insert($dataTable, $tableColumn, $newTableContent)
    {
        global $link;
        $sqlString = "INSERT INTO $dataTable ($tableColumn) VALUES ('$newTableContent')";
        $result = mysqli_query($link, $sqlString);
        return $result;
    }

    /**
     * 將指定資料刪除
     *
     * @param [type] $dataTable 資料表
     * @param [type] $tableColumn 資料欄位
     * @param [type] $tableContent 資料內容
     * @return void
     */
    function delete($dataTable, $tableColumn, $tableContent)
    {
        global $link;
        $sqlString = "DELETE FROM $dataTable WHERE $dataTable.$tableColumn=$tableContent";
        $result = mysqli_query($link, $sqlString);
        return $result;
    }

    /**
     * 更新資料
     *
     * @param [type] $dataTable 資料表
     * @param [type] $tableColumn 資料欄位
     * @param [type] $newTableContent 新的資料內容
     * @param [type] $name
     * @param [type] $resultRows
     * @return void
     */
    function update($dataTable, $tableColumn, $newTableContent, $name, $resultRows)
    {
        global $link;
        $sqlString = "UPDATE $dataTable SET $tableColumn='$newTableContent' WHERE $dataTable.$name=" . $resultRows;
        $result = mysqli_query($link, $sqlString);
        return $result;
    }
}
