<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/27
 * Time: 16:31
 */
require_once('database.php');
class myClass {

    var $_confContent;
    var $_classset = array(); //存放配置文件中的所以class
    var $_current = false;//当前的虚拟对象

    function __construct($conf) {
        //构造函数
        $this->_confContent = file_get_contents("lib/myclassconf/".$conf.".xml");
        //var_dump($this->_confContent);
        $this->loadConf();
    }

    private function loadConf() {
        if($this->_confContent == null) return;
        $conf = (array)simplexml_load_string($this->_confContent);//得到解析后的数据
        if(!$conf || count($conf["configs"])==0 || count($conf["configs"]->modules)==0) return;

        foreach ($conf["configs"]->modules->module as $module) {
            $tmp = array();
            $tmp["name"]=strval($module->name);
            $tmp["sql"]=$module->sql;
            $tmp["className"]=strval($module->className);
            $tmp["description"]=strval($module->description);
            $tmp["resultType"]=strval($module->resultType);

            if (isset($this->_classset[$tmp["className"]])) {
                //存在
                $temp_class = $this->_classset[$tmp["className"]];
                $temp_class[] = $tmp;
                $this->_classset[$tmp["className"]] = $temp_class;

            } else {
                //不存在
                $this->_classset[$tmp["className"]] = array($tmp);
            }
        }
    }

    function makeSql($sql,$parms) //替换sql语句的参数
    {
        if(!$parms || count($parms)==0) return $sql; //没参数知直接返回原$sql

        $pindex=0;
        foreach($parms as $p)
        {
            //str_replace  是PHP中的替换函数
            $sql=str_replace("#{".$pindex."}",$p,$sql);
            $pindex++;

        }
        return $sql;
    }

    function __get($classname) {
        if (array_key_exists($classname, $this->_classset)) {
            $this->_current = $this->_classset[$classname];
        }
    }

    function __call($methodname, $params) {

        if(!$this->_current) return;
        foreach ($this->_current as $c) {
            if ($methodname == $c["name"]) {
                //找到调用的方法
                $sql = $c["sql"]; //取出对应的sql语句
                //注意，这个sql也是一个数组
                global $myDB;
                if (count($sql) == 1) {
                    //只有一条sql语句
                    $sql = $this->makeSql(strval($sql),$params);
                    if ($c["resultType"] == "none") {
                        $myDB->execForNothing($sql);
                    } else if($c["resultType"] == "array"){
                        return $myDB->execForArray($sql);
                    } else {
                        return $myDB->execForOne($sql);
                    }
                } else {
                    //多条sql语句
                    $sql_list = array();
                    foreach ($sql as $item) {
                        $sql_list[] = $this->makeSql(strval($item), $params);//替换参数
                    }
                    return $myDB->execForTrac($sql_list, $c["resultType"]);
                }
            }
        }
    }
}