<?php
class Template
{
    public $file; // 宣告檔案
    public $vars; // 宣告所有樣板的變數

    function __construct($file = null)
    {
        $this->file = $file;
    }

    /**
     * 建立樣板變數
     */
    function set($key, $value)
    {
        $this->vars[$key] = is_object($value) ? $value->fetch() : $value;
    }

    /**
     * 打開檔案, 解析, 並印出樣板
     *
     * @param $file string the template file name
     */
    function fetch($file = null)
    {
        if (!$file) {
            $file = $this->file;
        }
        extract($this->vars);
        ob_start();
        include($file);
        $contents = ob_get_contents();
        ob_end_clean();
        return $contents;
    }
}
